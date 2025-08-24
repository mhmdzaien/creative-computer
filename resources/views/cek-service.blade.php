@extends('layouts.frontend')
@section('stylesheet')
<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
    }

    .progress-dot {
        width: 30px;
        height: 30px;
    }

    .progress-line {
        position: absolute;
        left: 15px;
        top: 40px;
        height: 50px;
        width: 2px;
        background: #e9ecef;
    }

    .progress-line.completed {
        background: #28a745;
    }

    .progress-line.uncompleted {
        background: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important;
    }
</style>
@endsection
@section('content')

<div id="app" class="hero__v6">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Search Section -->
                <div class="card glass-effect rounded-4 border-0 shadow-lg mb-4">
                    <div class="card-body p-4">
                        <h2 class="text-center text-dark fw-bold mb-4">
                            <i class="fas fa-search me-2"></i>
                            Lacak Status Servis
                        </h2>
                        <form @submit.prevent="searchService">
                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control form-control-lg rounded-pill text-center border-2"
                                    placeholder="Masukkan nomor servis"
                                    v-model="searchNumber"
                                    required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg text-white fw-semibold rounded-pill" :disabled="loading">
                                    <span v-if="loading">
                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                        Mencari...
                                    </span>
                                    <span v-else>
                                        Cek Status
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="text-center text-muted mt-3">
                            <small>Contoh nomor servis: SRV202500001</small>
                        </div>
                    </div>
                </div>

                <!-- Result Section -->

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div v-if="serviceData" class="card glass-effect rounded-4 border-0 shadow-lg">
                    <div class="card-body p-4">
                        <!-- Device Header -->
                        <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom border-2">
                            <div class="d-flex align-items-center">
                                <i :class="getDeviceIcon(serviceData.deviceType)" class="text-primary me-3" style="font-size: 3rem;"></i>
                                <div>
                                    <h3 class="text-dark fw-bold mb-1">@{{ serviceData.barang }}</h3>
                                    <div class="text-muted fs-5">@{{ serviceData.brand }} @{{ serviceData.model }}</div>
                                </div>
                            </div>
                            <div class="badge bg-success rounded-pill px-3 py-2 fs-6">
                                @{{ getStatus(serviceData.current_progress.status_id).status }}
                            </div>
                        </div>

                        <!-- Details Section -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Nomor Servis:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.nomor }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Nama Pelanggan:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.pelanggan }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Tanggal Masuk:</span>
                                    <span class="text-dark fw-semibold">@{{ formatDate(serviceData.tanggal_masuk) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted fw-medium">Estimasi Selesai:</span>
                                    <span class="text-dark fw-semibold">@{{ formatDate(serviceData.estimasi_selesai) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Teknisi:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.teknisi.name }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted fw-medium">Estimasi Biaya:</span>
                                    <span class="text-success fw-bold">Rp @{{ formatCurrency(serviceData.estimasi_biaya) }}</span>
                                </div>
                                <div class="bg-light rounded-3 p-3 mb-4">
                                    <div class="fw-semibold text-dark mb-2">Keluhan:</div>
                                    <div class="text-dark">@{{ serviceData.keluhan }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-dark fw-semibold mb-4">
                                    <i class="fas fa-cog me-2"></i>
                                    Progress Perbaikan
                                </h5>

                                <div class="position-relative">
                                    <div
                                        v-for="(step, index) in serviceData.progress"
                                        :key="index"
                                        class="d-flex align-items-start mb-4 position-relative">
                                        <!-- Progress Line -->
                                        <div
                                            v-if="index < serviceData.progress.length - 1"
                                            :class="[ step.status_id == 1 ? 'completed':'uncompleted']"
                                            class="progress-line"></div>

                                        <!-- Progress Dot -->
                                        <div
                                            :class="step.status_id == 1 ? 'bg-success text-white' : 'bg-warning text-white'"
                                            class="progress-dot rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                            <i v-if="step.status_id == 1" class="fas fa-check"></i>
                                            <span v-else class="fw-bold"></span>
                                        </div>

                                        <!-- Progress Content -->
                                        <div>
                                            <div class="text-dark fw-semibold mb-1">@{{ getStatus(step.status_id).status }}</div>
                                            <div class="text-muted fw-semibold mb-1">@{{ step.catatan }}</div>
                                            <div class="text-muted small">@{{ step.tanggal }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Not Found Section -->
                <div v-if="notFound" class="card glass-effect rounded-4 border-0 shadow-lg">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-search text-muted mb-3" style="font-size: 4rem;"></i>
                        <h4 class="text-dark mb-3">Nomor servis tidak ditemukan</h4>
                        <p class="text-muted mb-4">Pastikan nomor servis yang Anda masukkan benar</p>
                        <button class="btn btn-primary btn-lg rounded-pill px-4" @click="resetSearch">
                            Coba Lagi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.global.min.js"></script>
<script>
    const {
        createApp
    } = Vue;

    createApp({
        data() {
            return {
                searchNumber: '',
                serviceData: null,
                loading: false,
                notFound: false,
                statusList: <?= $status->toJson(); ?>
            }
        },
        methods: {
            searchService() {
                this.loading = true;
                this.notFound = false;
                this.serviceData = null;
                fetch(`/service-status/${this.searchNumber}`).then(async (res) => {
                    try {
                        const data = await res.json();
                        this.serviceData = data;
                    } catch {
                        this.notFound = true;
                    }
                }).catch(error => {
                    this.notFound = true;
                }).finally(() => {
                    this.loading = false;
                })
            },
            getStatus(id) {
                return this.statusList.find(item => item.id == id) ?? {};
            },
            resetSearch() {
                this.searchNumber = '';
                this.serviceData = null;
                this.notFound = false;
            },

            formatDate(dateString) {
                if (!dateString) return 'N/A'
                return new Date(dateString).toLocaleDateString('id-ID')
            },

            getDeviceIcon(deviceType) {
                const icons = {
                    'Laptop': 'fas fa-laptop',
                    'PC Desktop': 'fas fa-desktop',
                    'Printer': 'fas fa-print',
                    'Monitor': 'fas fa-tv'
                };
                return icons[deviceType] || 'fas fa-computer';
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('id-ID').format(amount);
            }
        }
    }).mount('#app');
</script>
@endsection