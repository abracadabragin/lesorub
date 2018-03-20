<?php

namespace Lesorub\Http\Controllers;

use Lesorub\Mail\FormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class FormController extends Controller
{

    public function sendMessage(Request $request)
    {
        Mail::to('bragin.dima7@yandex.ru')->send(new FormMail($request->all()));
    }

}
