<template>
    <div class="card">
        <div id="loader-wrapper" v-if="data_isLoading" >

            <div id="loader"></div>

        </div>
        <div class="card-header">Bills Management</div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-stripped">
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>

                <th>Action</th>
                </thead>
                <tbody>

                <tr v-for="user in users">
                    <td>{{user.name}}</td>
                    <td>{{user.surname}}</td>
                    <td>{{user.address}}</td>

                    <td><button class="btn btn-info btn-xs" @click="opeModal(user.id,user.name,user.surname)">Upload Bills</button></td>
                </tr>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="load_bills(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="load_bills(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <app-bill-upload  :id="id" :fullname="fullname"></app-bill-upload>
    </div>
</template>

<script>
    import billupload from '../components/BillUpload'
    export default {
        components:{
            appBillUpload:billupload
        },
        name: "bills-managemnt",
        data(){return{
            data_isLoading:false,
            users:{},
            id:'',
            fullname:'',
            pagination:{},
            url:'/get_residence'
        }},

        methods:{
            load_bills(page_url){
                //
                this.data_isLoading = true
                let vm = this;
                page_url = page_url || this.url
                axios.get(page_url)
                    .then((response)=>{

                this.data_isLoading = false
                this.users = response.data.data
                vm.makePagination(response.data.meta, response.data.links);

                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            },
            opeModal(id,name,surname){
                $("#billUp").modal('show')

                this.id = id
                this.fullname = name + ' ' + surname
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
            this.load_bills()
        }
    }
</script>

<style scoped>

</style>