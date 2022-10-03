<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link :to="{ name: 'UrlIndex' }"  class="nav-item nav-link">Url </router-link>
                    <router-link :to="{ name: 'SnippetIndex' }"  class="nav-item nav-link">Snippet </router-link>
                    <router-link :to="{ name: 'PdfIndex' }"  class="nav-item nav-link">Pdf</router-link>
                    <router-link :to="{ name: 'UrlUserView' }"  class="nav-item nav-link float-right">Url User</router-link>
                    <router-link :to="{ name: 'PdfDownload' }"  class="nav-item nav-link float-right">Pdf Download</router-link>
                    <router-link :to="{ name: 'SnippetView' }"  class="nav-item nav-link float-right">Html Snippet user</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>
