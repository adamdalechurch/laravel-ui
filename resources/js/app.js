/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router'



window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// LAYOUT:
Vue.component('app', require('./components/layout/App.vue').default);
Vue.component('navigation', require('./components/layout/Navigation.vue').default);

// PAGES:
Vue.component('dashboard', require('./components/dashboard/Dashboard.vue').default);
Vue.component('my-groups', require('./components/groups/MyGroups.vue').default);

Vue.use(VueRouter)

const routes = [
  { path: '/', component: { template: '<dashboard />' } },
  { path: '/groups', component: { template: '<my-groups />' } },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    router
  }).$mount('#app')