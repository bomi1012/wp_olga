<?php
class Logging{
    
    private $_path;
    private $_status;

    public function __construct() {
        $this->_path = Constans::LOG_PATCH . "log.ini";
    }
    
    public function setError($text) {
        $this->_status = "ERROR";
        $this->ToWrite($this->Ausgabe($text));
    }
    public function setInfo($text) {
        $this->_status = "INFO";
        $this->ToWrite($this->Ausgabe($text));
    }
    public function setWarn($text) {
        $this->_status = "WARN";
        //$ausgabe = $this->Ausgabe($text);
        $this->ToWrite($this->Ausgabe($text));
    }
    
    private function Ausgabe($text) {
        $out = date("Y-m-d H:i:s") . " | ";
        $out .= $this->_status . " | ";
        $out .= $text . "\r\n";
        return $out;
    }
    
    private function ToWrite($ausgabe) {
        $fp = fopen($this->_path, "a+"); // Открываем файл в режиме записи 
        fwrite($fp, $ausgabe); // Запись в файл
        fclose($fp); //Закрытие файла
    }
}

?>
