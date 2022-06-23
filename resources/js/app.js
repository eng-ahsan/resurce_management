

 require('./bootstrap');

 window.Vue = require('vue').default;
import Vue from 'vue';
 import Vue2editor from 'vue2-editor';
 Vue.use(Vue2editor);
 import VModal from 'vue-js-modal';
 Vue.use(VModal)
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('pdfupload', require('./components/PdfUpload.vue').default);
 Vue.component('pdfdownload', require('./components/Pdfdownload.vue').default);
 Vue.component('html_snippet', require('./components/Html_snippet.vue').default);
 Vue.component('html_snippet_user', require('./components/Html_snippet_user.vue').default);
 Vue.component('urlprovider', require('./components/UrlProvider.vue').default);
 Vue.component('urluser', require('./components/UrlUser.vue').default);
 
 
 const app = new Vue({
    el: '#app',
    components: {
        "vue-html-editor": require("vue-html-editor")
    },
 });
 