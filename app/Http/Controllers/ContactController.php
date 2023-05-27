<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        // валидация данных формы

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // отправка письма
//        Mail::to('info@mineinfo.ru')->send(new \App\Mail\ContactMail($validatedData));
        Mail::to(env('MAIL_USERNAME'))->send(new ContactMail($validatedData));
//        Mail::send([
//            'text' => 'mail.contact', // путь к шаблону письма
//            'data' => $validatedData, // данные для передачи в шаблон
//        ], [], function ($message) use ($validatedData) {
//            $message->to('info@mineinfo.ru')
//                ->subject('Contact Form Submission')
//                ->replyTo($validatedData['email']);
//        });

        // возвращаем ответ пользователю

        return view('contact.success');
    }
}
