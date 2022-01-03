# Documentations

-   Send Sms

```php

<?php

use Medboubazine\Twilio\Twilio;

require_once("./vendor/autoload.php");


$twilio = new Twilio([
                    //ACCOUNT SID
                    'client_id'=>"your ACCOUNT SID",
                    //AUTH TOKEN
                    'client_secret'=>"your AUTH TOKEN",
                    //Phone NUMBER
                    'number'=>"Your number in twillio",
            ]);
//Reciever phone number on international format
$to = "+213550505050";
//your sms body
$body = "your message body";
//send message
$message = $twilio->sendSms($to,$body);
//
$message->sid;
//
```
