<?php
namespace Ums;

trait Controlleri18nInterface {
    protected function setSessioni18n($locale) {
        $this->session->set('locale', $locale);
    }
    protected function setUseri18n($locale) {

    }
    protected function _processi18n() {
        $locale = "zh-cn";
        if($this->request->hasQuery("locale")) {
            $locale = $this->request->getQuery("locale");
            $this->setSessioni18n($locale);
            $this->setUseri18n($locale);
        } elseif($this->session->has('locale')) {
            $locale = $this->session->get('locale');
        } else {
            $locale = $this->request->getBestLanguage();
            $this->setSessioni18n($locale);
        }

        $di = $this->getDI();
        $di->set(
            'i18n',
            function() use ($locale) {
                return \Ums\Locale::getLocale($locale);
            },
            true
        );
    }
}
