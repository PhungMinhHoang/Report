<?php

namespace App\Http\Controllers\Api;

use App\Models\TaiLieuQuyTrinh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaiLieuQuyTrinhResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaiLieuQuyTrinhController extends Controller
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
            return TaiLieuQuyTrinhResource::collection(TaiLieuQuyTrinh::all());
        }
        else if($user->hasRole('QA')){
            return TaiLieuQuyTrinhResource::collection(TaiLieuQuyTrinh::where('kpi_quytrinh.user_id',$user->id)->get());
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaiLieuQuyTrinh  $taiLieuQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function show(TaiLieuQuyTrinh $taiLieuQuyTrinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaiLieuQuyTrinh  $taiLieuQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function edit(TaiLieuQuyTrinh $taiLieuQuyTrinh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaiLieuQuyTrinh  $taiLieuQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaiLieuQuyTrinh $taiLieuQuyTrinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaiLieuQuyTrinh  $taiLieuQuyTrinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaiLieuQuyTrinh $taiLieuQuyTrinh)
    {
        //
    }
}
