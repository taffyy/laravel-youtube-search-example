/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('search-result', require('./components/SearchResult.vue'));

const app = new Vue({
    el: '#app',

    data: {
        searchQuery: "",
        nextPageToken: "",
        searchResults: [],
        isLoading: false
    },

    methods: {
        getSearchResults() {
            this.isLoading = true;
            axios.post('/api/search', {query: this.searchQuery, max_results: 10, pageToken: this.nextPageToken})
                .then(response => {
                    this.searchResults = this.searchResults.concat(response.data.items);
                    this.nextPageToken = response.data.nextPageToken;
                    this.isLoading = false;
                });
        }
    }
});
