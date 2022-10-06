<?php

interface PaymentInterface {
    public function pay();
}

class QiwiPayment implements PaymentInterface {
    public function __construct(
        protected PaymentInterface $payment,
    )
    {
    }

    public function pay(): string
    {
        $this->payQiwi();
        return $this->payment->pay();
    }

    public function payQiwi()
    {

    }
}

class YandexPayment implements PaymentInterface {
    public function __construct(
        protected PaymentInterface $payment,
    )
    {
    }

    public function pay(): string
    {
        $this->payYandex();
        return $this->payment->pay();
    }

    public function payYandex()
    {

    }
}

class WebMoneyPayment implements PaymentInterface {
    public function __construct(
        protected PaymentInterface $payment,
    )
    {
    }

    public function pay(): string
    {
        $this->payWebMoney();
        return $this->payment->pay();
    }

    public function payWebMoney()
    {

    }
}

//Контекст
class DistributionManager {
    public function __construct(
        protected PaymentInterface $payment
    )
    {
    }

    public function run() {
        $goods = $this->getGoods();
        foreach ($goods as $good) {
            $this->buyGood();
        }
    }

    public function buyGood() {
        $this->payment->pay();
    }
}

$manager = new DistributionManager(
    new QiwiPayment()
);

$manager = new DistributionManager((new PaymentFactory())->createPayment('Qiwi'));

class PaymentFactory {
    public function createPayment($method) {
        $classname = $method.'Payment';
        if (class_exists($classname)){
            return	new $classname();
        }
        return null;
    }
}