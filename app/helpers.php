<?php

if (! function_exists('isPermission')) {
    function isPermission($type) { // write, read, update, delete
    	$position = Auth::user()->position;
    	$data = DB::table('permissions')
    			->where('position_id',$position)
    			->where($type,1)
    			->first();
    	if(!empty($data)){
    		return true;
    	}else{
    		return false;
    	}
    }
}


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

if (! function_exists('getDepartment')) {
    function getDepartment($id) {
    	$data = DB::table('department')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->name;
    	}else{
    		$res = '';
    	}
        return $res;
    }
}
if ( ! function_exists( 'getRouteInfo' ) ) {
    /**
     * Get routing information
     * @return array
     */
    function getRouteInfo() {

        if ( ! App::runningInConsole() ) {

            

            $routeArray       = app( 'request' )->route()->getAction();

            $controllerAction = class_basename( $routeArray['controller'] );

            
            list( $controller, $action ) = explode( '@', $controllerAction );

            return [ 'controller' => $controller, 'action' => $action ];
        } else {
            return false;
        }
    }
}

if ( ! function_exists( 'getActiveClass' ) ) {
    /**
     * Get Active Class information/ Active menus
     * @return array
     */
    function getActiveClass( $controllerArray = array(), $actionArray = array() ) {
        $routeArray = getRouteInfo();
        
        if ( ! empty( $routeArray ) && in_array( $routeArray['controller'], $controllerArray ) && in_array( $routeArray['action'], $actionArray ) ) {
            echo 'active';
        } else {
            echo '';
        }

    }
}

?>