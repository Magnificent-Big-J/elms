<template>
<div class="card">
    <div class="card-header">Profile Information</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p class="lead">Name: {{user[0].name}}</p>
                <p class="lead">Surname: {{user[0].surname}}</p>
                <p class="lead">Gender: {{user[0].gender}}</p>
                <p class="lead">Email: {{user[0].email}}</p>
                <p class="lead">Contact Number: {{user[0].contact_number}}</p>
                <p class="lead">Address: {{user[0].address}}, {{user[0].postal_code}}</p>
            </div>
            <div class="col-md-6">
                <h4>Update Contact Information</h4>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" :class="{'is-invalid':errors.contact_number}" name="contact_number" v-model="useru.contact_number">
                    <small class="text-danger" v-if="errors.contact_number">{{errors.contact_number[0]}}</small>
                </div>
                <div class="form-group">
                    <label for="email">Email Address </label>
                    <input type="email" class="form-control" :class="{'is-invalid':errors.email}" id="email" name="email" v-model="useru.email">
                    <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" @click="update">
                        Update
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "profile",
        data(){return{
            user:{},
            useru:{
                contact_number:'',
                email:''
            },
            errors:{}
        }},
        methods:{
            get_profile_info(){
                axios.get('/get_profile')
                        .then((response)=>{
                        this.user =   response.data

                })
                .catch((errors)=>{
                        console.log(errors)
                })
            },
            update(){
                axios.put('/update_user/',this.useru)
                    .then((response)=>{
                    swal(
                       'Updated',
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
            this.get_profile_info()
        }
    }
</script>

<style scoped>

</style>