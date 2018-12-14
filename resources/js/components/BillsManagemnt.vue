<template>
    <div class="card">
        <div id="loader-wrapper" v-if="data_isLoading" >

            <div id="loader"></div>

        </div>
        <div class="card-header">Bills Management</div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-stripped">
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>

                <th>Action</th>
                </thead>
                <tbody>

                <tr v-for="user in users">
                    <td>{{user.name}}</td>
                    <td>{{user.surname}}</td>
                    <td>{{user.address}}</td>

                    <td><button class="btn btn-info btn-xs" @click="opeModal(user.id,user.name,user.surname)">Upload Bills</button></td>
                </tr>

                </tbody>
            </table>
        </div>
        <app-bill-upload  :id="id" :fullname="fullname"></app-bill-upload>
    </div>
</template>

<script>
    import billupload from '../components/BillUpload'
    export default {
        components:{
            appBillUpload:billupload
        },
        name: "bills-managemnt",
        data(){return{
            data_isLoading:false,
            users:{},
            id:'',
            fullname:''
        }},

        methods:{
            load_bills(){
                //
                this.data_isLoading = true
                axios.get('/get_residence')
                    .then((response)=>{
                    this.users = response.data
                this.data_isLoading = false

                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            },
            opeModal(id,name,surname){
                $("#billUp").modal('show')

                this.id = id
                this.fullname = name + ' ' + surname
            }
        },
        created(){
            this.load_bills()
        }
    }
</script>

<style scoped>

</style>