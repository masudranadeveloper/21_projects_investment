<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redeem_code extends Model
{
    use HasFactory;
    protected $table = "13_redeem_codes";
    protected $primaryKey = "id";
}
