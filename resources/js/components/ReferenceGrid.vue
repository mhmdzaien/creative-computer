<template>
    <v-dialog v-model="model" max-width="800px" persistent>
        <v-card>
            <v-card-title class="d-flex align-center justify-space-between">
                <span class="text-h5">Referensi {{ props.title }}</span>
                <v-spacer></v-spacer>
                <v-btn @click="() => items.push('')" class="mx-1" color="primary">
                    <v-icon left>mdi-plus</v-icon>
                    Tambah
                </v-btn>
            </v-card-title>

            <v-card-text>
                {{ items }}
                <v-data-table :loading="loading" :headers="headers" :items="itemsGrid">
                    <template v-slot:item.value="item" class="d-flex">
                        <v-text-field class="no-message" density="compact" append-inner-icon="mdi-content-save" @click:append-inner="save" v-model="item.value" />
                    </template>
                    <template v-slot:item.id="item">
                        <v-btn color="error" title="Hapus data">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </template>
                </v-data-table>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="() => model = false">
                    Tutup
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script setup lang="ts">
import axios from 'axios';
import { computed, ref, watch } from 'vue';

const props = defineProps<{ title: string; settingName: string }>();
const model = defineModel({ default: false });
const loading = ref(false);
const items = ref<string[]>([]);
const headers = ref([
    { title: 'Item', key: 'value' },
    { title: 'Aksi', key: 'id' },
])

const itemsGrid = computed(() => items.value.map((item,index) => ({value:item,id:index})))
const loadSettings = () => {
    loading.value = true;
    axios.get(`/api/settings/${props.settingName}`)
        .then(res => {
            console.log(res);
        }).finally(() => {
            loading.value = false;
        })
}

const save = () => {

}

watch(() => props.settingName, loadSettings);
</script>
<style>
.no-message > .v-input__details{
    display: none;
}
</style>