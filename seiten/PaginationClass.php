<?php
class Pagination {
    private $_limit; 
    public function getLimit() { return $this->_limit;  }
    
    private $_firstPage;
    public function getFirstPage() { return $this->_firstPage; }
    
    private $_currentPage;
    public function getCurrentPage() { return $this->_currentPage; }
        
    private $_lastPage;
    public function getLastPage() { return $this->_lastPage; }
        
    private $_additional;
    public function getAdditional() { return $this->_additional; }
            
    private $_instance;
    public function getInstance() { return $this->_instance; }


    public function __construct() {  }
    
     /**
     * 
     * @param Array $kern mit 3 elementen
     * @value [0] $kern_limit int
     * @value [1] $kern_anzahl von elementen int
     * @value [2] $kern_currentPage int
     * @param Array $additional 
     */
    public function paginationSaver($kern, $additional) {    
        $this->_firstPage = 1;
        
        $this->_limit = $kern[0];
        $this->_lastPage = $this->setLastPage($kern[1]);
        $this->_currentPage = $this->setCurrentPage($kern[2]);
        
        $this->_additional = $additional;        
        $this->_instance = $this;
    }


    public function paginationProvider($instance) {
        if($instance instanceof AlbumManager) {
            return $this->albumHTMLElementBuilder();
        } 
    }
    
    private function setLastPage($array_count) {
        if ($array_count <= $this->_limit) {
            return $this->_firstPage;
        } else {
            if (($array_count % $this->_limit) == 0) {
                return $array_count / $this->_limit;
            }
            return intval($array_count / $this->_limit + 1);
        }
    }
    
    private function setCurrentPage($currentPage) {
        if (is_numeric($currentPage) && $currentPage <= $this->_lastPage) {
            return  $currentPage;
        } 
        return $this->_firstPage;
    }
    
    private function albumHTMLElementBuilder() {
        if ($this->_firstPage == $this->_lastPage) {
            return NULL;
        } else {
            $ergebnis = "weiter: ";
            for ($index = 1; $index <= $this->_lastPage; $index++) {
                if ($this->_currentPage == $index) {
                    $ergebnis .= $index;
                } else {
                    $ergebnis .= " <a href='album.php?jahr=". $this->_additional[0] ."&page=". $index ."'>" . $index . "</a> ";
                }
            }
            return $ergebnis;
        }
    }
}

?>
