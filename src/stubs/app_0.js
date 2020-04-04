require('./bootstrap');

window.Vue = require('vue');


// Example Component
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Laravel Passport related components
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);


const app = new Vue({
    el: '#app',
});
