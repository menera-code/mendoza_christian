<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('student'); // $this->student is injected
    }

 public function index()
{
    $students = $this->student->all(); // fetch students
    require APP_DIR . 'views/students/index.php'; // include view
}

    public function create()
    {
        require APP_DIR . 'views/students/create.php';
    }

    public function store()
    {
        $this->student->insert([
            'first_name' => $_POST['first_name'],
            'last_name'  => $_POST['last_name'],
            'email'      => $_POST['email'],
        ]);
        header('Location: /students');
exit;
    }

  public function edit($id)
{
    $student = $this->student->find($id); // fetch single student
    require APP_DIR . 'views/students/edit.php';   // include view
}

    public function update($id)
    {
        $this->student->update($id, [
            'first_name' => $_POST['first_name'],
            'last_name'  => $_POST['last_name'],
            'email'      => $_POST['email'],
        ]);
        header('Location: /students');
exit;
    }

    public function delete($id)
    {
        $this->student->delete($id);
        header('Location: /students');
exit;
    }
}

