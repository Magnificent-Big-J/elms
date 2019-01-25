<template>
    <div class="card">
        <div class="card-header">
          Ward Councilor  Meetings

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <div class="row">
                <div class="col-md-4 mb-2" v-for="meeting in meetings">
                    <div class="card">
                        <div class="card-header">Meeting Agenda:{{meeting.meeting_type.description}} </div>
                        <div class="card-body">
                            <p class="lead">
                                Address: {{meeting.address}}
                            </p>
                            <p class="lead">
                                From : {{meeting.start_date}}
                            </p>
                            <p class="lead">
                                To : {{meeting.end_date}}
                            </p>
                            <p class="lead">
                                Ward Councilor: {{meeting.user.name}} {{meeting.user.surname}} (Ward - {{meeting.user.ward_no}}  )
                            </p>
                        </div>

                    </div>
                </div>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_meetings(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_meetings(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</template>


<script>
    export default {
        name: "ward-council-meetings",
        data(){return{
            data_isLoading:false,
            meetings:{},
            pagination:{},
            url:'/get_ward_meeting'
        }},
        methods:{
            get_meetings(page_url){
                        this.isLoading = true
                         let vm = this;
                        page_url = page_url || this.url
                        axios.get(page_url)
                            .then((response)=>{
                            this.isLoading = false
                            this.meetings = response.data.data
                        vm.makePagination(response.data.meta, response.data.links);
                    })
                    .then((error)=>{
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
            },
        },
        created(){
            this.get_meetings()
        }
    }
</script>

<style scoped>

</style>