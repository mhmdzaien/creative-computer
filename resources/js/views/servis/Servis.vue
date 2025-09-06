<template>
    <v-row>
        <v-breadcrumbs :items="['Admin', 'Servis']"></v-breadcrumbs>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2 h4">
                    <Icon icon="solar:atom-linear" /> {{ isMyTask ? 'Tugas Saya' : 'Data Permintaan Servis' }} 
                </v-card-title>
            </v-card>
        </v-col>

        <!-- Statistics Cards -->
        <v-col cols="12" md="3" v-for="stat in statistics" :key="stat.title">
            <v-card>
                <v-card-text>
                    <div class="d-flex align-center">
                        <v-icon large :color="stat.color">{{ stat.icon }}</v-icon>
                        <div class="ml-4">
                            <div class="text-h4">{{ stat.value }}</div>
                            <div class="text-subtitle-1">{{ stat.title }}</div>
                        </div>
                    </div>
                </v-card-text>
            </v-card>
        </v-col>
        <!-- Main Service Requests Panel -->
        <v-col cols="12">
            <v-card>
                <v-card-title class="d-flex align-center justify-space-between">
                    <v-text-field :loading="loading" v-model="search" density="compact" label="Search"
                        append-inner-icon="mdi-magnify" variant="outlined" @keyup.enter="() => loadItems(gridOptions)"
                        @click:append-inner="() => loadItems(gridOptions)" hide-details single-line></v-text-field>
                    <v-btn v-show="false" @click="() => filterShow = !filterShow" class="ms-1">
                        <v-icon icon="solar:filter-bold" />
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn v-if="!isMyTask" class="mx-1" color="primary" @click="openAddDialog">
                        <v-icon left>mdi-plus</v-icon>
                        Servis Baru
                    </v-btn>
                    <v-menu v-if="!isMyTask">
                        <template v-slot:activator="{ props }">
                            <v-btn color="primary" v-bind="props">
                                <v-icon>mdi-cog</v-icon>
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item @click="showDialogRef('Kelengkapan', 'kelengkapan')">
                                <v-list-item-title>Referensi Kelengkapan</v-list-item-title>
                            </v-list-item>
                            <v-list-item @click="showDialogRef('Jenis Layanan', 'jenis_layanan')">
                                <v-list-item-title>Referensi Jenis Layanan</v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </v-card-title>
                <!-- Service Requests Table -->
                <v-data-table-server v-model:options="gridOptions" :headers="headers" :items="serverItems"
                    :items-length="totalItems" :loading="loading" @update:options="loadItems">
                    <template v-slot:item.nomor="{ item }">
                        <v-chip color="primary" small>{{ item.nomor }}</v-chip>
                    </template>

                    <template v-slot:item.current_status="{ item }">
                        <v-chip :color="getStatusColor(item.current_progress?.status_id!)" dark small>
                            {{ getStatusText(item.current_progress?.status_id!) }}
                        </v-chip>
                    </template>
                    <template v-slot:item.tanggal_masuk="{ item }">
                        <div class="d-flex flex-column">
                            <span class="mb-1 mt-1">Masuk : {{ formatDate(item.tanggal_masuk) }}</span>
                            <span class="mb-1 mt-1">Est. Selesai : {{ formatDate(item.estimasi_selesai) }}</span>
                            <span class="mb-1 mt-1">Est. Biaya : {{ formatCurrency(item.estimasi_biaya) }}</span>
                        </div>
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <v-btn class="me-1" title="Ubah data" @click.stop="editRequest(item)">
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn class="me-1" color="info" title="Atur Progres Perbaikan"
                            :to="`/servis/progress/${item.id}`">
                            <v-icon>mdi-timeline</v-icon>
                        </v-btn>
                        <v-btn title="Cetak Nota" target="_blank" :href="`/admin/servis/cetak/${item.id}`">
                            <v-icon>mdi-printer</v-icon>
                        </v-btn>
                        <v-btn color="error" title="Hapus data" @click.stop="deleteRequest(item)">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>

                    </template>
                </v-data-table-server>
            </v-card>
        </v-col>
    </v-row>

    <!-- Add/Edit Service Request Dialog -->
    <v-dialog v-model="requestDialog" max-width="800px" persistent>
        <v-card>
            <v-card-title>
                <span class="text-h5">{{ isEditingRequest ? 'Ubah Servis' : 'Servis Baru' }}</span>
            </v-card-title>

            <v-card-text>
                <v-form ref="requestForm" v-model="requestValid">
                    <v-row>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.pelanggan"
                                :error-messages="validationError.pelanggan?.at(0)"
                                label="Nama Pelanggan*"></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.kontak_pelanggan"
                                :error-messages="validationError.kontak_pelanggan?.at(0)"
                                label="Kontak Pelanggan*"></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select v-model="serviceRequest.category_id"
                                :error-messages="validationError.category_id?.at(0)" :items="categoryOptions"
                                label="Kategori*"></v-select>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.barang"
                                :error-messages="validationError.barang?.at(0)" label="Barang*" required></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.tanggal_masuk"
                                :error-messages="validationError.tanggal_masuk?.at(0)" label="Tanggal Masuk*"
                                type="date"></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.estimasi_selesai"
                                :error-messages="validationError.estimasi_selesai?.at(0)" label="Estimasi Selesai*"
                                type="date"></v-text-field>
                        </v-col>


                        <v-col cols="12" md="6">
                            <v-select v-model="serviceRequest.teknisi_id"
                                :error-messages="validationError.teknisi_id?.at(0)" :loading="loadingTeknisi"
                                :items="teknisiOptions" label="Teknisi*"></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="serviceRequest.estimasi_biaya"
                                :error-messages="validationError.estimasi_biaya?.at(0)" label="Estimasi Biaya*"
                                type="number" min="0" required></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-label>Kelengkapan</v-label>
                            <v-row>
                                <v-col md="3" cols="12" v-for="item in listReferensi.kelengkapan">
                                    <v-checkbox density="compact" class="no-message"
                                        v-model="serviceRequest.kelengkapan" :label="item" :value="item"></v-checkbox>
                                </v-col>
                            </v-row>
                        </v-col>

                        <v-col cols="12">
                            <v-textarea v-model="serviceRequest.keluhan"
                                :error-messages="validationError.keluhan?.at(0)" label="Keluhan*" rows="3"></v-textarea>
                        </v-col>
                        <v-col cols="12">
                            <v-label>Jenis Layanan</v-label>
                            <v-row>
                                <v-col cols="12" md="3" v-for="item in listReferensi.jenis_layanan">
                                    <v-checkbox density="compact" class="no-message"
                                        v-model="serviceRequest.jenis_layanan" :label="item" :value="item"></v-checkbox>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="closeRequestDialog">Batal</v-btn>
                <v-btn color="primary" @click="saveRequest" :disabled="saving" :loading="saving">
                    Simpan
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <ReferenceGrid v-model="dialogReference.show" :setting-name="dialogReference.settingName"
        :title="dialogReference.title"></ReferenceGrid>
    <!-- Delete Confirmation Dialog -->
    <v-dialog v-model="deleteDialog" max-width="400px">
        <v-card>
            <v-card-title class="text-h5">Konfirmasi</v-card-title>
            <v-card-text>
                Apakah Anda yakin ingin menghapus permintaan servis ini "{{ requestToDelete?.nomor }}"?
                Tindakan ini tidak dapat dibatalkan.
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="deleteDialog = false">Batal</v-btn>
                <v-btn color="red darken-1" text @click="confirmDelete">Hapus</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script setup lang="ts">
