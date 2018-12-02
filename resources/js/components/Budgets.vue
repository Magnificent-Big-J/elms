<template>
    <div class="card">
        <div class="card-header">
            Budget Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add New Budget</button>
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                    <th>Budget Description</th>
                    <th>Year</th>
                    <th>Allocated Amount</th>
                    <th>Spent Amount</th>
                    <th>Remaining Amount</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="budget in budgets">
                    <td>{{budget.description}}</td>
                    <td>{{budget.year}}</td>
                    <td>R {{budget.allocated_amount}}</td>
                    <td>R {{parseInt(budget.allocated_amount) - parseInt(budget.used_amount) }}</td>
                    <td>R {{budget.used_amount}}</td>
                    <td>
                        <button class="btn btn-info">XX</button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <app-budget></app-budget>
    </div>
</template>

<script>
    import budget from '../components/Budget.vue'
    export default {
        name: "budgets",
        data(){return{
            budgets:{},
            data_isLoading:false
        }},
        components:{
        appBudget:budget
        },
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_budgets(){
                this.data_isLoading = true
                axios.get('/get_budgets')
                    .then((response)=>{
                    this.budgets = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            }
        },
        created(){
            this.get_budgets()
        }
    }
</script>

<style scoped>

</style>