<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class CcrmEssence extends CBitrixComponent
{
	public function executeComponent()
    {
		if($this->startResultCache())
		{
			if(CModule::IncludeModule("iblock"))
			{
				$this->arResult = $this->getCRMEssenses($this->arParams);
			}
		}
		$this->IncludeComponentTemplate();
		return $this->arResult;
    }
	
	public function getCRMEssenses($arParams)
	{
		$arSelect = Array("IBLOCK_ID", "ID", "NAME");
		$arFilter = Array("IBLOCK_ID" => $this->arParams["IBLOCK_ID"], "ACTIVE" => "Y");
		
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
			$this->arResult[] = $arTemp;
		}
		return $this->arResult;
	}
}
?>