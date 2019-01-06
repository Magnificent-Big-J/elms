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
                <div class="col-md-4 mb-2" v-for="booking in bookings">
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
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_bookings(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_bookings(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>


</template>

<script>
    export default {
        name: "booking-management",
        data(){return{
            data_isLoading:false,
            bookings:{},
            pagination:{},
            url:'/get_bookings'
        }},
        methods:{
            get_bookings(page_url){
                let vm = this;
                page_url = page_url || this.url
                this.data_isLoading = true
                axios.get('/get_bookings')
                    .then((response)=>{

                this.data_isLoading = false
                this.bookings = response.data.data
                vm.makePagination(response.data.meta, response.data.links);

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
            this.get_bookings()
        }
    }
</script>

<style scoped>

</style>