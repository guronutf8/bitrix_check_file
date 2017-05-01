<?php
$CATALOG_ID = 42;
$arSelect = Array(
    "ID",
    "DETAIL_PICTURE"
);
$arFilter = Array(
    "IBLOCK_ID" => $CATALOG_ID,
    "ACTIVE_DATE" => "Y",
    "ACTIVE" => "Y"
);
$res = CIBlockElement::GetList(false, $arFilter, false, false, $arSelect);
$emptyPIC = array();
$noexist = array();

while ($ob = $res->GetNext()) {
    if ($ob['DETAIL_PICTURE']) {
        $path = $_SERVER['DOCUMENT_ROOT'] . CFile::GetPath($ob['DETAIL_PICTURE']);
        if (!file_exists($path)) $noexist[] = $ob[ID];
    } else {
        $emptyPIC[] = $ob[ID];
    }
}

echo "нет файла " . count($noexist) . "\r\n";
echo "пустые картинки " . count($emptyPIC) . "\r\n";
