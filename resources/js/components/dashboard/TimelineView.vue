<script setup lang="ts">
import { ItemTimeline } from '../../types/timeline';

const props = defineProps<{ items: Array<ItemTimeline> }>()

function timeDifference(date) {
    const now = new Date() as any;
    const past = new Date(date) as any;
    const diffMs = now - past; // selisih dalam milidetik
    if (diffMs < 0) {
        return "Tanggal di masa depan";
    }
    const diffMinutes = Math.floor(diffMs / (1000 * 60));
    if (diffMinutes < 60) {
        return `${diffMinutes} menit yang lalu`;
    }
    const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
    if (diffHours < 24) {
        return `${diffHours} jam yang lalu`;
    }
    const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    return `${diffDays} hari yang lalu`;
}
</script>
<template>
    <div class="profiletimeline position-relative">


        <div v-for="item in props.items" class="sl-item my-4">
            <div class="sl-left float-left me-3">
                <img src="@/assets/images/users/user-2.jpg" height="56" alt="user" class="rounded-circle" />
            </div>
            <div class="sl-right w-100 ps-3">
                <RouterLink class="no-decoration" :to="`servis/progress/${item.service_request_id}`">
                    <div class="pt-1">
                        <div class="d-flex justify-space-between align-center pt-1">
                            <div class="d-md-flex align-center">
                                <h3 class="text-h6 cursor-pointer hover-primary lh-normal">{{ item.name }}</h3>
                                <div class="sl-date ms-3 text-subtitle-1 textSecondary">{{
                                    timeDifference(item.createdAt) }}</div>
                            </div>
                            <span class="badge text-bg-info text-15">{{ item.status }}</span>
                        </div>
                        <div class="mt-3 bg-lightprimary text-15 pa-5 rounded-md">
                            <span class="text-primary cursor-pointer">{{ item.barang }} milik {{ item.pelanggan
                                }}</span>
                            <p class="textSecondary">
                                Catatan: {{ item.catatan }}
                            </p>
                        </div>
                    </div>
                </RouterLink>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
.profiletimeline {
    position: relative;
    padding-left: 40px;
    margin: 10px 10px 0 30px;
    border-left: 1px solid rgb(var(--v-theme-inputBorder));

    .sl-item {
        margin-top: 8px;
        margin-bottom: 30px;
        display: flex;
    }

    .sl-left {
        margin-left: -68px;
        z-index: 1;
        margin-right: 15px;
    }
}

.no-decoration {
    text-decoration: none;
    color: inherit;
}
.badge {
    display: inline-block;
    padding: 0.25em 0.6em;
    font-size: 0.75rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    background-color: #007bff; /* warna biru */
    border-radius: 0.25rem;
    white-space: nowrap;
    vertical-align: baseline;
}
</style>
