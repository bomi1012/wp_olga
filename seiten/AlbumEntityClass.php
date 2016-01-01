<?php

class AlbumEntity {

    private $_dir;
    public function getDir() { return $this->_dir; }
    
    private $_path;
    public function getPath() { return $this->_path; }
    
    private $_folder;
    public function getFolder() { return $this->_folder; }
   
    public function __construct($path, $folder) {                
        $this->_path = $path;
        $this->_folder = $folder;
        $this->_dir = $this->_path . $this->_folder;        
    } 
}

?>
