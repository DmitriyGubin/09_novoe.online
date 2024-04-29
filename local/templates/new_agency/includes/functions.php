<?php 

function Check_Main_Page()
{
	$this_url = $_SERVER['REQUEST_URI'];
	$one_var = ($this_url[0] == '/') && ($this_url[1] == '');
	$two_var = ($this_url[0] == '/') && ($this_url[1] == '?');
	$bool = $one_var || $two_var;
	return $bool;
}

function Check_Page($url_part)
{
	$this_url = $_SERVER['REQUEST_URI'];
	$bool = (strpos($this_url, $url_part) != false);
	return $bool;
}

function Сut_Text($text, $number_letters)
{
	if(mb_strlen($text,"UTF-8") > $number_letters)
	{
		return mb_substr($text, 0, $number_letters, "UTF-8").'...';
	}
	else
	{
		return $text;
	}
}

function Array_Converter_With_ID($mas)
{
	$result = [];
	foreach ($mas as $key => $value) 
	{
		$result[$value['ID']] = $value;
	}
	return $result;
}

function Return_All($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Next_News_Check($iblock_id,$news_date)
{
	if(CModule::IncludeModule("iblock"))
	{
		$arFilter = Array(
			"IBLOCK_ID"=>$iblock_id,
			"<DATE_ACTIVE_FROM"=>$news_date,
		);
		$res = CIBlockElement::GetList(
	            Array("DATE_ACTIVE_FROM"=>"DESC"), //сортировка данных
	            $arFilter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            Array('ID','DETAIL_PAGE_URL')
	        );

		if ($ar_fields = $res->GetNext())
		{
			return $ar_fields['DETAIL_PAGE_URL'];
		}
		else
		{
			return 'no';
		}
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Fields_Props($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		$j=0;
		while($ob = $res->GetNextElement())
		{
			$result[$j]['fields'] = $ob->GetFields();
			$result[$j]['props'] = $ob->GetProperties();
			$j++;
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Sections($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockSection::GetList(
			Array(),
			$Filter,
			false,
			$Select,
			false
		);

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Main_Or_Detail_Page($url)
{
	$this_url = $_SERVER['REQUEST_URI'];
	$bool = (
		($this_url == "/$url/") || 
		(strpos($this_url, "$url/?") != false)
	);
	return $bool;
}



//$phone = +79135550000 ---> +7(913) 555 00 00
function Phone_Converter($phone,$delimeter)
{
	$result = '';
	$result = substr($phone, 0, 2).'('.substr($phone, 2, 3).')'.
	$delimeter.substr($phone, 5, 3).
	$delimeter.substr($phone, 8, 2).
	$delimeter.substr($phone, 10, 2);
	return $result;
}

function Number_Converter($num)
{
	if(($num > 0) && ($num < 10))
	{
		$num = '0'.$num;
	}
	
	return $num;
}

function Return_Price($price)
{
	return number_format($price, 0, '.', ' ').' ₽';
}

function Return_List_Variants($iblock_id, $prop_code)
{
	if(CModule::IncludeModule("iblock"))
	{
		$property_enums = CIBlockPropertyEnum::GetList(
			Array(), 
			Array("IBLOCK_ID"=>$iblock_id, "CODE"=>$prop_code)
		);

		  $props = [];//получаем список возможных свойств
		  while($enum_fields = $property_enums->GetNext())
		  {
		  	$props[] = $enum_fields['VALUE'];
		  }
		  return $props;
		}
		else
		{
			return 'Error';
		}
}

// function Redirect($this_url,$old_url_part,$new_url_full)
// {
// 	if(strpos($this_url, $old_url_part) != false)
// 	{
// 		header('Location: '.$new_url_full);
// 	}
// }

function SecCode_To_PropCode($code_serv)
{
	if($code_serv == 'razrabotka-mobilnykh-prilozheniyy')
	{
		return 'MOBILE_SUB_SERV';
	}
	if($code_serv == 'nastroyka-kontekstnoy-i-targetirovannoy-reklamy')
	{
		return 'REKLAME_SUB_SERV';
	}
	if($code_serv == 'seo-prodvizhenie-saytov')
	{
		return 'SEO_SUB_SERV';
	}
	if($code_serv == 'razrabotka-saytov')
	{
		return 'DEV_SUB_SERV';
	}
	if($code_serv == 'vnedrenie-1s-bitriks')
	{
		return 'TECH_SUB_SERV';
	}
	if($code_serv == 'vnedrenie-crm')
	{
		return 'CRM_SUB_SERV';
	}
	if($code_serv == 'performance-marketing')
	{
		return 'MARKET_SUB_SERV';
	}
}

function Return_Sub_Items($code_serv)
{
	$prop = SecCode_To_PropCode($code_serv);

	$sub_items = Return_All(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "PROPERTY_".$prop."_VALUE" => "YES"),
		Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL")
	);

	return $sub_items;
}



?>