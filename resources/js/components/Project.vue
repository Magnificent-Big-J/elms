<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Upcoming Projects</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="year">Project Name</label>
                            <input type="text" class="form-control" name="year">
                        </div>
                        <div class="form-group">
                            <label for="bamount">Project Start Date</label>
                            <input type="date" class="form-control" name="bamount">
                        </div>
                        <div class="form-group">
                            <label for="bamount">Project End Date</label>
                            <input type="date" class="form-control" name="bamount">
                        </div>
                        <div class="form-group">
                            <label for="bamount">Project Description</label>
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
        name: "project"
    }
</script>

<style scoped>

</style>