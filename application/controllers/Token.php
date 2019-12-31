<?php

    

class Token extends CI_Controller {

     

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
     echo $data->id_token;
     
    //end token

    }

}