<template>
    <div class="card">
        <div class="card-header">
            Meeting Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Create Meeting</button>
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
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" @click="update(meeting.id,1)">Accept</button>
                            <button class="btn btn-danger" @click="update(meeting.id,2)">Decline</button>
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
        <app-add-meeting></app-add-meeting>
    </div>
</template>


<script>
    import addMeeting from '../components/AddMeeting'
    export default {
        name: "meetings",
        data(){return{
            data_isLoading:false,
            meetings:{},
            pagination:{},
            url:'/get_meetings'
        }},
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_meetings(page_url){
                this.data_isLoading = true
                let vm = this;
                page_url = page_url || this.url
                axios.get(page_url)
                    .then((response)=>{

                        this.data_isLoading = false
                this.meetings = response.data.data
                vm.makePagination(response.data.meta, response.data.links);
                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            },
            update(id,value){

                axios.put('/meeting_update/'+id,{value:value})
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
        components:{
            appAddMeeting:addMeeting
        },
        created(){
            this.get_meetings()
        }
    }
</script>

<style scoped>

</style>