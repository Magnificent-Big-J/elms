<template>

    <!-- Modal -->
    <div class="modal fade"  id="viewBill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Document View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <pdf :src="file_path"
                         ref="myPdfComponent"
                    ></pdf>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" @click="$refs.myPdfComponent.print()">Print</button>
                    <button class="btn btn-info" @click="downloadFile">Download</button>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import pdf from 'vue-pdf'

    export default {
        name: "view-bill",
        components: {
            pdf
        },
        props:['file_path'],
        methods:{
            downloadFile(){
                window.location.href = this.file_path
            }
        }


    }
</script>

<style scoped>

</style>