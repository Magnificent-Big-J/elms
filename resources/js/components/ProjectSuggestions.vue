<template>
    <div class="card">
        <div class="card-header">
            Suggested Community Projects

        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <div class="row">
                <div class="col-md-4 mb-2" v-for="project in projects">
                    <div class="card">
                         <div class="card-header">
                             {{project.user.name}} {{project.user.surname}}
                         </div>
                        <div class="card-body">
                            <h2 class="card-text">
                                {{project.name}}
                            </h2>
                            <p class="lead card-text">
                                {{project.motivation}}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_suggestions(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_suggestions(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</template>

<script>
    export default {
        name: "project-suggestions",
        data(){return{
            projects:{},
            data_isLoading:false,
            pagination:{},
            url:'/get_com_sug'
        }},
       methods:{

           get_suggestions(page_url){
               let vm = this;
               page_url = page_url || this.url
               this.data_isLoading = true
               axios.get('/get_com_sug')
                   .then((response)=>{

               this.data_isLoading = false
               this.projects = response.data.data
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

            this.get_suggestions()
        }

    }
</script>

<style scoped>

</style>