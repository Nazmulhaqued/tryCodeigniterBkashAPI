<?php

    

class MyClass extends CI_Controller {

     

    /**

     * Index Page for this controller.

     *

     */

    public function index()

    {
    
    $this->load->library('curl');
    $link="https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant";
    $url = curl_init($link);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    
    // token

    $post_token=array(
        'app_key'=>"5tunt4masn6pv2hnvte1sb5n3j",                                              
        'app_secret'=>"1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka"                  
    );  
    
    
    //$proxy = $array["proxy"];
    $posttoken=json_encode($post_token);
    $header=array(
        'Content-Type:application/json',
        'password:hWD@8vtzw0',                                                               
        'username:sandboxTestUser'                                                          
    );              
    
    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url,CURLOPT_POSTFIELDS, $posttoken);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    //curl_setopt($url, CURLOPT_PROXY, $proxy);
    $resultdata=curl_exec($url);
   
    curl_close($url);
    //print_r($resultdata['id_token']);
    $data = json_decode($resultdata);
    // print_r($data);

    // print_r($data->id_token);
    $token_is = $data->id_token;
   
    // create payment work start here 


    $amount = 100;
$invoice = "46f647h4"; // must be unique
$intent = "sale";
// $proxy = $array["proxy"];
    $createpaybody=array('amount'=>$amount, 'currency'=>'BDT', 'merchantInvoiceNumber'=>$invoice,'intent'=>$intent);
    $create_link="https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/create";   
    $url = curl_init($create_link);

    $createpaybodyx = json_encode($createpaybody);

    $header=array(
        'Content-Type:application/json',
        'authorization:'.$token_is,                                                               
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
    $api_decode2 = json_decode($resultdata);
    print_r($api_decode2);
    //echo $api_decode2['paymentID'];
 	//print_r($api_decode2->paymentID);
 	 $paymentIDis = $api_decode2->paymentID;
    //echo $paymentID = $api_decode2->paymentID;
    //execuite payment

    // https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/execute/


    $executeURL= "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/execute/";




$proxy = "1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka";
//echo $proxy;
$url22 = curl_init($executeURL.$paymentIDis);

$header=array(
        'Content-Type:application/json',
        'authorization:'.$token_is,                                                               
        'x-app-key:5tunt4masn6pv2hnvte1sb5n3j'                                                          
    );	
    
curl_setopt($url22,CURLOPT_HTTPHEADER, $header);
curl_setopt($url22,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($url22,CURLOPT_RETURNTRANSFER, true);
curl_setopt($url22,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($url22, CURLOPT_PROXY, $proxy);

$resultdatax=curl_exec($url22);
curl_close($url22);
echo $resultdatax;  
















    
    //end token

    }

}