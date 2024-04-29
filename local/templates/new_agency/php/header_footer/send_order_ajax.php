<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$arResult = array('status' => false);

foreach ($_POST as $key => $value) 
{
	$_POST[$key] = trim($value);
}

$date = date_create();
date_modify($date, '4 hour');
$date = date_format($date, 'd.m.Y H:i:s');

$PROP = array();
$PROP['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
$PROP['DATE'] = $date;
$PROP['PHONE'] = $_POST['phone'];
$PROP['NAME'] = $_POST['name'];

$PROP['MAIL'] = $_POST['email'];
if(CEvent::Send("CONNECT_WITH_US_FOOTER", "s1", $PROP))
{
	$arResult['status'] = true;
}

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/new_agency/php/add_lead_bitrix_24.php");
echo json_encode($arResult);