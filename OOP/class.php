<?php
declare(strict_types=1);

class Account{
    private $accountNumber;

    public function __construct($accountNumber){
        $this->accountNumber = $accountNumber;
    }

    public function getAccountnumber(){
        return $this->accountNumber;
    }

    public function setAccountnumber($accountnumber){
        $this->accountNumber = $accountnumber;
    }

}
class BankAccount{
    
    public float $balance = 0;

    public function __construct(float $balance = 0){
        $this->balance = $balance;
    }

    public function getBalance(){
        return $this->balance;
    }

    private function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
        return $this;
    }

    private function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function transaction($amount, $type){
        if($type == 'deposit'){
            $this->deposit($amount);
        }elseif($type == 'withdraw'){
            $this->withdraw($amount);
        }
    }
}

class Customer{
    private $name;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $name = trim($name);
        if($name == ''){
            return false;
        }
        $this->name = $name;
        return true;
    }
    
}

class Bank{
    private $customer;

    public function __construct(){
        $this->customer = [];
    }

    public function getCustomers(){
        return $this->customer;
    }

    public function addCustomer($customer){
        $this->customer[] = $customer;
    }

    public function verifyCustomer(){

    }

    public function removeCustomer(){

    }
}

class SavingAccount extends BankAccount{
    public $interestRate;

    public function __construct($balance, $interestRate){
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function getInterestRate(){
        return $this->interestRate;
    }

    public function setInterestRate($interestRate){
        $this->interestRate = $interestRate;
    }

    public function addInterest(){
        $interest = $this->getBalance() * $this->interestRate;
        $this->deposit($interest);
    }
    
}