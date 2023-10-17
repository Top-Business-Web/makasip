<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Notification;
use App\Http\Requests\StoreNotifications;
use App\Models\User;

class NotificationController extends Controller
{
    public function index(request $request)
    {
        $users = Notification::get();
        if ($request->ajax()) {
            $notifications = Notification::latest()->get();
            return Datatables::of($notifications)
                ->addColumn('action', function ($notifications) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $notifications->id . '" data-title="' . $notifications->message . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin/notification/notifications');
        }
    }

    public function create(Request $request)
    {
        $users = User::get();
        return view('Admin/notification/parts/create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required',
            'body' => 'required',
            'type' => 'required',
        ]);

        if ($request->type == 'user') {
            $data['user_id'] = $request->user_id;
        } else {
            $data['user_id'] = null;
        }

        if($request->type == 'all'){
            $data['seen'] = '1';
        } 

        if (Notification::create($data))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete(Request $request)
    {
        $notifications = Notification::findOrFail($request->id);

        $notifications->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
