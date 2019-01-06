<template>
    <div class="card">
        <div class="card-header">
            User Mananagement
            <button class="btn btn-primary float-right" @click="opeModal">Add User</button>
        </div>
        <div class="card-body">
            <div id="loader-wrapper" v-if="data_isLoading" >

                <div id="loader"></div>

            </div>
            <table class="table table-hover table-bordered table-stropped">
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr v-for="user,key in users">
                    <td>{{user.name}}</td>
                    <td>{{user.surname}}</td>
                    <td>{{user.address}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.contact_number}}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" @click="editModal(key)" >Edit</button>

                    </td>

                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="get_users(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="get_users(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <app-add-user :id="id"></app-add-user>
    </div>
</template>

<script>
    import addUser from '../components/AddUser'
    export default {
        name: "user-management",
        data(){return{
            users:{},
            data_isLoading:false,
            id:null,
            pagination:{},
            url:'/get_users'
        }},
        components:{
            appAddUser:addUser
        },
        methods:{
            opeModal(){
                $("#addNew").modal('show')
            },
            get_users(page_url){
                this.data_isLoading = true
                let vm = this;
                page_url = page_url || this.url
                axios.get('/get_users')
                    .then((response)=>{

                        this.data_isLoading = false
                        this.users = response.data.data
                        vm.makePagination(response.data.meta, response.data.links);

                    })
                    .catch((errors)=>{
                        console.log(errors)
                    })
            },
            editModal(key){


                this.$children[0].user= this.users[key]
                $("#addNew").modal('show')
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
            this.get_users()
        }
    }
</script>

<style scoped>

</style>