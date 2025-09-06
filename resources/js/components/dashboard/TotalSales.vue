<script setup lang="ts">
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';

const loading = ref(false);
const items = ref<{ category: string; jumlah: number }[]>([]);

onMounted(() => loadData())

const loadData = () => {
    loading.value = false;
    axios.get("/api/dashboard/kategori")
        .then(res => {
            items.value = res.data;
        })
        .catch(() => {

        })
        .finally(() => {
            loading.value = false;
        })
}
/*Chart*/
const chartOptions = computed(() => {
    const { series, labels } = items.value.reduce<{ series: number[], labels: string[] }>((result, item) => {
        result.series.push(item.jumlah);
        result.labels.push(item.category);
        return result;
    }, { series: [], labels: [] })
    return {
        series,
        labels,
        chart: {
            type: 'donut',
            height: 250,
            fontFamily: 'inherit'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 0
        },
        plotOptions: {
            pie: {
                expandOnClick: true,
                donut: {
                    size: '83',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            offsetY: 7
                        },
                        value: {
                            show: false
                        },
                        total: {
                            show: true,
                            color: '#a1aab2',
                            fontSize: '13px',
                            label: 'Jumlah Servis'
                        }
                    }
                }
            }
        },
        // colors: ['rgba(var(--v-theme-primary))', 'rgba(var(--v-theme-secondary))', '#ecf0f2', 'rgba(var(--v-theme-purple))'],
        tooltip: {
            show: true,
            fillSeriesColor: false
        },
        legend: {
            show: true,
            position: 'bottom',
            fontSize: '18px',
        },
        responsive: [
            {
                breakpoint: 1025,
                options: {
                    chart: {
                        height: 270
                    }
                }
            },
            {
                breakpoint: 426,
                options: {
                    chart: {
                        height: 250
                    }
                }
            }
        ]
    };
});

</script>

<template>
    <VCard elevation="10">
        <v-card-text>
            <div v-if="loading" class="text-center"
                style="padding:100px 0px;display: flex;flex-direction: column; align-items: center;">
                <v-progress-circular color="primary" indeterminate></v-progress-circular>
                Loading Data...
            </div>
            <div v-else>
                <div>
                    <h3 class="card-title mb-1">Jumlah Permintaan</h3>
                    <h5 class="card-subtitle">Permintaan berdasarkan kategori</h5>
                </div>
                <div class="mt-5 pt-5 position-relative">
                    <apexchart type="donut" height="265" :options="chartOptions" :series="chartOptions.series">
                    </apexchart>
                </div>
            </div>
        </v-card-text>
    </VCard>
</template>

<style scoped>
.total-sales-icon {
    position: absolute;
    left: 46%;
    top: 45%;
}
</style>
