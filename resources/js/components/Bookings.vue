<template>
    <div class="card">
        <div class="card-header">Book ward councilor for funerals or community meetings</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form-group row text-center">
                        <label for="booking_type_id" class="col-sm-4 col-form-label text-md-right">Book ward councilor for </label>

                        <div class="col-md-6">
                            <select name="booking_type_id" id="booking_type_id" class="form-control" :class="{'is-invalid':errors.booking_type_id}" v-model="booking.booking_type_id">
                                <option value="">Select Booking </option>
                                <option v-for="booking in bookings" :value="booking.id" v-text="booking.description"></option>
                            </select>
                            <small class="text-danger" v-if="errors.booking_type_id">{{errors.booking_type_id}}</small>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="address" class="col-sm-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address"  :class="{'is-invalid':errors.address}" v-model="booking.address">
                            <small class="text-danger" v-if="errors.address">{{errors.address}}</small>

                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date And Time</label>

                        <div class="col-md-6">
                            <input type="datetime-local" id="start_date"
                                   name="start_date" value="2018-06-12T19:30"
                                  class="form-control" :class="{'is-invalid':errors.start_date}" v-model="booking.start_date">
                            <small class="text-danger" v-if="errors.start_date">{{errors.start_date}}</small>

                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date And Time</label>

                        <div class="col-md-6">
                            <input type="datetime-local" id="end_date"
                                   name="end_date" value="2018-06-12T19:30"
                                   class="form-control" :class="{'is-invalid':errors.end_date}" v-model="booking.end_date">
                            <small class="text-danger" v-if="errors.end_date">{{errors.end_date}}</small>

                        </div>
                    </div>
                    <div class="form-group row text-center offset-md-3">
                        <button class="btn btn-primary" @click="make_booking">Make a Booking</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "bookings",
        data(){return{
            booking:{
                booking_type_id:'',
                address:'',
                start_date:'',
                end_date:''
            },
            errors:{},
            bookings:{},
        }},
        methods:{
           make_booking(){

               axios.post('/add_booking',this.booking)
                   .then((response)=>{
                   swal(
                   'Created',
                   'Booking is successfully made',
                   'success'
                    )

                       this.booking={
                           booking_type_id:'',
                           address:'',
                           start_date:'',
                           end_date:''}


                   })
                   .catch((error)=>{
                           this.errors = error.response.data.errors
                   })
           },
            get_booking_types(){
                axios.get('/get_booking_types')
                    .then((response)=>{
                    this.bookings = response.data
                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            }
        },
        created(){
            this.get_booking_types()
        }
    }
</script>

<style scoped>

</style>