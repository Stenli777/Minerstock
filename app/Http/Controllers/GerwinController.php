<?php

namespace App\Http\Controllers;

use App\Models\Gerwin;
use Illuminate\Http\Request;

class GerwinController extends Controller
{
    public function callback(Request $request) {
        $task_id = $request->json('id');
        $model = Gerwin::query()->where('gerwin_id', $task_id)->firstOrFail();

        $model->task_result = var_export($request->post(), 1);
        $model->task_status = $request->json('status');
        $model->save();
    }
}
