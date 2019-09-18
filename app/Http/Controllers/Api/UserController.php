<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDanhSachQA()
    {
        $user = User::find(Auth::user()->id);
            if($user->hasRole('admin','QA-admin')){
                $QA = User::all()->filter(function ($user) {
                    return $user->hasRole('QA');
                });
                return UserResource::collection($QA);
            }
            else if($user->hasRole('QA')){
                $user = array(new UserResource($user));
                return $user;
            }
    }

    public function changePassword(Request $request){
        $user = User::find(Auth::user()->id);
        if($request->password == $request->passwordAgain){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['success' => 'Đổi mật khẩu thành công']);
        }
        else response()->json(['error' => 'Mật khẩu không khớp']);
    }
}
