<template>
    <div class="card">
        <div class="card-header">Apply for subsidies or plan approval for house upgrading</div>
        <div class="card-body">

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="form-group row text-center">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Apply for</label>

                            <div class="col-md-6">
                                <select name="plan_type_id" id="plan_type_id" :class="{'is-danger':errors.plan_type_id}" v-model="plan.plan_type_id" class="form-control">
                                    <option value="">Select Option</option>
                                    <option  v-for="plan in plans" :value="plan.id" v-text="plan.description"></option>
                                </select>
                                <small class="text-danger" v-if="errors.plan_type_id">{{errors.plan_type_id[0]}}</small>
                            </div>
                        </div>
                        <div class="form-group row text-center" v-if="plan.plan_type_id ==1">
                            <label for="certified_id" class="col-sm-4 col-form-label text-md-right">Upload Certifiied ID</label>

                            <div class="col-md-6">
                                <input type="file" name="certified_id" @change="uploadCertifiedID" class="form-control"  id="certified_id"  :class="{'is-danger':errors.certified_id}">


                                <small class="text-danger" v-if="errors.certified_id">{{errors.certified_id[0]}}</small>
                            </div>
                        </div>
                        <div class="form-group row text-center" v-if="plan.plan_type_id ==1">
                            <label for="letter" class="col-sm-4 col-form-label text-md-right">Upload Letter</label>

                            <div class="col-md-6">
                                <input type="file" name="letter" @change="uploadLetter" class="form-control"  id="letter"  :class="{'is-danger':errors.letter}">


                                <small class="text-danger" v-if="errors.letter">{{errors.letter[0]}}</small>
                            </div>
                        </div>
                        <div class="form-group row text-center" v-if="plan.plan_type_id ==2">
                            <label for="house_plan" class="col-sm-4 col-form-label text-md-right">Upload House Plan</label>

                            <div class="col-md-6">
                                <input type="file" name="house_plan" @change="uploadHousePlan" class="form-control"  id="house_plan"  :class="{'is-danger':errors.house_plan}">


                                <small class="text-danger" v-if="errors.house_plan">{{errors.house_plan[0]}}</small>
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Motivate</label>

                            <div class="col-md-6">

                                <textarea class="form-control" name="motivation" id="motivation" v-model="plan.motivation" :class="{'is-danger':errors.motivation}"></textarea>
                                <small class="text-danger" v-if="errors.motivation">{{errors.motivation[0]}}</small>
                            </div>
                        </div>

                        <div class="form-group row text-center offset-md-3">
                            <button class="btn btn-primary ml-4" @click="apply">Apply</button>
                            <!--button class="btn btn-primary" @click="test">Test</button-->
                        </div>
                    </div>
                </div>

        </div>

    </div>
</template>

<script>
    import pdf from 'vue-pdf'
    export default {
        name: "apply",
        components:{pdf},
        data(){return{
            plan:{
                plan_type_id:'',
                motivation:'',
                certified_id:'',
                letter:'',
                house_plan:''

            },
            plans:{},
            errors:{}
        }},
        methods:{
            apply(){

                let formData = new FormData();

                formData.append('plan_type_id',this.plan.plan_type_id);
                formData.append('motivation',this.plan.motivation);
                formData.append('certified_id',this.plan.certified_id);
                formData.append('letter',this.plan.letter);
                formData.append('house_plan',this.plan.house_plan);
                if(this.plan.plan_type_id == 1 && this.plan.motivation && this.plan.certified_id && this.plan.letter){
                    this.send_data(formData)
                }else if(this.plan.plan_type_id == 2 && this.plan.motivation && this.plan.house_plan){
                    this.send_data(formData)
                }
                else{
                    swal(
                        'Fields are empty',
                        'Fields cannot be empty',
                        'error'
                    )
                }


            },
            get_plans(){
                axios.get('/get_plan_types')
                    .then((response)=>{
                    this.plans = response.data
            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            updateProfile(e){

                this.plan.certified_id = e.target.files[0]


            },
            test(){
                let formData = new FormData();

                formData.append('plan_type_id',this.plan.plan_type_id);
                formData.append('motivation',this.plan.motivation);
                formData.append('certified_id',this.plan.certified_id);


                    axios.post('saveFile',formData)
                        .then((response)=>{
                        console.log(response)
                })
                .catch((error)=>{
                        console.log(error)
                })

            },
            uploadCertifiedID(e){
                this.plan.certified_id = e.target.files[0]
            },
            uploadLetter(e){
                this.plan.letter = e.target.files[0]
            },
            uploadHousePlan(e){
                this.plan.house_plan = e.target.files[0]
            },
            send_data(formData){
                axios.post('/add_apply',formData)
                    .then((response)=>{
                    swal(
                    'Submitted',
                    'Application is successfully submitted',
                    'success'
            )
                this.plan={
                    plan_type_id:'',
                    motivation:'',
                    certified_id:'',
                    letter:'',
                    house_plan:''

                }
            })
            .catch((error)=>{
                    this.errors = error.response.data.errors
            })
            }

        },
        created(){
            this.get_plans()
        }
    }
</script>

<style scoped>

</style>