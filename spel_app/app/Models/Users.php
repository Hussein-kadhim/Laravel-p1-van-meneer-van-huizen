<?php
namespace App\Models;
 
use Illuminate\Database\eloquent\model;
 
class Products extends model
{
     
    public $name = '';
    public $email = '';
    public $email_verified_at_date = ''; //todo make it datetime
    public $password = '';
    public $roleId = 0;
 
}