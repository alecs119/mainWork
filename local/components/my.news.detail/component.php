<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult["FILE_DESC"] = $arParams["FILE_DESC"];
$arResult["STRING_HEADER"] = $arParams["STRING_HEADER"];
$arResult["STRING_DESCRIPTION_FIRST"] = $arParams["STRING_DESCRIPTION_FIRST"];
$arResult["STRING_DESCRIPTION_SECOND"] = $arParams["STRING_DESCRIPTION_SECOND"];

$this->includeComponentTemplate();
?>