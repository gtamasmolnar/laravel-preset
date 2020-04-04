try {
    window.$ = window.jQuery = require('jquery');

    require('stubs/resources/js/bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
