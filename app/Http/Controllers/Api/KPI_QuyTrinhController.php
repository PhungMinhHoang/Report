<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KPI_QuyTrinhResource;
use App\Http\Resources\TaiLieuQuyTrinhResource;
use App\Models\KPI_QuyTrinh;
use App\Models\TaiLieuQuyTrinh;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KPI_QuyTrinhController extends Controller
{
    public function getTaiLieuQuyTrinh($id)
    {
        return TaiLieuQuyTrinhResource::collection(TaiLieuQuyTrinh::where('kpi_quytrinh_id',$id)->get());
    }

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
        $data = KPI_QuyTrinh::updateOrCreate(
            ['quy_trinh_id' => $request->quy_trinh_id, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m",strtotime($request->thoigian))],
            ['diem' => $request->diem]
        );

        //Cap nhat diem trung binh quy_trinh_id = 8
        $average = KPI_QuyTrinh::where('du_an_id',$request->du_an_id)
                                ->where('thoigian',date("Y-m",strtotime($request->thoigian)))
                                ->where('quy_trinh_id','<>',8)
                                ->get()
                                ->avg('diem');
        $average = KPI_QuyTrinh::updateOrCreate(
            ['quy_trinh_id' => 8, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m",strtotime($request->thoigian))],
            ['diem' => round($average)]
        );

        $tai_lieu_quy_trinh = $request->tai_lieu_quy_trinh;
        foreach ($tai_lieu_quy_trinh as $tl) {
            TaiLieuQuyTrinh::updateOrCreate(
                ['kpi_quytrinh_id' => $data->id, 'ten' => $tl['ten']],
                ['link' => $tl['link'], 'danh_gia' => $tl['danh_gia']]
            );
        }


        return response()->json(['success' => 'Thêm thành công', 'data'=>new KPI_QuyTrinhResource($data)]);
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
