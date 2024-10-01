<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsicApplicationRequest;
use App\Models\AsicApplication;
use App\Models\User;
use App\Notifications\NewAsicApplicationNotification;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AsicApplicationController extends Controller
{
    public function submitApplication(AsicApplicationRequest $request)
    {
        $validatedData = $request->validated();

        $application = AsicApplication::create($validatedData);

        $adminEmail = 'bigmichael1922@gmail.com';

//
//        $admins = User::all();
//
//        Notification::send($admins, new NewAsicApplicationNotification($application));
//
        Notification::route('mail', $adminEmail)
            ->notify(new NewAsicApplicationNotification($application));

        return redirect()->back()->with('success', 'Ваша заявка успешно отправлена!');
    }
}
