<?php
namespace Medboubazine\Twilio\Requests\Sms;

use Medboubazine\Twilio\Config\Configurations;
use Medboubazine\Twilio\Validators\SendSmsValidator;
use Twilio\Rest\Client;

class SendSms{    
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
        SendSmsValidator::handle($this->config->all());
    }
    /**
     * send
     *
     * @return object|bool|string|int
     */
    public function handle()
    {
        $client = new Client($this->config->getClientId(), $this->config->getClientSecret());
        //
        $client->setLogLevel('debug');
        //
        $message = $client->messages
                            ->create($this->args['to'],[
                                'from' => $this->config->getNumber(),
                                'body' => $this->args['body'],
                            ]);
        return $message;
    }
}