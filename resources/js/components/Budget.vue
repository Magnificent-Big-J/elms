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
                            <input type="text" class="form-control" name="year">
                        </div>
                        <div class="form-group">
                            <label for="bamount">Budget Allocated Amount</label>
                            <input type="text" class="form-control" name="bamount">
                        </div>
                        <div class="form-group">
                            <label for="bamount">Budget Description</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>
    export default {
        name: "budget"
    }
</script>

<style scoped>

</style>