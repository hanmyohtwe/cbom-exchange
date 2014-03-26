<?php
header('Content-Type: application/json');

$apiCurrenciesUrl = "http://forex.cbm.gov.mm/api/currencies";
$apiExchangeUrl = "http://forex.cbm.gov.mm/api/latest";

$exchangeContent = file_get_contents($apiExchangeUrl);
$currenciesContent = file_get_contents($apiCurrenciesUrl);

$exchangeData = json_decode($exchangeContent, true);
$currenciesData = json_decode($currenciesContent, true);

$jsonData = array_merge_recursive($exchangeData, $currenciesData);

$jsonEnc = json_encode($jsonData,JSON_PRETTY_PRINT); //prettify it!
echo $jsonEnc;