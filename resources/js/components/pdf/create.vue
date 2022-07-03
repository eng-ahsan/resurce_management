
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
        }
    }
</script>
<style scoped>

</style>
