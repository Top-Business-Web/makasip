<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreService;
use App\Models\Service;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $services = Service::latest()->get();
            return Datatables::of($services)
                ->addColumn('action', function ($services) {
                    return '
                            <button type="button" data-id="' . $services->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $services->id . '" data-title="' . $services->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('icon', function ($services) {
                    return '
                    <i class="'.$services->icon.'"</i>
                    ';
                })
                ->editColumn('desc_ar', function ($services) {
                    return Str::limit($services->desc_ar);
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/services/index');
        }
    }


    public function create()
    {
        return view('Admin/services.parts.create');
    }



    public function store(StoreService $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        if(Service::create($data))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Service $service)
    {
        return view('Admin/services.parts.edit',compact('service'));
    }



    public function update(StoreService $request,$id)
    {
        $data = $request->except('id');
        $service = Service::findOrFail($id);
        if ($service->update($data))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }



    public function delete(request $request)
    {
        $service = Service::findOrFail($request->id);
//        if (file_exists($service->getAttributes()['image'])) {
//            unlink($service->getAttributes()['image']);
//        }
        $service->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
