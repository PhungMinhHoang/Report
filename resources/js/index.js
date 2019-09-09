// Views

import Home from "./layouts/Home";
import DuAn from "./views/DuAn.vue";
import DonVi from "./views/DonVi.vue";
import QuyTrinh from "./views/QuyTrinh.vue";
import KPI_Veco from "./views/KPI_Veco.vue";
import KPI_QuyTrinh from "./views/KPI_QuyTrinh.vue";

export const routes = [
    {
        path: "/",
        name: "Trang chủ",
        redirect: "/du-an",
        component: Home,
        children: [
            {
                path: "du-an",
                name: "Dự Án",
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
                component: KPI_Veco
            },
            {
                path: "quy-trinh",
                name: "Quy Trình",
                component: QuyTrinh
            },
            {
                path: "kpi-quy-trinh",
                name: "KPI Quy Trình",
                component: KPI_QuyTrinh
            },
        ]
    }
];
