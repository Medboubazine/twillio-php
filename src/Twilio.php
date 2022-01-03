<?php
namespace Medboubazine\Twilio;

use Medboubazine\Twilio\Config\Configurations;
use Medboubazine\Twilio\Requests\Sms\CheckVerificationToken;
use Medboubazine\Twilio\Requests\Sms\SendSms;
use Medboubazine\Twilio\Requests\Sms\SendVerificationSms;

class Twilio{
/**
 * configurations
 *
 * @var Configurations
 */
protected Configurations $configurations;
/**
 * __construct
 *
 * @param  array $configurations
 * @return void
 */
public function __construct(array $configurations)
{
    $this->configurations = new Configurations($configurations);
}
/**
 * sendSmsMessage
 *
 * @param  string $international_number_format
 * @param  string $body
 * @return object
 */
public function sendSms(string $international_number_format,string $body = "")
{
    $message = new SendSms($this->configurations,[
                                        'to'=>$international_number_format,
                                        "body"=>$body,
                                    ]);
    return $message->handle();
}
/**
 * sendVerificationSms
 *
 * @param  string $international_number_format
 * @return object
 */
public function sendVerificationSms(string $international_number_format)
{
    $message = new SendVerificationSms($this->configurations,[
                                        'to'=>$international_number_format,
                                    ]);
    return $message->handle();
}
/**
 * checkVerificationToken
 *
 * @param  string $international_number_format
 * @return void
 */
public function checkVerificationToken(string $international_number_format,$token)
{
    $message = new CheckVerificationToken($this->configurations,[
                                        'to'=>$international_number_format,
                                        'token'=>$token,
                                    ]);
    return $message->handle();
}
}