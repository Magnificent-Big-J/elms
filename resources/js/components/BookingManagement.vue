<template>
    <div class="card">
        <div class="card-header">
            Booking Mananagement

        </div>
        <div class="card-body">

            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>

        </div>
            <div class="row">
                <div class="col-md-3 mb-2" v-for="booking in bookings">
                    <div class="card">
                        <div class="card-header">Booking for : {{booking.booking_type.description}}</div>
                        <div class="card-body">
                            <p class="lead">Address: {{booking.address}}</p>
                            <p class="lead">From: {{booking.start_date}}</p>
                            <p class="lead">To: {{booking.end_date}}</p>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" @click="update(booking.id,1)">Accept</button>
                            <button class="btn btn-danger" @click="update(booking.id,2)">Decline</button>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "booking-management",
        data(){return{
            data_isLoading:false,
            bookings:{}
        }},
        methods:{
            get_bookings(){
                this.data_isLoading = true
                axios.get('/get_bookings')
                    .then((response)=>{
                    this.bookings = response.data
                this.data_isLoading = false

            })
            .catch((errors)=>{
                    console.log(errors)
            })
            },
            update(id,value){

                axios.put('/update_booking/'+ id,{value:value})
                    .then((response)=>{
                    swal(
                        response.data.status,
                        response.data.message,
                    'success'
            )
                this.get_meetings()

            })
            .catch((error)=>{
                    console.log(error)
            })
            }
        },
        created(){
            this.get_bookings()
        }
    }
</script>

<style scoped>

</style>