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
Vue.component('configurations', require('./components/configurations/Configurations.vue').default);
Vue.component('dashboard', require('./components/dashboard/Dashboard.vue').default);
Vue.component('group', require('./components/groups/Group.vue').default);
Vue.component('my-groups', require('./components/groups/MyGroups.vue').default);
Vue.component('my-projects', require('./components/projects/MyProjects.vue').default);
Vue.component('my-tasks', require('./components/tasks/MyTasks.vue').default);
Vue.component('my-profile', require('./components/users/Profile.vue').default);
Vue.component('project', require('./components/projects/Project.vue').default);
Vue.component('task', require('./components/tasks/Task.vue').default);
Vue.component('user', require('./components/users/User.vue').default);
Vue.component('users', require('./components/users/Users.vue').default);

// COMMMON
Vue.component('button-common', require('./components/common/Button.vue').default);
Vue.component('grid', require('./components/common/Grid.vue').default);
Vue.component("modal", require('./components/common/Modal.vue').default);
Vue.component("page", require('./components/common/Page.vue').default);
Vue.component('progress-bar', require('./components/common/ProgressBar.vue').default);

Vue.use(VueRouter)

const routes = [
  { path: '/', component: { template: '<dashboard />' } },
  { path: '/configurations', component: { template: '<configurations />' } },
  { path: '/groups', component: { template: '<my-groups />' } },
  { path: '/groups/:id', component: { template: '<group />' } },
  { path: '/projects', component: { template: '<my-projects />' } },
  { path: '/projects/:id', component: { template: '<project />' } },
  { path: '/tasks', component: { template: '<my-tasks />' } },
  { path: '/tasks/:id', component: { template: '<task />' } },
  { path: '/profile', component: { template: '<my-profile />' } },
  { path: '/users/:id', component: { template: '<user />' } },
  { path: '/users', component: { template: '<users />' } },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    router
  }).$mount('#app');

Vue.directive('click-outside', {
  bind: function (el, binding, vnode) {
    el.clickOutsideEvent = function (event) {
      // here I check that click was outside the el and his children
      if (!(el == event.target || el.contains(event.target))) {
        // and if it did, call method provided in attribute value
        vnode.context[binding.expression](event);
      }
    };
    document.body.addEventListener('click', el.clickOutsideEvent)
  },
  unbind: function (el) {
    document.body.removeEventListener('click', el.clickOutsideEvent)
  },
});