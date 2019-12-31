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

<button id="update">Pay With bKash</button>

<script type="text/javascript">
 
   $('#update').click(function(){
                    $.ajax({
                        type:'get',
                        url: "<?php echo site_url('Welcome/payment')?>",
                        contentType: 'html',
                        success:function(data){
                            alert(data);
                        },
                    });
                });


    var accessToken='';
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo site_url('Welcome/payment')?>",
            type: 'get',
            contentType: 'html',
            success: function (data) {
                alert(data);
                console.log('got data from token  ..');
                console.log(JSON.stringify(data));
                
                accessToken=JSON.stringify(data);
            },
            error: function(){
                        console.log('error');
                        
            }
        });

    
    function callReconfigure(val){
        bKash.reconfigure(val);
    }
    function clickPayButton(){
        $("#bKash_button").trigger('click');
    }
});
</script>
    
</body>
</html>