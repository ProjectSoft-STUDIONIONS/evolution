<?php
$_['UTF-8']             = 'Unicode (UTF-8) - utf-8';
$_['ASMO-708']          = 'Arabic (ASMO 708) - ASMO-708';
$_['DOS-720']           = 'Arabic (DOS) - DOS-720';
$_['iso-8859-6']        = 'Arabic (ISO) - iso-8859-6';
$_['x-mac-arabic']      = 'Arabic (Mac) - x-mac-arabic';
$_['windows-1256']      = 'Arabic (Windows) - windows-1256';
$_['ibm775']            = 'Baltic (DOS) - ibm775';
$_['iso-8859-4']        = 'Baltic (ISO) - iso-8859-4';
$_['windows-1257']      = 'Baltic (Windows) - windows-1257';
$_['ibm852']            = 'Central European (DOS) - ibm852';
$_['iso-8859-2']        = 'Central European (ISO) - iso-8859-2';
$_['x-mac-ce']          = 'Central European (Mac) - x-mac-ce';
$_['windows-1250']      = 'Central European (Windows) - windows-1250';
$_['gb2312']            = 'Chinese Simplified (GB2312) - gb2312';
$_['big5']              = 'Chinese Traditional (Big5) - big5';
$_['cp866']             = 'Cyrillic (DOS) - cp866';
$_['iso-8859-5']        = 'Cyrillic (ISO) - iso-8859-5';
$_['koi8-r']            = 'Cyrillic (KOI8-R) - koi8-r';
$_['koi8-u']            = 'Cyrillic (KOI8-U) - koi8-u';
$_['x-mac-cyrillic']    = 'Cyrillic (Mac) - x-mac-cyrillic';
$_['windows-1251']      = 'Cyrillic (Windows) - windows-1251';
$_['x-Europa']          = 'Europa - x-Europa';
$_['x-IA5-German']      = 'German (IA5) - x-IA5-German';
$_['ibm737']            = 'Greek (DOS) - ibm737';
$_['iso-8859-7']        = 'Greek (ISO) - iso-8859-7';
$_['x-mac-greek']       = 'Greek (Mac) - x-mac-greek';
$_['windows-1253']      = 'Greek (Windows) - windows-1253';
$_['ibm869']            = 'Greek, Modern (DOS) - ibm869';
$_['DOS-862']           = 'Hebrew (DOS) - DOS-862';
$_['iso-8859-8-i']      = 'Hebrew (ISO-Logical) - iso-8859-8-i';
$_['iso-8859-8']        = 'Hebrew (ISO-Visual) - iso-8859-8';
$_['x-mac-hebrew']      = 'Hebrew (Mac) - x-mac-hebrew';
$_['windows-1255']      = 'Hebrew (Windows) - windows-1255';
$_['ibm861']            = 'Icelandic (DOS) - ibm861';
$_['x-mac-icelandic']   = 'Icelandic (Mac) - x-mac-icelandic';
$_['x-iscii-as']        = 'ISCII Assamese - x-iscii-as';
$_['x-iscii-be']        = 'ISCII Bengali - x-iscii-be';
$_['x-iscii-de']        = 'ISCII Devanagari - x-iscii-de';
$_['x-iscii-gu']        = 'ISCII Gujarathi - x-iscii-gu';
$_['x-iscii-ka']        = 'ISCII Kannada - x-iscii-ka';
$_['x-iscii-ma']        = 'ISCII Malayalam - x-iscii-ma';
$_['x-iscii-or']        = 'ISCII Oriya - x-iscii-or';
$_['x-iscii-pa']        = 'ISCII Panjabi - x-iscii-pa';
$_['x-iscii-ta']        = 'ISCII Tamil - x-iscii-ta';
$_['x-iscii-te']        = 'ISCII Telugu - x-iscii-te';
$_['iso-8859-3']        = 'Latin 3 (ISO) - iso-8859-3';
$_['iso-8859-15']       = 'Latin 9 (ISO) - iso-8859-15';
$_['x-IA5-Norwegian']   = 'Norwegian (IA5) - x-IA5-Norwegian';
$_['IBM437']            = 'OEM United States - IBM437';
$_['x-IA5-Swedish']     = 'Swedish (IA5) - x-IA5-Swedish';
$_['windows-874']       = 'Thai (Windows) - windows-874';
$_['ibm857']            = 'Turkish (DOS) - ibm857';
$_['iso-8859-9']        = 'Turkish (ISO) - iso-8859-9';
$_['x-mac-turkish']     = 'Turkish (Mac) - x-mac-turkish';
$_['windows-1254']      = 'Turkish (Windows) - windows-1254';
$_['unicode']           = 'Unicode - unicode';
$_['unicodeFFFE']       = 'Unicode (Big-Endian) - unicodeFFFE';
$_['UTF-7']             = 'Unicode (UTF-7) - utf-7';
$_['us-ascii']          = 'US-ASCII - us-ascii';
$_['windows-1258']      = 'Vietnamese (Windows) - windows-1258';
$_['ibm850']            = 'Western European (DOS) - ibm850';
$_['x-IA5']             = 'Western European (IA5) - x-IA5';
$_['iso-8859-1']        = 'Western European (ISO) - iso-8859-1';
$_['macintosh']         = 'Western European (Mac) - macintosh';
$_['Windows-1252']      = 'Western European (Windows) - Windows-1252';

