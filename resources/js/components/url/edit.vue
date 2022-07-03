
<template>
    <div>
        <h2 class="text-center">Edit Url</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'UrlIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
            </div>
        </div>
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
            @click="updateUrl()">
                Update
            </button>
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
            }
        },
        mounted(){
            this.editUrl(this.$route.params.id);
        },
        methods:{
            updateUrl() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/url/${this.$route.params.id}`, this.item)
                    .then((res) => {
                        this.$router.push({ name: 'UrlIndex' });
                    });
            },
           
            editUrl(id) {
                this.axios.get(`http://127.0.0.1:8000/api/url/${id}`)
                   .then((res) => {
                       this.item = res.data;
                   });
            },

        }
    }
</script>
<style scoped>

</style>
