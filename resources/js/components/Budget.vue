<template>

    <div>

        <!-- Modal -->
        <div class="modal fade"  id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Propose project that will uplift the community</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="year">Budget Year</label>
                            <input type="text" class="form-control" name="year" :class="{'is-invalid':errors.year}" v-model="budget.year">
                            <small class="text-danger" v-if="errors.year">{{errors.year[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="allocated_amount">Budget Allocated Amount</label>
                            <input type="text" class="form-control" name="bamount" :class="{'is-invalid':errors.allocated_amount}" v-model="budget.allocated_amount">
                            <small class="text-danger" v-if="errors.allocated_amount">{{errors.allocated_amount[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Budget Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" :class="{'is-invalid':errors.description}" v-model="budget.description"></textarea>
                            <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="addBudget">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>
    export default {
        name: "budget",
        data(){return{
            errors:{},
            budget:{
                year:'',
                allocated_amount:'',
                description:''
            }
        }},
        methods:{
            addBudget(){
                axios.post('/add_budget',this.budget)
                    .then((response)=>{
                    swal(
                    'Added',
                    'Budget is successfully added',
                    'success'
            )
                this.$parent.budgets.push(response.data)
                this.budget={
                    year:'',
                        allocated_amount:'',
                        description:''
                }
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