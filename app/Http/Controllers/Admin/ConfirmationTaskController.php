<?php

namespace App\Http\Controllers\Admin;

use App\Models\Site;
use App\Models\User;
use App\Models\SiteInfo;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ConfirmationTask;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ConfirmationTaskController extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $confirmation_tasks = ConfirmationTask::where('status', 'un_confirmed')->latest()->get();
            return Datatables::of($confirmation_tasks)
                ->addColumn('action', function ($confirmation_tasks) {
                    return '
                    <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                    data-id="' . $confirmation_tasks->id . '" data-title="' . $confirmation_tasks->site->title . '">
                    <i class="fas fa-trash"></i>
            </button>
                       ';
                })
                ->editColumn('image', function ($confirmation_tasks) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . get_user_file($confirmation_tasks->image) . '">
                    ';
                })
                ->editColumn('user_id', function ($confirmation_tasks) {
                    return $confirmation_tasks->user->user_name;
                })
                ->editColumn('site_id', function ($confirmation_tasks) {
                    return $confirmation_tasks->site->title;
                })
                ->editColumn('status', function ($confirmation_tasks) {
                    return '<select class="form-control" name="status" data-record-id="' . $confirmation_tasks->id . '" data-user-id="' . $confirmation_tasks->user_id . '" data-site-id="' . $confirmation_tasks->site_id . '">
                                <option value="confirmed" ' . ($confirmation_tasks->status == 'confirmed' ? 'selected' : '') . '>تأكيد</option>
                                <option value="un_confirmed" ' . ($confirmation_tasks->status == 'un_confirmed' ? 'selected' : '') . '>غير مأكد</option>
                            </select>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin/confirmation_tasks/index');
        }
    }

    public function changeStatus(Request $request)
    {
        $newStatus = $request->input('status');
        $recordId = $request->input('id');
        $userId = $request->input('user');
        $siteId = $request->input('site');

        try {
            // Find the ConfirmationTask or return a 404 response
            $confirmationTask = ConfirmationTask::find($recordId);

            if (!$confirmationTask) {
                return response()->json(['status' => 404]);
            }

            // Update the status of the ConfirmationTask
            $confirmationTask->update(['status' => $newStatus]);

            // Create a new SiteInfo record
            SiteInfo::create([
                'site_id' => $siteId,
                'user_id' => $userId
            ]);

            // Find the site and its points_for_click
            $site = Site::find($siteId);
            $site->decrement('needed_clicks');
            $points_for_click = $site->points_for_click;

            // Find the user
            $user = User::find($userId);

            if ($user) {
                // Update the user's balance
                $user->increment('balance', $points_for_click);

                // Create a notification
                Notification::create([
                    'user_id' => $userId,
                    'message' => 'نقاطك',
                    'body' => "تم الموافقة على طلبك من الإدارة وتم إضافة $points_for_click نقطة",
                    'type' => 'user'
                ]);

                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 405]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 405]);
        }
    }
    public function destroy(Request $request)
    {
        $confirmation_task = ConfirmationTask::findOrFail($request->id);
        $confirmation_task->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }
}
