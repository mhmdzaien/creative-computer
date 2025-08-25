
// Types

export interface SelectOption {
  title: string
  value: string | number
}

export interface Teknisi {
  id:number;
  name:string;
  email:string;
}
export interface ServiceRequest {
  id?: string
  nomor?: string
  pelanggan: string
  kontak_pelanggan: string
  barang: string
  category_id: number | null
  tanggal_masuk: string
  estimasi_selesai: string
  teknisi_id: number | null
  teknisi?: Teknisi
  estimasi_biaya: number
  keluhan: string
  current_progress_id?: number
  current_progress?: ServiceProgress,
  kelengkapan: string[],
  jenis_layanan: string[],
  progress?:ServiceProgress[],
}

export interface ServiceProgress {
  id?: number
  service_request_id: string
  status_id: number
  catatan: string
  teknisi_id?: number
  tanggal: string
}