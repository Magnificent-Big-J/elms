<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Upcoming Projects</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="year">Project Name</label>
                            <input type="text" class="form-control" name="year" :class="{'is-danger':errors.project_name}" v-model="project.project_name">
                            <small class="text-danger" v-if="errors.project_name">{{errors.project_name[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Project Start Date</label>
                            <input type="date" class="form-control" name="start_date" :class="{'is-danger':errors.start_date}" v-model="project.start_date">
                            <small class="text-danger" v-if="errors.start_date">{{errors.start_date[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="end_start">Project End Date</label>
                            <input type="date" class="form-control" name="end_date" :class="{'is-danger':errors.end_date}" v-model="project.end_date">
                            <small class="text-danger" v-if="errors.end_date">{{errors.end_date[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Project Description</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control" :class="{'is-danger':errors.description}" v-model="project.description"></textarea>
                            <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="add_project">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "project",
        data(){return{
            project:{

                project_name:'',
                start_date:'',
                end_date:'',
                description:''
            },
            errors:{}
        }},
        methods:{
            add_project(){
                axios.post('/add_project',this.project)
                    .then((response)=>{
                    swal(
                            'Created',
                            'Upcoming Project is successfully created',
                            'success'
                    )
                        this.$parent.projects.push(response.data)
                        this.project={
                            year:'',
                                project_name:'',
                                start_date:'',
                                end_date:'',
                                description:''
                        }

                    })
                    .catch((error)=>{
                            this.errors = error.response.data.errors
                    })
            }
        }
    }
</script>

<style scoped>

</style>