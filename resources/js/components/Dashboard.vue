<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Booking Statistics</div>
                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <td>New Bookings</td>
                                <td> <span class="badge badge-primary">{{calls.newBooking}}</span></td>
                            </tr>
                            <tr>
                                <td>Accepted Bookings</td>
                                <td><span class="badge badge-info"> {{calls.acceptedBooking}}</span></td>
                            </tr>
                            <tr>
                                <td>Declined Booking</td>
                                <td><span class="badge badge-danger">{{calls.closedBooking}}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Meeting Statics</div>
                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <td>New Meetings</td>
                                <td><span class="badge badge-primary">{{calls.newMeeting}}</span></td>
                            </tr>
                            <tr>
                                <td>Accepted Meetings</td>
                                <td><span class="badge badge-info">{{calls.acceptedMeeting}}</span></td>
                            </tr>
                            <tr>
                                <td>Declined Meeting</td>
                                <td><span class="badge badge-danger">{{calls.declinedMeeting}}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Call Statistics</div>
                    <div class="card-body">
                    <table class="table">

                        <tr>
                            <td>New Calls</td>
                            <td><span class="badge badge-primary">{{calls.newCalls}}</span></td>
                        </tr>
                        <tr>
                            <td>Accepted Calls</td>
                            <td><span class="badge badge-info">{{calls.acceptedCalls}}</span></td>
                        </tr>
                        <tr>
                            <td>Closed Calls</td>
                            <td><span class="badge badge-danger">{{calls.closedCalls}}</span></td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Budget</div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-stropped">
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
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-stropped">
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
                </div>
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