<script setup lang="ts">
import { onMounted, Ref, ref } from 'vue';
import TimelineView from './TimelineView.vue';
import axios from 'axios';
import { ItemTimeline } from '../../types/timeline';
const items: Ref<Array<ItemTimeline>> = ref([])
const loading = ref(false);

onMounted(() => loadData())

const loadData = () => {
  loading.value = false;
  axios.get("/api/dashboard/last-activity")
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
            <h2 class="card-title mb-1">Aktivitas Terakhir</h2>
            <h5 class="card-subtitle">Teknisi</h5>
            <div class="profile-activity"></div>
            <TimelineView :items="items" />
        </v-card-text>
    </VCard>
</template>
