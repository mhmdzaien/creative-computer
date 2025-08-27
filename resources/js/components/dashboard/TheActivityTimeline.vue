<script setup lang="ts">
import { ref } from 'vue';
import TimelineView from './TimelineView.vue';
const tab = ref('two');
</script>
<template>
    <VCard elevation="10">
        <v-card-text>
            <h2 class="card-title mb-1">Aktivitas Terakhir</h2>
            <h5 class="card-subtitle">Teknisi</h5>
            <div class="profile-activity"></div>
            <TimelineView />
        </v-card-text>
    </VCard>
</template>
