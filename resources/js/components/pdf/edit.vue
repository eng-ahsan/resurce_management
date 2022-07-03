
<template>
    <div>
        <h2 class="text-center">Pdf Upload</h2>
        <div class="col-md-12">
            <router-link :to="{ name: 'PdfIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
        </div>
        <form @submit="formSubmit" enctype="multipart/form-data">
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
                <label for="title">pdf name</label>
                <input type="text"
                    id="file_name"
                    placeholder="Write title"
                    class="form-control"
                    v-model="item.file_name"
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
            <button class="btn btn-success">Update</button>
        </form>
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
                item:{},
                pdf:'',
                title:"",
                file_name:"",
                temp_id:null,
                isEditing:false
            }
        },
        mounted(){
            this.editPdf(this.$route.params.id);
        },
        methods:{
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
                let url ='http://127.0.0.1:8000/api/resource';
                try {
                    method(url, formData, config)
                        .then(response => (
                        this.$router.push({ name: 'PdfIndex' })
                    ))
                } 
                catch (e) {
                    console.log(e)
                }
            },
            editPdf(id) {
                
                this.axios.get(`http://127.0.0.1:8000/api/resource/${id}`)
                   .then((res) => {
                       this.item = res.data;
                   });
            },
        }
    }
</script>
<style scoped>

</style>
