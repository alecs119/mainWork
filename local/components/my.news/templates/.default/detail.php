<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?$APPLICATION->IncludeComponent(
	"my.news.detail",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"FILE_DESC" => $arParams["FILE_DESC"],
		"STRING_HEADER" => $arParams["STRING_HEADER"],
		"STRING_DESCRIPTION_FIRST" => $arParams["STRING_DESCRIPTION_FIRST"],
		"STRING_DESCRIPTION_SECOND" => $arParams["STRING_DESCRIPTION_SECOND"]
	),
	$component
);
?>