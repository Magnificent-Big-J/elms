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
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>

                </thead>
                <tbody>
                <tr v-for="bill in bills">
                    <td>{{bill.amount}}</td>
                    <td>{{bill.bill_month}}</td>
                    <td>{{bill.status}}</td>

                </tr>
                </tbody>
            </table>

        </div>

    </div>
</template>

<script>
    export default {
        name: "my-bills",
        data(){return{
            bills:{},
            data_isLoading:false
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
            }
        },
        created(){
            this.get_user_bills()
        }
    }
</script>

<style scoped>

</style>