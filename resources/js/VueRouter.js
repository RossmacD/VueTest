import Vue from 'vue';
import ExampleComponent from "./components/ExampleComponent";


const routes = [
    {path: '/', 
    name: 'app',
    component: ExampleComponent}
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router