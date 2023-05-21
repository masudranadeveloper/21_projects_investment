<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_chat_controller extends Controller
{
    //support_show
    public function support_show()
    {
        return view('users.pages.support.support');
    }
}