import { Icon } from '@iconify/vue/dist/iconify.js'
import axios from 'axios'
import { ref, computed, Ref, onMounted } from 'vue'
import { ServiceRequest, SelectOption } from '../../types/servis'
import { useCurrentUserStore } from '../../stores/current-user.store'
import { formatCurrency, formatDate, getStatusColor, getStatusText, loadCategory } from '../../plugins/servis-utils'
import ReferenceGrid from '../../components/ReferenceGrid.vue'
import { useRoute } from 'vue-router'

interface Statistic {
    title: string
    value: number
    icon: string
    color: string
}

// State
const currentUser = useCurrentUserStore()
const isMyTask = useRoute().name == 'My Task';
const serverItems: Ref<ServiceRequest[]> = ref([])
const summaryItems = ref<{ status_id: number; total: number }[]>([]);
const gridOptions = ref({
    itemsPerPage: 5,
    page: 1,
    sortBy: [{key:'updated_at',order:'desc'}],
})
const dialogReference = ref({
    show: false,
    title: '',
    settingName: ''
});
const totalItems = ref(0)
const filter = ref({})
const filterShow = ref(false)
const requestDialog = ref<boolean>(false)
const deleteDialog = ref<boolean>(false)
const search = ref<string>('')
const requestValid = ref<boolean>(false)
const loading = ref<boolean>(false)
const saving = ref<boolean>(false)
const isEditingRequest = ref<boolean>(false)
const validationError = ref<any>({});
const requestToDelete = ref<ServiceRequest | null>(null)
const teknisiOptions = ref<SelectOption[]>([]);
const categoryOptions = ref<SelectOption[]>([]);
const loadingTeknisi = ref(false);
const listReferensi = ref({ kelengkapan: [], jenis_layanan: [] });

onMounted(() => {
    loadCategory().then(res => {
        categoryOptions.value = res;
    })
})

// Form data
const serviceRequest = ref<ServiceRequest>({
    pelanggan: '',
    kontak_pelanggan: '',
    barang: '',
    category_id: null,
    tanggal_masuk: new Date().toISOString().substr(0, 10),
    estimasi_selesai: '',
    teknisi_id: null,
    estimasi_biaya: 0,
    kelengkapan: [],
    jenis_layanan: [],
    keluhan: '',
})

