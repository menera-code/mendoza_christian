<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Student extends Model
{
    protected $table       = 'students';
    protected $primary_key = 'id';
    protected $fillable    = ['first_name', 'last_name', 'email'];
}
