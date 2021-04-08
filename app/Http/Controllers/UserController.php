<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view.user_list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $position = DB::table('position')->pluck('title','id');
         $department = DB::table('department')->pluck('name','id');
         return view('admin_view.add_user',compact('position','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->hasfile('image')){
            $destinationPath = public_path( 'images' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $image = $request['image'];
               // $title = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension; 
                $image->move($destinationPath, $fileName);
            }else{
                $fileName = Null;
            }



        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
        $array = [
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' =>  $request->position,
            'department_id' => !empty($request->department_id) ? json_encode($request->department_id) : '',
            'image' => $fileName,
        ]; 
           
        
        $save= DB::table('users')->insert($array);
        if($save){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
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
        $result = DB::table('users')->where('id','=',$id)
                ->first();
        $position = DB::table('position')->pluck('title','id');
        $department = DB::table('department')->pluck('name','id');
        return view('admin_view/user_edit',compact('result','position','department'));    
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
            'email' => $request->email,
            'position' =>  $request->position,
            'department_id' => !empty($request->department_id) ? json_encode($request->department_id) : '',
             ];
       DB::table('users')->where('id',$id)
            ->update($array);
        return redirect('user_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         DB::table('users')
                    ->where('id',$id)
                    ->delete();
        return redirect('user_list');
    }
    public function ajax(Request $request)
    {
    $responce = DB::table('users')->get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $edit = $delete = '';
            if(isPermission('update')){
                $edit = '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="user_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> ';
            }
            if(isPermission('delete')){
                $delete = '<button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="delete-user/'.$value->id.'"><i class="fas fa-trash"></i></a></button>';
            }
            $department = '';
            if(!empty($value->department_id)){
             $arrayDepartment =  json_decode($value->department_id);
             foreach ($arrayDepartment as $dk => $dv) {
                $department .= getDepartment($dv).', ';
             }
            }
            $currentAry = [
                $value->id,
                $value->name,
                $value->email,
                getPosition($value->position),
                $department,
               '<img src="'. asset('/images/'.$value->image).'"  style="height:30px">',
                $edit.$delete
               ,
               
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