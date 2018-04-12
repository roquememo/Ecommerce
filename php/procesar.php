<?php
session_start();
$id=$_SESSION['id'];
	$data = $_GET['articulos'];
	$articulo=explode("|", $data);
	$key='';
	$rand = range(1000, 5000); 
	shuffle($rand); 
	for($i=0;$i<sizeof($articulo);$i++){
		$pieza=explode(",", $articulo[$i]);
		$valor[$i]['nombre']=$pieza[0];
		$valor[$i]['cantidad']=$pieza[1];
		$valor[$i]['precio']=$pieza[2];
	}

	for ($i=1; $i <sizeof($articulo) ; $i++) { 
		$j=($i-1);
		$key=$key.$valor[$j]['nombre'].$valor[$j]['cantidad'].$valor[$j]['precio'];
		
	}
	$key=$key.$id;
	$key256=hash('sha256',$key);


	$paypal_business = "roquememo-facilitator@hotmail.com";
	$paypal_currency = "USD";
	$paypal_cursymbol = "&usd";
	$paypal_location = "MX";
	$paypal_returntxt = $key256;
	$paypal_returnurl = "http://localhost/Ecommerce/php/done.php?key=".$key256;
	$paypal_cancelurl = "http://localhost/Ecommerce/cesta.html";

	$ppurl = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_cart";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&no_note=1";
	$ppurl .= "&currency_code=".$paypal_currency;
	$ppurl .= "&charset=utf-8&rm=1&upload=1";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&return=".urlencode($paypal_returnurl);
	$ppurl .= "&cancel_return=".urlencode($paypal_cancelurl);
	$ppurl .= "&page_style=&paymentaction=sale&bn=katanapro_cart&invoice=KP-".$rand[0];

	for ($i=1; $i <sizeof($articulo) ; $i++) { 
		$j=($i-1);
		$ppurl.="&item_name_$i=".urlencode($valor[$j]['nombre'])."&quantity_$i=".$valor[$j]['cantidad']."&amount_$i=".$valor[$j]['precio']."&item_number_$i=";
	}

	$ppurl.= "&tax_cart=0.00";

 	echo $ppurl;
?>