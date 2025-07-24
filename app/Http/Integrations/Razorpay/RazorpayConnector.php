<?php

namespace App\Http\Integrations\Razorpay;
 
use Exception;
use Razorpay\Api\Api;
 
final readonly class RazorpayConnector
{
    public static function fetch($input)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            return $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(['amount'=>$payment['amount']]);
        }
        return false;
    }
}
