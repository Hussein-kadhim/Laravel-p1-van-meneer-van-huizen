<?php
namespace App\Models;
 
use Illuminate\Database\eloquent\model;
 
class Orders extends model
{
     
    public $name = '';
    public $orderdatetime = ''; //
    public $userID = 0;
    public $status = 0;
}