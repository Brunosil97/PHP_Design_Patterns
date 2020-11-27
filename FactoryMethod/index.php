<?php

interface Transport 
{
    public function ready() : void;
    public function dispatch() : void;
    public function deliver() : void;
}

class PlaneTransport implements Transport 
{
    public function ready() : void
    {
        echo "Courier ready to be sent to the plane \n";
    }
    public function dispatch() : void
    {
        echo "Courier is on your way on the plane \n";
    }
    public function deliver() : void
    {
        echo "Courier from the plane has been delivered \n";
    }
}

class TruckTransport implements Transport
{
    public function ready() : void
    {
        echo "Courier ready to be sent to the truck \n";
    }
    public function dispatch() : void
    {
        echo "Courier is on your way on the truck \n";
    }
    public function deliver() : void
    {
        echo "Courier from the truck has been delivered \n";
    }
}

abstract class Courier 
{
    //Factory method
    abstract function getCourierTransport() : Transport;

    public function sendCourier() 
    {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

class AirCourier extends Courier 
{
    function getCourierTransport() : Transport 
    {
        return new PlaneTransport();
    }
}

class GroundCourier extends Courier 
{
    function getCourierTransport() : Transport 
    {
        return new TruckTransport();
    }
}

function deliverCourier(Courier $courier)
{
    $courier->sendCourier();
}

echo deliverCourier(new GroundCourier());
echo deliverCourier(new AirCourier());
