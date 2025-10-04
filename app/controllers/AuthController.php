<?php
// No namespace needed for LavaLust 4.x



class AuthController extends Controller
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = load_class('database'); // Load database class
    }

    // --------------------
    // Login method
    // --------------------
   public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($this->request['email'] ?? '');
        $password = $this->request['password'] ?? '';

        // Fetch user by email
        $user = $this->db->table('users')->where('email', $email)->get();

        // If no user found, show error
        if (!$user || !is_array($user)) {
            $this->call->view('auth/login', ['error' => 'Invalid email or password']);
            return;
        }

        // Sometimes get() returns a single record as an associative array
        // Ensure $user is a proper array
        $user = is_array($user[0] ?? null) ? $user[0] : $user;

        // Check password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
        if ($user['role'] === 'admin') {
            header("Location: /users/show");
     exit;
        } else {
            header("Location: /users/usershow");
            exit;
        }
    } else {
        $this->call->view('auth/login', ['error' => 'Invalid email or password']);
            return;
        }
    }

    // GET request → show login page
    $this->call->view('auth/login');
}


    // --------------------
    // Register method
    // --------------------
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($this->request['name'] ?? '');
            $email = trim($this->request['email'] ?? '');
            $password = $this->request['password'] ?? '';
            $confirmPassword = $this->request['confirm_password'] ?? '';

            $errors = [];
            if (empty($name)) $errors[] = 'Name is required';
            if (empty($email)) $errors[] = 'Email is required';
            if (empty($password)) $errors[] = 'Password is required';
            if ($password !== $confirmPassword) $errors[] = 'Passwords do not match';

            // Check if user already exists
            $query = $this->db->table('users')->where('email', $email)->get();
            $existingUser = $query[0] ?? null;

            if ($existingUser) $errors[] = 'Email is already registered';

            if (!empty($errors)) {
                $this->call->view('auth/register', ['errors' => $errors]);
                return;
            }

            // Hash the password before storing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $inserted = $this->db->table('users')->insert([
                'name'       => $name,
                'email'      => $email,
                'password'   => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s'),
                'role'     => 'user' // default role
            ]);

            if (!$inserted) {
                $this->call->view('auth/register', ['error' => 'Failed to create user']);
                return;
            }

            // Redirect to login page
            header('Location: /auth/login');
            exit;
        }

        // GET request → show register page
        $this->call->view('auth/register');
    }

    public function index() {
    $this->call->view('home'); // this will load /views/home.php
}

public function logout() {
    // Start session if not already started
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Unset all session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();

    // Redirect to home page
    header('Location: /');
    exit;
}




 
}


