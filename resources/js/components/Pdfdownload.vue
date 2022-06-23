
<template>
    <div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <h2 class="text-center">List Of PDF</h2>
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
                                    class="btn btn-warning  mr2"
                                    @click="download(item.file_name)"
                                >
                                    Download PDF
                                </button>
                            </td>

                            <a href=""></a>
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
                description:"",
                url:"",
                file_name:"",
                new_tab:false,
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
            download(pdf){

                axios.get("/api/file-download?file=" + pdf, {responseType: 'blob'})
                .then(response => {

                    let blob = new Blob([response.data], { type: 'application/pdf' });
                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = pdf;
                    link.click();

                })
                .catch(e => {
                    console.log(e);
                });
            },
        }
    }
</script>
<style scoped>

</style>
