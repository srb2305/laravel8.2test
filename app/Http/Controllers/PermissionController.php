<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use File;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('permissions')->get();

       return view('admin_view/permission',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //return view('admin_view.add_user');
    }

     public function store(Request $request)
    {
    	$readAry = $request['read'];
    	$writeAry = $request['write'];
    	$updateAry = $request['update'];
    	$deleteAry = $request['delete'];
             DB::table('permissions')->delete();
        for($i=0;$i<3;$i++){
            $read = !empty($readAry[$i]) ? 1 : 0;
            $write = !empty($writeAry[$i]) ? 1 : 0;
            $update = !empty($updateAry[$i]) ? 1 : 0;
            $delete = !empty($deleteAry[$i]) ? 1 : 0;
            $position_id = $i+1;
            $inserted = DB::table('permissions')
                        ->insert([
                            'position_id' => $position_id,
                            'read'   => $read,
                            'write' => $write,
                            'update' => $update,
                            'delete' => $delete
                        ]);
        }
            return redirect('permission');          
    }	

}