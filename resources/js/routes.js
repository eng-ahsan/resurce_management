

//Url_provider
import UrlIndex from './components/url/index.vue';
import UrlCreate from './components/url/create.vue';
import UrlEdit from './components/url/edit.vue';
import UrlUserView from './components/url/UserView.vue';

//Html_snippet
import SnippetIndex from './components/Html_snippet/index.vue';
import SnippetCreate from './components/Html_snippet/create.vue';
import SnippetEdit from './components/Html_snippet/edit.vue';
import SnippetView from './components/Html_snippet/UserView.vue';

//pdf
import PdfIndex from './components/pdf/index.vue';
import PdfCreate from './components/pdf/create.vue';
import PdfEdit from './components/pdf/edit.vue';
import PdfDownload from './components/pdf/UserView.vue';



export const routes = [
    {
        path: '/urls',
        component: UrlIndex,
        name: "UrlIndex"
    },
    {
        path: '/url/create',
        component: UrlCreate,
        name: "UrlCreate"
    },
    {
        path: '/url/edit/:id',
        component: UrlEdit,
        name: "UrlEdit"
    },
    {
        path: '/url/users',
        component: UrlUserView,
        name: "UrlUserView"
    },
    {
        path: '/snippets',
        component: SnippetIndex,
        name: "SnippetIndex"
    },
    {
        path: '/snippet/create',
        component: SnippetCreate,
        name: "SnippetCreate"
    },
    {
        path: '/snippet/edit/:id',
        component: SnippetEdit,
        name: "SnippetEdit"
    },
    {
        path: '/snippet/view',
        component: SnippetView,
        name: "SnippetView"
    },
    {
        path: '/resource',
        component: PdfIndex,
        name: "PdfIndex"
    },
    {
        path: '/resource/create',
        component: PdfCreate,
        name: "PdfCreate"
    },
    {
        path: '/resource/edit/:id',
        component: PdfEdit,
        name: "PdfEdit"
    },
    {
        path: '/resource/download',
        component: PdfDownload,
        name: "PdfDownload"
    },
];