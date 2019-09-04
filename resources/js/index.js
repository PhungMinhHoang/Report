// Views

import Home from "./layouts/Home";
import DuAn from "./views/DuAn.vue";
import DonVi from "./views/DonVi.vue";

export const routes = [
    {
        path: "/",
        name: "main",
        redirect: "/du-an",
        component: Home,
        children: [
            {
                path: "du-an",
                name: "DuAn",
                component: DuAn
            },
            {
                path: "don-vi",
                name: "DonVi",
                component: DonVi
            }
        ]
    }
];