if ($modx_charset     == 'euc-jp') {
    $_['euc-jp']      = 'Japanese (EUC) - euc-jp';
} elseif ($modx_charset == 'shift_jis') {
    $_['shift_jis']   = 'Japanese (Shift-JIS) - shift_jis';
} elseif ($modx_charset == 'iso-2022-jp') {
    $_['iso-2022-jp'] = 'Japanese (JIS-Allow 1 byte Kana - SO/SI) - iso-2022-jp';
} elseif ($modx_charset == 'csISO2022JP') {
    $_['csISO2022JP'] = 'Japanese (JIS-Allow 1 byte Kana) - csISO2022JP';
} elseif ($modx_charset == 'EUC-CN') {
    $_['EUC-CN']            = 'Chinese Simplified (EUC) - EUC-CN';
} elseif ($modx_charset == 'hz-gb-2312') {
    $_['hz-gb-2312']        = 'Chinese Simplified (HZ) - hz-gb-2312';
} elseif ($modx_charset == 'x-mac-chinesesimp') {
    $_['x-mac-chinesesimp'] = 'Chinese Simplified (Mac) - x-mac-chinesesimp';
} elseif ($modx_charset == 'x-Chinese-CNS') {
    $_['x-Chinese-CNS']     = 'Chinese Traditional (CNS) - x-Chinese-CNS';
} elseif ($modx_charset == 'x-Chinese-Eten') {
    $_['x-Chinese-Eten']    = 'Chinese Traditional (Eten) - x-Chinese-Eten';
} elseif ($modx_charset == 'x-mac-chinesetrad') {
    $_['x-mac-chinesetrad'] = 'Chinese Traditional (Mac) - x-mac-chinesetrad';
} elseif ($modx_charset == 'ks_c_5601-1987') {
    $_['ks_c_5601-1987'] = 'Korean - ks_c_5601-1987';
} elseif ($modx_charset == 'euc-kr') {
    $_['euc-kr']         = 'Korean (EUC) - euc-kr';
} elseif ($modx_charset == 'iso-2022-kr') {
    $_['iso-2022-kr']    = 'Korean (ISO) - iso-2022-kr';
} elseif ($modx_charset == 'Johab') {
    $_['Johab']          = 'Korean (Johab) - Johab';
} elseif ($modx_charset == 'x-mac-korean') {
    $_['x-mac-korean']   = 'Korean (Mac) - x-mac-korean';
}

$tpl = '<option value="%s" %s>%s</option>';
$options = array();
foreach ($_ as $value=>$label) {
    $selected = $value===$modx_charset ? 'selected' : '';
    $options[] = sprintf($tpl, $value, $selected, $label);
}
echo implode("\n", $options);
