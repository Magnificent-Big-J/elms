<template>
    <div class="card">
        <div class="card-header">
            Call Progress

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Call Reason</th>
                <th>Logged By</th>
                <th>Accepted By</th>
                <th>Date</th>
                <th>Status</th>

                </thead>
                <tbody>
                <tr v-for="call in calls">
                    <td>{{call.call_type.description}}</td>
                    <td>{{call.user.name}} {{call.user.surname}}</td>
                    <td>{{call.accepted_by}} </td>
                    <td>{{call.call_date}}</td>
                    <td>{{call.status}}</td>

                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_call_progress(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_call_progress(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</template>

<script>
    export default {
        name: "call-progress",
        data(){return{
            calls:{},
            data_isLoading:false,
            pagination:{},
            url:'/Calls-Progress'

        }},
        methods:{
            get_call_progress(page_url){
                this.data_isLoading = true
                let vm = this;
                page_url = page_url || this.url
                axios.get(page_url)
                    .then((response)=>{

                this.data_isLoading = false
                this.calls = response.data.data
                vm.makePagination(response.data.meta, response.data.links);

            })
            .catch((errors)=>{
                    console.log(errors)
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
            this.get_call_progress()

        }
    }
</script>

<style scoped>

</style>