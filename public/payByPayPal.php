<?php
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'include/start.php'; 


$product = $_GET['gymId'];
$price = $_GET['price'];
$type = $_GET['typeId'];
$shipping = 0;
$total = $price+$shipping;

$payer = new Payer();
$payer-> setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
    ->setCurrency('ILS')
    ->setQuantity(1)
    ->setPrice($price);

$itemList = new ItemList();
$itemList-> setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
    ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('ILS')
    ->setTotal($total)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('payment')
    ->setInvoiceNumber(uniqid());


$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . '/pay_final.php?success=true&gymId='.$product.'&typeId='.$type.'')
    ->setCancelUrl(SITE_URL . '/pay_final.php?success=false&gymId='.$product.'&typeId='.$type.'');

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

try{
    $payment->create($paypal);
}catch(Exception $e){
    die($e);
}

$approvalUrl = $payment->getApprovalLink();

header("Location: {$approvalUrl}");