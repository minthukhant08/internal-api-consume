<?php

namespace App\Http\WebControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\Controller;
use App\Mail\Confirm;

class MailController extends Controller
{
  public function sendConfirm(Request $request)
  {
    \Mail::to(array("email"=> "testing@gmail.com"))->send(new Confirm('welcome to talent'));
  }
}
