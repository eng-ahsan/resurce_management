
<template>
    <div>
        <!-- <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                id="title"
                placeholder="Write title"
                class="form-control"
                v-model="item.title"
            >
        </div>
        <div class="form-group">
            <label for="url">Link</label>
            <input type="text"
                id="url"
                placeholder="Write the link"
                class="form-control"
                v-model="item.url"
            >
        </div>
        <div class="form-group">
            <input type="checkbox"
                id="new_tab"
                v-model="item.new_tab"
            >
            <label for="new_tab"> Open for a new tab?</label>
        </div>
        <div class="btn-group ml-10 ">
            <button 
            class="btn btn-success"
            @click="save()">
                {{isEditing ? 'Update': 'Save'}}
            </button>
        </div> -->
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of Link</h2>
            <div class="row">
                <div class="col-md-12">
                    <router-link :to="{ name: 'UrlCreate' }" class="btn btn-primary btn-sm float-right mb-2">Create Url</router-link>
                </div>
            </div>
                <table class="table table-hover table-bordered table-striped dataTable no-footer table-sm text-center" role="grid" aria-describedby="sampleTable_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Tab option</th>
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
                                <p v-if="item.new_tab == 1">New tab</p>
                                <p v-else>Current tab</p>
                            </td>
                            <td>
                                 <router-link class="btn btn-success btn-sm" :to="{ name: 'UrlEdit', params: { id: item.id }}">Edit</router-link>
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
                    url:"",
                    new_tab:false
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
                axios.get('http://127.0.0.1:8000/api/url')
                    .then(res => this.list =res.data)
            },
            // save(){
            //     let method = axios.post;
            //     let url ='http://127.0.0.1:8000/api/url'
            //     if(this.isEditing){
            //         method = axios.put;
            //         url = `http://127.0.0.1:8000/api/url/${this.temp_id}`
            //     }
            //     try {
            //         method(url, this.item)
            //             .then(res =>{
            //                 this.fatchAll();
            //                 this.item={
            //                     title:"",
            //                     url:"",
            //                     new_tab:false
            //                 },
            //                 this.temp_id=null;
            //                 this.isEditing=false;
            //             })
            //     } 
            //     catch (e) {
            //         console.log(e)
            //     }
            // },
            // editTel(resource){
            //     this.item ={
            //         title: resource.title,
            //         url: resource.url,
            //         new_tab: resource.new_tab
            //     }
            //     this.temp_id = resource.id;
            //     this.isEditing = true

            // },
            deleteTel(id){
                try {
                    axios.delete(`http://127.0.0.1:8000/api/url/${id}`)
                        .then(res => this.fatchAll())
                } catch (e) {
                    
                }
            }
        }
    }
</script>
<style scoped>

</style>
