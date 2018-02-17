require('./bootstrap');

window.Vue = require('vue');

let VcNav = require('./components/navbar')
let VcHome = require('./components/home')
let VcDispesas = require('./components/dispesas')
let VcGanhos = require('./components/ganhos/ganhos')
const app = new Vue({
    el: '#app',
    components:{
    	VcNav,
    	VcHome,
    	VcDispesas,
    	VcGanhos
    }
});
