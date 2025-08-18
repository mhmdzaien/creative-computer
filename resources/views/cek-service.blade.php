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
                            <small>Contoh nomor servis: SRV001, SRV002, SRV003</small>
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
                                    <h3 class="text-dark fw-bold mb-1">@{{ serviceData.deviceType }}</h3>
                                    <div class="text-muted fs-5">@{{ serviceData.brand }} @{{ serviceData.model }}</div>
                                </div>
                            </div>
                            <div class="badge bg-success rounded-pill px-3 py-2 fs-6">
                                Selesai - Siap Diambil
                            </div>
                        </div>

                        <!-- Details Section -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Nomor Servis:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.serviceNumber }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Nama Pelanggan:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.customerName }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Tanggal Masuk:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.dateReceived }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted fw-medium">Estimasi Selesai:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.estimatedCompletion }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fw-medium">Teknisi:</span>
                                    <span class="text-dark fw-semibold">@{{ serviceData.technician }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted fw-medium">Estimasi Biaya:</span>
                                    <span class="text-success fw-bold">Rp @{{ formatCurrency(serviceData.cost) }}</span>
                                </div>
                                <div class="bg-light rounded-3 p-3 mb-4">
                                    <div class="fw-semibold text-dark mb-2">Keluhan:</div>
                                    <div class="text-dark">@{{ serviceData.complaint }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-dark fw-semibold mb-4">
                                    <i class="fas fa-cog me-2"></i>
                                    Progress Perbaikan
                                </h5>

                                <div class="position-relative">
                                    <div
                                        v-for="(step, index) in serviceData.progressSteps"
                                        :key="index"
                                        class="d-flex align-items-start mb-4 position-relative">
                                        <!-- Progress Line -->
                                        <div
                                            v-if="index < serviceData.progressSteps.length - 1"
                                            :class="[ step.completed ? 'completed':'uncompleted']"
                                            class="progress-line"></div>

                                        <!-- Progress Dot -->
                                        <div
                                            :class="step.completed ? 'bg-success text-white' : 'bg-warning text-white'"
                                            class="progress-dot rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                            <i v-if="step.completed" class="fas fa-check"></i>
                                            <span v-else class="fw-bold"></span>
                                        </div>

                                        <!-- Progress Content -->
                                        <div>
                                            <div class="text-dark fw-semibold mb-1">@{{ step.title }}</div>
                                            <div class="text-muted small">@{{ step.date }}</div>
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
                sampleData: {
                    'SRV001': {
                        serviceNumber: 'SRV001',
                        deviceType: 'Laptop',
                        brand: 'Dell',
                        model: 'Inspiron 15 3000',
                        customerName: 'Ahmad Rizky',
                        dateReceived: '2024-01-08',
                        estimatedCompletion: '2024-01-10',
                        technician: 'Dedi Kurniawan',
                        cost: 450000,
                        complaint: 'Laptop tidak bisa menyala, kemungkinan masalah pada power supply',
                        progressSteps: [{
                                title: 'Perangkat diterima dan dilakukan diagnosa',
                                date: '2024-01-08',
                                completed: true
                            },
                            {
                                title: 'Pembersihan dan perbaikan komponen',
                                date: '2024-01-09',
                                completed: true
                            },
                            {
                                title: 'Testing dan quality check selesai',
                                date: '2024-01-10',
                                completed: true
                            }
                        ]
                    },
                    'SRV002': {
                        serviceNumber: 'SRV002',
                        deviceType: 'Printer',
                        brand: 'Canon',
                        model: 'PIXMA G2010',
                        customerName: 'Siti Nurhaliza',
                        dateReceived: '2024-01-08',
                        estimatedCompletion: '2024-01-10',
                        technician: 'Dedi Kurniawan',
                        cost: 75000,
                        complaint: 'Printer tidak bisa print, head printer kotor',
                        progressSteps: [{
                                title: 'Perangkat diterima dan dilakukan diagnosa',
                                date: '2024-01-08',
                                completed: true
                            },
                            {
                                title: 'Pembersihan head printer dan kalibrasi',
                                date: '2024-01-09',
                                completed: true
                            },
                            {
                                title: 'Testing dan quality check selesai',
                                date: '2024-01-10',
                                completed: true
                            }
                        ]
                    },
                    'SRV003': {
                        serviceNumber: 'SRV003',
                        deviceType: 'PC Desktop',
                        brand: 'Asus',
                        model: 'VivoPC X441MA',
                        customerName: 'Budi Santoso',
                        dateReceived: '2024-01-07',
                        estimatedCompletion: '2024-01-12',
                        technician: 'Andi Wijaya',
                        cost: 850000,
                        complaint: 'Komputer sering hang dan blue screen, perlu penggantian RAM',
                        progressSteps: [{
                                title: 'Perangkat diterima dan dilakukan diagnosa',
                                date: '2024-01-07',
                                completed: true
                            },
                            {
                                title: 'Penggantian RAM dan pembersihan sistem',
                                date: '2024-01-08',
                                completed: true
                            },
                            {
                                title: 'Testing dan quality check selesai',
                                date: '2024-01-10',
                                completed: false
                            }
                        ]
                    }
                }
            }
        },
        methods: {
            searchService() {
                this.loading = true;
                this.notFound = false;
                this.serviceData = null;

                // Simulate API call
                setTimeout(() => {
                    const data = this.sampleData[this.searchNumber.toUpperCase()];
                    if (data) {
                        this.serviceData = data;
                    } else {
                        this.notFound = true;
                    }
                    this.loading = false;
                }, 1500);
            },

            resetSearch() {
                this.searchNumber = '';
                this.serviceData = null;
                this.notFound = false;
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