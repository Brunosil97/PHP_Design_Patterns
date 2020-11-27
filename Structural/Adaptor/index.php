<?php
//Target/Client
interface Share {
    //Request
    public function shareData();
}

//Adaptee.Service
class WhatsAppShare {

    //special request
    public function weShare(string $string) {
        echo "Share data via whatsapp: ' $string ' \n";
    }
}

//Adapter
class WhatsAppShareAdapter implements Share {

    private $whatsApp;
    private $data;

    public function __construct(WhatsAppShare $whatsApp, string $data) {
        $this->whatsApp = $whatsApp;
        $this->data = $data;
    }
    public function shareData() {
        $this->whatsApp->weShare($this->data);
    }
}

//Client code
function clientCode(Share $share) {
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello Whatsapp");
clientCode($waShare);