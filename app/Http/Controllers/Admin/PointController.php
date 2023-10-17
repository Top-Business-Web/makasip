<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PointController extends Controller
{

    public function delete(Request $request)
    {

        $point = Point::findOrFail($request->id);

        $point->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);

    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $points = Point::latest()->get();
            return Datatables::of($points)
                ->addColumn('action', function ($points) {
                    return '
                            <button type="button" data-id="' . $points->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $points->id . '" data-title="' . $points->number_of_points . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->editColumn('price', function ($points) {
                    return    '<span class="font-weight-semibold fs-15">'.$points->price.'$</span>';
                })

                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/point/index');
        }
    }


    public function create()
    {
        return view('Admin/point.parts.create');

    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'number_of_points'=> 'required|integer|unique:points,number_of_points',
            'price'       => 'required|regex:/^\d+(\.\d{1,2})?$/',

        ],[
            'number_of_points.required'  => 'يرجي ادخال عدد النقاط' ,
            'number_of_points.integer'  => 'يرجي ادخال عدد نقاط صحيح' ,
            'price.required'  => 'يرجي ادخال السعر' ,
            'price.regex'  => 'يرجي ادخال سعر صحيح' ,

            'number_of_points.unique'=>'عدد النقاط موجود بالفعل'

        ]);

        if(Point::create($data))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Point $point){
        return view('Admin/point.parts.edit',compact('point'));
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'number_of_points'=> 'required|integer|unique:points,number_of_points,'.$id,
            'price'       => 'required|regex:/^\d+(\.\d{1,2})?$/',

        ],[
            'number_of_points.required'  => 'يرجي ادخال عدد النقاط' ,
            'number_of_points.integer'  => 'يرجي ادخال عدد نقاط صحيح' ,
            'price.required'  => 'يرجي ادخال السعر' ,
            'price.regex'  => 'يرجي ادخال سعر صحيح' ,

            'number_of_points.unique'=>'عدد النقاط موجود بالفعل'

        ]);
       $point=Point::find($id);
        if ($point->update($data))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
