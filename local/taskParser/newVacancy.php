<?php
// Подключение к корневой папке
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

// Если пользователь не администратор то редирект на главную
if (!$USER->IsAdmin()) {
    LocalRedirect('/');
}
// подключение главного модуля
\Bitrix\Main\Loader::includeModule('iblock');

// ==========================================


// ==========================================
// ID инфоблока
$INFOBLOCK_ID = 10;

// Триггер для отключения очистки инфоблока
$TRIGGERDELETE = "Y";
// end
// // ==========================================


// ==========================================
// Получение доступа к классу блок
$elBlock = new CIBlockElement;
// end
// ==========================================


// ==========================================
// Код очистки инфоблока
if ($TRIGGERDELETE === "Y") {

    $clearData = $elBlock->GetList(
        [], 
        ['IBLOCK_ID' => $INFOBLOCK_ID], 
        false, 
        false, 
        ['ID']
    );

    while ($element = $clearData->GetNext()) {
        echo "Элемент <span style='color: blue'>" . $element["ID"] . " </span>" . "удален!<br>";
        CIBlockElement::Delete($element['ID']);
    }

    if(!$element) {
        echo "<h3 style='color: red;'>Данные Удалены! Data deleted!</h3>";
    }    

} else {
    echo "<h3 style='color: grey;'>Удаление данных отключено! Data deletion disabled!</h3>";
}
// конец блока
// ==========================================


// ==========================================
// Код обработки файла .csv и записи данных в инфоблок
// Счетчик
$count = 1;

// Получаем все значения полей инфоблока
$PropertyOptions = CIBlockPropertyEnum::GetList(
    Array("DEF" => "DESC", "SORT" => "ASC"), 
    Array("IBLOCK_ID" => $INFOBLOCK_ID)
);

while($arrOptioons = $PropertyOptions->Fetch()) {
    $arrOptioonsResult[] = $arrOptioons;
}

// Обрабатываем сам csv файл
if (($handle = fopen("vacancy.csv", "r")) !== false) {

    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        
        if ($count == 1) {
            $count++;
            continue;
        }

        $count++;        

        // ==============
        $PROP['OFFICE'] = $data[1];
        $PROP['LOCATION'] = $data[2];
        $PROP['TYPE'] = $data[8];
        $PROP['ACTIVITY'] = $data[9];
        $PROP['SCHEDULE'] = $data[10];
        $PROP['FIELD'] = $data[11];

        $PROP['SALARY_VALUE'] = $data[7];
        $PROP['SALARY_TYPE'] = "";

        if($PROP['SALARY_VALUE'] == "" || $PROP['SALARY_VALUE'] == "-" || $PROP['SALARY_VALUE'] == "по договоренности") {
            $PROP['SALARY_TYPE'] = 'договорная';
            $PROP['SALARY_VALUE'] = "";
        }

        if(strlen($PROP['SALARY_VALUE']) > 2) {
            
            if(mb_substr($PROP['SALARY_VALUE'], 0, 3) == "от ") {
                $PROP['SALARY_TYPE'] = 'ОТ';
            }
    
            if(mb_substr($PROP['SALARY_VALUE'], 0, 3) == "до ") {
                $PROP['SALARY_TYPE'] = 'ДО';
            }

            if(is_numeric(str_replace([" до вычета НДФЛ", "руб.", " "], "", $PROP['SALARY_VALUE']))) {
                $PROP['SALARY_TYPE'] = "=";
            }

            $PROP['SALARY_VALUE'] = str_replace(" руб.", "", $PROP['SALARY_VALUE']);
        }

        foreach($arrOptioonsResult as $val) {
            
            foreach($PROP as $k => $v) {
                str_replace("\n", " ", $v);
                
                if(
                    $k == $val["PROPERTY_CODE"] && 
                    trim(mb_strtolower($v)) == trim(mb_strtolower($val["VALUE"]))
                ) {
                    $PROP[$k] = $val["ID"];
                }
            }
        }
        // ===============

        
        // ===============
        // Записываем значения без опций (значений списка)
        
        $PROP['EMAIL'] = $data[12];
        $PROP['REQUIRE'] = $data[4];
        $PROP['DUTY'] = $data[5];
        $PROP['CONDITIONS'] = $data[6];
        $PROP['DATE'] = date('d.m.Y');

        $PROP['REQUIRE'] = str_replace(["•", "• ", "«", "»", "(", ")"], "", $PROP['REQUIRE']);
        $PROP['DUTY'] = str_replace(["•", "• ", "«", "»", "(", ")"], "", $PROP['DUTY']);
        $PROP['CONDITIONS'] = str_replace(["•", "• ", "«", "»", "(", ")"], "", $PROP['CONDITIONS']);
        // ===============

        $arLoadProductArray = [
            "MODIFIED_BY" => $USER->GetID(),
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $INFOBLOCK_ID,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $data[3],
            "ACTIVE" => end($data) ? 'Y' : 'N',
        ];

        if ($PRODUCT_ID = $elBlock->Add($arLoadProductArray)) {
            echo "Добавлен элемент с ID : <span style='color: green'>" . $PRODUCT_ID . "</span><br>";
        } else {
            echo "Error: <span style='color: red'>" . $elBlock->LAST_ERROR . '</span><br>';
        }
    }

    fclose($handle);
}
// end
// ==========================================

?>