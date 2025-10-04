<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class HomeController extends Controller {
    public function index() {

     

        // Destroy all session data
        session_unset();
        session_destroy();

        $this->call->view('home');
    }
}
