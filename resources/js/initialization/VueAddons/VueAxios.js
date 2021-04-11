import Vue from 'vue'
import Axios from 'axios'
import VueAxios from 'vue-axios'

const axios = Axios.create({
    baseURL: '/api/v1/',
})

Vue.use(VueAxios, axios)
