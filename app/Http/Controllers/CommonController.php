<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class CommonController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if($request->extra_param=='proceed')
        {
            $type='deleted';
            $data['userData']=User::where('id',$request->id)->select('*')->get()->first();
            User::where('id',$request->id)->update(['status'=>'inactive']);  
            $msg = [
                'status' => 'Your selected item has been deletedd.',
                'type' =>  $type,
                ];
            return $msg;
        }
        
    }

}


