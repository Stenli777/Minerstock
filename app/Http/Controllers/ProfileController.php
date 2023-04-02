<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show() {
        $user = Auth::user();

        return view('profile', [
            'user' => $user
        ]);
    }

    public function add_company(Request $request) {
        $user_id = Auth::user()->id;
        $company = new Company([
            'user_id' => $user_id,
            'name' => $request->input('name')
        ]);
        $company->save();
        $request->file('logo_file')->storePubliclyAs('/company/' . $company->id, 'logo.jpg');
        $company->logo = '/company/' . $company->id . '/logo.jpg';
        $company->save();
        return response()->json([
            'company' => $company
        ]);
    }
}
