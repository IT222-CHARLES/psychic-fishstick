<?php
Class User{
    public readonly string $username;
    private readonly UserProfile $profile;

    public function __construct(string $username){
        $this->username = $username;
    }
    public function setUsername(string $username){
        $this->username = $username;
    }
    public function setProfile(UserProfile $profile){
        $this->profile = $profile;
    }

    public function profile() : UserProfile{
        return $this->profile;
    }
}
Class UserProfile{
    public string $name;
    public string $phone;

    public function __construct(string $name, string $phone){
        $this->name = $name;
        $this->phone = $phone;
    }
    public function changePhone(string $phone){
        $this->phone = $phone;
    }
}
$user = new User('johnnibato');
$user->setProfile(new UserProfile('John Nibato', '1234567890'));
//$user->username = 'johnnibato123'; 
//$user->setUsername = 'johnnibato123'; 
$user->profile()->changePhone('0987654321');
echo $user->username. '<br>'; 
var_dump($user->profile());