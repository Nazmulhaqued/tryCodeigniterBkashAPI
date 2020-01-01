<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Merchant</title>
    <meta name="viewport" content="width=device-width" ,="" initial-scale="1.0/">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrom=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
 
</head>

<body>

<button id="bKash_button" onclick="create_token()">Pay With bKash</button>

<script type="text/javascript">
 
    var accessToken='';
     var paymentId='';
function create_token(){
    // var dataStr = "accessToken="+accessToken+ "&amount="+amount;
    $.ajax({
            type:"post",
            url:"<?php echo site_url('Token')?>",
            success:function(data){
                accessToken = data; 
               create_payment(accessToken);   
            }

        })
};

function create_payment(accessToken){
    var amount =100;
      accessToken;

    $.ajax({
            type:"post",
            url:"<?php echo site_url('CreatePayment')?>",
            data : {"accessToken" : accessToken, "amount" : amount},
            success:function(paymentIDis){
                 paymentId = paymentIDis;
                 executePayment(paymentId);
                 
            }

        })

};

function executePayment(paymentId){
      paymentId;

    $.ajax({
            type:"post",
            url:"<?php echo site_url('ExecutePayment')?>",
            data : {"accessToken" : accessToken, "paymentId" : paymentId},
            success:function(data){
                 
                alert(data);
            }

        })

};
    
    
</script>
    
</body>
</html>