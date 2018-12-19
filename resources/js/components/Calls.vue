<template>
    <div class="card">
        <div class="card-header">
            Calls Mananagement

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <h5>Status Colour explaination</h5>
            <p >
                <span class="bg-primary">New </span> / <span class="bg-warning">Accepted </span>
            </p>


            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Call Reason</th>
                <th>Logged By</th>
                <th>Address</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="call in calls">
                    <td>{{call.call_type.description}}</td>
                    <td>{{call.user.name}} {{call.user.surname}}</td>
                    <td>{{call.user.address}}</td>
                    <td>{{call.call_date}}</td>
                    <td v-if="call.status == 'new'" class="bg-primary"></td>
                    <td v-else="call.status == 'new'" class="bg-warning"></td>
                    <td>
                        <button class="btn btn-info btn-sm" @click="opeModal(call)">Info</button>
                        <button class="btn btn-warning btn-sm" @click="update(call.id,1)">Accept</button>
                        <button class="btn btn-success btn-sm" @click="update(call.id,2)">Close</button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <app-view-calls :call="call"></app-view-calls>
    </div>
</template>

<script>
    import viewCalls from '../components/ViewCalls'
    export default {
        name: "calls",
        data(){return{
            calls:{},
            data_isLoading:false,
            call:{
                fullname:'',
                call_date:'',
                description:'',
                reason:''

            }
        }},
        components:{
            appViewCalls:viewCalls
        },
        methods:{opeModal(call){
                $("#viewCalls").modal('show')
                this.call.fullname = call.user.name
                this.call.description = call.reason
                this.call.call_date = call.call_date
                this.call.reason = call.call_type.description
            },

            get_calls(){
                this.data_isLoading = true
                axios.get('/get_calls')
                    .then((response)=>{
                    this.calls = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            update(id,value){



                    axios.put('/call_update/'+id,{value:value})
                        .then((response)=>{
                        swal(
                            response.data.status,
                            response.data.message,
                            'success'
                            )
                            this.get_calls()

                        })
                        .catch((error)=>{
                            console.log(error)
                        })
            }
        },
        created(){
            this.get_calls()
        }
    }
</script>

<style scoped>

</style>