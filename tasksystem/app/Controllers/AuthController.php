<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Flash.php';

Class AuthController extends Controller{

    private User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function registration(){

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->redirect('/register');
        }

        //intputs
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';

        if($username === '' || $email === '' || $name === '' || $password === ''){
            Flash::set('error', 'All fields are required');
            $this->redirect('/register');
        }

        $this->userModel->create([
            'username' => $username,
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'role' => 'user'
        ]);

        Flash::set('success', 'Registration successful. Please log in.');
        $this->redirect('/login');

    }

      public function authenticate()
    {
        // Only allow POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
        }

        // Sanitize inputs
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate inputs
        if ($username === '' || $password === '') {
            Flash::set('error', 'Please enter both username and password');
            $this->redirect('/login');
        }

        // Verify login credentials
        $user = $this->userModel->verifyLogin($username, $password);

        if (!$user) {
            Flash::set('error', 'Invalid username or password');
            $this->redirect('/login');
        }

        // ✅ Login success → create session
        Auth::login($user);

        switch ($user['role']) {
            case 'admin':
                $redirect = '/admin/dashboard';
                break;

            case 'user':
            default:
                $redirect = '/tasks';
                break;
        }

        $this->redirect($redirect);
        exit;
    }


}