
// Types
interface ServiceRequest {
  id: string
  nomor: string
  pelanggan: string
  kontak_pelanggan: string
  barang: string
  category_id: string
  tanggal_masuk: string
  estimasi_selesai: string
  teknisi_id: number
  estimasi_biaya: number
  keluhan: string
  current_progress_id: number
  current_status: number
}

interface ServiceProgress {
  id: number
  service_request_id: string
  status_id: number
  catatan: string
  teknisi_id: number
  teknisi_name: string
  tanggal: string
}