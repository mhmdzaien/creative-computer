import { defineStore } from "pinia"
import { computed, ref } from "vue"

export const useCurrentUserStore = defineStore('counter', () => {
    const count = ref(0)
    const user = ref(window.currentUser ?? {})

    return { user }
})