<?php
class Show extends Controller
{
    public function index()
    {
        // if not logged in, redirect to login
        if (!function_exists('logged_in') || !logged_in()) {
            redirect('auth/login');
        }

        // render the show view (app/views/show.php)
        return $this->view('show');
    }
}
