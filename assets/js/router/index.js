import * as VueRouter from "vue-router";

import Home from "@pages/home/index.vue";
import NotFound from "@pages/not-found/index.vue";
import LeTrucDeCyril from "@pages/le-truc-de-cyril/index.vue";
import LeTrucDeGuillaume from "@pages/le-truc-de-guillaume/index.vue";


const routes = [
    {
        path: "/",
        name: "homepage",
        component: Home,
    },
    {
        path: "/cyril",
        name: "cyril",
        component: LeTrucDeCyril,
    },
    {
        path: "/guillaume",
        name: "guillaume",
        component: LeTrucDeGuillaume,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'not-found',
        component: NotFound
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

export default router;
