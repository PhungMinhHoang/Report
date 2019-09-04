// Views

import Home from "./layouts/Home";
import DuAn from "./views/DuAn.vue";
import DonVi from "./views/DonVi.vue";

export const routes = [
    {
        path: "/",
        name: "main",
        redirect: "/Home",
        component: Home,
        children: [
            {
                path: "Home",
                //redirect: '/',
                name: "Home",
                component: Home
            },
            {
                path: "du-an",
                //redirect: '/',
                name: "DuAn",
                component: DuAn
            },
            {
                path: "don-vi",
                //redirect: '/',
                name: "DonVi",
                component: DonVi
            }
        ]
    }
];
