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
                    <th>Remaining Amount</th>
                    <th> Spent Amount</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="budget,key in budgets">
                    <td>{{budget.description}}</td>
                    <td>{{budget.year}}</td>
                    <td>R {{budget.allocated_amount}}</td>
                    <td v-if="budget.used_amount>0">R {{parseInt(budget.allocated_amount) - parseInt(budget.used_amount) }}</td>
                    <td v-else>R 0</td>
                    <td>R {{budget.used_amount}}</td>
                    <td>
                        <button class="btn btn-info" @click="budgetup(key)">Edit</button>

                    </td>
                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_budgets(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_budgets(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
        <app-budget></app-budget>
        <app-update-budget></app-update-budget>
    </div>
</template>

<script>
    import budget from '../components/Budget.vue'
    import updateBudget from '../components/UpdateBudget'
    export default {
        name: "budgets",
        data(){return{
            budgets:{},
            data_isLoading:false,
            pagination:{},
            url:'/get_budgets'
        }},
        components:{
            appBudget:budget,
            appUpdateBudget: updateBudget
        },
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_budgets(page_url){
                this.data_isLoading = true
                let vm = this;
                page_url = page_url || this.url
                axios.get(page_url)
                    .then((response)=>{

                this.data_isLoading = false
                this.budgets = response.data.data
                vm.makePagination(response.data.meta, response.data.links);
            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            budgetup(key){
                this.$children[1].upbudget = this.budgets[key]
                $("#budgetUpdate").modal('show')
            },
            makePagination(meta,links)
            {
                let pagination = {
                    current_page : meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            }

        },
        created(){
            this.get_budgets()
        }
    }
</script>

<style scoped>

</style>