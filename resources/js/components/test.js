import {Pie} from 'vue-chartjs'

export default({
    extends: Pie,
    mounted () {
        this.renderChart({
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: ['#f87979','#f879dd','#79f855','#fcc979','#f8ee79','#f8ee79','#f87779'],
                    data: [40, 39, 10, 40, 39, 80, 40]
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }

})