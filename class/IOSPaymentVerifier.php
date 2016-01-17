<?php

class IOSPaymentVerifier {
    const SANDBOX_URL    = 'https://sandbox.itunes.apple.com/verifyReceipt';
    const PRODUCTION_URL = 'https://buy.itunes.apple.com/verifyReceipt';
    
    private $mode = 'live';
    private $receipt;
    
    public function __construct($mode, $receipt) {
        $this->setMode($mode);
        $this->setReceipt($receipt);
    }
    
    public function setReceipt($receipt){
        $this->receipt = $receipt;
    }
    
    public function getReceipt(){
        return $this->receipt;
    }
    
    public function setMode($mode){
        $this->mode = $mode;
    }
    
    public function getMode(){
        return $this->mode;
    }
    
    public function getData(){        
        $data_string = json_encode(array(
            'receipt-data' => $this->getReceipt(),
//            'password'     => '<<YOUR APPLE APP SECRET>>',
        ));
        if($this->mode != 'sandbox'):
            $url = IOSPaymentVerifier::PRODUCTION_URL;
        else:
            $url = IOSPaymentVerifier::SANDBOX_URL;
        endif;
        $response = self::sendRequest($url, $data_string);
        return json_decode($response, true);
        
    }
    public static function sendRequest($url, $data_string){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($ch);
        $errno = curl_errno($ch);
        $errmsg = curl_error($ch);
        curl_close($ch);
        return $response;
    }
}
