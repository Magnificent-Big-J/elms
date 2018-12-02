<template>
    <div>
        <chartjs-doughnut :labels="labels" :datasets="
     datasets =[
                {
                    data:[stat],
                    backgroundColor:['Red','Yellow','Purple']
                }
            ]


" :option="option"></chartjs-doughnut>
        {{stat}}
    </div>

</template>

<script>
    import { Bar } from 'vue-chartjs'
    export default {
        name: "stats",
        data(){return{

            labels:[],
            datasets:[
                {
                    data:[],
                    backgroundColor:['Red','Yellow','Purple']
                }
            ],
            option:{
                title:{
                    display:true,
                    position:"bottom",
                    text:"Fruits"
                }
            },
            stat:[]

        }},
        mounted(){



            axios.get('/callStats')
                .then((response)=>{
                this.stat = response.data.stats


            })
        .catch((error)=>{
                console.log(error)
        })

            this.labels[0] = "Apple"
            this.labels[1] = "Banana"
            this.labels[2] = "Grapes"

        }

    }
</script>

<style scoped>

</style>