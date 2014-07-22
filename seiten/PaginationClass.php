<?php
class Pagination {
    private $_limit; 
    private $_firstPage;
    private $_currentPage;
    private $_lastPage;

    public function __construct() {  }
    
    public function paginationProvider($instance, $array, $page, $limit) {
        $this->_limit = $limit;
        $this->_firstPage = 1;
        $this->_lastPage = $this->getLastPage(count($array));
        $this->_currentPage = $this->getCurrentPage($page);
        
        if($instance instanceof AlbumManager) {
            return $this->albumHTMLElementBuilder();
        } 
    } 
    
    private function getLastPage($array_count) {
        if ($array_count <= $this->_limit) {
            return $this->_firstPage;
        } else {
            if (($array_count % $this->_limit) == 0) {
                return $array_count / $this->_limit;
            }
            return $array_count / $this->_limit + 1;
        }
    }
    
    private function getCurrentPage($currentPage) {
        if ($currentPage <= $this->_lastPage) {
            return $currentPage;
        } 
        return $this->_lastPage;
    }
    
    private function albumHTMLElementBuilder() {
        if ($this->_firstPage == $this->_lastPage) {
            return NULL;
        } else {
            
        }
    }
}

?>
