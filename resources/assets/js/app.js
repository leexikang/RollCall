
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from './routes';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navigation', require('./components/Nav'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('user-form', require('./components/UserForm.vue'));
Vue.component('post-form', require('./components/PostForm.vue'));
Vue.component('posts', require('./components/Posts.vue'));


const app = new Vue({
    el: '#app',
    router
});
