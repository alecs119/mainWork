<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(

        "FILE_SHORT" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка",
            "TYPE" => "FILE",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "/local/components/my.news.list/templates/.default/images/1.9f4d1e12.jpg",
        ),
        
        "STRING_HEAD" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок новости",
            "TYPE" => "STRING",
            "DEFAULT" => "ЭР-Телеком объявляет финансовые результаты за первое полугодие 2019 года",
        ),
    )
);

?>