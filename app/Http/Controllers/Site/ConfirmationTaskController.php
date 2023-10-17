<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationTask;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class ConfirmationTaskController extends Controller
{
    use PhotoTrait;
    public function uploadImage(Request $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/assets/site/confirmation_site'), $imageName);

            $confirmation_tasks = new ConfirmationTask();
            $confirmation_tasks->site_id = $request->input('siteId');
            $confirmation_tasks->user_id = $request->input('userId');
            $confirmation_tasks->image = 'public/assets/site/confirmation_site/' . $imageName;
            $confirmation_tasks->save();

            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }
}
