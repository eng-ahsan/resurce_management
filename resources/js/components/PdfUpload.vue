
<template>
    <div>
        <form @submit="formSubmit" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                    id="title"
                    placeholder="Write title"
                    class="form-control"
                    v-model="title"
                >
            </div>
            <div class="form-group" >
                <label for="attachment">New pdf</label>
                <input type="file" 
                class="form-control" 
                accept="application/pdf,application/vnd.ms-excel"
                @change="onChangeFile"
                >

            </div>
            <button class="btn btn-success">Submit</button>
        </form>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of PDF</h2>
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
                                 <button 
                                    class="btn btn-primary btn-sm mr2"
                                    @click="editTel(item)"
                                >
                                    Edit
                                </button>
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
                axios.get('api/resources')
                    .then(res => this.list =res.data)
            },
            onChangeFile(e){
                this.pdf = e.target.files[0];
            },
            formSubmit(e){
                e.preventDefault();
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let formData = new FormData();
                formData.append('pdf', this.pdf);
                formData.append('title', this.title );
                
                let method = axios.post;
                console.log(this.item);
                let url ='api/resources';
                if(this.isEditing){
                    method = axios.put;
                    url = `api/resources/${this.temp_id}`
                }
                try {
                    method(url, formData, config)
                        .then(res =>{
                            this.fatchAll();
                            this.title="";
                            this.temp_id=null;
                            this.isEditing=false;
                            this.pdf="";
                        })
                } 
                catch (e) {
                    console.log(e)
                }
            },
            editTel(resource){
                
                this.title= resource.title;
                this.file_name= resource.file_name;
                this.temp_id = resource.id;
                this.isEditing = true

            },
            deleteTel(id){
                try {
                    axios.delete(`/api/resources/${id}`)
                        .then(res => this.fatchAll())
                } catch (e) {
                    
                }
            }
        }
    }
</script>
<style scoped>

</style>
