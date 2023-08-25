<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["FILE"] = array(
    $arParams["FILE1"],
    $arParams["FILE2"],
    $arParams["FILE3"],
    $arParams["FILE4"],
    $arParams["FILE5"],
    $arParams["FILE6"],
);

$arResult["STRING_HEAD"] = $arParams["STRING_HEAD"];
$arResult["STRING_IMAGE"] = $arParams["STRING_IMAGE"];


$this->includeComponentTemplate();
?>