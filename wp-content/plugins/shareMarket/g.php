<?php
	switch($_GET['host']){
		case "yahoo":			 
			$getCorrectData = file_get_contents("https://chartapi.finance.yahoo.com/instrument/1.0/%5E".$_GET['data']."/chartdata;type=quote;range=7d/json");
			$parsedData = str_replace("finance_charts_json_callback(","",$getCorrectData);
			echo $parsedData = str_replace(")","",$parsedData);
		break;
		case "google":
			$getCorrectData =  file_get_contents("https://www.google.com/finance/info?q=".$_GET['dataGoogle'].",BSE:BOM:500285,BSE:ASHOKLEY,BSE:ICICIBANK,BSE:IDFCBANK,NSE:JINDALSTEL");
  			echo $parsedData = str_replace("//","",$getCorrectData);
		break;
	}
?>

