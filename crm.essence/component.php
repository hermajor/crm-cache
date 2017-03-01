<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;

if($this->startResultCache(false, array(($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))){
		
	if(CModule::IncludeModule("iblock")) {

	$arSelect = Array("IBLOCK_ID", "ID", "NAME");
	$arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
	
	$arResult = array();
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
		while($ob = $res->GetNextElement()){
			$arFields = $ob->GetFields();
			$props = $ob->GetProperties();
			$arTemp = array(
				'NAME' => $arFields['NAME'],
				'GROUP' => $props['GROUP']['VALUE'],
				'PROP_CLIENT' => $props['PROP_CLIENT']['VALUE'],
				'COMPANY' => $props['COMPANY']['VALUE']
			);
			$arResult[] = $arTemp;
		}
	}
}

return $arResult;
?>