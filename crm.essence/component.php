<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;
//echo "<pre>";print_r($this);

if($this->startResultCache(false, array(($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))){

	$IBLOCK_ID = 14;	
		
	if(CModule::IncludeModule("iblock") && ($arIBlock = GetIBlock($IBLOCK_ID))) {

	$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_PROP_CLIENT", "PROPERTY_COMPANY", "PROPERTY_GROUP");
	$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
	
	$arResult = array();
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
	/*while($ob = $res->GetNextElement()){
	   $arFields = $ob->GetFields();
	   echo "<pre>"; print_r($arFields); echo "</pre>";
	}*/
	
	while($arFields = $res->GetNext())
	{
			$arResult[$arFields['ID']] = array(
					'NAME' => $arFields['NAME'], 
					'PROP_CLIENT' => $arFields['PROPERTY_PROP_CLIENT_VALUE'], 
					'COMPANY' => $arFields['PROPERTY_COMPANY_VALUE'], 
					'GROUP' => $arFields['PROPERTY_GROUP_VALUE']
					);
	}
		
	} else {
		ShowError("Информационный блок не найден.");
	}

        $this->IncludeComponentTemplate();
}
?>
