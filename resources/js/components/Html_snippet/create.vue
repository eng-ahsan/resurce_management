
<template>
    <div>
        <h2 class="text-center">Create Snippet</h2>
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
            @click="save()">
                Save
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
        },
        methods:{      
            save(){
                let method = axios.post;
                let url ='http://127.0.0.1:8000/api/snippet';
                try {
                    method(url, this.item)
                        .then(response => (
                        this.$router.push({ name: 'SnippetIndex' })
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
