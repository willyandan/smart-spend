require('./bootstrap');

window.Vue = require('vue');

let VcNav = require('./components/navbar')
let VcHome = require('./components/home')
const app = new Vue({
    el: '#app',
    components:{
    	VcNav,
    	VcHome
    }
});
