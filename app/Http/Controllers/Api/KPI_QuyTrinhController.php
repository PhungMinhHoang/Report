<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KPI_QuyTrinhResource;
use App\Models\KPI_QuyTrinh;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KPI_QuyTrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('admin', 'QA-admin')) {
            return KPI_QuyTrinhResource::collection(KPI_QuyTrinh::all()->sortByDesc('id'));
        } else if ($user->hasRole('QA')) {
            return KPI_QuyTrinhResource::collection($user->kpi_quy_trinh->sortByDesc('id'));
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
        // $data = new KPI_QuyTrinh;
        // $data->quy_trinh_id = $request->quy_trinh_id;
        // $data->du_an_id = $request->du_an_id;
        // $data->diem = $request->diem;
        // $data->thoigian = date("Y-m",strtotime($request->thoigian));
        // $data->save();
        $data = KPI_QuyTrinh::updateOrCreate(
            ['quy_trinh_id' => $request->quy_trinh_id, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m",strtotime($request->thoigian))],
            ['diem' => $request->diem]
        );

        return response()->json(['success' => 'Thêm thành công', new KPI_QuyTrinhResource($data)]);
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
        //
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
