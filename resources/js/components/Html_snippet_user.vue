
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
                                <button type="button" class="btn btn-primary" @click="show(item.id)">
                                    Show
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <modal name="example">
            <button @click="$modal.hide('example')">
                    ❌
            </button>
            <span>{{ item.html_snippet }}</span>
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
                    html_snippet:"hello"
                },
                temp_id:null,
            }
        },
        mounted(){
            this.fatchAll();
        },
        methods:{
            fatchAll(){
                axios.get('api/html-snippet')
                    .then(res => this.list =res.data)
            },
             show(resource){
                // console.log(resource);
                this.$modal.show('example');

                this.item ={
                    html_snippet: resource.html_snippet,
                }
                
            

            },
        }
    }
</script>
<style scoped>

</style>
