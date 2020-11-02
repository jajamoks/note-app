<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,

        data: function () {
            return {
                sixtyMinutes: [],
                burnDownTask: []
            }
        },

  mounted() {

        axios.get('/api/activities/last60minutes')
            .then(response => {

                for (let i = 1; i < 61; i++) {
                    this.sixtyMinutes.push(`${i}`);
                }

                for (let i = response.data - 1; i >= 0; i--) {
                    this.burnDownTask.push(i);
                }

                this.renderChart(
                {
                    labels: this.sixtyMinutes,
                    datasets: [
                    {
                        label: "In-complete notes",
                        data: this.burnDownTask,
                        backgroundColor: "transparent",
                        borderColor: "rgba(1, 116, 188, 0.50)",
                        pointBackgroundColor: "rgba(171, 71, 188, 1)"
                    }
                    ]
                },
                {
                    responsive: true,
                    maintainAspectRatio: false,

                }
                );

            })
            .catch(error => {
                return 0;
            });

  }
};
</script>