// Table headers
const headers = [
    { title: 'Nomor', value: 'nomor', sortable: true },
    { title: 'Pelanggan', value: 'pelanggan', sortable: true },
    { title: 'Barang', value: 'barang', sortable: true },
    { title: 'Status', value: 'current_status', sortable: true },
    { title: 'Informasi', value: 'tanggal_masuk', sortable: true },
    { title: 'Actions', value: 'actions', sortable: false }
]

async function loadReferensData() {
    loadingTeknisi.value = true;
    try {
        const teknisiResponse = await axios.get('/api/users?filter[role]=2');
        teknisiOptions.value = teknisiResponse.data.items.map(item => ({ value: item.id, title: item.name }));
        const kelengkapanResponse = await axios.get('/api/settings/kelengkapan');
        const jenisLayananResponse = await axios.get('/api/settings/jenis_layanan');
        listReferensi.value = {
            kelengkapan: kelengkapanResponse.data,
            jenis_layanan: jenisLayananResponse.data
        }
    } finally {
        loadingTeknisi.value = false;
    }
}

function loadItems({ page, itemsPerPage, sortBy }) {
    loading.value = true
    axios.get('/api/service-request', {
        params: {
            page,
            itemsPerPage,
            sortBy,
            search: search.value,
            filter: filter.value,
            me:isMyTask
        }
    }).then(response => {
        serverItems.value = response.data.items
        totalItems.value = response.data.total
        summaryItems.value = response.data.summary
        loading.value = false
    }).catch(() => {
        loading.value = false
    })
}

const showDialogRef = (title: string, settingName: string) => {
    dialogReference.value = {
        show: true,
        title,
        settingName
    }
}

const statistics = computed<Statistic[]>(() => {
    const total = summaryItems.value.reduce((accumulator, currentValue: any) => accumulator + currentValue.jumlah, 0);
    const inProgress = summaryItems.value.filter(r => r.status_id === 3)
        .reduce((accumulator, currentValue: any) => accumulator + currentValue.jumlah, 0);
    const completed = summaryItems.value.filter(r => r.status_id === 1)
        .reduce((accumulator, currentValue: any) => accumulator + currentValue.jumlah, 0);
    const pending = summaryItems.value.filter(r => [4, 2].includes(r.status_id))
        .reduce((accumulator, currentValue: any) => accumulator + currentValue.jumlah, 0);

    return [
        {
            title: 'Total Permintaan',
            value: total,
            icon: 'mdi-clipboard-list',
            color: 'blue'
        },
        {
            title: 'Dalam Proses',
            value: inProgress,
            icon: 'mdi-progress-clock',
            color: 'orange'
        },
        {
            title: 'Selesai',
            value: completed,
            icon: 'mdi-check-circle',
            color: 'green'
        },
        {
            title: 'Menunggu',
            value: pending,
            icon: 'mdi-clock-outline',
            color: 'grey'
        }
    ]
})

const openAddDialog = (): void => {
    isEditingRequest.value = false
    Object.assign(serviceRequest, {
        pelanggan: '',
        kontak_pelanggan: '',
        barang: '',
        category_id: '',
        tanggal_masuk: new Date().toISOString().substr(0, 10),
        estimasi_selesai: '',
        teknisi_id: null,
        estimasi_biaya: 0,
        jenis_layanan: [],
        kelengkapan: [],
        keluhan: '',
    })
    loadReferensData();
    requestDialog.value = true
}

const editRequest = (request: ServiceRequest): void => {
    isEditingRequest.value = true
    request.category_id = Number(request.category_id);
    request.jenis_layanan = request.jenis_layanan ?? [];
    request.kelengkapan = request.kelengkapan ?? [];
    Object.assign(serviceRequest.value, request)
    loadReferensData();
    requestDialog.value = true
}

const closeRequestDialog = (): void => {
    requestDialog.value = false
}

const saveRequest = async (): Promise<void> => {
    saving.value = true
    validationError.value = {};
    try {
        if (serviceRequest.value.id)
            await axios.put(`/api/service-request/${serviceRequest.value.id}`, serviceRequest.value)
        else
            // delete serviceRequest.value.id;
            await axios.post('/api/service-request', serviceRequest.value)
        currentUser.showSnackbar('Permintaan telah tersimpan')
        loadItems(gridOptions.value);
        closeRequestDialog()
    } catch (error) {
        if (error.status == 422) {
            validationError.value = error.response?.data.errors;
        } else {
            currentUser.showSnackbar(error.response?.data?.message ?? error.message, 'error')
        }
    } finally {
        saving.value = false;
    }
}

const deleteRequest = (request: ServiceRequest): void => {
    requestToDelete.value = request
    deleteDialog.value = true
}
const confirmDelete = async (): Promise<void> => {
    try {
        // Simulate API call
        await axios.delete(`/api/service-request/${requestToDelete.value?.id}`);
        loadItems(gridOptions.value);
        currentUser.showSnackbar('Permintaah servis berhasil dihapus')
        deleteDialog.value = false
    } catch (error) {
        currentUser.showSnackbar('Gagal menghapus', 'error')
        console.error('Error deleting user:', error)
    }
}
</script>
<style>
.no-message>.v-input__details {
    display: none;
}
</style>