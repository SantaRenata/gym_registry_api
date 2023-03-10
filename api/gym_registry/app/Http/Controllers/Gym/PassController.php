<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\BaseController;
use App\Models\Pass;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;


class PassController extends BaseController
{
    public function indexPass(User $user, $id){
        //még nem működik
        
        // $user = Auth::user();    

        // if(Auth::check() && Auth::user()->role == true){
        //     $pass = Pass::find($id);
        // }

        // return $this->sendResponse($pass);
    }

    public function createPass(Request $request){
        $this->authorize("manage-pass");
        $pass = $request->all();
        $validator = Validator::make($pass,[
            'start' => "required",
            'end' => "required",
            'typeId' => "required"
        ]);
        if($validator->fails()){
            return $this->sendError($validator,"Érvénytelen bemenet");
        }

        $pass = Pass::create($pass);
        return $this->sendResponse($pass,"Bérlet hozzáadva");
    }

    public function updatePass(Request $request, $id){
        $this->authorize("manage-pass");
        $pass = $request->all();
        $validator = Validator::make($pass,[
            'start' => "required",
            'end' => "required",
            'typeId' => "required"
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $pass = Pass::find($id);
        $pass->update($request->all());
        return $this->sendResponse($pass,"Bérlet frissítve");
    }

    public function deletePass($id){
        $this->authorize("manage-pass");
        Pass::destroy($id);
        return $this->sendResponse("Bérlet törölve");
    }

}
