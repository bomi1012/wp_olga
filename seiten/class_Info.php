<?php

class Info {

    private $_arrayFull;
    private $_array;
    private $_menuArray;

    public function getMenuArray() {
        return $this->_menuArray;
    }

    public function getArray() {
        return $this->_array;
    }

    public function __construct() {
        /**
         * MenuArray
         * index => Home
         * about => Über mich
         */
        $this->_menuArray = array(
            Constans::PAGE_INDEX => Constans::HOME,
            Constans::PAGE_ADMIN => Constans::ADMIN,
            Constans::PAGE_IMPRESSUM => Constans::IMPRESSUM,
            Constans::PAGE_ABOUT => Constans::ABOUT_ME,
            Constans::PAGE_KONZEPT => Constans::CONCEPT,
            Constans::PAGE_LAGE => Constans::LOCATION,
            Constans::PAGE_ALBUM => Constans::ALBUM,
            Constans::PAGE_KONTAKT => Constans::KONTAKT,
            Constans::PAGE_GASTBOOK => Constans::GAST_BOOK
            )
            ;

        /**
         * Array für Head
         */
        $this->_arrayFull = array(
            ## Head for Index ##
            Constans::PAGE_INDEX => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Admin ##
            Constans::PAGE_ADMIN => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN . " " . Constans::ADMIN, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::ADMIN
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Admin ##
            Constans::PAGE_IMPRESSUM => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN . " " . Constans::IMPRESSUM, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::IMPRESSUM
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for About ##
            Constans::PAGE_ABOUT => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_NAME, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::KW_NAME
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Konzept ##
            Constans::PAGE_KONZEPT => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN . " " . Constans::CONCEPT, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::CONCEPT
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Kontakt ##
            Constans::PAGE_KONTAKT => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN . " " . Constans::KONTAKT, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::KONTAKT
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Gästebuch ##
            Constans::PAGE_GASTBOOK => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN . " " . Constans::GAST_BOOK, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_LANDAU,
                    Constans::KW_TAGESMUTTER,
                    Constans::GAST_BOOK
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            )
            ,
            ## Head for Landau ##
            Constans::PAGE_LAGE => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::KW_ROTKAEPPCHEN, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_TAGESMUTTER,
                    Constans::KW_LANDAU
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            ),
            ## Head for Landau ##
            Constans::PAGE_ALBUM => array(
                Constans::ELEMENT_TITLE => Constans::KW_TAGESMUTTER . " in " . Constans::KW_LANDAU . " " . Constans::ALBUM, //title
                Constans::ELEMENT_KEYWORDS => array(
                    Constans::KW_BETREUUNG,
                    Constans::KW_TAGESMUTTER,
                    Constans::ALBUM
                ),
                Constans::ELEMENT_DESCRIPTION => Constans::DES_INDEX //beschreibung
            )
        );
    }

    /**
     * 
     * @param string $page z.B. index, about
     */
    public function ModelForHead($page) {
        foreach ($this->_arrayFull as $key => $value) {
            if ($key == $page) {
                $this->_array = $value;
            }
        }
    }

    /**
     * 
     * @param string $page
     * @param int $ebene
     */
    public function ModelForHauptMenu($page, $ebene) {
        $twoSpanOpen = "<span><span>";
        $tagsClose = "</span></span></a></li>";
        $string = "";
        if ($ebene == 1) {
            foreach ($this->_menuArray as $key => $value) {
                if ($key != Constans::PAGE_ADMIN && $key != Constans::PAGE_IMPRESSUM) {
                    if (reset($this->_menuArray) == $value) {
                        $string .= "<li class='alpha' style='float:left;'";
                    } elseif (end($this->_menuArray) == $value) {
                        $string .= "<li class='omega' style='float:left;'";
                    } else {
                        $string .= "<li style='float:left;'";
                    }
                    if ($key == $page) {
                        $string .= "id='menu_active'>";
                    } else {
                        $string .= ">";
                    }
                    $string .= "<a href='" . $key . Constans::PHP . "'>" . $twoSpanOpen . $value . $tagsClose;
                }
            }
        }
        return $string;
    }

    /**
     * 
     * @param type $page
     * @param type $ebene
     * @return string
     */
    public function ModelForBreadCrums($page, $ebene) {
        $string = "<li><a href='" . Constans::PAGE_INDEX . Constans::PHP . "'>" . Constans::HOME . "</a></li>";
        switch ($ebene) {
            case 1:
                if ($page != Constans::PAGE_INDEX) {
                    foreach ($this->_menuArray as $key => $value) {
                        if ($key == $page) {
                            $string .= "<li><a href='" . $page . Constans::PHP . "'>" . $value . "</a></li>";
                        }
                    }
                }
                break;
            case 2:
                break;
        }
        return $string;
    }

}

?>
