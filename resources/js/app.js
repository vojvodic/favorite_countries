window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap';

import Vue from 'vue';
import CountriesTable from './components/CountriesTable.vue';
import FavoriteCountriesTable from './components/FavoriteCountriesTable.vue';

new Vue({
  el: '#page_content',
  components: {
    'countries-table': CountriesTable,
    'favorite-countries-table': FavoriteCountriesTable
  }
});
