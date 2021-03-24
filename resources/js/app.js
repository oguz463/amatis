window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

window.events = new Vue();

window.flash = function(messages) {
  if(typeof messages === "string") messages = [messages]
  window.events.$emit('flash', messages);
}

Vue.component("flash", require("./components/Flash.vue").default);
Vue.component("paginator", require("./components/Paginator.vue").default);

Vue.component("clinics", require("./components/Clinics.vue").default);
Vue.component("equipments", require("./components/Equipments.vue").default);

const app = new Vue({
    el: '#app',
});
