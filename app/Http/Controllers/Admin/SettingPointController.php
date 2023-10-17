<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSettingPoint;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\SettingPoint;
use Yajra\DataTables\DataTables;

class SettingPointController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $settings_points = SettingPoint::latest()->get();
            return Datatables::of($settings_points)
                ->addColumn('action', function ($settings_points) {
                    return '
                            <button type="button" data-id="' . $settings_points->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                       ';
                })
                ->editColumn('body_ar', function($settings_points) {
                    return '
                                 <td class="min-w-50px">' . mb_strimwidth($settings_points->body_ar, 0, 100) . '</td>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/settings_points/index');
        }
    }

  public function edit(SettingPoint $settingPoint)
  {
      return view('Admin.settings_points.parts.edit', compact('settingPoint'));
  }

    public function update(RequestSettingPoint $request,$id)
    {
        $data = $request->except('id');
        $service = SettingPoint::findOrFail($id);
        if ($service->update($data))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
