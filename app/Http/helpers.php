<?php
use DB;
 
if (! function_exists('getPosition')) {
    function getPosition($id) {
    	$data = DB::table('position')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->title;
    	}else{
    		$res = 'User';
    	}
        return $res;
    }
}


?>