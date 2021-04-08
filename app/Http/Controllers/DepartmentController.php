<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view.department_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view.add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = [
            'name' =>  $request->name,
            
        ]; 
        
        DB::table('department')->insert($array);
        return view('admin_view.add_department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $result = DB::table('department')
                   ->where('id','=',$id)
                   ->first();
        return view('admin_view/department_edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = $request->id;
        $array = [
            'name' =>  $request->name,
             ];
       DB::table('department')->where('id',$id)
            ->update($array);
        return redirect('department_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('department')
             ->where('id',$id)
             ->delete();
        return redirect('department_list');
    
    }
     public function ajax(Request $request)
    {
    $responce = DB::table('department')->get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $edit = $delete = '';
            if(isPermission('update')){
                $edit = '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="department_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> ';
            }
            if(isPermission('delete')){
                $delete = '<button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="delete-department/'.$value->id.'"><i class="fas fa-trash"></i></a></button>';
            }
            $currentAry = [
                $value->id,
                $value->name,
                $value->status,
               $edit.$delete,
            ];
            array_push($result, $currentAry);
        }

        $data['data']            = $result;
        $data['recordsTotal']    = $totalResult;
        $data['recordsFiltered'] = $totalResult;
        $data['draw']            = ! empty( $request['draw'] ) ? $request['draw'] : 1;

        echo json_encode( $data );
        exit;
}
}
