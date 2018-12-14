<template>
    <div class="card">
        <div class="card-header">
           My Bills Historic

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>

                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>

                </thead>
                <tbody>
                <tr v-for="bill in bills">

                    <td>{{bill.bill_month}}</td>
                    <td>R {{bill.amount}}</td>
                    <td>{{bill.status}}</td>
                    <td><button class="btn btn-info" @click="opeModal(bill.id)" >View</button></td>

                </tr>
                </tbody>
            </table>

        </div>
            <app-view-bills :file_path="file_path"></app-view-bills>
    </div>
</template>

<script>
    import mybills from '../components/ViewBill'
    export default {
        name: "my-bills",
         components:{
             appViewBills:mybills
         },
        data(){return{
            bills:{},
            data_isLoading:false,
            file_path:''

        }},
        methods:{
            get_user_bills(){
                this.data_isLoading = true
                axios.get('/get_user_bills')
                    .then((response)=>{
                    this.bills = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            opeModal(id){


                axios.get('/get_mybill/'+ id)
                    .then((response)=>{
                    this.file_path = response.data

                console.log(this.file_path)
                })
                .catch((errors)=>{
                        console.log(errors)
                })

                $("#viewBill").modal('show')



            }
        },
        created(){
            this.get_user_bills()
        }
    }
</script>

<style scoped>

</style>