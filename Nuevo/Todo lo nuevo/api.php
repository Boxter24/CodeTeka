<?php

use PayPal\Api\Account;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::post('create-payment', function() {
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Aa5HntbFw4fyKFon1Bu8k21etBiMuM4igqUOad6Ox6H6kCcFmS46dL4folce-A3SwzkkA89XRlTJh4PQ',
            'ELwSJd8RGTNL-uvGZDz-RbuzCVO1SJ-JdGHu-Fx4GhW9IgiwrbRvEoCCf4Z5c6ZlWt__t0ZKkYq9CGis'

        )
    );

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");

    $item1 = new Item();
    $item1->setName('Plan basico')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("123123")
        ->setPrice('100');

    $item2 = new Item();
    $item2->setName('Plan estandar')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("321321")
        ->setPrice('200');

    $item3 = new Item();
    $item3->setName('Plan premium')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("213213")
        ->setPrice('300');
    
    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2, $item3));

    $details = new Details();
    $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal(600);

    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal(20)
        ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription('Payment description')
        ->setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl("http://playground-paypal.test")
        ->setCancelUrl("http://playground-paypal.test");

    $inputFields = new InputFields();
    $inputFields->setNoShipping(1);

    $webProfile = new WebProfile();
    $webProfile->setName('test'. uniqid())->setInputFields($inputFields);

    $webProfileId = $webProfile->create($apiContext)->getId();

    $payment = new Payment();
    $payment->setExperienceProfileId($webProfileId);
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

    try {
        $payment->create($apiContext);
    } catch(Exception $ex) {
        echo $ex;
        exit(1);
    }

    return $payment;

});

Route::post('execute-payment', function (Request $request){
    return 'execute payment working';
});