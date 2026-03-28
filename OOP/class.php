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

    private $email;

    private $phone;

    private $address;

    private $accounts = [];

    public function __construct($name,$email,$phone,$address){
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->accounts = [];
    }

    public function openAccount($account,$bankAccount){
        $this->accounts[] = ['account'=>$account,'bankAccount'=>$bankAccount];
    }

    public function closeAccount($accountToClose){
        foreach($this->accounts as $index => $accountData){
            if($accountData['account']->getAccountnumber() === $accountToClose->getAccountnumber()){
                unset($this->accounts[$index]);
                return true;
            }
        }
        return false;
    }

    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getAddress(){
        return $this->address;
    }

    public function getAccounts(){
        return $this->accounts ?? [];
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

    public function verifyCustomer($customer){
        return in_array($customer, $this->customer);
    }

    public function removeCustomer(){
        $index = array_search($customer , $this->customer);
        if($index !== false){
            unset($this->customer[$index]);
            return true;
        }
        return false;
    }

    public function processTransaction($account, $amount){
        if($amount > 0){
            return $account->transaction($amount, "deposit");
        } else {
            return $account->transaction(abs($amount),"withdraw");
        }
        return false;
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
        $interest = ($this->getBalance() * ($this->interestRate / 100)) / 365;
        $this->transaction($interest, 'deposit');
    }
    
}

class CheckingAccount extends BankAccount{
    private $minBalance;

    public function __construct($balance, $minBalance){
        parent::__construct($balance);
        $this->minBalance = $minBalance;
    }

    public function getminBalance(){
        return $this->minBalance;
    }

    public function withdraw($amount){
        if(($this->getBalance()- $this->minBalance) >= $amount){
            $this->transaction($amount, "withdraw");
            return true;
        }
        return false;
    }
}