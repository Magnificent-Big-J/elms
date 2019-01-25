<template>
    <div>

            <h2 class="text-uppercase m-b-20">Booking Statistics</h2>
            <div class="row">

                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Bookings</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.newBooking}}</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Bookings</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.acceptedBooking}}</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Declined Booking</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.closedBooking}}</h1>

                    </div>
                </div>



            </div>

            <!-- end row -->
            <h2 class="text-uppercase m-b-20">Meeting Statics</h2>
            <div class="row">

                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Meetings</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.newMeeting}}</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Meetings</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.acceptedMeeting}}</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Declined Meetings</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.declinedMeeting}}</h1>

                    </div>
                </div>



            </div>

            <h2 class="text-uppercase m-b-20">Call Statistics</h2>
            <div class="row">



                <div class="col-lg-4 col-md-4 ">

                    <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">New Calls</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.newCalls}}</h1>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Accepted Calls</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.acceptedCalls}}</h1>

                    </div>
                </div>

                <div class=" col-lg-4 col-md-4 ">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Closed Calls</h6>
                        <h1 class="m-b-20 text-white counter">{{calls.closedCalls}}</h1>

                    </div>
                </div>



            </div>

        <div class="row">

            <div class="col-lg-6 col-md-6 ">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-bar-chart-o"></i> Budget</h3>

                    </div>

                    <div class="card-body">
                        <table class="table table-responsive-xl table-striped">
                            <thead>
                            <th>Budget Description</th>
                            <th>Allocated Amount</th>


                            </thead>
                            <tbody>
                            <tr v-for="budget in budgets">
                                <td>{{budget.description}}</td>
                                <td>R{{budget.allocated_amount}}</td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <card class="card-footer">
                        <p class="lead">Total Budget :R{{budget.total}}</p>
                        <p class="lead">Total Used Budget :R{{budget.total_used}}</p>
                        <p class="lead">Total Remaining Budget :R{{budget.total_left}}</p>
                    </card>

                </div><!-- end card-->
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-line-chart"></i> Projects</h3>

                    </div>

                    <div class="card-body">
                        <table class="table table-responsive-xl table-striped">
                            <thead>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Project Status</th>

                            </thead>
                            <tbody>
                            <tr v-for="project in projects">
                                <td>{{project.project_name}}</td>
                                <td>{{project.start_date}}</td>
                                <td>{{project.end_date}}</td>
                                <td>{{project.status}}</td>

                            </tr>
                            </tbody>
                        </table>


                    </div>

                </div><!-- end card-->
            </div>

        </div>



    </div>
</template>

<script>
        import stats from './Stats'
        import callStats from '../components/stats/CallsStats'
    export default {
        name: "dashboard",
        data(){return{
            calls:{},
            projects:{},
            budget:{},
            budgets:{},

        }},

        components:{
            appStats:stats,
            appCallStats:callStats
        },
        methods:{
            call_stats(){
                axios.get('/callStats')
                    .then((response)=>{
                    this.calls = response.data
                    })
                    .catch((error)=>{
                            console.log(error)
                    })
            },
            projectStats(){
                axios.get('/projectsStats')
                    .then((response)=>{
                    this.projects = response.data
                    })
                    .catch((error)=>{
                            console.log(error)
                    })
            },
            budgetStats(){
                axios.get('/budgetStats')
                    .then((response)=>{
                    this.budget = response.data.budget
                    this.budgets = response.data.budgets
            })
            .catch((error)=>{
                    console.log(error)
            })
            }

        },
        created(){
            this.call_stats()
            this.projectStats()
            this.budgetStats()
        }

    }
</script>

<style scoped>

</style>