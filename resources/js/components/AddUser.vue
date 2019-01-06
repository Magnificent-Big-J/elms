<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 v-if="user.id"  class="modal-title" id="exampleModalLabel">Edit user information</h5>
                        <h5 v-else class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="close" @click="closeMe" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" :class="{'is-invalid':errors.name}" name="name" v-model="user.name">
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="surname">Last Name</label>
                            <input type="text" class="form-control" name="surname" :class="{'is-invalid':errors.surname}" v-model="user.surname">
                            <small class="text-danger" v-if="errors.surname">{{errors.surname[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" :class="{'is-danger':errors.email}" name="email" v-model="user.email">
                            <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>

                            <select name="gender" id="gender" class="form-control" :class="{'is-invalid':errors.gender}" v-model="user.gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <small class="text-danger" v-if="errors.gender">{{errors.gender[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" :class="{'is-invalid':errors.contact_number}" name="contact_type" v-model="user.contact_number">
                            <small class="text-danger" v-if="errors.contact_number">{{errors.contact_number[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="email" class="form-control" name="address" :class="{'is-invalid':errors.address}" v-model="user.address">
                            <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                        </div>

                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="number" class="form-control" name="postal_code" :class="{'is-invalid':errors.postal_code}" v-model="user.postal_code">
                            <small class="text-danger" v-if="errors.postal_code">{{errors.postal_code[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="type">User Type</label>

                            <select name="type" id="gender" class="form-control" :class="{'is-invalid':errors.type}" v-model="user.type">
                                <option value="">Select Type</option>
                                <option value="employee">Employee</option>
                                <option value="ward">Ward Councilor</option>
                                <option value="residence">Residence</option>
                            </select>
                            <small class="text-danger" v-if="errors.type">{{errors.type[0]}}</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeMe">Close</button>
                        <button  v-if="user.id" type="button" class="btn btn-info" @click="updateInfo">Update User Info</button>
                        <button v-else type="button" class="btn btn-primary" @click="addUser">Add User</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "add-user",
        data(){return{
            props:['id'],

            user:{
                id:null,
                name:'',
                surname:'',
                contact_number:'',
                gender:'',
                address:'',
                postal_code:'',
                email:'',
                type:''

            },
            errors:{}
        }},
        methods:{
            addUser(){

                axios.post('/addUser',this.user)
                    .then((response)=>{
                            swal(
                            'Added',
                            'User is successfully added',
                            'success'
                            )
                        this.$parent.users.push(response.data)
                this.user={
                    name:'',
                        surname:'',
                        contact_number:'',
                        gender:'',
                        address:'',
                        postal_code:'',
                        email:'',
                        type:''
                }
                    })
                    .catch((error)=>{
                        this.errors = error.response.data.errors
                    })
            },
            closeMe(){
                $("#addNew").modal('hide')
                this.user={
                    name:'',
                    surname:'',
                    contact_number:'',
                    gender:'',
                    address:'',
                    postal_code:'',
                    email:'',
                    type:''
                }

            },
            updateInfo() {

                //console.log(this.user)

                axios.post('/updateDetails',this.user)
                    .then((response)=>{
                    swal(
                    'Successfully Updated',
                    response.data.message,
                    'success'
                    )

            })
            .catch((error)=>{
                    this.errors = error.response.data.errors
            })


            }
        }
    }
</script>

<style scoped>

</style>