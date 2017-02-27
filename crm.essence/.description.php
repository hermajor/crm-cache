<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME" => GetMessage("CP_MODULE_ADD_NAME"),//"Кэш CRM сущности";
    "DESCRIPTION" => GetMessage("CP_MODULE_ADD_DESC"),//"Кэширует CRM сущности";
    "PATH" => array(
        "ID" => "crm_essence",
        "NAME" => "crm_essence",
        "CHILD" => array(
            "ID" => "crm_essence_my",
            "NAME" => GetMessage("CP_MODULE_SECTION_NAME")//"CRM сущности"
        )
    ),
);
?>