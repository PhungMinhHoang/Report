// Views

import Home from "./layouts/Home";
import DuAn from "./views/DuAn.vue";
import DonVi from "./views/DonVi.vue";

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
            }
        ]
    }
];
