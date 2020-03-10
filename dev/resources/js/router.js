import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import Cuestionario from './pages/Cuestionario';
Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            component : ExampleComponent,
            name : 'root'
        },
        {
            path: '/cuestionario',
            component : Cuestionario,
            name : 'cuestionario'
        }
    ]

});
