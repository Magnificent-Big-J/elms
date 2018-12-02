<template>
    <div class="card">
        <div class="card-header">
            Application Mananagement

        </div>
            <div class="card-body">

                <div id="loader-wrapper" v-if="data_isLoading" >

                    <div id="loader"></div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-3 mb-2" v-for="application in applications">
                    <div class="card">
                        <div class="card-header">Application for : {{application.plan_type.description}}</div>
                        <div class="card-body">
                            <p class="lead">
                                Motivation:{{application.motivation}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" @click="update(application.id,1)">Accept</button>
                            <button class="btn btn-danger" @click="update(application.id,2)">Decline</button>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "application-management",
        data(){return{
            applications:{},
            data_isLoading:false
        }},
        methods:{

            get_users(){
                this.data_isLoading = true
                axios.get('/get_application')
                    .then((response)=>{
                    this.applications = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            update(id,value){

                axios.put('/application_update/'+ id,{value:value})
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
        created(){
            this.get_users()
        }
    }
</script>

<style scoped>

</style>