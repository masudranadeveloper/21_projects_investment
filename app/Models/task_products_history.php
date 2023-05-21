<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_products_history extends Model
{
    use HasFactory;
    protected $table = '06_task_products_histories';
    protected $primaryKey = 'id';
}
