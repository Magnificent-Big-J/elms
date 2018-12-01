<template>
    <div class="card">
        <div class="card-header">
            User Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add User</button>
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                </thead>
                <tbody>
                <tr v-for="user in users">
                    <td>{{user.name}}</td>
                    <td>{{user.surname}}</td>
                    <td>{{user.address}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.contact_number}}</td>

                </tr>
                </tbody>
            </table>

        </div>
        <app-add-user></app-add-user>
    </div>
</template>

<script>
    import addUser from '../components/AddUser'
    export default {
        name: "user-management",
        data(){return{
            users:{},
            data_isLoading:false
        }},
        components:{
            appAddUser:addUser
        },
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_users(){
                this.data_isLoading = true
                axios.get('/get_users')
                    .then((response)=>{
                        this.users = response.data
                        this.data_isLoading = false

                    })
                    .catch((errors)=>{
                        console.log(errors)
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