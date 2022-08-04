<?php
namespace App\Models;


class FoodModel extends \CodeIgniter\Model {
    protected $table ="food";
    protected $allowedFields=['name','category','restaurant_name','location','price','rating'];
     
}
