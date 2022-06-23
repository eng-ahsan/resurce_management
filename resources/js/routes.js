const Welcome = () => import('./components/Resource.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const User_view = () => import('./components/User_view.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const Html_snippet_user = () => import('./components/Html_snippet_user.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const Html_snippet = () => import('./components/Html_snippet' /* webpackChunkName: "resource/js/components/category/edit" */)
const UrlProvider = () => import('./components/UrlProvider' /* webpackChunkName: "resource/js/components/category/edit" */)
const UrlProviderView = () => import('./components/UrlProviderView' /* webpackChunkName: "resource/js/components/category/edit" */)



export const routes = [

    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'userview',
        path: '/user_view',
        component: User_view
    },
    {
        name: 'html_snippet_user',
        path: '/html_snippet_user',
        component: Html_snippet_user
    },
    {
        name: 'html_snippet',
        path: '/html_snippet',
        component: Html_snippet
    },
    {
        name: 'urlProvider',
        path: '/url_provider',
        component: UrlProvider
    },
    {
        name: 'urlProviderview',
        path: '/url_provider_view',
        component: UrlProviderView
    },
]