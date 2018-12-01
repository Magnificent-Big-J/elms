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
                        <div class="form-group row text-center">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Motivate</label>

                            <div class="col-md-6">

                                <textarea class="form-control" name="motivation" id="motivation" v-model="plan.motivation" :class="{'is-danger':errors.motivation}"></textarea>
                                <small class="text-danger" v-if="errors.motivation">{{errors.motivation[0]}}</small>
                            </div>
                        </div>
                        <div class="form-group row text-center offset-md-3">
                            <button class="btn btn-primary" @click="apply">Apply</button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "apply",
        data(){return{
            plan:{
                plan_type_id:'',
                motivation:''

            },
            plans:{},
            errors:{}
        }},
        methods:{
            apply(){

            },
            get_plans(){

            }
        },
        created(){
            this.get_plans()
        }
    }
</script>

<style scoped>

</style>