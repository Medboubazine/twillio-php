<?php
namespace Medboubazine\Twilio\Config;

use Medboubazine\Twilio\Validators\SendSmsValidator;
use Medboubazine\Twilio\Validators\SendVerificationSmsValidator;

class Configurations{

    protected array $configurations = [];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(array $configurations)
    {
        $this->configurations = $configurations;
    }    
    /**
     * get configuration array
     *
     * @return array
     */
    public function all()
    {
        return $this->configurations;
    }
    /**
     * getClientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->configurations["client_id"];
    }
    /**
     * getClientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->configurations["client_secret"];
    }    
    /**
     * getNumber
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->configurations["number"];
    }    
    /**
     * getServiceVerifySid
     *
     * @return void
     */
    public function getServiceVerifyId()
    {
        return $this->configurations["service_verify_id"] ?? null;
    }
}