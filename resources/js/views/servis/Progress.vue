<script setup lang="ts">
import { reactive, ref } from 'vue'


const selectedRequest = ref<ServiceRequest | null>(null)
const selectedRequestDetail = ref<ServiceRequest | null>(null)

const editedProgress = reactive<Partial<ServiceProgress>>({
  service_request_id: '',
  status_id: null,
  catatan: '',
  teknisi_id: null,
  tanggal: new Date().toISOString().substr(0, 10)
})


const selectRequest = (request: ServiceRequest): void => {
  selectedRequest.value = request
}


const openProgressDialog = (): void => {
  if (!selectedRequest.value) return

  Object.assign(editedProgress, {
    service_request_id: selectedRequest.value.id,
    status_id: null,
    catatan: '',
    teknisi_id: selectedRequest.value.teknisi_id,
    tanggal: new Date().toISOString().substr(0, 10)
  })
  progressDialog.value = true
}

const closeProgressDialog = (): void => {
  progressDialog.value = false
}

const saveProgress = async (): Promise<void> => {
  if (!progressValid.value) return

  saving.value = true
  try {
    await new Promise(resolve => setTimeout(resolve, 500))

    const newProgress: ServiceProgress = {
      id: serviceProgress.value.length + 1,
      ...editedProgress,
      teknisi_name: getTeknisiName(editedProgress.teknisi_id!)
    } as ServiceProgress

    serviceProgress.value.push(newProgress)

    // Update current status in service request
    const requestIndex = serviceRequests.value.findIndex(r => r.id === selectedRequest.value!.id)
    if (requestIndex !== -1) {
      serviceRequests.value[requestIndex].current_status = editedProgress.status_id!
      serviceRequests.value[requestIndex].current_progress_id = newProgress.id
      selectedRequest.value!.current_status = editedProgress.status_id!
    }

    showSnackbar('Progress updated successfully')
    closeProgressDialog()
  } catch (error) {
    showSnackbar('Error saving progress', 'error')
  } finally {
    saving.value = false
  }
}

const viewProgress = (request: ServiceRequest): void => {
  selectedRequest.value = request
}

const viewProgressDetail = (request: ServiceRequest): void => {
  selectedRequestDetail.value = request
  progressDetailDialog.value = true
}

const openProgressFromDetail = (): void => {
  if (!selectedRequestDetail.value) return

  Object.assign(editedProgress, {
    service_request_id: selectedRequestDetail.value.id,
    status_id: null,
    catatan: '',
    teknisi_id: selectedRequestDetail.value.teknisi_id,
    tanggal: new Date().toISOString().substr(0, 10)
  })
  progressDialog.value = true
}
</script>
<template>
    <v-row>

        <!-- Progress Panel -->
        <v-col cols="12" lg="4" v-if="selectedRequest">
            <v-card>
                <v-card-title class="d-flex align-center justify-space-between">
                    <span class="text-h6">Progress Tracking</span>
                    <v-btn small color="success" @click="openProgressDialog">
                        <v-icon left small>mdi-plus</v-icon>
                        Add Progress
                    </v-btn>
                </v-card-title>

                <v-card-subtitle>
                    {{ selectedRequest.nomor }} - {{ selectedRequest.pelanggan }}
                </v-card-subtitle>

                <v-card-text>
                    <v-timeline dense>
                        <v-timeline-item v-for="progress in selectedProgress" :key="progress.id"
                            :color="getStatusColor(progress.status_id)" small>
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
</template>

<style scoped>
.v-timeline-item {
    margin-bottom: 16px;
}
</style>