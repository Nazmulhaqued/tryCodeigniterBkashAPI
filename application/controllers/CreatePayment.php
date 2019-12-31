<?php

    

class CreatePayment extends CI_Controller {

     

    /**

     * Index Page for this controller.

     *

     */

    public function index()

    {
      $token = $_POST['accessToken'];
     // $amount = $_POST['amount'];
     echo $token;
    //var_dump($_POST);
    //print_r($_POST);

$amount = 100;
$invoice = "46f647h44"; // must be unique
$intent = "sale";
// $proxy = $array["proxy"];
    $createpaybody=array('amount'=>$amount, 'currency'=>'BDT', 'merchantInvoiceNumber'=>$invoice,'intent'=>$intent);
    $create_link="https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/create";   
    $url = curl_init($create_link);
    $proxy = "1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka";
    $createpaybodyx = json_encode($createpaybody);

    $header=array(
        'Content-Type:application/json',
        'authorization:'.$token,                                                               
        'x-app-key:5tunt4masn6pv2hnvte1sb5n3j'                                                          
    ); 

    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    //curl_setopt($url, CURLOPT_PROXY, $proxy);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    // $api_decode2 = json_decode($resultdata);
    print_r($resultdata);
    
    
    //echo $api_decode2['paymentID'];
    //print_r($api_decode2->paymentID);
    //$paymentIDis = $api_decode2->paymentID;

 }
}
  ?> 
