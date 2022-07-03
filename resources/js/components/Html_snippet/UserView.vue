
<template>
    <div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">HTML SNIPPET</h2>
                <table class="table table-hover table-bordered table-striped dataTable no-footer table-sm text-center" role="grid" aria-describedby="sampleTable_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in list"
                            :key="item.id"
                        >
                            <td>{{item.title}}</td>
                            <td>{{item.description}}</td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-primary" 
                                    @click="show(item)">
                                    Show HTML Code
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <modal name="example">

            <button @click="$modal.hide('example')">Close</button>
            <button @click="copyRawCode()">Copy Raw Code</button>
            <div v-html="htmlSnippet"></div>

        </modal>
      
    </div>
</template>
<script>
export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                list:[],
                item:{
                    title:"",
                    description:"",
                    htmlSnippet:""
                },
                temp_id:null,
                htmlSnippet: ''
            }
        },
        mounted(){
            this.fatchAll();
        },
        methods:{
            fatchAll(){
                axios.get('http://127.0.0.1:8000/api/snippet')
                    .then(res => this.list =res.data)
            },
             show(item){
                this.htmlSnippet = item.html_snippet;
                this.$modal.show('example');
            },
            copyRawCode(){
                this.$copyText(this.htmlSnippet)
                    .then(function (e) {
                        alert('Copied');
                        // console.log(e);
                    }, function (e) {
                        alert('Can not copy');
                        // console.log(e);
                    });
            }
        }
    }
</script>
<style scoped>

</style>
