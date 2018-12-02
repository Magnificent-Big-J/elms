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
            projects:{}
        }},
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_projects(){
                this.data_isLoading = true
                axios.get('/get_projects')
                    .then((response)=>{
                    this.projects = response.data
                this.data_isLoading = false

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