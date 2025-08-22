import { defineStore } from "pinia"
import { computed, ref } from "vue"

export const useCurrentUserStore = defineStore('counter', () => {
    const user = ref(window.currentUser ?? {})

    const snackbar = ref({
        show: false,
        message: '',
        color: 'success'
    })

    // Methods
    const showSnackbar = (message, color = 'success') => {
        snackbar.value.message = message
        snackbar.value.color = color
        snackbar.value.show = true
    }

    return { user, snackbar,showSnackbar }
})