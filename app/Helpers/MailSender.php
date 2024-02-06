<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class MailSender
{
//    public static function sendVerificationEmail(User $user): bool
//    {
//        try {
//            $result = self::send(
//                $user->email,
//                'email.verification_email',
//                'Email Verification',
//                []
//            );
//            return !is_null($result);
//        } catch (\Exception $e) {
////            TODO log
//            return false;
//        }
//    }

    /**
     * @throws \Exception
     */
    public static function sendMatchKeyToJudge(string $judgeEmail, string $matchKey): SentMessage|null
    {
        return self::sendEmail(
            $judgeEmail,
            'email.judge_match_key',
            'Match key',
            compact('matchKey')
        );
    }

    /**
     * @throws \Exception
     */
    public static function sendApiTokenToCustomer(string $apiCustomerEmail, string $apiToken, string $password): SentMessage|null
    {
        return self::sendEmail(
            $apiCustomerEmail,
            'email.api_customer_token',
            'Tournament statistics registration mail',
            compact('apiToken', 'password')
        );
    }

    /**
     * @throws \Exception
     */
    private static function send(string $to, string $view, string $subject = '', array $param = []): SentMessage|null
    {
        return Mail::send($view, $param, function ($message) use ($to, $subject) {
            $message->to($to);
            $message->subject($subject);
        });
    }
}
