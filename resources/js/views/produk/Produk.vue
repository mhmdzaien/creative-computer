<script setup lang="ts">
import { Ref, ref } from 'vue';
import axios from 'axios';
import { User } from '../../types/user';

const itemsPerPage = ref(5)
const headers = [
    { title: 'Nama', align: "start", key: 'name' },
    { title: 'Email', key: 'email', align: "center" },
    { title: 'Peran', key: 'role', align: "center" },
    { title: 'Waktu Buat', key: 'created_at', align: "center" },
    { title: 'Aksi', key: 'id', align: "center", sortable: false },
]
const search = ref('')
const serverItems: Ref<User[]> = ref([])
const loading = ref(true)
const totalItems = ref(0)

function loadItems({ page, itemsPerPage, sortBy }) {
    loading.value = true
    axios.get('/api/users', {
        params: {
            page,
            itemsPerPage,
            sortBy,
            search: search.value
        }
    }).then(response => {
        serverItems.value = response.data.items
        totalItems.value = response.data.total
        loading.value = false
    }).catch(() => {
        loading.value = false
    })
}
</script>
<template>
    <v-row>
        <v-breadcrumbs :items="['Admin', 'Produk']"></v-breadcrumbs>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2 h4">
                    <Icon icon="solar:users-group-rounded-line-duotone" /> Data Produk
                </v-card-title>
            </v-card>
        </v-col>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2">
                    <v-text-field v-model="search" label="Search" prepend-inner-icon="mdi-magnify" variant="outlined"
                        hide-details single-line></v-text-field>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="$router.push({ name: 'pengguna.create' })">
                        Tambah Produk
                    </v-btn>
                </v-card-title>

                <v-divider></v-divider>
                <v-data-table-server v-model:items-per-page="itemsPerPage" :headers="headers" :items="serverItems"
                    :items-length="totalItems" :loading="loading" :search="search" item-value="name"
                    @update:options="loadItems">
                    <template v-slot:item.role="{ item }">
                        <span class="text-capitalize">{{ User.roleList[item.role] }}</span>
                    </template>
                    <template v-slot:item.id="{ item }">
                        <v-btn color="primary" class="mx-1"
                            @click="$router.push({ name: 'pengguna.edit', params: { id: item.id } })">
                            Edit
                        </v-btn>
                        <v-btn color="error" class="mx-1" @click="$emit('delete', item.id)">
                            Hapus
                        </v-btn>
                    </template>
                </v-data-table-server>
            </v-card>
        </v-col>
    </v-row>
</template>
