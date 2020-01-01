<?php

    

class ExecutePayment extends CI_Controller {

    /**

     * Index Page for this controller.

     *

     */

    public function index(){

    $token_is = $_POST['accessToken'];
    $paymentIDis = $_POST['paymentId'];
     $token_is;
     $paymentIDis;
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
    curl_setopt($url22, CURLOPT_TIMEOUT, 30);
    curl_setopt($url22, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($url22, CURLOPT_POST, 1 );
    curl_setopt($url22,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url22,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url22, CURLOPT_VERBOSE, true);
    curl_setopt($url22,CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url22, CURLOPT_SSL_VERIFYPEER, true); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC
    // curl_setopt($url22, CURLOPT_PROXY, $proxy);

    $resultdatax=curl_exec($url22);


    $code = curl_getinfo($url22, CURLINFO_HTTP_CODE);
    $info = curl_getinfo($url22);
    var_dump($info);


    curl_close($url22);
    $data2 = json_decode($resultdatax);
    // print_r($code);
    

 }
}
  ?> 
