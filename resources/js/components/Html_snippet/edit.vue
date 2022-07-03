
<template>
    <div>
        <h2 class="text-center">Edit Snippet</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'SnippetIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
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
        <div class="btn-group ml-10">
            <button 
            class="btn btn-success"
            @click="updateSnippet()">
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
                    description:"",
                    html_snippet:""
                },
                temp_id:null,
                isEditing:false
            }
        },
        mounted(){
            this.editSnippet(this.$route.params.id);
        },
        methods:{      
            updateSnippet() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/snippet/${this.$route.params.id}`, this.item)
                    .then((res) => {
                        this.$router.push({ name: 'SnippetIndex' });
                    });
            },
           
            editSnippet(id) {
                this.axios.get(`http://127.0.0.1:8000/api/snippet/${id}`)
                   .then((res) => {
                       this.item = res.data;
                   });
            },
            
        }
    }
</script>
<style scoped>

</style>
