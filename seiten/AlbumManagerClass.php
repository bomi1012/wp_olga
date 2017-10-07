<?php

/**
 * @author mboehm
 */
class AlbumManager {
    
    private $_paginationClass;
    public function getPagination() {
        return $this->_paginationClass;
    }
    
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
    public function __construct() {
        
    }
    
    public function albumInit($path, $folder) {
        $this->_album = new AlbumEntity($path, $folder); 
        $this->getAllFilesInDir();   
        
         $this->_paginationClass = new Pagination();      
    }
    
    public function getAlbumUsingGET($value) {
        if ($value == 'jahr') {
            if (isset($_GET[$value])) {
                return $_GET[$value];
            }                
        }
        return "2017";
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
        return "Bilder aus dem Jahr " . $title;
    }
    
    public function paginationBuilder($limit) {
        $kern = array($limit, count($this->_allImages), $this->getCurrentPage());
        $additional = array($this->getAlbumUsingGET('jahr'));        
        $this->_paginationClass->paginationSaver($kern, $additional);        
        return $this->_paginationClass->paginationProvider($this);
    }
    
    public function getCurrentPage() {
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
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
    
    /**
     * @return boolean wenn ja, dann ja!
     */
    public function isShow($nummer, $limit, $page) {
        if($nummer <= $limit * $page && $nummer >= ($page - 1) * $limit + 1) {
            return TRUE;
        }
        return FALSE;
    }
}

?>
