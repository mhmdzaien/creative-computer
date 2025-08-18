<script setup lang="ts">
import { Icon } from '@iconify/vue';

import { useCurrentUserStore } from '@/stores/current-user.store';

const currentUser = useCurrentUserStore();

const SideProfile = [
    {
        id: 1,
        color: 'primary',
        title: 'My Profile'
    }
];
</script>

<template>
    <v-menu open-on-click>
        <template v-slot:activator="{ props }">
            <div class="d-flex  w-100 cursor-pointer" v-bind="props">

                <h4 class="font-weight-medium text-15 text-surface">{{ currentUser.user.name }}</h4>
            </div>
        </template>
    </v-menu>
</template>
