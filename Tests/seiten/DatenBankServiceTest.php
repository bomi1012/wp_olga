<?php

require_once '../../seiten/class_DatenBank_Interface.php';
require_once '../../seiten/class_DatenBank_Connection.php';
require_once '../../seiten/class_DatenBank_Model.php';
require_once '../../seiten/class_DatenBank_Service.php';
require_once '../../seiten/class_Logging.php';
require_once '../../constanten/Constanten.php';

class DatenBankServiceTest extends PHPUnit_Framework_TestCase {

    private $_class;

    public function setUp() {
        $this->_class = new DatenBankService();
    }

    public function testGetAllFromDBTrue() {
        $db = $this->_class->GetAllFromDB('gastbook', 'desc');
        $this->assertTrue($db == TRUE);
    }

    public function testGetAllFromDBNull() {
        $db = $this->_class->GetAllFromDB('unknow', 'desc');
        $this->assertNull($db);
    }
    
    public function testGetCountFromDBOnlyShow() {
        $db = $this->_class->GetCountFromDBOnlyShow('gastbook');
        $this->assertTrue($db == TRUE);
    }

}
