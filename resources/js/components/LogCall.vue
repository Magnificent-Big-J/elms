<template>
    <div class="card">
        <div class="card-header">Log calls online regarding (water, electricity, sewage and potholes)</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group row text-center">
                        <label for="call_type_id" class="col-sm-4 col-form-label text-md-right">Book ward councilor for </label>

                        <div class="col-md-6">
                            <select name="call_type_id" id="call_type_id" v-model="call.call_type_id" :class="{'is-invalid':errors.call_type_id}"  class="form-control">
                                <option value="">Select Call Type</option>


                                <option v-for="call in calls" :value="call.id" v-text="call.description"></option>
                            </select>
                            <small class="text-danger" v-if="errors.call_type_id">{{errors.call_type_id[0]}}</small>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="reason" class="col-sm-4 col-form-label text-md-right">Reason</label>

                        <div class="col-md-6">
                            <textarea v-model="call.reason" :class="{'is-invalid':errors.reason}" name="reason" id="reason" cols="30" rows="10" class="form-control"></textarea>
                            <small class="text-danger" v-if="errors.reason">{{errors.reason[0]}}</small>

                        </div>
                    </div>

                    <div class="form-group row text-center offset-md-3">
                        <button class="btn btn-primary" @click="Log_Call">Log A Call</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "log-call",
        data(){return{
            calls:{},
            call:{
                call_type_id:'',
                reason:''
            },
            errors:{}
        }},
        methods:{
            Log_Call(){

                    axios.post('/addCall',this.call)
                        .then((response)=>{
                        swal(
                        'Created',
                        'Call is successfully logged',
                        'success'
                     )



                })
                .catch((error)=>{
                        this.errors = error.response.data.errors
                })
                this.call={
                    call_type_id:'',
                    reason:''
                }

            },
            get_call_types(){
                axios.get('/get_call_types')
                    .then((response)=>{
                    this.calls = response.data
            })
            .catch((errors)=>{
                    console.log(errors)
            })
            }
        },
        created(){
            this.get_call_types()
        }
    }
</script>

<style scoped>

</style>