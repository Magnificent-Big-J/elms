<template>
    <div class="card">
        <div class="card-header">
            Meeting Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Create Meeting</button>
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <div class="row">
                <div class="col-md-3 mb-2" v-for="meeting in meetings">
                    <div class="card">
                        <div class="card-header">Meeting Agenda:{{meeting.meeting_type.description}} </div>
                        <div class="card-body">
                            <p class="lead">
                                Address: {{meeting.address}}
                            </p>
                            <p class="lead">
                                From : {{meeting.start_date}}
                            </p>
                            <p class="lead">
                                To : {{meeting.end_date}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" @click="update(meeting.id,1)">Accept</button>
                            <button class="btn btn-danger" @click="update(meeting.id,2)">Decline</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <app-add-meeting></app-add-meeting>
    </div>
</template>


<script>
    import addMeeting from '../components/AddMeeting'
    export default {
        name: "meetings",
        data(){return{
            data_isLoading:false,
            meetings:{}
        }},
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_meetings(){
                this.data_isLoading = true
                axios.get('/get_meetings')
                    .then((response)=>{
                    this.meetings = response.data
                        this.data_isLoading = false

                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            },
            update(id,value){

                axios.put('/meeting_update/'+id,{value:value})
                    .then((response)=>{
                            swal(
                                response.data.status,
                            response.data.message,
                            'success'
                            )
                        this.get_meetings()

                    })
                    .catch((error)=>{
                            console.log(error)
                    })
            }
        },
        components:{
            appAddMeeting:addMeeting
        },
        created(){
            this.get_meetings()
        }
    }
</script>

<style scoped>

</style>