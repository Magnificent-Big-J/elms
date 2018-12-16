<template>
    <div class="card">
        <div class="card-header">
            Meetings To Be Attended
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-stripped table-bordered">
                <thead>
                    <th>Agenda</th>
                    <th>Address</th>
                    <th>From</th>
                    <th>To</th>

                </thead>
                <tbody>
                <tr v-for="meeting in meetings">
                    <td>{{meeting.meeting_type.description}}</td>
                    <td>{{meeting.address}}</td>
                    <td>{{meeting.start_date}}</td>
                    <td>{{meeting.end_date}}</td>

                </tr>
                </tbody>
            </table>


        </div>

    </div>
</template>

<script>
    export default {
        name: "ward",
        data(){return{data_isLoading:false,
            meetings:{}
        }},
        methods:{
            get_meetings(){
                this.data_isLoading = true
                axios.get('/wardCouncil')
                    .then((response)=>{
                    this.meetings = response.data
                this.data_isLoading = false

                })
                .catch((errors)=>{
                        console.log(errors)
                })
                }
        },
        created(){
            this.get_meetings()
        }
    }
</script>

<style scoped>

</style>