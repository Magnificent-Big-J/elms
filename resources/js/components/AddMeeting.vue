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


                                <div class="form-group row text-center">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">Meeting Type</label>

                                    <div class="col-md-6">
                                        <select :class="{'is-invalid':errors.meeting_type_id}" name="plan_type_id" v-model="meeting.meeting_type_id" id="plan_type_id" class="form-control">
                                            <option value="">Select Meeting Type </option>
                                            <option v-for="meeting in meetings" :value="meeting.id" v-text="meeting.description"></option>
                                        </select>
                                        <small class="text-danger" v-if="errors.meeting_type_id">{{errors.meeting_type_id[0]}}</small>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <label for="address" class="col-sm-4 col-form-label text-md-right">Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" v-model="meeting.address" :class="{'is-invalid':errors.address}" class="form-control" name="address"  >
                                        <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>

                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date And Time</label>

                                    <div class="col-md-6">
                                        <input v-model="meeting.start_date" type="datetime-local" id="start_date"
                                               name="start_date" value="2018-06-12T19:30"
                                                class="form-control" :class="{'is-invalid':errors.start_date}">

                                        <small class="text-danger" v-if="errors.start_date">{{errors.start_date[0]}}</small>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date And Time</label>

                                    <div class="col-md-6">
                                        <input v-model="meeting.end_date" type="datetime-local" id="end_date"
                                               name="end_date" value="2018-06-12T19:30"
                                               class="form-control" :class="{'is-invalid':errors.end_date}">
                                        <small class="text-danger" v-if="errors.end_date">{{errors.end_date[0]}}</small>
                                    </div>
                                </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="create_meeting">Create Meeting</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        name: "add-meeting",
        data(){return{
            meeting:{
                meeting_type_id:'',
                address:'',
                start_date:'',
                end_date:''
            },
            meetings:{},
            errors:{}
        }},
        methods:{
            get_meeting_types(){


                axios.get('/get_meeting_type')
                    .then((response)=>{
                            this.meetings = response.data
                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            },
            create_meeting(){
                axios.post('/createMeeting',this.meeting)
                    .then((response)=>{
                    swal(
                    'Created',
                    'Meeting is successfully created',
                    'success'
            )
                this.$parent.meetings.push(response.data)
                this.meeting = {
                    meeting_type_id:'',
                        address:'',
                        start_date:'',
                        end_date:''
                }
                this.get_meetings()
            })
            .catch((error)=>{
                    this.errors = error.response.data.errors
            })
            }


        },
        created(){
            this.get_meeting_types()
        }

    }
</script>

<style scoped>

</style>