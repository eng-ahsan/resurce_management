
<template>
    <div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                id="title"
                placeholder="Write title"
                class="form-control"
                v-model="item.title"
            >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description"
                placeholder="Write description"
                class="form-control"
                v-model="item.description" 
                cols="20" rows="5">
            </textarea>
        </div>
        <div class="form-group">
            <label for="description">Html snippet</label>
            <vue-editor
                id="description"
                placeholder="Write here"
                v-model="item.html_snippet"
                />
        </div>
        <div class="btn-group ml-10 float-right">
            <button 
            class="btn btn-success"
            @click="save()">
                {{isEditing ? 'Update': 'Save'}}
            </button>
        </div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of HTML snippet</h2>
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
                list:[],
                item:{
                    title:"",
                    description:"",
                    html_snippet:""
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
                axios.get('api/html-snippet')
                    .then(res => this.list =res.data)
            },
            save(){
                let method = axios.post;
                let url ='api/html-snippet'
                if(this.isEditing){
                    // console.log(isEditing);
                    method = axios.put;
                    url = `api/html-snippet/${this.temp_id}`
                }
                try {
                    method(url, this.item)
                        .then(res =>{
                            this.fatchAll();
                            this.item={
                                title:"",
                                description:"",
                                html_snippet:"",
                            },
                            this.temp_id=null;
                            this.isEditing=false;
                        })
                } 
                catch (e) {
                    console.log(e)
                }
            },
            editTel(resource){
                this.item ={
                    title: resource.title,
                    description: resource.description,
                    html_snippet: resource.html_snippet,
                }
                this.temp_id = resource.id;
                this.isEditing = true

            },
            deleteTel(id){
                try {
                    axios.delete(`/api/html-snippet/${id}`)
                        .then(res => this.fatchAll())
                } catch (e) {
                    
                }
            }
        }
    }
</script>
<style scoped>

</style>
