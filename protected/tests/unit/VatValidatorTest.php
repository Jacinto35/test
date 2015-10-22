<?php
/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-07-24
 * Time: 20:42
 */

include_once 'VatValidator.php';

class VatValidatorTest extends CTestCase {

    const WSDL = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

    private $vatValidator;
    private $soapClient;

    public function setUp(){
        $this->vatValidator = new VatValidator('pl', '8992367273');
        $this->soapClient = new SoapClient(self::WSDL, array('trace' => true));
    }

    public function testGetAddress(){
        $address = $this->vatValidator->getAddress();
        $this->assertInternalType('string', $address);
    }

    public function testGetName(){
        $name = $this->vatValidator->getName();
        $this->assertInternalType('string', $name);
    }

    public function testIsValid() {
        $valid = $this->vatValidator->isValid();
        $this->assertInternalType('bool', $valid);
    }

    public function testSoapLibraryInstalled(){
        $this->assertTrue(class_exists('SoapClient'));
    }

    public function testSoapConnection(){
        $this->assertNotEmpty($this->soapClient);
    }


}
