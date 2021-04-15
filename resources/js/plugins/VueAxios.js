import Axios from 'axios'
import VueAxios from 'vue-axios'

/* window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; */


const plugin = VueAxios
const options = Axios.create({
    baseURL: '/api/v1/',
    headers: {
        common: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    }
})

export default {
    plugin,
    options
}
