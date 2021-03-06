
/*
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
Vue.use(Vuetify);

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '2px'
})

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },    
    { path: '/users', component: require('./components/users/Users.vue').default },    
    { path: '/profile', component: require('./components/users/Profile.vue').default },
    { path: '/developer', component: require('./components/users/Developer.vue').default},     
    { path: '/programas', component: require('./components/users/Programas.vue').default },    
    { path: '/', component: require('./components/pagos/MetodosPagos.vue').default },    
    { path: '/plan1', component: require('./components/pagos/plan1.vue').default },    
    { path: '/plan2', component: require('./components/pagos/plan2.vue').default },    
    { path: '/plan3', component: require('./components/pagos/plan3.vue').default },    
]

const router = new VueRouter({
    mode: "history",
    routes, // short for `routes: routes`
})

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

window.Fire =  new Vue();

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
    'not-found',
    require('./components/users/NotFound.vue')
);
Vue.component(
    'welcome-carrusel', 
    require('./components/Welcome.vue').default
);
Vue.component(
    'metodos-pagos', 
    require('./components/pagos/MetodosPagos.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({    
    el: '#app',
    vuetify: new Vuetify(),
    router
});
