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
$PROP['PHONE'] = $_POST['phone'];
$PROP['NAME'] = $_POST['name'];
$PROP['DATE'] = $date;
$PROP['QUEST'] = $_POST['question'];

if($_POST['popup-title'] == 'Остались вопросы, главная страница')
{
	if(CEvent::Send("QUESTIONS_MAIN_PAGE", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
elseif($_POST['popup-title'] == 'Обсудим ваш проект, детальная страница услуг')
{
	if(CEvent::Send("DISCUSS_PROJECT", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/new_agency/php/add_lead_bitrix_24.php");
echo json_encode($arResult);