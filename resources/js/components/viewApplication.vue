<template>


    <div class="card">

        <div class="card-header">View Application</div>
        <div class="card-body">
            <h2>Application</h2>
                <table class="table">
                    <tr>
                        <td>Application Type</td>
                        <td>{{plan[0].plan_type.description}}</td>
                    </tr>
                    <tr>
                        <td>Application Date</td>
                        <td>{{plan[0].plan_date}}</td>
                    </tr>
                    <tr>
                        <td>Motivation</td>
                        <td>{{plan[0].motivation}}</td>
                    </tr>
                    <tr>
                        <td>Motivation</td>
                        <td>{{plan[0].status}}</td>
                    </tr>

                </table>
            <h2>Application Document(s)</h2>
            <table class="table">
                <tr v-for="document in documents">
                    <td>{{document.document_type.description}}</td>
                    <td><button class="btn btn-info" @click="opeModal(document.file_path)" >View</button></td>
                </tr>
            </table>

        </div>
        <app-view-bills :file_path="file_path"></app-view-bills>
    </div>


</template>

<script>
    import mybills from '../components/ViewBill'
    export default {
        components:{
            appViewBills:mybills
        },
        name: "view-application",
        props:['id'],
        data(){return{
            plan:{},
            documents:{},
            file_path:''
        }},
        methods:{
            get_plan(){
                axios.get('/get_plan_and_doc/'+this.id)
                    .then((response)=>{
                    this.plan =  response.data.plan
                   this.documents = response.data.documents

                    })
                    .catch((errors)=>{
                            console.log(errors)
                    })
            }
        ,
        opeModal(myfile){


            axios.get('/prepare_file/'+ myfile)
                .then((response)=>{
                this.file_path = response.data

            console.log(this.file_path)
        })
        .catch((errors)=>{
                console.log(errors)
        })

            $("#viewBill").modal('show')



        }
        },
        created(){
            this.get_plan()
        }
    }
</script>

<style scoped>

</style>