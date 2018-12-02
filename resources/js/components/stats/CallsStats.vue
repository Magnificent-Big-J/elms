<template>
    <div>
        <chartjs-doughnut :labels="labels" :datasets="datasets" :option="option"></chartjs-doughnut>
    </div>
</template>

<script>
    export default {
        name: "calls-stats",
        data(){return{
            labels:['New','Accepted','Closed'],
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
                    text:"Calls"
                }
            },
        }},
        mounted(){
            let stat
            axios.get('../callStats')
                .then((response)=>{
                    stat = response.data.stats

                })
            .catch((error)=>{
                console.log(error)
            })

            this.datasets[0].data[0]=50
            this.datasets[0].data[1]=40
            this.datasets[0].data[2]=50

        }
    }
</script>

<style scoped>

</style>