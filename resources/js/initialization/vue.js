import Vue from 'vue';

import './VueAddons'
import '../components'

const app = new Vue({
    el: '#app',
});

window.Vue = Vue;
