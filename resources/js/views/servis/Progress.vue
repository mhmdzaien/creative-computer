<script setup lang="ts">
import axios from 'axios';
import { onMounted, reactive, ref } from 'vue'

import { useRoute } from 'vue-router';
import { SelectOption, ServiceProgress, ServiceRequest } from '../../types/servis';
import { formatCurrency, formatDate, getStatusColor, getStatusText, loadStatus } from '../../plugins/servis-utils';
import { useCurrentUserStore } from '../../stores/current-user.store';

const serviceRequest = ref<ServiceRequest | null>()
const progressDialog = ref<boolean>(false)
const saving = ref<boolean>(false);
const currentUser = useCurrentUserStore();
const validationError = ref<any>({});
const statusOptions = ref<SelectOption[]>([]);
const loadingStatus = ref(false);
  const { id } = useRoute().params as {id : string};

const serviceProgress = ref<ServiceProgress>({
  service_request_id: id as string,
  status_id: 2,
  catatan: '',
  tanggal: new Date().toISOString().substr(0, 10)
})

onMounted(() => {
  fetchStatus();
  fetchProgress();
})

const fetchStatus = () => {
  loadingStatus.value = true;
  loadStatus().then(status => {
    statusOptions.value = status;
  }).finally(() => {
    loadingStatus.value = false;
  })
}

const fetchProgress = () => {
  axios.get(`/api/service-request/${id}`).then(res => {
    serviceRequest.value = res.data;
  })
}

const closeProgressDialog = (): void => {
  progressDialog.value = false
}

const openProgressDialog = () => {
  progressDialog.value = true;
  serviceProgress.value = {
    service_request_id: id,
    status_id: 2,
    catatan: '',
    tanggal: new Date().toISOString().substr(0, 10)
  };
  fetchStatus();
}

const saveProgress = async (): Promise<void> => {
  saving.value = true
  try {
    await axios.post(`/api/service-progress`, serviceProgress.value)
    serviceRequest.value?.progress?.push(serviceProgress.value)
    currentUser.showSnackbar('Progress updated successfully')
    closeProgressDialog()
  } catch (error) {
    if (error.status == 422) {
      validationError.value = error.response?.data.errors;
    } else {
      currentUser.showSnackbar(error.response?.data?.message ?? error.message, 'error')
    }
  } finally {
    saving.value = false
  }
}

</script>
<template>
  <v-row>


    <!-- Progress Panel -->
    <v-col cols="12" lg="7" v-if="serviceRequest">
      <v-card class="mb-6" elevation="2">
        <v-card-title class="d-flex align-center justify-space-between">
          <div>
            <v-icon class="mr-2">mdi-clipboard-text</v-icon>
            Informasi
          </div>
          <v-btn small color="secondary" to="/servis">
            Kembali
          </v-btn>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
          <v-row>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest.nomor" label="Nomor Service"
                prepend-inner-icon="mdi-identifier" readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.barang" label="Barang/Produk" prepend-inner-icon="mdi-laptop"
                readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.tanggal_masuk" label="Tanggal Masuk"
                prepend-inner-icon="mdi-calendar" readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.estimasi_selesai" label="Estimasi Selesai"
                prepend-inner-icon="mdi-calendar-check" readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12">
              <v-textarea :model-value="serviceRequest?.keluhan" label="Keluhan" prepend-inner-icon="mdi-message-text"
                readonly variant="outlined" rows="4" auto-grow />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.teknisi?.name" label="Teknisi"
                prepend-inner-icon="mdi-account" readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="formatCurrency(serviceRequest?.estimasi_biaya)" label="Estimasi Biaya"
                prepend-inner-icon="mdi-currency-usd" readonly variant="outlined" density="comfortable" />
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>

      <!-- Customer Information -->
      <v-card class="mb-6" elevation="2">
        <v-card-title class="d-flex align-center">
          <v-icon class="mr-2">mdi-account</v-icon>
          Informasi Pelanggan
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
          <v-row>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.pelanggan" label="Nama Pelanggan"
                prepend-inner-icon="mdi-account-circle" readonly variant="outlined" density="comfortable" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field :model-value="serviceRequest?.kontak_pelanggan" label="Kontak Pelanggan"
                prepend-inner-icon="mdi-phone" readonly variant="outlined" density="comfortable" />
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>
    </v-col>

    <v-col cols="12" lg="5" v-if="serviceRequest">
      <v-card>
        <v-card-title class="d-flex align-center justify-space-between">
          <span class="text-h6">Progress Tracking</span>
          <v-btn small color="success" @click="openProgressDialog">
            <v-icon left small>mdi-plus</v-icon>
            Add Progress
          </v-btn>
        </v-card-title>
        <v-card-text class="py-0">
          <v-timeline>
            <v-timeline-item v-for="progress in serviceRequest.progress" :key="progress.id"
              :dot-color="getStatusColor(progress.status_id)" small>
              <div>
                <span class="text-caption">{{ formatDate(progress.tanggal) }}</span>
                <div class="text-h6">{{ getStatusText(progress.status_id) }}</div>
                <div class="text-body-2">{{ progress.catatan }}</div>
                <div class="text-caption">Teknisi: {{ serviceRequest.teknisi?.name }}</div>
              </div>
            </v-timeline-item>
          </v-timeline>
        </v-card-text>
      </v-card>
    </v-col>

    <!-- Add Progress Dialog -->
    <v-dialog v-model="progressDialog" max-width="600px" persistent>
      <v-card>
        <v-card-title>
          <span class="text-h5">Add Progress Update</span>
        </v-card-title>

        <v-card-text>
          <v-form ref="progressForm">
            <v-row>
              <v-col cols="12">
                <v-select v-model="serviceProgress.status_id" :items="statusOptions" :loading="loadingStatus"
                  label="Status*" :error-messages="validationError.status_id?.at(0)"></v-select>
              </v-col>
              <v-col cols="12">
                <v-text-field v-model="serviceProgress.tanggal" label="Tanggal*" type="date"
                  :error-messages="validationError.tanggal?.at(0)"></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-textarea v-model="serviceProgress.catatan" label="Catatan*"
                  :error-messages="validationError.catatan?.at(0)" rows="3"></v-textarea>
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn text @click="closeProgressDialog">Batal</v-btn>
          <v-btn color="primary" @click="saveProgress" :disabled="saving" :loading="saving">
            Simpan
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>