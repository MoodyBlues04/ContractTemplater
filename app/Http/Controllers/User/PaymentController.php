<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Tariff;
use App\Modules\Api\YouKassaApi\YooKassaApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\Payment\PaymentStatus;

class PaymentController extends Controller
{
    public function __construct(private YooKassaApi $api)
    {
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
    public function callback(Request $request): void
    {
        $body = @file_get_contents('php://input');
        $callbackParams = json_decode($body, true);

        Log::error('youkassa.callback', ['data' => $callbackParams]);

//        $notificationModel = null;
//        if ($callbackParams['event'] === NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE) {
//            $notificationModel = new NotificationWaitingForCapture($callbackParams);
////        } elseif ($callbackParams['event'] === NotificationEventType::PAYMENT_SUCCEEDED) {
////            $notificationModel = new NotificationSucceeded($callbackParams);
//        } else {
//            return response()->json(['status' => 'ok']);
//        }
//
//        $payment = $notificationModel->getObject();
//
//        if ($payment->getStatus() !== PaymentStatus::WAITING_FOR_CAPTURE) {
//            return response()->json(['status' => 'ok']);
//        }
//
//        $paymentModel = $this->getPayment($payment);
//
//        if (is_null($paymentModel) || !$paymentModel->isValidPayment($payment)) {
//            throw new \InvalidArgumentException('Ошибка проверки данных оплаты.');
//        }
//
//        $paymentCallback = new PaymentCallback();
//        $paymentCallback->params = $callbackParams;
//        $paymentCallback->method = PaymentCallback::METHOD_WAITING_FOR_CAPTURE;
//        $paymentModel->callbacks()->save($paymentCallback);
//
//        $this->api->capturePayment($payment);
//
//        $paymentModel->setStatus('payed');
//        $paymentModel->save();
//
//        if ($paymentModel->isStatus('payed')) {
//            $paymentModel->payable()->first()->activateByUser();
//        }
//
//        return response()->json(['status' => 'ok']);
    }

//    private function getPayment(\YooKassa\Model\Payment $payment): ?Payment
//    {
//        $metadata = $payment->metadata->toArray();
//        if (isset($metadata['payment_id'])) {
//            return Payment::find($metadata['payment_id']);
//        }
//        return Payment::where('description', $payment->description)->first();
//    }
}
