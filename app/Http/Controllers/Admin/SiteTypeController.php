<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreService;
use App\Models\SiteType;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SiteTypeController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $sites_types = SiteType::latest()->get();
            return Datatables::of($sites_types)
                ->addColumn('action', function ($sites_types) {
                    $delete = '';
                    if($sites_types->type == 'new'){
                        $delete = ' <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $sites_types->id . '" data-title="' . $sites_types->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>';
                    }
                    return '
                            <button type="button" data-id="' . $sites_types->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            '.$delete.'
                            <button type="button" data-id="' . $sites_types->id . '" class="btn btn-pill btn-success-light showBtn"><i class="fa fa-eye"></i></button>
                       ';
                })
                ->editColumn('status', function ($sites_types) {
                    if ($sites_types->status == 0)
                        $span = '<span style="cursor: pointer" data-id="' . $sites_types->id . '" data-user="' . $sites_types->id . '" class="badge badge-danger statusSpan">غير مفعل</span';
                    else
                        $span = '<span style="cursor: pointer" data-id="' . $sites_types->id . '" data-user="' . $sites_types->id . '"  class="badge badge-success statusSpan">مفعل</span';

                    return $span;
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/sites_type/index');
        }
    }

    public function show(SiteType $siteType)
    {
        return view('Admin/sites_type.parts.show', compact('siteType'));
    }


    public function create()
    {
        return view('Admin/sites_type.parts.create');
    }



    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $sites_type = $request->all();
        if(SiteType::create($sites_type))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }


    public function edit(SiteType $siteType)
    {
        return view('Admin/sites_type.parts.edit',compact('siteType'));
    }



    public function update(Request $request,$id)
    {
        $data = $request->except('id');
        $sites_type = SiteType::findOrFail($id);
        if ($sites_type->update($data))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }



    public function destroy(request $request)
    {
        $sites_type = SiteType::findOrFail($request->id);
        $sites_type->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }

    public function siteTypeActivation(Request $request)
    {
        $site = SiteType::find($request->id);
        ($site->status == '0') ? $site->status = '1' : $site->status = '0';
//        dd($request->all());
        $site->save();


        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة الموقع بنجاح'
            ]);
    }
}
