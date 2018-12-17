
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */




window.Vue = require('vue');
window.swal =swal

import swal from 'sweetalert2'
require('./bootstrap');
require('chart.js');
// vue-charts package
require('hchs-vue-charts');
Vue.use(VueCharts)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('app-apply', require('./components/Apply.vue'));
Vue.component('app-bookings', require('./components/Bookings.vue'));
Vue.component('app-log-call', require('./components/LogCall.vue'));
Vue.component('app-my-bills', require('./components/MyBills.vue'));
Vue.component('app-suggestions', require('./components/Suggestions.vue'));
Vue.component('app-meeting', require('./components/Meetings.vue'));
Vue.component('app-user-management', require('./components/UserManagement.vue'));
Vue.component('app-budgets', require('./components/Budgets.vue'));
Vue.component('app-projects', require('./components/Projects.vue'));
Vue.component('app-calls', require('./components/Calls.vue'));
Vue.component('app-booking-management', require('./components/BookingManagement.vue'));
Vue.component('app-application-management', require('./components/ApplicationManagement.vue'));
Vue.component('app-dashboard', require('./components/Dashboard.vue'));
Vue.component('app-profile', require('./components/Profile.vue'));
Vue.component('app-accept-bill', require('./components/AcceptBill.vue'));
Vue.component('app-bills-management', require('./components/BillsManagemnt.vue'));
Vue.component('app-call-progress', require('./components/CallProgress.vue'));
Vue.component('app-ward', require('./components/Ward.vue'));




// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

const toast= swal.mixin({
    toast:true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000
})

window.toast =toast
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
