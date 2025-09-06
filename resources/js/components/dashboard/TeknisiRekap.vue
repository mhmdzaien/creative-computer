<script setup lang="ts">
import img1 from '@/assets/images/users/user-2.jpg';
import { onMounted, Ref, ref } from 'vue';
import axios from 'axios';
import DatePicker from '@vuepic/vue-datepicker';
const items: Ref<Array<{ name: string; jumlah: number; selesai: number }>> = ref([])
const loading = ref(false);
const now = new Date();
const range = ref([new Date(now.getFullYear(), 0, 1), now]);

onMounted(() => loadData())

const toMysqlFormat = (date: Date) => {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0'); // bulan 0-11, jadi +1
  const day = String(date.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
}

const loadData = () => {
  loading.value = false;
  const [start, end] = range.value;
  axios.get("/api/dashboard/teknisi", {
    params: {
      start: toMysqlFormat(start),
      end: toMysqlFormat(end),
    }
  })
    .then(res => {
      items.value = res.data;
    })
    .catch(() => {

    })
    .finally(() => {
      loading.value = false;
    })
}

</script>
<template>
  <VCard elevation="10">
    <v-card-text>
      <h2 class="card-title mb-1">Teknisi</h2>
      <h5 class="card-subtitle">Jumlah Permintaan berdasarkan teknisi</h5>
      <DatePicker v-model="range" range format="dd/MM/yyyy" :enable-time-picker="false"
        @update:model-value="loadData" />
      <div v-if="loading" class="text-center"
        style="padding:100px 0px;display: flex;flex-direction: column; align-items: center;">
        <v-progress-circular color="primary" indeterminate></v-progress-circular>
        Loading Data...
      </div>
      <div v-else class="mt-5">
        <div v-for="(item, i) in items" :key="i">
          <div class="d-flex align-center py-4">
            <div class="mr-3">
              <v-avatar size="48">
                <img :src="img1" :alt="item.name" width="48" />
              </v-avatar>
            </div>
            <div class="d-flex w-100 align-center justify-space-between">
              <div>
                <h4 class="text-h6 mt-n1 mb-1">{{ item.name }}</h4>
                <div class="truncate-text text-subtitle-2 textSecondary">Teknisi</div>
              </div>
              <div class="d-flex align-center ms-sm-auto ga-1">
                <v-btn density="comfortable" title="Jumlah servis masuk" icon color="error" size="35" variant="tonal">
                  {{ item.jumlah }}
                </v-btn>
                <v-btn density="comfortable" title="Jumlah servis selesai" icon color="primary" size="35"
                  variant="tonal">
                  {{ item.selesai }}
                </v-btn>
              </div>
            </div>
          </div>
        </div>
      </div>
    </v-card-text>
  </VCard>
</template>
