<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="viewCalls" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logged By {{call.fullname}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-hover table-bordered table-stropped">
                            <tr>
                                <td>Call Reason</td>
                                <td>{{call.reason}}</td>
                            </tr>
                            <tr>
                                <td>Reason</td>
                                <td>{{call.description}}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{call.call_date}}</td>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "view-calls",
        props:['call'],


    }
</script>

<style scoped>

</style>