import axios from "axios"
import { SelectOption } from "../types/servis"


let categoryOptions: SelectOption[] = []
let statusOptions: SelectOption[] = []

export const loadReference = () => {
  loadStatus();
  loadCategory();
}

export const loadStatus = async () => {
  try {
    const response = await axios.get('/api/status');
    statusOptions = response.data.map(item => ({title:item.status,value:item.id}));
  }catch(error){
    console.log(error)
    statusOptions = [];
  }
  return statusOptions;
}
export const loadCategory = async () => {
  try {
    const response = await axios.get('/api/category');
    categoryOptions = response.data.map(item => ({title:item.category,value:item.id}));
  }catch(error){
    console.log(error)
    categoryOptions = [];
  }
  return categoryOptions;
}
export const getStatusColor = (statusId: number): string => {
  const colors: Record<number, string> = {
    1: 'success',
    2: 'black',
  }
  return colors[statusId] || 'warning'
}

export const getStatusText = (statusId: number): string => {
  const status = statusOptions.find(s => s.value == statusId)
  return status ? status.title : 'Unknown'
}

export const getCategoryText = (categoryId: string): string => {
  const category = categoryOptions.find(c => c.value === categoryId)
  return category ? category.title : categoryId
}

export const formatDate = (dateString: string): string => {
  if (!dateString) return 'N/A'
  return new Date(dateString).toLocaleDateString('id-ID')
}

export const formatCurrency = (amount ? : number): string => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(amount ?? 0)
}
