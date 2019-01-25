<template>
    <div class="card">
        <div id="loader-wrapper" v-if="data_isLoading" >

            <div id="loader"></div>

        </div>
        <div class="card-header">Manage Bill Payments</div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-stripped">
                <thead>
                <th>Full Name </th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>

                <th>Action</th>
                </thead>
                <tbody>

                <tr v-for="bill in bills">
                    <td>{{bill.user.name}} {{bill.user.surname}}</td>
                    <td>{{bill.bill_month}}</td>
                    <td>R{{bill.amount}}</td>
                    <td>{{bill.status}}</td>

                    <td><button class="btn btn-info btn-xs" @click="bills_received(bill.id)">Mark  as Payment Received</button></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>


    export default {
        name: "accept-bill",
        data(){return{
            bills:{},
            data_isLoading:false

        }},
        methods:{
            load_bills(){
                //
                this.data_isLoading = true
                axios.get('/get_res_bills')
                    .then((response)=>{
                    this.bills = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            bills_received(id){
                axios.put('/bill_received/'+ id)
                    .then((response)=>{
                    swal(
                       'Bill Payment',
                    response.data.message,
                    'success'
            )
                this.load_bills()

            })
            .catch((error)=>{
                    console.log(error)
            })
            }
        },
        created(){
            this.load_bills()
        }
    }
</script>

<style scoped>

</style>