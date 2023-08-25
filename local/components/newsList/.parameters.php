<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 

$arComponentParameters = array (
    "PARAMETERS" => array(
        "FILE1" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка1",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "",
        ),
        

        "FILE2" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка2",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
        ),

        "FILE3" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка3",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "",
        ),

        "FILE4" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка4",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "",
        ),

        "FILE5" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка5",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "",
        ),

        "FILE6" => array (
            "PARENT" => "BASE",
            "NAME" => "Картинка6",
            "TYPE" => "FILE",
            "FD_EXT" => "jpeg,jpg,png",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => "image",
            "DEFAULT" => "",
        ),
        
        "STRING_HEAD" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок картинки",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT" => "",
        ),
        
        "STRING_IMAGE" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст картинки",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "ADDITIONAL_VALUES" => "Y",
            "DEFAULT" => "",
        ),
    )
);

?>