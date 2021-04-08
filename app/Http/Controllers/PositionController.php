<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view.position_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view.add_position');
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
            'title' =>  $request->name,
            
        ]; 
        
        DB::table('position')->insert($array);
        return view('admin_view.position_list');
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
        $result = DB::table('position')
                   ->where('id','=',$id)
                   ->first();
        return view('admin_view/position_edit',compact('result'));
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
            'title' =>  $request->name,
             ];
       DB::table('position')->where('id',$id)
            ->update($array);
        return redirect('position_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('position')
             ->where('id',$id)
             ->delete();
        return redirect('position_list');
    }
    /**
     * the specified resource from storage.
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
     public function ajax(Request $request)
    {
    $responce = DB::table('position')->get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $edit = $delete = '';
            if(isPermission('update')){
                $edit = '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="position_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> ';
            }
            if(isPermission('delete')){
                $delete = '<button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="delete-position/'.$value->id.'"><i class="fas fa-trash"></i></a></button>';
            }

            $currentAry = [
                $value->id,
                $value->title,
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
