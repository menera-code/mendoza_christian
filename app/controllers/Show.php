<?php
class UserController extends Controller
{
    public function show()
    {
        // if not logged in, redirect to login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }

        // fetch all users
        $users = $this->db->table('users')->get() ?: [];

        // render the show view with $users
        $this->call->view('users/show', ['users' => $users]);
    }
}
