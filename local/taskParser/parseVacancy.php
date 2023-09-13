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

// Массив работа с которым мне непонятна
$arProps = [];

// ================
// Получаем варианты значений в списке 
$propList = CIBlockPropertyEnum::GetList(
    ["SORT" => "ASC", "VALUE" => "ASC"],
    ['IBLOCK_ID' => $INFOBLOCK_ID]
);

while ($arPropList = $propList->Fetch()) {
    $key = trim($arPropList['VALUE']);
    $arProps[$arPropList['PROPERTY_CODE']][$key] = $arPropList['ID'];
}
// ================


if (($handle = fopen("vacancy.csv", "r")) !== false) {

    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        
        if ($count == 1) {
            $count++;
            continue;
        }

        $count++;

        $PROP['OFFICE'] = $data[1];
        $PROP['LOCATION'] = $data[2];
        $PROP['REQUIRE'] = $data[4];
        $PROP['DUTY'] = $data[5];
        $PROP['CONDITIONS'] = $data[6];
        $PROP['SALARY_VALUE'] = $data[7];
        $PROP['TYPE'] = $data[8];
        $PROP['ACTIVITY'] = $data[9];
        $PROP['SCHEDULE'] = $data[10];
        $PROP['FIELD'] = $data[11];
        $PROP['EMAIL'] = $data[12];
        $PROP['DATE'] = date('d.m.Y');
        $PROP['SALARY_TYPE'] = '';

        foreach ($PROP as $key => &$value) {
            $value = trim($value);
            $value = str_replace('\n', '', $value);

            if (stripos($value, '•') !== false) {
                $value = explode('•', $value);
                array_splice($value, 0, 1);

                // Тоже непонятно для чего данная операция, нет записи результата ее работы
                foreach ($value as &$str) {
                    $str = trim($str);
                }

            // И с вот этой частью кода все сложно, может я просто вымотался.
            // ==========
            } elseif ($arProps[$key]) {
                $arSimilar = [];

                foreach ($arProps[$key] as $propKey => $propVal) {
                    
                    if ($key == 'OFFICE') {
                        $value = strtolower($value);

                        if ($value == 'центральный офис') {
                            $value .= 'свеза ' . $data[2];
                        } elseif ($value == 'лесозаготовка') {
                            $value = 'свеза ресурс ' . $value;
                        } elseif ($value == 'свеза тюмень') {
                            $value = 'свеза тюмени';
                        }

                        $arSimilar[similar_text($value, $propKey)] = $propVal;
                    }

                    if (stripos($propKey, $value) !== false) {
                        $value = $propVal;
                        break;
                    }

                    if (similar_text($propKey, $value) > 50) {
                        $value = $propVal;
                    }
                }

                if ($key == 'OFFICE' && !is_numeric($value)) {
                    ksort($arSimilar);
                    $value = array_pop($arSimilar);
                }
            }
            // ==========
        }

        if ($PROP['SALARY_VALUE'] == '-') {
            $PROP['SALARY_VALUE'] = '';

        } elseif ($PROP['SALARY_VALUE'] == 'по договоренности') {
            $PROP['SALARY_VALUE'] = '';
            $PROP['SALARY_TYPE'] = $arProps['SALARY_TYPE']['договорная'];

        } else {
            $arSalary = explode(' ', $PROP['SALARY_VALUE']);

            if ($arSalary[0] == 'от' || $arSalary[0] == 'до') {
                $PROP['SALARY_TYPE'] = $arProps['SALARY_TYPE'][$arSalary[0]];
                array_splice($arSalary, 0, 1);
                $PROP['SALARY_VALUE'] = implode(' ', $arSalary);

            } else {
                $PROP['SALARY_TYPE'] = $arProps['SALARY_TYPE']['='];
            }
        }

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