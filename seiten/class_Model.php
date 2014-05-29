<?php

class Model {

    private $_title;
    private $_keywords;
    private $_description;
    private $_menu;
    private $_breadCrums;
    private $_page;
    private $_pageName;

    public function getPage() {
        return $this->_page;
    }

    public function getPageName() {
        return $this->_pageName;
    }

    private function setPageName($array) {
        foreach ($array as $key => $value) {
            if ($key == $this->getPage()) {
                $this->_pageName = $value;
            }
        }
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getKeywords() {
        return $this->_keywords;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getMenu() {
        return $this->_menu;
    }

    public function getBreadCrums() {
        return $this->_breadCrums;
    }

    /**
     * Auf Grund eine Adresse erstellt model für diese Seite
     * @param string $page die Seitenandresse
     * @param int $ebene Ebene
     */
    public function __construct($page, $ebene) {
        $info = new Info();
        $info->ModelForHead($page);
        $this->ArrayToGet($info->getArray(), Constans::PART_HEAD);

        $this->_menu = $info->ModelForHauptMenu($page, $ebene);
        $this->_breadCrums = $info->ModelForBreadCrums($page, $ebene);
        $this->_page = $page;
        $this->setPageName($info->getMenuArray());
    }

    /**
     * aus Array alles in Gets speichern
     * @param array[] $array 
     * @param string $switch 
     */
    private function ArrayToGet($array, $switch) {
        if ($switch == Constans::PART_HEAD) {
            $this->_title = $array[Constans::ELEMENT_TITLE];
            $this->_keywords = "";
            foreach ($array[Constans::ELEMENT_KEYWORDS] as $value) {
                if ($value != end($array[Constans::ELEMENT_KEYWORDS])) {
                    $this->_keywords .= $value . ", ";
                } else {
                    $this->_keywords .= $value;
                }
            }
            $this->_description = $array[Constans::ELEMENT_DESCRIPTION];
        }
    }

    public function Umlaute($text) {
        $search = array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß');
        $replace = array('&auml;', '&ouml;', '&uuml;', '&Auml;', '&Ouml;', '&Uuml;', '&szlig;');
        return str_replace($search, $replace, $text);
    }

    public function Alter($tag, $mon, $jah) {
        if ($mon > date('m') || $mon == date('m') && $tag > date('d'))
            return (date('Y') - $jah - 1);
        else
            return (date('Y') - $jah);
    }

    public function FirstLetter($text) {
        $text = $this->Umlaute($text);
        $firstLetter = $text{0};

        return "<span class='firstLetter'><span>" . $text{0} . "</span></span><span> "
                . substr($text, 1) . " </span>";
    }

    public function Link($link, $text) {
        return "<a href = '" . $link . "'>" . $text . "</a>";
    }
}

?>
