<?php
namespace App\Http\Controllers;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    public function sendWelcomeEmail()
    {
        $userEmail = 'rakaraka0210@gmail.com'; // Replace with the recipient's email address
        Mail::to($userEmail)->send(new WelcomeEmail());
        return 'Welcome email sent successfully.';
    }
}
