<template>
    <div class="card">
        <div class="card-header">
            Projects Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add New Project</button>
        </div>
        <div class="card-body">

            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Project Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr>
                    <td>Fixing tire road</td>
                    <td>2018-11-30</td>
                    <td>2018-12-30</td>
                    <td>Active</td>
                    <td>
                        <button class="btn btn-info">XX</button>
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
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            }
        },
        components:{
            appProject:project
        }
    }
</script>

<style scoped>

</style>