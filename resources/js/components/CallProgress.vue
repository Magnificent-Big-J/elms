<template>
    <div class="card">
        <div class="card-header">
            Call Progress

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Call Reason</th>
                <th>Logged By</th>
                <th>Accepted By</th>
                <th>Date</th>
                <th>Status</th>

                </thead>
                <tbody>
                <tr v-for="call in calls">
                    <td>{{call.call_type.description}}</td>
                    <td>{{call.user.name}} {{call.user.surname}}</td>
                    <td>{{call.accepted_by}} </td>
                    <td>{{call.call_date}}</td>
                    <td>{{call.status}}</td>

                </tr>
                </tbody>
            </table>

        </div>

    </div>
</template>

<script>
    export default {
        name: "call-progress",
        data(){return{
            calls:{},
            data_isLoading:false,

        }},
        methods:{
            get_call_progress(){
                this.data_isLoading = true
                axios.get('/Calls-Progress')
                    .then((response)=>{
                    this.calls = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
        },

        },
        created(){
            this.get_call_progress()

        }
    }
</script>

<style scoped>

</style>