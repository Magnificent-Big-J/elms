<template>
    <div class="card">
        <div class="card-header">
            Budget Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add New Budget</button>
        </div>
        <div class="card-body">

            <table class="table table-hover table-bordered table-stropped">
                <thead>
                    <th>Year</th>
                    <th>Allocated Amount</th>
                    <th>Spent Amount</th>
                    <th>Remaining Amount</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <tr>
                    <td>2018</td>
                    <td>R100000000</td>
                    <td>R100000</td>
                    <td>R10000000</td>
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
        components:{
        appBudget:budget
        },
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            }
        }
    }
</script>

<style scoped>

</style>