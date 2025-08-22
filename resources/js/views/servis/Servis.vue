<template>
    <v-row>
        <v-breadcrumbs :items="['Admin', 'Servis']"></v-breadcrumbs>
        <v-col cols="12" md="12">
            <v-card flat>
                <v-card-title class="d-flex align-center pe-2 h4">
                    <v-icon icon="solar:users-group-rounded-line-duotone" /> Data Permintaan Servis
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
                    <v-text-field v-model="search" density="compact" label="Search" prepend-inner-icon="mdi-magnify"
                        variant="outlined" hide-details single-line></v-text-field>
                    <v-btn v-show="false" @click="() => filterShow = !filterShow" class="ms-1">
                        <v-icon icon="solar:filter-bold" />
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="openAddDialog">
                        <v-icon left>mdi-plus</v-icon>
                        Servis Baru
                    </v-btn>
                </v-card-title>
                <!-- Service Requests Table -->
                <v-data-table-server v-model:options="gridOptions" :headers="headers" :items="serverItems"
                    :items-length="totalItems" :loading="loading" :search="search" @update:options="loadItems" >
                    <template v-slot:item.nomor="{ item }">
                        <v-chip color="primary" small>{{ item.nomor }}</v-chip>
                    </template>

                    <template v-slot:item.current_status="{ item }">
                        <v-chip :color="getStatusColor(item.current_status)" dark small>
                            {{ getStatusText(item.current_status) }}
                        </v-chip>
                    </template>

                    <template v-slot:item.estimasi_biaya="{ item }">
                        {{ formatCurrency(item.estimasi_biaya) }}
                    </template>

                    <template v-slot:item.tanggal_masuk="{ item }">
                        {{ formatDate(item.tanggal_masuk) }}
                    </template>

                    <template v-slot:item.estimasi_selesai="{ item }">
                        {{ formatDate(item.estimasi_selesai) }}
                    </template>

                    <template v-slot:item.actions="{ item }">
                        <v-btn icon small @click.stop="editRequest(item)">
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn icon small @click.stop="viewProgressDetail(item)">
                            <v-icon>mdi-eye</v-icon>
                        </v-btn>
                        <v-btn icon small @click.stop="viewProgress(item)">
                            <v-icon>mdi-timeline</v-icon>
                        </v-btn>
                        <v-btn icon small @click.stop="deleteRequest(item)">
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
                            <v-text-field v-model="editedRequest.nomor" label="Nomor Service*" :rules="requiredRules"
                                required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.pelanggan" label="Nama Pelanggan*"
                                :rules="requiredRules" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.kontak_pelanggan" label="Kontak Pelanggan*"
                                :rules="requiredRules" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.barang" label="Barang*" :rules="requiredRules"
                                required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select v-model="editedRequest.category_id" :items="categoryOptions" label="Kategori*"
                                :rules="requiredRules" required></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select v-model="editedRequest.teknisi_id" :items="teknisiOptions" label="Teknisi*"
                                :rules="requiredRules" required></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.tanggal_masuk" label="Tanggal Masuk*" type="date"
                                :rules="requiredRules" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.estimasi_selesai" label="Estimasi Selesai*" type="date"
                                :rules="requiredRules" required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedRequest.estimasi_biaya" label="Estimasi Biaya*" type="number"
                                min="0" :rules="[...requiredRules, ...numberRules]" required></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-textarea v-model="editedRequest.keluhan" label="Keluhan*" :rules="requiredRules" required
                                rows="3"></v-textarea>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="closeRequestDialog">Cancel</v-btn>
                <v-btn color="primary" @click="saveRequest" :disabled="!requestValid" :loading="saving">
                    Save
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>

    <!-- Add Progress Dialog -->
    <v-dialog v-model="progressDialog" max-width="600px" persistent>
        <v-card>
            <v-card-title>
                <span class="text-h5">Add Progress Update</span>
            </v-card-title>

            <v-card-text>
                <v-form ref="progressForm" v-model="progressValid">
                    <v-row>
                        <v-col cols="12">
                            <v-select v-model="editedProgress.status_id" :items="statusOptions" label="Status*"
                                :rules="requiredRules" required></v-select>
                        </v-col>

                        <v-col cols="12">
                            <v-select v-model="editedProgress.teknisi_id" :items="teknisiOptions" label="Teknisi*"
                                :rules="requiredRules" required></v-select>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field v-model="editedProgress.tanggal" label="Tanggal*" type="date"
                                :rules="requiredRules" required></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-textarea v-model="editedProgress.catatan" label="Catatan*" :rules="requiredRules"
                                required rows="3"></v-textarea>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="closeProgressDialog">Cancel</v-btn>
                <v-btn color="primary" @click="saveProgress" :disabled="!progressValid" :loading="saving">
                    Save
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>

    <!-- Delete Confirmation Dialog -->
    <v-dialog v-model="deleteDialog" max-width="400px">
        <v-card>
            <v-card-title class="text-h5">Confirm Delete</v-card-title>
            <v-card-text>
                Are you sure you want to delete service request "{{ requestToDelete?.nomor }}"?
                This will also delete all progress records.
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="deleteDialog = false">Cancel</v-btn>
                <v-btn color="red darken-1" text @click="confirmDelete">Delete</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>

    <!-- Progress Detail Dialog -->
    <v-dialog v-model="progressDetailDialog" max-width="900px">
        <v-card v-if="selectedRequestDetail">
            <v-card-title class="d-flex align-center justify-space-between">
                <span class="text-h5">Service Request Detail</span>
                <v-btn icon @click="progressDetailDialog = false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>

            <v-card-text>
                <v-row>
                    <!-- Service Request Info -->
                    <v-col cols="12" md="6">
                        <v-card outlined>
                            <v-card-title class="text-h6">Service Information</v-card-title>
                            <v-card-text>
                                <v-list dense>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Nomor Service</v-list-item-title>
                                            <v-list-item-subtitle>{{ selectedRequestDetail.nomor
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Pelanggan</v-list-item-title>
                                            <v-list-item-subtitle>{{ selectedRequestDetail.pelanggan
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Kontak</v-list-item-title>
                                            <v-list-item-subtitle>{{ selectedRequestDetail.kontak_pelanggan
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Barang</v-list-item-title>
                                            <v-list-item-subtitle>{{ selectedRequestDetail.barang
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Kategori</v-list-item-title>
                                            <v-list-item-subtitle>{{
                                                getCategoryText(selectedRequestDetail.category_id)
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Teknisi</v-list-item-title>
                                            <v-list-item-subtitle>{{
                                                getTeknisiName(selectedRequestDetail.teknisi_id)
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                    <v-list-item>
                                        <template>
                                            <v-list-item-title>Estimasi Biaya</v-list-item-title>
                                            <v-list-item-subtitle>{{
                                                formatCurrency(selectedRequestDetail.estimasi_biaya)
                                                }}</v-list-item-subtitle>
                                        </template>
                                    </v-list-item>
                                </v-list>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <!-- Keluhan & Timeline -->
                    <v-col cols="12" md="6">
                        <v-card outlined>
                            <v-card-title class="text-h6">Keluhan</v-card-title>
                            <v-card-text>
                                <p>{{ selectedRequestDetail.keluhan }}</p>
                            </v-card-text>
                        </v-card>

                        <v-card outlined class="mt-4">
                            <v-card-title class="text-h6 d-flex justify-space-between">
                                <span>Progress Timeline</span>
                                <v-btn small color="success" @click="openProgressFromDetail">
                                    <v-icon left small>mdi-plus</v-icon>
                                    Add Progress
                                </v-btn>
                            </v-card-title>
                            <v-card-text>
                                <v-timeline dense>
                                    <v-timeline-item v-for="progress in getProgressForRequest(selectedRequestDetail.id)"
                                        :key="progress.id" :color="getStatusColor(progress.status_id)" small>
                                        <template v-slot:opposite>
                                            <span class="text-caption">{{ formatDate(progress.tanggal) }}</span>
                                        </template>
                                        <div>
                                            <div class="text-h6">{{ getStatusText(progress.status_id) }}</div>
                                            <div class="text-body-2">{{ progress.catatan }}</div>
                                            <div class="text-caption">Teknisi: {{ progress.teknisi_name }}</div>
                                        </div>
                                    </v-timeline-item>
                                </v-timeline>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </v-dialog>


</template>

<script setup lang="ts">
import axios from 'axios'
import { ref, reactive, computed, onMounted, Ref } from 'vue'


interface SelectOption {
  text: string
  value: string | number
}

interface Statistic {
  title: string
  value: number
  icon: string
  color: string
}

interface Snackbar {
  show: boolean
  message: string
  color: string
}

// State
const serverItems: Ref<ServiceRequest[]> = ref([])
const gridOptions = ref({
    itemsPerPage: 5,
    page: 1,
    sortBy: '',
})
const totalItems = ref(0)
const filter = ref({})
const filterShow = ref(false)
const requestDialog = ref<boolean>(false)
const progressDialog = ref<boolean>(false)
const progressDetailDialog = ref<boolean>(false)
const deleteDialog = ref<boolean>(false)
const search = ref<string>('')
const requestValid = ref<boolean>(false)
const progressValid = ref<boolean>(false)
const loading = ref<boolean>(false)
const saving = ref<boolean>(false)
const isEditingRequest = ref<boolean>(false)

const serviceRequests = ref<ServiceRequest[]>([])
const serviceProgress = ref<ServiceProgress[]>([])
const requestToDelete = ref<ServiceRequest | null>(null)

const snackbar = reactive<Snackbar>({
  show: false,
  message: '',
  color: 'success'
})

// Form data
const editedRequest = reactive<Partial<ServiceRequest>>({
  id: null,
  nomor: '',
  pelanggan: '',
  kontak_pelanggan: '',
  barang: '',
  category_id: '',
  tanggal_masuk: new Date().toISOString().substr(0, 10),
  estimasi_selesai: '',
  teknisi_id: null,
  estimasi_biaya: 0,
  keluhan: '',
  current_progress_id: 1
})


// Options
const statusOptions: SelectOption[] = [
  { text: 'Received', value: 1 },
  { text: 'In Progress', value: 2 },
  { text: 'Waiting for Parts', value: 3 },
  { text: 'Testing', value: 4 },
  { text: 'Ready for Pickup', value: 5 },
  { text: 'Completed', value: 6 },
  { text: 'Cancelled', value: 7 }
]

const dateRangeOptions: SelectOption[] = [
  { text: 'This Week', value: 'this_week' },
  { text: 'This Month', value: 'this_month' },
  { text: 'Last Month', value: 'last_month' },
  { text: 'This Quarter', value: 'this_quarter' },
  { text: 'This Year', value: 'this_year' },
  { text: 'All Time', value: 'all_time' }
]

const categoryOptions: SelectOption[] = [
  { text: 'Computer Repair', value: 'computer' },
  { text: 'Laptop Repair', value: 'laptop' },
  { text: 'Printer Repair', value: 'printer' },
  { text: 'Network Setup', value: 'network' },
  { text: 'Data Recovery', value: 'data-recovery' },
  { text: 'Software Installation', value: 'software' }
]

const teknisiOptions: SelectOption[] = [
  { text: 'Ahmad Wijaya', value: 1 },
  { text: 'Budi Santoso', value: 2 },
  { text: 'Citra Dewi', value: 3 },
  { text: 'Doni Prasetyo', value: 4 }
]

// Table headers
const headers = [
  { title: 'Nomor', value: 'nomor', sortable: true },
  { title: 'Pelanggan', value: 'pelanggan', sortable: true },
  { title: 'Barang', value: 'barang', sortable: true },
  { title: 'Status', value: 'current_status', sortable: true },
  { title: 'Tanggal Masuk', value: 'tanggal_masuk', sortable: true },
  { title: 'Est. Selesai', value: 'estimasi_selesai', sortable: true },
  { title: 'Est. Biaya', value: 'estimasi_biaya', sortable: true },
  { title: 'Actions', value: 'actions', sortable: false }
]

// Validation rules
const requiredRules = [(v: any) => !!v || 'Field is required']
const numberRules = [(v: number) => v >= 0 || 'Must be positive number']

function loadItems({ page, itemsPerPage, sortBy }) {
    loading.value = true
    axios.get('/api/service-request', {
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

const statistics = computed<Statistic[]>(() => {
  const total = serviceRequests.value.length
  const inProgress = serviceRequests.value.filter(r => r.current_status === 2).length
  const completed = serviceRequests.value.filter(r => r.current_status === 6).length
  const pending = serviceRequests.value.filter(r => r.current_status === 1).length

  return [
    {
      title: 'Total Requests',
      value: total,
      icon: 'mdi-clipboard-list',
      color: 'blue'
    },
    {
      title: 'In Progress',
      value: inProgress,
      icon: 'mdi-progress-clock',
      color: 'orange'
    },
    {
      title: 'Completed',
      value: completed,
      icon: 'mdi-check-circle',
      color: 'green'
    },
    {
      title: 'Pending',
      value: pending,
      icon: 'mdi-clock-outline',
      color: 'grey'
    }
  ]
})

// Methods
const showSnackbar = (message: string, color: string = 'success'): void => {
  snackbar.message = message
  snackbar.color = color
  snackbar.show = true
}

const getStatusColor = (statusId: number): string => {
  const colors: Record<number, string> = {
    1: 'blue',
    2: 'orange',
    3: 'yellow',
    4: 'purple',
    5: 'green',
    6: 'success',
    7: 'red'
  }
  return colors[statusId] || 'grey'
}

const getStatusText = (statusId: number): string => {
  const status = statusOptions.find(s => s.value === statusId)
  return status ? status.text : 'Unknown'
}

const getCategoryText = (categoryId: string): string => {
  const category = categoryOptions.find(c => c.value === categoryId)
  return category ? category.text : categoryId
}

const getTeknisiName = (teknisiId: number): string => {
  const teknisi = teknisiOptions.find(t => t.value === teknisiId)
  return teknisi ? teknisi.text : 'Unknown'
}

const formatDate = (dateString: string): string => {
  if (!dateString) return 'N/A'
  return new Date(dateString).toLocaleDateString('id-ID')
}

const formatCurrency = (amount: number): string => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(amount)
}

const getProgressForRequest = (requestId: string): ServiceProgress[] => {
  return serviceProgress.value
    .filter(p => p.service_request_id === requestId)
    .sort((a, b) => new Date(b.tanggal).getTime() - new Date(a.tanggal).getTime())
}

const generateServiceNumber = (): string => {
  const today = new Date()
  const year = today.getFullYear()
  const month = String(today.getMonth() + 1).padStart(2, '0')
  const count = serviceRequests.value.length + 1
  return `SRV-${year}${month}-${String(count).padStart(3, '0')}`
}

const openAddDialog = (): void => {
  isEditingRequest.value = false
  Object.assign(editedRequest, {
    id: null,
    nomor: generateServiceNumber(),
    pelanggan: '',
    kontak_pelanggan: '',
    barang: '',
    category_id: '',
    tanggal_masuk: new Date().toISOString().substr(0, 10),
    estimasi_selesai: '',
    teknisi_id: null,
    estimasi_biaya: 0,
    keluhan: '',
    current_progress_id: 1
  })
  requestDialog.value = true
}

const editRequest = (request: ServiceRequest): void => {
  isEditingRequest.value = true
  Object.assign(editedRequest, { ...request })
  requestDialog.value = true
}

const closeRequestDialog = (): void => {
  requestDialog.value = false
}

const saveRequest = async (): Promise<void> => {
  if (!requestValid.value) return

  saving.value = true
  try {
    await new Promise(resolve => setTimeout(resolve, 1000))

    if (isEditingRequest.value) {
      const index = serviceRequests.value.findIndex(r => r.id === editedRequest.id)
      if (index !== -1) {
        serviceRequests.value[index] = { ...editedRequest } as ServiceRequest
      }
      showSnackbar('Service request updated successfully')
    } else {
      const newRequest: ServiceRequest = {
        ...editedRequest,
        id: `req-${Date.now()}`,
        current_status: 1
      } as ServiceRequest
      serviceRequests.value.push(newRequest)

      // Add initial progress
      const initialProgress: ServiceProgress = {
        id: serviceProgress.value.length + 1,
        service_request_id: newRequest.id,
        status_id: 1,
        catatan: 'Service request received and registered',
        teknisi_id: newRequest.teknisi_id,
        teknisi_name: getTeknisiName(newRequest.teknisi_id),
        tanggal: newRequest.tanggal_masuk
      }
      serviceProgress.value.push(initialProgress)

      showSnackbar('Service request created successfully')
    }

    closeRequestDialog()
  } catch (error) {
    showSnackbar('Error saving service request', 'error')
  } finally {
    saving.value = false
  }
}


const deleteRequest = (request: ServiceRequest): void => {
  requestToDelete.value = request
  deleteDialog.value = true
}

const confirmDelete = async (): Promise<void> => {
  try {
    await new Promise(resolve => setTimeout(resolve, 500))

    // Remove service request
    const requestIndex = serviceRequests.value.findIndex(r => r.id === requestToDelete.value!.id)
    if (requestIndex !== -1) {
      serviceRequests.value.splice(requestIndex, 1)
    }

    // Remove related progress records
    serviceProgress.value = serviceProgress.value.filter(
      p => p.service_request_id !== requestToDelete.value!.id
    )

    // Clear selection if deleted request was selected
    if (selectedRequest.value?.id === requestToDelete.value!.id) {
      selectedRequest.value = null
    }

    showSnackbar('Service request deleted successfully')
    deleteDialog.value = false
    requestToDelete.value = null
  } catch (error) {
    showSnackbar('Error deleting service request', 'error')
  }
}

const exportToExcel = (): void => {
  showSnackbar('Excel export feature would be implemented here', 'info')
}

const exportToPDF = (): void => {
  showSnackbar('PDF export feature would be implemented here', 'info')
}

const printReport = (): void => {
  window.print()
}

</script>
