<?php
namespace Medboubazine\Twilio\Validators;

use Medboubazine\Twilio\Exceptions\InvalidConfigurationsException;

class SendVerificationSmsValidator{
    /**
     * handle
     *
     * @return void
     */
    public static function handle(array $configurations)
    {
        if (!(isset($configurations["client_id"]) && is_string($configurations["client_id"]))) {
            throw new InvalidConfigurationsException("Error in configurations : 'client_id' required and must be string", 1);
        }
        if (!(isset($configurations["client_secret"]) && is_string($configurations["client_secret"]))) {
            throw new InvalidConfigurationsException("Error in configurations : 'client_secret' required and must be string", 1);
        }
        if (!(isset($configurations["number"]) && is_string($configurations["number"]))) {
            throw new InvalidConfigurationsException("Error in configurations : 'number' required and must be string", 1);
        }
        if (!(isset($configurations["service_verify_id"]) && is_string($configurations["service_verify_id"]))) {
            throw new InvalidConfigurationsException("Error in configurations : 'service_verify_id' required and must be string", 1);
        }
    }
}