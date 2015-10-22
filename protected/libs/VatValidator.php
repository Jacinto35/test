<?php

class VatValidator {

    //czy zrobić ustawialny?
    const WSDL = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

    private $client = null;
    private $companyData = array();

    public function __construct($countryCode, $vatNumber) {
        $this->connectBySoap();
        $companyData = $this->getCompanyData($countryCode, $vatNumber);
        $this->setCompanyData($companyData);
        $this->prepareNameAndAddressData();
    }

    private function connectBySoap(){
        $this->checkSoapLibraryInstalled();
        $this->createSoapClient();
    }
    
    private function checkSoapLibraryInstalled(){
        if (!class_exists('SoapClient')) {
            throw new Exception('The Soap library has to be installed and enabled');
        }
    }
    
    private function createSoapClient(){
        try {
            $this->client = new SoapClient(self::WSDL, array('trace' => true));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    protected function getCompanyData($countryCode,$vatNumber){
         return $this->client->checkVat(array('countryCode' => $countryCode, 'vatNumber' => $vatNumber));
    }
    
    protected function setCompanyData($companyData){
        $this->companyData = (array) $companyData;
    }
    
    protected function prepareNameAndAddressData(){

        $arrayKeys = array('name', 'address');
        
        if($this->companyData['valid'] === true){
            $this->upperFirstCasesInNameAndAddressData($arrayKeys);
        } else{
            $this->cleanNameAndAddressData($arrayKeys);
        }
    }
    
    protected function upperFirstCasesInNameAndAddressData($arrayKeys){
        
        foreach($arrayKeys as $arrayKey){
            if(isset($this->companyData[$arrayKey]) && !empty($this->companyData[$arrayKey])){
                $this->companyData[$arrayKey] = $this->sanitizeString($this->companyData[$arrayKey]);
            }
        }
    }
    
    protected function sanitizeString($phrase){
        $phrase = $this->convertStringToLowerCases($phrase, 'UTF-8');
        return $this->upperFirstCasesInPhrase($phrase);
    }

    protected function convertStringToLowerCases($phrase, $encoding){
        return mb_strtolower($phrase, $encoding);
    }

    protected function upperFirstCasesInPhrase($phrase){
        $phrase = explode(' ',$phrase);

        foreach($phrase as $index => $word){
            $phrase[$index] = ucfirst($word);
        }

        return implode(' ',$phrase);
    }
    
    protected function cleanNameAndAddressData(){
         $this->companyData['name'] = '';
         $this->companyData['address'] = '';
    }
    
    public function isValid() {
        return $this->companyData['valid'];
    }

    public function getName() {
        return $this->companyData['name'];
    }

    public function getAddress() {
        return $this->companyData['address'];
    }

   
//@TODO test which check if company name has upper cases
}
