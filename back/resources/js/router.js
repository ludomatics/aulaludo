import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "./pages/HomePage";
import Cuestionario from './pages/CuestionarioPage';
import Leccion from './pages/LeccionPage';
Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            component : Home,
            name : 'root'
        },{
            path: '/leccion',
            component: Leccion,
            name: 'leccion'
        },
        {
            path: '/cuestionario',
            component : Cuestionario,
            name : 'cuestionario'
        }
    ]

});
