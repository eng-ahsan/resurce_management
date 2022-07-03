
<template>
    <div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of PDF</h2>
                <div class="col-md-12">
                    <router-link :to="{ name: 'PdfCreate' }" class="btn btn-primary btn-sm float-right mb-2">Pdf  Upload</router-link>
                </div>
                <table class="table table-hover table-bordered table-striped dataTable no-footer table-sm text-center" role="grid" aria-describedby="sampleTable_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>File name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in list"
                            :key="item.id"
                        >
                            <td>{{item.title}}</td>
                            <td>{{item.file_name}}</td>
                            <td>
                                 <!-- <router-link class="btn btn-success btn-sm" :to="{ name: 'PdfEdit', params: { id: item.id }}">Edit</router-link> -->
                                <button 
                                    class="btn btn-danger btn-sm mr2"
                                    @click="deleteTel(item.id)"
                                >
                                    delete
                                </button>
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
                pdf:'',
                form: new FormData,
                list:[],
                pdf:'',
                title:"",
                file_name:"",
                temp_id:null,
                isEditing:false
            }
        },
        mounted(){
            this.fatchAll();
        },
        methods:{
            fatchAll(){
                axios.get('http://127.0.0.1:8000/api/resource')
                    .then(res => this.list =res.data)
            },
            deleteTel(id){
                try {
                    axios.delete(`http://127.0.0.1:8000/api/resource/${id}`)
                        .then(res => this.fatchAll())
                } catch (e) {
                    
                }
            }
            
        }
    }
</script>
<style scoped>

</style>
