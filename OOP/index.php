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
    $account1 = new Account("111");
    $account2 = new Account("222");
    $account3 = new Account("333");
    $account4 = new Account("444");

    $customer1 = new Customer("John Doe","jd@gmail.com","123","OC");
    $customer2 = new Customer("Kevin Doe","kd@gmail.com","222","OC");

    $saveAccount1 = new SavingAccount(0, 3.5); 
    $checkAccount1 = new CheckingAccount(0,1000);
    $saveAccount2 = new SavingAccount(0, 3.5); 
    $checkAccount2 = new CheckingAccount(0,1000);

    $customer1->openAccount($account1,$saveAccount1);
    $customer1->openAccount($account2,$checkAccount1);

    $customer2->openAccount($account3,$saveAccount2);
    $customer2->openAccount($account4,$checkAccount2);

    $bank = new Bank();

    $bank->addCustomer($customer1);
    $bank->addCustomer($customer2);

    echo "Verifying... <br>";
    if($bank->verifyCustomer($customer1)){
        echo $customer1->getName(). " is a customer";
    }
    echo "<br>";
    if($bank->verifyCustomer($customer2)){
        echo $customer2->getName(). " is a customer";
    }
    //transaction

    $bank->processTransaction($customer1->getAccounts()[0]['bankAccount'],1000);
    $bank->processTransaction($customer1->getAccounts()[1]['bankAccount'],2000);
    $bank->processTransaction($customer1->getAccounts()[1]['bankAccount'],-2000);

    $bank->processTransaction($customer2->getAccounts()[0]['bankAccount'],3000);
    $bank->processTransaction($customer2->getAccounts()[1]['bankAccount'],3000);

    $saveAccount1->addInterest();
    $saveAccount2->addInterest();
    $customer2->closeAccount($account4);

    //display
    foreach($bank->getCustomers() as $customer){
        echo "<hr><br>".
        "NAME : " . $customer->getName() . "<br>".
        "EMAIL : " . $customer->getEmail() . "<br>".
        "PHONE : " . $customer->getPhone() . "<br>".
        "ADDRESS : " . $customer->getAddress() . "<br>";
        echo "<br> ACCOUNT DETAILS <br>";
        foreach($customer->getAccounts() as $account){
            echo "<br>";
            echo "ACCOUNT # :" . $account['account']->getAccountNumber(). "<br>";
            echo "BALANCE : P" . $account['bankAccount']->getBalance(). "<br>";
        }
    }

    ?>
</body>
</html>