<?php

namespace App\Modules\Api\YouKassaApi;

use App\Models\Payment;
use YooKassa\Client;
use YooKassa\Request\Payments\CreateCaptureResponse;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\PaymentsResponse;
use YooKassa\Model\Payment\Payment as YooKassaPayment;

class YooKassaApi
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
//        $this->client->setAuth(env('YOOKASSA_SHOP_ID'), env('YOOKASSA_API_KEY'));
        $this->client->setAuth(env('YOOKASSA_TEST_SHOP_ID'), env('YOOKASSA_TEST_API_KEY'));
    }

    public function client(): Client
    {
        return $this->client;
    }

    /**
     * @throws \Exception
     */
    public function createPayment(Payment $payment, string $returnUrl): ?CreatePaymentResponse
    {
        $requestData = $this->getPaymentRequest($payment, $returnUrl);
        return $this->client->createPayment($requestData, uniqid('', true));
    }

    /**
     * @throws \Exception
     */
    public function getPayments(): ?PaymentsResponse
    {
        return $this->client->getPayments();
    }

    /**
     * @param YooKassaPayment $payment
     * @return CreateCaptureResponse|null
     * @throws \Exception
     */
    public function capturePayment(YooKassaPayment $payment): ?CreateCaptureResponse
    {
        return $this->client->capturePayment([
            'amount' => $payment->getAmount(),
        ], $payment->getId());
    }

    private function getPaymentRequest(Payment $payment, string $returnUrl): array
    {
        return [
            'amount' => [
                'value' => $payment->sum,
                'currency' => Payment::CURRENCY_RUB,
            ],
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => $returnUrl,
            ],
//            'capture' => true,
            'description' => $payment->description,
            'receipt' => [
                'customer' => [
                    'full_name' => 'Ivanov Ivan Ivanovich', // TODO fill if need
                    'phone' => '79000000000',
                ],
                'items' => [
                    [
                        'description' => $payment->description,
                        'quantity' => 1,
                        'amount' => [
                            'value' => $payment->sum,
                            'currency' => Payment::CURRENCY_RUB,
                        ],
                        'vat_code' => 1,
                    ],
                ],
            ],
            'metadata' => [
                'payment_id' => $payment->id,
            ],
        ];
    }
}
