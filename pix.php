<?php 

    $config = require_once 'config.php';
    require_once 'vendor/autoload.php';

    use MercadoPago\Client\Payment\PaymentClient;
    use MercadoPago\Exceptions\MPApiException;
    use MercadoPago\MercadoPagoConfig;

    // Step 2: Set production or sandbox access token
    MercadoPagoConfig::setAccessToken($config['accesstoken']);
    $client = new PaymentClient();

    
    $createRequest = [
        "transaction_amount" => 100,
        "description" => "description",
        "external_reference" => uniqid(),
        "notification_url" => "https://google.com",
        "payment_method_id" => "pix",
            "payer" => [
                "email" => "luanalvesnsr@gmail.com",
            ]
        ];


    $payment = $client->create($createRequest);

    echo '<img src="data:image/png;base64,'.$payment->point_of_interaction->transaction_data->qr_code_base64.'" />';

    // echo '<pre>';
    // var_dump($payment);

