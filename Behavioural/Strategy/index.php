<?php

//Strategy interface
interface PaymentGateway {
    public function pay($amount);
}

//Concrete Strategy
class PayByDebit implements PaymentGateway {
    
    public function pay($amount) {
        echo "Paid $amount via Debit Card";
    }
}

class PayByPayPal implements PaymentGateway {
    
    public function pay($amount) {
        echo "Paid $amount via PayPal";
    }
}

//Context
class Order {

    private PaymentGateway $paymentGateway;

    public function setPaymentGateway(PaymentGateway $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function pay($amount) {
        $this->paymentGateway->pay($amount);
    }
}

$order = new Order();
$order->setPaymentGateway(new PayByDebit());
$order->pay(189);