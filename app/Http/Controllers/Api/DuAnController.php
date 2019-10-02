<?php

namespace App\Http\Controllers\Api;

use App\Models\DuAn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DuAnResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DuAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if($user->hasRole('admin','QA-admin')){
            return DuAnResource::collection(DuAn::all()->load('don_vi','user'));
        }
        else if($user->hasRole('QA')){
            return DuAnResource::collection(DuAn::where('user_id',$user->id)->get()->load('don_vi','user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = DuAn::create($data);
        if ($data) {
            return response()->json(['success' => 'Thêm thành công', 'data'=> new DuAnResource($data)]);
        } else {
            return response()->json(['error' => 'Thêm không thành công']);
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $du_an = DuAn::find($id);
        if($request->has('trang_thai')){
            $du_an->trang_thai = $request->trang_thai;
        }
        else{
            $du_an->ma_de_tai = $request->ma_de_tai;
            $du_an->ten = $request->ten;
            $du_an->user_id = $request->user_id;
            $du_an->donvi_id = $request->donvi_id;
        }
        $du_an->save();
        return response()->json(['success' => 'Thêm thành công']);
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
