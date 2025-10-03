<?php

class AuthController extends Controller
{
    public function register()
    {
        if ($this->request->method() === 'post') {
            $username = $this->request->post('username');
            $email    = $this->request->post('email');
            $password = password_hash($this->request->post('password'), PASSWORD_BCRYPT);

            $this->db->table('users')->insert([
                'username' => $username,
                'email'    => $email,
                'password' => $password,
            ]);

            // redirect to login
            redirect('/auth/login');
        }

        return $this->view('auth/register');
    }

    public function login()
    {
        if ($this->request->method() === 'post') {
            $email    = $this->request->post('email');
            $password = $this->request->post('password');

            $user = $this->db->table('users')->where('email', $email)->get()->row();

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user'] = [
                    'id'       => $user->id,
                    'username' => $user->username,
                    'email'    => $user->email,
                ];

                redirect('/users/show'); // ✅ redirect to your homepage
            } else {
                $_SESSION['error'] = "Invalid email or password";
                redirect('/auth/login');
            }
        }

        return $this->view('auth/login');
    }

    public function logout()
    {
        session_destroy();
        redirect('/auth/login');
    }
}
