<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
</head>
<body>
    <h1>WELCOME</h1>
    <?php include 'class.php';
    $account3 = new Account("333");
    $account4 = new Account("333");

    $saveAccount = new SavingAccount(1000, 3.5); 
    echo $saveAccount->addInterest();
    echo $saveAccount->getBalance();
    
    $account = new BankAccount(100);
    // $account->setAccountnumber('123');
    // $account->balance = "100";

    // $account->deposit(100);
    // $account->deposit(50);
    // $account->withdraw(250);
    // $account->deposit(150);
    //var_dump($account->balance);
    $account->transaction(200,'deposit');
    $account->transaction(50,'withdraw');

    echo "<h2>Account Details</h2>";
    echo "Account Number: ". $account->getAccountnumber() . "<br>";
    echo "Balance : Php ". $account->getBalance() . "<br>";

    $account2 = new BankAccount();
    // $account2->setAccountnumber('222');
    // $account2->balance = 300;
    // $account2->deposit(50);
    // $account2->deposit(50)->deposit(50)->withdraw(250);
    $account2->transaction(200,'deposit');
    $account2->transaction(50,'withdraw');

    echo "<h2>Account Details</h2>";
    echo "Account Number: ". $account2->getAccountnumber() . "<br>";
    echo "Balance : Php ". $account2->getBalance() . "<br>";

    ?>

    <h3>Customer</h3>
    <?php
    $customer = new Customer();
    $customer->setName("JOHN DOE");
    $customer->setName(" JOHN NIBATO ");

    echo "Customer Name: ".$customer->getName()."<br>";

    $bank = new Bank();
    $bank->addCustomer("JOHN");
    $bank->addCustomer("CARLO");

    foreach($bank->getCustomers() as $account){
        echo "Customer Name ". $account->getName()."<br>";
    }
    ?>
</body>
</html>