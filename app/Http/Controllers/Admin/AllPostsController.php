<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Site;
use App\Models\ReasonReject;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AllPostsController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {
            $sites = Site::all();
            return Datatables::of($sites)
                ->editColumn('user_id', function ($sites) {
                    return ($sites->user->user_name) ?? '---';
                })
                ->editColumn('title', function ($sites) {
                    return "<a target='blank' href=" . $sites->url . ">" . $sites->title . "</a>";
                })
                ->editColumn('site_type', function ($sites) {
                    return ($sites->type->title_ar) ?? '---';
                })
                ->editColumn('total_clicks_limit', function ($user) {
                    $total = $user->total_clicks_limit;
                    $reminder = $user->needed_clicks;
                    return 'مطلوب ' . $total . ' المتبقي ' . $reminder;
                })
                ->editColumn('status', function ($products) {
                    if ($products->status == 0)
                        $span = '<span style="cursor: pointer" data-id="' . $products->id . '" data-user="' . $products->user_id . '" class="badge badge-danger statusSpan">غير مفعل</span';
                    elseif($products->needed_clicks == 0)
                        $span = '<span class="badge badge-danger">منتهي</span';
                    else
                        $span = '<span style="cursor: pointer" data-id="' . $products->id . '" data-user="' . $products->user_id . '"  class="badge badge-success statusSpan">مفعل</span';
                    return $span;
                })
                ->addColumn('action', function ($sites) {
                    return '
                             <button type="button"  data-id="' . $sites->id . '" class="btn btn-pill btn-danger-light reject_modal">
                            <i class="fas fa-ban"></i>
                            </button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $sites->id . '" data-title="' . $sites->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            $count = Site::count();
            return view('Admin.userSites.index', compact('count'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete(request $request)
    {
        $row = Site::findOrFail($request->id);
        $row->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    public function deleteAllSites()
    {
        DB::table('sites')->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Deleted successfully'
            ]);
    }

    public function siteActivation(Request $request)
    {
        $site = Site::find($request->id);
        ($site->status == '0') ? $site->status = '1' : $site->status = '0';
//        dd($request->all());
        $site->save();

        $user = $request->user;

        if ($site->status == '1') {
            $notification = Notification::create(['user_id' => $user, 'message' => 'الادمن', 'body' => 'تم قبول طلبك', 'type' => 'user', 'seen' => '0']);
        } else {
            $notification = Notification::create(['user_id' => $user, 'message' => 'الادمن', 'body' => 'تم رفض طلبك', 'type' => 'user', 'seen' => '0'
            ]);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة المنشور بنجاح'
            ]);
    }

    public function resonRject($id)
    {
        $post = Site::findOrFail($id);
        return view('Admin.userSites.parts.create', compact('post'));
    }

    public function reasonSend(Request $request)
    {
        $inputs = $request->all();
        $send = ReasonReject::create([
            'user_id' => $inputs['user_id'],
            'site_id' => $inputs['site_id'],
            'reason' => $inputs['reason'],
        ]);

        $site = Site::find($request->site_id);
        $site->status = '0';
        $site->save();

        if ($send) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
//        dd($inputs);
//        return view('Admin.userSites.parts.create');
    }
}
