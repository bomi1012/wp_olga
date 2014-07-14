<?php

/**
 * @author mboehm
 */
class AlbumManager {
    
    private $_album;     
    /**  @see AlbumEntity */
    public function getAlbum() { return $this->_album; }

    private $_allImages;
    /** @var Array */
    public function getAllImages() { return $this->_allImages; }
        
    private $_randomImages;
    /** @var Array */
    public function getRandomImages() { return $this->_randomImages; }
    
    /**
     * @param String $path
     * @param String $folder
     */
    public function __construct($path, $folder) {
        $this->_album = new AlbumEntity($path, $folder); 
        $this->getAllFilesInDir();
    }
    
    /**
     * Найти случайные фото в папке
     * @param int $count
     */
    public function randomImages($count) {
        if($count > count($this->_allImages)) {
            $count = count($this->_allImages);
        }
        $this->_randomImages = array();            
        $rand_keys = array_rand($this->_allImages, $count);
        for ($index = 0; $index < $count; $index++) {
            $this->_randomImages[$rand_keys[$index]] = $this->_allImages[$rand_keys[$index]];
        }
    }
    
    public function getTitle($title) {
        $result = "unbekannt";
        switch ($title) {
            case "2013":
                $result = "Bilder aus dem Jahr 2013";
                break;
            case "2014":
                $result = "Bilder aus dem Jahr 2014";
                break;
        }
        return $result;
    }
    
    /**
     * Найти все фотографии в папке
     */
    private function getAllFilesInDir() {
        $bigImage = NULL;
        $preview = NULL;
        $this->_allImages = array();
        $openDir = opendir($this->_album->getDir());        
        $dic_temp = $this->_allImages;
        if (is_dir($this->_album->getDir())) {
            if ($openDir) {
                while (($file = readdir($openDir)) !== false) {
                    if ($file != "." && $file != "..") {
                        array_push($dic_temp, $file);
                    }
                }
                closedir($openDir);
            }
            sort($dic_temp);
            foreach ($dic_temp as $file) {
                switch ($this->contains("big", $file)) {
                    case true:
                        $bigImage = $file;
                        break;
                    case false:
                        $preview = $file;
                        break;
                }
                if ($bigImage != NULL && $preview != NULL) {
                    $this->_allImages[$preview] = $bigImage;
                    $bigImage = NULL;
                    $preview = NULL;
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
