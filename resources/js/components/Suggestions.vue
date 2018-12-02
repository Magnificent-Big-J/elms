<template>
    <div class="card">
        <div class="card-header">Propose project that will uplift the community</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">Propose project name </label>

                        <div class="col-md-6">
                            <input id="name" type="text" v-model="suggestion.name" class="form-control" name="name"  :class="{'is-invalid':errors.name}" >
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="motivation" class="col-sm-4 col-form-label text-md-right">Motivation</label>

                        <div class="col-md-6">
                            <textarea name="motivation" id="motivation" v-model="suggestion.motivation"  :class="{'is-invalid':errors.motivation}"  cols="30" rows="10" class="form-control"></textarea>
                            <small class="text-danger" v-if="errors.motivation">{{errors.motivation[0]}}</small>
                        </div>
                    </div>

                    <div class="form-group row text-center offset-md-3">
                        <button class="btn btn-primary" @click="Suggest">Suggest</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "suggestions",
        data(){return{
            suggestion:{
                name:'',
                motivation:''
            },
            errors:{}
        }},
        methods:{
            Suggest(){
                axios.post('/addsuggession',this.suggestion)
                    .then((response)=>{
                        swal(
                        'Created',
                        'Project Suggestion is successfully created',
                        'success'
                         )
            })
            .catch((error)=>{
                    this.errors = error.response.data.errors
            })
                this.suggestion ={
                    name:'',
                        motivation:''
                }
            }
        }
    }
</script>

<style scoped>

</style>