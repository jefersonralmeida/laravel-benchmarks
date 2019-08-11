<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * @package App
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string email
 */
class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];
}
