<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KPI_QuyTrinhResource;
use App\Http\Resources\TaiLieuQuyTrinhResource;
use App\Models\DuAn;
use App\Models\KPI_QuyTrinh;
use App\Models\TaiLieuQuyTrinh;
use App\Models\User;
use App\Models\Module;
use App\Models\QuyTrinh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KPI_QuyTrinhController extends Controller
{
    public function getTaiLieuQuyTrinh($id)
    {
        return TaiLieuQuyTrinhResource::collection(TaiLieuQuyTrinh::where('kpi_quytrinh_id', $id)->get());
    }
    public function findDataKpiQuyTrinh(Request $request)
    {
        $kpiQuyTrinh = KPI_QuyTrinh::where('du_an_id', $request->du_an_id)
            ->where('quy_trinh_id', $request->quy_trinh_id)
            ->where('module_id', $request->module_id)
            ->latest()
            ->firstOrFail();
        return TaiLieuQuyTrinhResource::collection(TaiLieuQuyTrinh::where('kpi_quytrinh_id', $kpiQuyTrinh->id)->get());
    }
    public function getModule()
    {
        return response()->json(Module::all());
    }

    public function index()
    {

        $user = User::find(Auth::user()->id);

        if ($user->hasRole('admin', 'QA-admin')) {
            return KPI_QuyTrinhResource::collection(KPI_QuyTrinh::all()->sortByDesc('updated_at'));
        } else if ($user->hasRole('QA')) {
            return KPI_QuyTrinhResource::collection($user->kpi_quy_trinh->sortByDesc('updated_at'));
        }
    }

    public function store(Request $request)
    {
        $module = Module::firstOrCreate(['name' => $request->module]);
        $data = KPI_QuyTrinh::updateOrCreate(
            ['quy_trinh_id' => $request->quy_trinh_id, 'module_id' => $module->id, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m", strtotime($request->thoigian))],
            ['diem' => $request->diem]
        );
        //Cap nhat diem trung binh module tong the
        if ($module->id != 1) {
            $average = KPI_QuyTrinh::where('du_an_id', $request->du_an_id)
                ->where('thoigian', date("Y-m", strtotime($request->thoigian)))
                ->where('quy_trinh_id', $request->quy_trinh_id)
                ->where('module_id', '<>', 1)
                ->get()
                ->avg('diem');
            $average = KPI_QuyTrinh::updateOrCreate(
                ['quy_trinh_id' => $request->quy_trinh_id, 'module_id' => 1, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m", strtotime($request->thoigian))],
                ['diem' => round($average)]
            );
        }

        //Cap nhat tai lieu
        $tai_lieu_quy_trinh = $request->tai_lieu_quy_trinh;
        foreach ($tai_lieu_quy_trinh as $tl) {
            $ghi_chu = $tl['ghi_chu'] ?? "";
            TaiLieuQuyTrinh::updateOrCreate(
                ['kpi_quytrinh_id' => $data->id, 'ten' => $tl['ten']],
                ['link' => $tl['link'], 'danh_gia' => $tl['danh_gia'], 'ghi_chu' => $ghi_chu]
            );
        }

        //Cap nhat diem trung binh quy_trinh_id = 8
        $average = KPI_QuyTrinh::where('du_an_id', $request->du_an_id)
            ->where('thoigian', date("Y-m", strtotime($request->thoigian)))
            ->where('quy_trinh_id', '<>', 8)
            ->where('module_id', 1)
            ->get()
            ->avg('diem');
        $average = KPI_QuyTrinh::updateOrCreate(
            ['quy_trinh_id' => 8, 'module_id' => 1, 'du_an_id' => $request->du_an_id, 'thoigian' => date("Y-m", strtotime($request->thoigian))],
            ['diem' => round($average)]
        );

        return response()->json(['success' => 'Thêm thành công', 'data' => new KPI_QuyTrinhResource($data)]);
    }

    public function importKPIQuyTrinh(Request $request)
    {
        foreach ($request->data as $record) {

            $ma_quy_trinh = $record['ma_quy_trinh'];
            $ma_de_tai = $record['ma_de_tai'];
            $thoigian = $record['thoigian'];
            $diem = $record['diem'];

            try {
                $quy_trinh_id = QuyTrinh::where('ma_quy_trinh', $ma_quy_trinh)->firstOrFail()->id;
            } catch (ModelNotFoundException $exception) {
                return response()->json(['error' => "Không tồn tại mã quy trình: $ma_quy_trinh"]);
            }
            try {
                $du_an_id = DuAn::where('ma_de_tai', $ma_de_tai)->firstOrFail()->id;
            } catch (ModelNotFoundException $exception) {
                return response()->json(['error' => "Không tồn tại mã đề tài: $ma_de_tai"]);
            }

            $data = KPI_QuyTrinh::updateOrCreate(
                ['quy_trinh_id' => $quy_trinh_id, 'module_id' => 1, 'du_an_id' => $du_an_id, 'thoigian' => date("Y-m", strtotime($thoigian))],
                ['diem' => $diem * 100]
            );
            //Cap nhat diem trung binh quy_trinh_id = 8
            $average = KPI_QuyTrinh::where('du_an_id', $du_an_id)
                ->where('thoigian', date("Y-m", strtotime($thoigian)))
                ->where('quy_trinh_id', '<>', 8)
                ->where('module_id', 1)
                ->get()
                ->avg('diem');
            $average = KPI_QuyTrinh::updateOrCreate(
                ['quy_trinh_id' => 8, 'module_id' => 1, 'du_an_id' => $du_an_id, 'thoigian' => date("Y-m", strtotime($record['thoigian']))],
                ['diem' => round($average)]
            );
        }
        return response()->json(['success' => 'Thêm thành công']);
    }
}
