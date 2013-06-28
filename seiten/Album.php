<?php

class Album {

    private $_dir;
    private $_path;
    private $_ordner;
    private $_dic;

    public function get_dir() {
        return $this->_dir;
    }

    public function get_path() {
        return $this->_path;
    }

    public function get_ordner() {
        return $this->_ordner;
    }

    public function get_dic() {
        return $this->_dic;
    }

    /**
     * 
     * @param type $path
     * @param type $ordner
     */
    public function __construct($path, $ordner) {
        $this->_path = $path;
        $this->_ordner = $ordner;
        $this->_dir = $this->_path . $this->_ordner;
        $this->getAllFilesInDir();
    }

    /**
     * Найти все фотографии в папке
     */
    private function getAllFilesInDir() {
        $big = NULL;
        $small = NULL;
        $this->_dic = array();
        $dic_temp = $this->_dic;
        if (is_dir($this->_dir)) {
            if ($dh = opendir($this->_dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        array_push($dic_temp, $file);
                    }
                }
                closedir($dh);
            }

            sort($dic_temp);
            foreach ($dic_temp as $key => $file) {
                switch ($this->contains("big", $file)) {
                    case true:
                        $big = $file;
                        break;
                    case false:
                        $small = $file;
                        break;
                }

                if ($big != NULL && $small != NULL) {
                    $this->_dic[$small] = $big;
                    $big = NULL;
                    $small = NULL;
                }
            }
        }
    }

    private function contains($str, $content, $ignorecase = true) {
        if ($ignorecase) {
            $str = strtolower($str);
            $content = strtolower($content);
        }
        return strpos($content, $str) ? true : false;
    }

}

?>
