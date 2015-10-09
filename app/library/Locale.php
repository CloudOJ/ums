<?php

namespace Ums;

class Locale {
    public static function getLocale($locale = "zh-cn") {
        $locale = strtolower($locale);
        if($locale == "zh-cn") {
            return new i18n_zh_cn;
        } else {
            return new i18n_en_us;
        }
    }
}
