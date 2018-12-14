<template>
    <div>

        <!-- Modal -->
        <div class="modal fade"  id="billUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Uploading Bill of {{fullname}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="amount" class="col-sm-4 col-form-label text-md-right">Amount</label>
                            <div class="col-md-6">
                                <input type="text" v-model="bill.amount" name="bill_file" class="form-control"  id="amount"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bill_date" class="col-sm-4 col-form-label text-md-right">Bill Date</label>
                            <div class="col-md-6">
                                <input type="date" v-model="bill.bill_date" name="bill_file" class="form-control"  id="bill_date"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bill_file" class="col-sm-4 col-form-label text-md-right">File Upload</label>
                            <div class="col-md-6">
                                <input type="file" name="bill_file" @change="uploadBill" class="form-control"  id="bill_file"  >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="upload">Upload Bill</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "bill-upload",
        props:['id','fullname'],
        data(){return{
            bill:{
                amount:'',
                bill_file:'',
                bill_date:''
            }
        }},
        methods:{
            upload(){
                let formData = new FormData();

                formData.append('amount',this.bill.amount);
                formData.append('bill_file',this.bill.bill_file);
                formData.append('bill_date',this.bill.bill_date);
                formData.append('id',this.id);


                if(this.bill.amount && this.bill.bill_file && this.bill.bill_date){
                    axios.post('/bill_upload',formData)
                        .then((response)=>{
                        swal(
                        'Submitted',
                        'Bill Uploaded Successefully',
                        'success'
                )
                    this.bill={
                        amount:'',
                        bill_file:'',
                        bill_date:''

                    }
                })
                .catch((error)=>{
                        this.errors = error.response.data.errors
                })
                }
                else{
                    swal(
                        'Fields are empty',
                        'Fields cannot be empty',
                        'error'
                    )
                }
            },
            uploadBill(e){
                this.bill.bill_file = e.target.files[0]
            }
        }
    }
</script>

<style scoped>

</style>