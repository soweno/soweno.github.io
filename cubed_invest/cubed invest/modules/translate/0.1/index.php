<?php
    /* Для использования этого модуля в корне сайта должна лежать папка translate  с переводами */
    /* Переводы генерируются с помощью программы grub.php */
    /* Так же необходимо определить перменную TRANSLATE_CURRENT_LANGUAGE */
    if (!defined("TRANSLATE_CURRENT_LANGUAGE")) {
        define('TRANSLATE_CURRENT_LANGUAGE', 'ru');
    }
    if (is_file(ROOT."/translate/".basename(TRANSLATE_CURRENT_LANGUAGE).".php")) {
        include_once(ROOT."/translate/".basename(TRANSLATE_CURRENT_LANGUAGE).".php");
	}
    if (!function_exists("T")) {
        function T($text) {
            global $translate_text;
            return isset($translate_text[TRANSLATE_CURRENT_LANGUAGE][$text]) ? $translate_text[TRANSLATE_CURRENT_LANGUAGE][$text] : $text;
        }
    }
