
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'fullcalendar';
import VeeValidate from "vee-validate";
import Vuetify from 'vuetify';
import vSelect from 'vue-select/src/components/Select.vue';

// import 'vuetify/dist/vuetify.min.css'     ;
// import {MDCList} from '@material/list';
// import {MDCComponent, MDCFoundation} from '@material/base';
// import {MDCRipple} from '@material/ripple';

// const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
// const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
//   return new MDCRipple(el);
// });



// const list = new MDCList(document.querySelector('.mdc-list'));
// const MDCComponent = require('mdc-base').MDCComponent;
// const MDCFoundation = require('mdc-base').MDCFoundation;
window.Switchery = require('switchery');
window.Vue = require('vue');
window.numeral = require('numeral');
window.toastr = require('toastr');
window.swal = require('sweetalert');
window.Swal = require('sweetalert2')
toastr.options = {
    "closeButton": false,
    "progressBar": true,
  }

Vue.use(Vuetify);
Vue.component('v-select', vSelect);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VeeValidate, {
    classes: true,
    classNames: {
        valid: "is-valid",
        invalid: "is-invalid"
    }
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('indicadores-component', require('./components/IndicadoresComponent.vue').default);
Vue.component('operaciones-component', require('./components/OperacionesComponent.vue').default);
Vue.component('tareas-component', require('./components/TareasComponent.vue').default);
Vue.component('years-component', require('./components/YearsComponent.vue').default);
Vue.component('operations-component', require('./components/OperationsComponent.vue').default);
Vue.component('tasks-component', require('./components/TasksComponent.vue').default);
Vue.component('executions-component', require('./components/ExecutionsComponent.vue').default);
Vue.component('specific-task-component', require('./components/SpecificTaskComponent.vue').default);
Vue.component('execution-specific-tasks-component', require('./components/ExecutionSpecificTask.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted(){
        //loading config default
        $('[data-toggle="tooltip"]').tooltip();
        // var elem =document.querySelector('.js-switch');
        // var init = new Switchery(elem,  { color: '#41b7f1',size: 'larger' });
    }
});
