<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(

        "FILE_SHORT" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка заголовка",
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

        "FILE_DESC" => array(
            "PARENT" => "BASE",
            "NAME" => "Картинка новости",
            "TYPE" => "FILE",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "/local/components/my.news.detail/templates/.default/images/1.1108519d.jpg",
        ),

        "STRING_HEADER" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок Новости",
            "TYPE" => "STRING",
            "DEFAULT" => "ЭР-Телеком объявляет финансовые результаты за первое полугодие 2019 года",
        ),

        "STRING_DESCRIPTION_FIRST" => array(
            "PARENT" => "BASE",
            "NAME" => "Подробное описание новости параграф 1",
            "TYPE" => "STRING",
            "DEFAULT" => "За первое полугодие 2019 года «ЭР-Телеком Холдинг» показал двузначное увеличение выручки – на 11%, по сравнению с аналогичным периодом прошлого года, что составило 21 438 млн.руб. Прирост произошел в двух бизнес–сегментах – в B2B увеличение на 15%, а в B2C – на 9%.",
        ),

        "STRING_DESCRIPTION_SECOND" => array(
            "PARENT" => "BASE",
            "NAME" => "Подробное описание новости параграф 2",
            "TYPE" => "STRING",
            "DEFAULT" => "Достигнутые результаты наглядно показывают, что развитие компании соответствует заявленной ранее стратегии.Более подробную информацию можно найти в разделе «Инвесторам».",
        ),

        "SEF_MODE" => array(
            "news" => array(
                "NAME" => "Главная страница",
                "DEFAULT" => "",
                "VARIABLES" => array(),
            ),

            "detail" => array(
                "NAME" => "Детальное описание",
                "DEFAULT" => "#ELEMENT_ID#/",
                "VARIABLES" => array("ELEMENT_ID"),
            ),
        ),
    )
);

?>