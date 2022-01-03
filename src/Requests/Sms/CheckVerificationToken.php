<?php
namespace Medboubazine\Twilio\Requests\Sms;

use Exception;
use Medboubazine\Twilio\Config\Configurations;
use Medboubazine\Twilio\Validators\SendVerificationSmsValidator;
use Twilio\Rest\Client;

class CheckVerificationToken{    
    /**
     * config
     *
     * @var Configurations
     */
    protected Configurations $config;    
    /**
     * arguments
     *
     * @var array
     */
    protected array $args;
    /**
     * __construct
     *
     * @param  Configurations $config
     * @return void
     */
    public function __construct(Configurations $config,array $args)
    {
        $this->config = $config;
        $this->args = $args;
        //validate configurations
        SendVerificationSmsValidator::handle($this->config->all());
    }
    /**
     * send
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client($this->config->getClientId(), $this->config->getClientSecret());
        //
        $client->setLogLevel('debug');
        //
        try {
            $message = $client->verify
                            ->v2->services($this->config->getServiceVerifyId())
                            ->verificationChecks
                            ->create($this->args['token'],["to" =>$this->args['to']]);
            return $message->status == "approved";
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
}