<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="budgetUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Community Budget Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="year">Budget Year</label>
                            <input type="text" class="form-control" name="year" :class="{'is-invalid':errors.year}" v-model="upbudget.year">
                            <small class="text-danger" v-if="errors.year">{{errors.year[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="allocated_amount">Budget Allocated Amount</label>
                            <input type="text" class="form-control" name="bamount" :class="{'is-invalid':errors.allocated_amount}" v-model="upbudget.allocated_amount">
                            <small class="text-danger" v-if="errors.allocated_amount">{{errors.allocated_amount[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Budget Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" :class="{'is-invalid':errors.description}" v-model="upbudget.description"></textarea>
                            <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="used_amount">Budget Used Amount</label>
                            <input type="text" class="form-control" name="bamount" :class="{'is-invalid':errors.used_amount}" v-model="upbudget.used_amount">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "update-budget",
        data(){return{
            upbudget:{

            },
            errors:{}
        }},
        methods:{
            update(){

                    axios.put('/update_budget',this.upbudget)
                        .then((response)=>{
                            swal(
                                response.data.type,
                                response.data.message,
                                response.data.status
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