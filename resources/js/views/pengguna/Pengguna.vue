<script setup lang="ts">
import { Ref, ref } from 'vue';
import axios from 'axios';
import { User } from '../../types/user';
import { Icon } from '@iconify/vue/dist/iconify.js';
import GridFilter from '../../components/GridFilter.vue';
import { useCurrentUserStore } from '../../stores/current-user.store';

const gridOptions = ref({
    itemsPerPage: 5,
    page: 1,
    sortBy: '',
})
const headers = [
    { title: 'Nama', align: "start", key: 'name', class: 'fw-bold' },
    { title: 'Email', key: 'email', align: "center" },
    { title: 'Peran', key: 'role', align: "center" },
    { title: 'Waktu Buat', key: 'created_at', align: "center" },
    { title: 'Aksi', key: 'id', align: "center", sortable: false },
]
const search = ref('')
const serverItems: Ref<User[]> = ref([])
const loading = ref(true)
const totalItems = ref(0)
const filterShow = ref(false)
const filter = ref({})
const dialog = ref(false)
const deleteDialog = ref(false)
const valid = ref(false)
const saving = ref(false)
const isEditing = ref(false)
const roleList = Object.keys(User.roleList).map(id => ({ value: Number(id), title: User.roleList[id] }))
const validationError: Ref<any> = ref({});
const currentUser = useCurrentUserStore();
const user = ref({
    id: null,
    name: '',
    email: '',
    password: '',
    confirmPassword: '',
    role: 1,
    email_verified: false
})

const openAddDialog = () => {
    isEditing.value = false
    user.value = {
        id: null,
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
        role: 1,
        email_verified: false
    };
    dialog.value = true
}

const editUser = (userEdit) => {
    isEditing.value = true
    Object.assign(user.value, userEdit);
    dialog.value = true
}

const closeDialog = () => {
    dialog.value = false
}

const saveUser = async () => {
    saving.value = true
    validationError.value = {};
    try {
        if (user.value.id)
            await axios.put(`/api/users/${user.value.id}`, user.value)
        else
            await axios.post('/api/users', user.value)
        currentUser.showSnackbar('User telah tersimpan')
        loadItems(gridOptions.value);
    } catch (error) {
        if (error.status == 422) {
            validationError.value = error.response?.data.errors;
        } else {
            currentUser.showSnackbar(error.response?.data?.message ?? error.message, 'error')
        }
    }
    saving.value = false
}

const deleteUser = (deleteUser) => {
    user.value = deleteUser
    deleteDialog.value = true
}

const confirmDelete = async () => {
    try {
        // Simulate API call
        const response = await axios.delete(`/api/users/${user.value?.id}`);
        loadItems(gridOptions.value);
        currentUser.showSnackbar('User deleted successfully')
        deleteDialog.value = false
    } catch (error) {
        currentUser.showSnackbar('Error deleting user', 'error')
        console.error('Error deleting user:', error)
    }
}


function loadItems({ page, itemsPerPage, sortBy }) {
    loading.value = true
    axios.get('/api/users', {
        params: {
            page,
            itemsPerPage,
            sortBy,
            search: search.value,
            filter: filter.value,
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
        <v-breadcrumbs :items="['Admin', 'Pengguna']"></v-breadcrumbs>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2 h4">
                    <Icon icon="solar:users-group-rounded-line-duotone" /> Data Pengguna
                </v-card-title>
            </v-card>
        </v-col>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2">
                    <v-text-field v-model="search" density="compact" label="Search" prepend-inner-icon="mdi-magnify"
                        variant="outlined" hide-details single-line></v-text-field>
                    <v-btn v-show="false" @click="() => filterShow = !filterShow" class="ms-1">
                        <Icon icon="solar:filter-bold" />
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="openAddDialog">
                        Tambah Pengguna
                    </v-btn>
                </v-card-title>
                <GridFilter v-model="filter" :show="filterShow" />
                <v-divider></v-divider>
                <v-data-table-server v-model:options="gridOptions" :headers="headers" :items="serverItems"
                    :items-length="totalItems" :loading="loading" :search="search" @update:options="loadItems">
                    <template v-slot:item.role="{ item }">
                        <span class="text-capitalize">{{ User.roleList[item.role] }}</span>
                    </template>
                    <template v-slot:item.id="{ item }">
                        <v-btn class="mx-1" @click="editUser(item)">
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn color="error" class="mx-1" @click="deleteUser(item)">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </template>
                </v-data-table-server>
            </v-card>
        </v-col>

        <!-- Add/Edit Dialog -->
        <v-dialog v-model="dialog" max-width="500px" persistent>
            <v-card>
                <v-card-title>
                    <span class="text-h5">{{ isEditing ? 'Ubah Pengguna' : 'Tambah Pengguna Baru' }}</span>
                </v-card-title>

                <v-card-text>
                    <v-container>
                        <v-form ref="form" v-model="valid">
                            <v-row>
                                <v-col cols="12">
                                    <v-text-field v-model="user.name" label="Nama*"
                                        :error-messages="validationError.name?.at(0)"></v-text-field>
                                </v-col>

                                <v-col cols="12">
                                    <v-text-field v-model="user.email" label="Email*"
                                        :error-messages="validationError.email?.at(0)" type="email"></v-text-field>
                                </v-col>

                                <v-col cols="12" v-if="!isEditing">
                                    <v-text-field v-model="user.password" label="Password*"
                                        :error-messages="validationError.password?.at(0)"
                                        type="password"></v-text-field>
                                </v-col>

                                <v-col cols="12" v-if="!isEditing">
                                    <v-text-field v-model="user.confirmPassword" label="Konfirmasi Password*"
                                        :error-messages="validationError.confirmPassword?.at(0)" required
                                        type="password"></v-text-field>
                                </v-col>

                                <v-col cols="12">
                                    <v-select v-model="user.role" :error-messages="validationError.role?.at(0)"
                                        :items="roleList" required></v-select>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-container>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="closeDialog">
                        Batal
                    </v-btn>
                    <v-btn color="primary" text @click="saveUser" :disabled="saving" :loading="saving">
                        Simpan
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <!-- Delete Confirmation Dialog -->
        <v-dialog v-model="deleteDialog" max-width="400px">
            <v-card>
                <v-card-title class="text-h5">Konfirmasi Hapus</v-card-title>
                <v-card-text>
                    Apakah Anda yakin ingin menghapus pengguna "{{ user?.name }}"?
                    Tindakan ini tidak dapat dibatalkan.
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="deleteDialog = false">
                        Cancel
                    </v-btn>
                    <v-btn color="red darken-1" text @click="confirmDelete">
                        Delete
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>