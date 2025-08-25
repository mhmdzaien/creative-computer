<template>
    <v-dialog v-model="model" max-width="800px" persistent>
        <v-card>
            <v-card-title class="d-flex align-center justify-space-between">
                <span class="text-h5">Referensi {{ props.title }}</span>
                <v-spacer></v-spacer>
                <v-btn @click="() => items.unshift('')" class="mx-1" color="primary">
                    <v-icon left>mdi-plus</v-icon>
                    Tambah
                </v-btn>
            </v-card-title>

            <v-card-text>
                <v-data-table :loading="loading" :headers="headers" :items="itemsGrid">
                    <template v-slot:item.value="{ item }" class="d-flex">
                        <v-text-field class="no-message" density="compact" v-model="items[item.id]" />
                    </template>
                    <template v-slot:item.id="{ item }">
                        <v-btn color="error" title="Hapus data" @click="deleteItem(item.id)">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </template>
                </v-data-table>
            </v-card-text>

            <v-card-actions>
                <span class="text-body-2">*Mohon klik simpan setelah melakukan perubahan</span>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="() => model = false">
                    Tutup
                </v-btn>
                <v-btn color="primary" @click="save" :disabled="saving" :loading="saving">
                    Simpan
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script setup lang="ts">
import axios from 'axios';
import { computed, ref, watch } from 'vue';
import { useCurrentUserStore } from '../stores/current-user.store';

const props = defineProps<{ title: string; settingName: string }>();
const model = defineModel({ default: false });
const loading = ref(false);
const saving = ref(false);
const items = ref<string[]>([]);
const headers = ref([
    { title: 'Item', key: 'value' },
    { title: 'Aksi', key: 'id' },
])
const currentUser = useCurrentUserStore();

const itemsGrid = computed(() => items.value.map((item, index) => ({ value: item, id: index })))
const loadSettings = () => {
    loading.value = true;
    axios.get(`/api/settings/${props.settingName}`)
        .then(res => {
            items.value = res.data;
        }).catch(() => {
            items.value = [];
        }).finally(() => {
            loading.value = false;
        })
}

const deleteItem = (id) => {
    items.value.splice(id, 1);
    save();
}

const save = () => {
    saving.value = true;
    axios.put(`/api/settings/${props.settingName}`, { value: items.value })
        .then(res => {
            currentUser.showSnackbar('Referensi berhasil disimpan')
        })
        .finally(() => {
            saving.value = false;
        })
}

watch(() => props.settingName, loadSettings);
</script>
<style>
.no-message>.v-input__details {
    display: none;
}
</style>