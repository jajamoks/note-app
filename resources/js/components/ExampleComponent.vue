<template>
    <div>
        <div class="">In-complete notes</div>
         <LineChart/>
    </div>
</template>

<script>
import LineChart from "./LineChart.vue"
    export default {
        components: {
            LineChart
        },

        mounted() {
            axios.get('/api/activities/last60minutes')
                .then(response => {
                    this.chartData.points = response.data;
                })
                .catch(error => {
                    this.chartData.points = 0;
            });
        },

        data: function() {
            return {
                chartData: {
                    points: 0
                },


            };
        },

    }
</script>
