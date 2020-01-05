window._ = require('lodash');
window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
window.axios.defaults.baseURL = 'http://eustass.local/api/'
window.Pusher = require('pusher-js');
try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    require('bootstrap')
} catch (e) {}
import Echo from 'laravel-echo';
import BillComponent from './components/BillComponent.vue'
import Vue from 'vue'

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});
const App = new Vue({
    el:'#bills',
    components: {
        'list-bill':BillComponent
    }
})
