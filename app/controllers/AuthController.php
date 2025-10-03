<?php


class AuthController extends \Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Login method
    public function login()
    {
        $request = $this->request; // array from $_REQUEST

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $request['email'] ?? '';
            $password = $request['password'] ?? '';

            if (empty($email) || empty($password)) {
                return $this->view('auth/login', ['error' => 'Email and password are required']);
            }

            $user = $this->db->table('users')
                             ->where('email', $email)
                             ->get()
                             ->row();

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_email'] = $user->email;

                header('Location: /dashboard');
                exit;
            } else {
                return $this->view('auth/login', ['error' => 'Invalid email or password']);
            }
        }

        $this->call->view('auth/login', ['error' => 'Invalid email or password']);

    }

    // Register method
    public function register()
    {
        $request = $this->request; // array from $_REQUEST

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($request['name'] ?? '');
            $email = trim($request['email'] ?? '');
            $password = $request['password'] ?? '';
            $confirmPassword = $request['confirm_password'] ?? '';

            $errors = [];
            if (empty($name)) $errors[] = 'Name is required';
            if (empty($email)) $errors[] = 'Email is required';
            if (empty($password)) $errors[] = 'Password is required';
            if ($password !== $confirmPassword) $errors[] = 'Passwords do not match';

            $existingUser = $this->db->table('users')
                                     ->where('email', $email)
                                     ->get()
                                     ->row();
            if ($existingUser) $errors[] = 'Email is already registered';

            if (!empty($errors)) {
                return $this->view('auth/register', ['errors' => $errors]);
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $this->db->table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            header('Location: /auth/login');
            exit;
        }

        $this->call->view('auth/login', ['error' => 'Invalid email or password']);

    }
}
