
<template>
    <div>
  
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of Link</h2>
                <table class="table table-hover table-bordered table-striped dataTable no-footer table-sm text-center" role="grid" aria-describedby="sampleTable_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in list"
                            :key="item.id"
                        >
                            <td>{{item.title}}</td>
                            <td>{{item.url}}</td>
                            <td>
                                <a :href="item.url" :target="item.new_tab==1?'_blank':''">visit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                    url:"",
                    new_tab:false
                    // file_name:""
                },
                temp_id:null,
                isEditing:false
            }
        },
        mounted(){
            this.fatchAll();
        },
        methods:{
            fatchAll(){
                axios.get('api/url-provide')
                    .then(res => this.list =res.data)
            },
            
        }
    }
</script>
<style scoped>

</style>
