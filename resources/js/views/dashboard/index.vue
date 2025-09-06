<script setup lang="ts">
import SalesOverview from '@/components/dashboard/SalesOverview.vue';
import TheActivityTimeline from '@/components/dashboard/TheActivityTimeline.vue';
import TeknisiRekap from '@/components/dashboard/TeknisiRekap.vue';
import TotalSales from '@/components/dashboard/TotalSales.vue';
</script>

<template>
    <v-row>
        <!---Permintaan Servis Bulanan--->
        <v-col cols="12" sm="12" lg="8">
            <SalesOverview />
        </v-col>
        <!---Permintaan Servis Kategori--->
        <v-col cols="12" sm="12" lg="4">
            <TotalSales />
        </v-col>
        <!---Permintaan Servis Teknis--->
        <v-col cols="12" sm="12" lg="6">
            <TeknisiRekap />
        </v-col>
        <!---Activity timeline--->
        <v-col cols="12" sm="12" lg="6">
            <TheActivityTimeline />
        </v-col>
    </v-row>
</template>
