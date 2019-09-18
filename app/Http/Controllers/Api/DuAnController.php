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
       return DuAnResource::collection(DuAn::all()->load('don_vi','user'));
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
        if (DuAn::create($data)) {
            return response()->json(['success' => 'Thêm thành công']);
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
        $du_an->ma_de_tai = $request->ma_de_tai;
        $du_an->ten = $request->ten;
        $du_an->user_id = $request->user_id;
        $du_an->donvi_id = $request->donvi_id;
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
