<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Tariff;
use App\Modules\Api\YouKassaApi\YooKassaApi;
use App\Repositories\PaymentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\Payment\PaymentInterface;
use YooKassa\Model\Payment\PaymentStatus;

class PaymentController extends Controller
{
    public function __construct(
        private YooKassaApi $api,
        private PaymentRepository $paymentRepository
    ) {
    }

    public function pay(Tariff $tariff): \Illuminate\Http\RedirectResponse
    {
        $payment = $tariff->createPayment(Auth::user()->id);

        $response = $this->api->createPayment($payment, route('user.tariff.index'));

        return redirect()->to($response->confirmation->confirmation_url);
    }

    /**
     * @throws \Exception
     */
    public function callback(Request $request): JsonResponse
    {
        try {
            $callbackJson = @file_get_contents('php://input');
            $callbackData = json_decode($callbackJson, true);

            Log::error('youkassa.callback', ['data' => $callbackData]);

            if ($callbackData['event'] !== NotificationEventType::PAYMENT_SUCCEEDED) {
                throw new \InvalidArgumentException('Not success payment.');
            }

            $notificationModel = new NotificationWaitingForCapture($callbackData);
            $yooKassaPayment = $notificationModel->getObject();
            if ($yooKassaPayment->getStatus() !== PaymentStatus::SUCCEEDED) {
                throw new \InvalidArgumentException('Not success payment model.');
            }

            $payment = $this->getPayment($yooKassaPayment);

            if (is_null($payment)) {
                throw new \InvalidArgumentException('Unknown payment.');
            }

            $payment->succeed();

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('yoo_kassa.callback.error', [
                'data' => [$e->getMessage(), $e->getTraceAsString()]
            ]);
            return response()->json(['status' => 'err']);
        }
    }

    private function getPayment(PaymentInterface $payment): ?Payment
    {
        $metadata = $payment->metadata->toArray();

        if (isset($metadata['payment_id'])) {
            $payment = $this->paymentRepository->getById((int)$metadata['payment_id']);
        } else {
            $payment = $this->paymentRepository->firstBy(['description' => $payment->description]);
        }

        /** @var ?Payment */
        return $payment;
    }
}
