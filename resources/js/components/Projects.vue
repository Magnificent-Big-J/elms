<template>
    <div class="card">
        <div class="card-header">
            Projects Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add New Project</button>
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Project Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="project in projects">
                    <td>{{project.project_name}}</td>
                    <td>{{project.start_date}}</td>
                    <td>{{project.end_date}}</td>
                    <td>{{project.status}}</td>
                    <td>
                        <button class="btn btn-default"  @click="update(project.id,1)">Activate</button>
                        <button class="btn btn-info"   @click="update(project.id,2)">Close </button>
                        <button class="btn btn-success" @click="update(project.id,3)">Cancel</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_projects(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_projects(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    <app-project></app-project>
    </div>
</template>

<script>
    import project from '../components/Project'
    export default {
        name: "projects",
        data(){return{
            data_isLoading:false,
            projects:{},
            pagination:{},
            url:'/get_projects'
        }},
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_projects(page_url){
                let vm = this;
                page_url = page_url || this.url
                this.data_isLoading = true
                axios.get('/get_projects')
                    .then((response)=>{

                this.data_isLoading = false
                this.projects = response.data.data
                vm.makePagination(response.data.meta, response.data.links);

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            update(id,value){

                axios.put('/update_project/'+id,{value:value})
                    .then((response)=>{
                    swal(
                        response.data.status,
                    response.data.message,
                    'success'
            )
                this.get_projects()

            })
            .catch((error)=>{
                    console.log(error)
            })
            },
            makePagination(meta,links)
            {
                let pagination = {
                    current_page : meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            }
        },
        components:{
            appProject:project
        },
        created(){
            this.get_projects()
        }
    }
</script>

<style scoped>

</style>