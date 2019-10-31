
import Home from "./layouts/Home";

import Login from "./components/Login.vue"

//Danh sach
import DuAn from "./views/DuAn.vue";
import DonVi from "./views/DonVi.vue";
import QuyTrinh from "./views/QuyTrinh.vue";
import KPIQuyTrinh from "./views/KPIQuyTrinh.vue";
//Cong cu
import KPI_Veco from "./views/KPI_Veco.vue";
import CheckList from "./views/CheckList.vue";
import ImportExcel from "./views/ImportExcel.vue";

export const routes = [
    {
        path: '/login',
        component: Login,
        name: 'Đăng Nhập',
        meta: {
            auth: false
        }
    },
    {
        path: "/",
        name: "Trang chủ",
        redirect: "/du-an",
        component: Home,
        children: [
            {
                path: "du-an",
                name: "Đề tài",
                component: DuAn
            },
            {
                path: "don-vi",
                name: "Đơn Vị",
                component: DonVi
            },
            {
                path: "kpi-veco",
                name: "KPI Veco",
                component: KPI_Veco,
            },
            {
                path: "kpi-quy-trinh",
                name: "KPI Quy Trình",
                component: KPIQuyTrinh
            },
            {
                path: "quy-trinh",
                name: "Quy Trình",
                component: QuyTrinh
            },
            {
                path: "check-list",
                name: "Chấm điểm quy trình",
                component: CheckList,
            },
            {
                path: "import-excel",
                name: "Import Excel",
                component: ImportExcel,
            },
        ],
        meta: {
            auth: true
        }
    }
];
