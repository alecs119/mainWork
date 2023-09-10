<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?$APPLICATION->IncludeComponent(
	"my.news.list",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"FILE_SHORT" => $arParams["FILE_SHORT"],
		"STRING_HEAD" => $arParams["STRING_HEAD"],
	),
	$component
);

?>
