<script setup lang="ts">
import { ModelRef, ref, watch } from 'vue';

const props = defineProps<{
    show: boolean;
}>();

const modelValue: ModelRef<{ [key: string]: any }> = defineModel({ default: {} });
const filterShow = ref(props.show ? [0] : []);

watch(() => props.show, (newVal) => {
    filterShow.value = newVal ? [0] : [];
});

</script>
<template>
    <v-expansion-panels v-model="filterShow">
        <v-expansion-panel>
            <v-expansion-panel-text>
                <v-row>
                    <v-col cols="12" md="4">
                        <v-text-field density="compact" :counter="10" v-model="modelValue.name"
                            label="Nama"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field density="compact" :counter="10" v-model="modelValue.email"
                            label="Email"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field density="compact" v-model="modelValue.role" label="Peran"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-btn color="primary">
                        <v-icon>mdi-close</v-icon> Tutup
                    </v-btn>
                </v-row>
            </v-expansion-panel-text>
        </v-expansion-panel>
    </v-expansion-panels>
</template>