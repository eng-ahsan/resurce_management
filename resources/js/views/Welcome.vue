<template>
    <div class="container-fluid">
            <div class="row">
                <div class="col-mid-12" id="app">
                    <a class="btn btn-success icon fa fa-plus" href="/create">Create</a>
                    <Resource />
                </div>
            </div>
        </div>
</template>
<script>
    import Resource from './componenets/Resource.vue';
    export default{
        components: {
            Resource
        }
    }
</script>

<script src="{{asset('js/app.js')}}"></script>
