<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['fname', 'lname', 'age', 'island'];

}
