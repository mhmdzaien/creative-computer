<script setup lang="ts">
import { onMounted, ref, shallowRef, watch } from 'vue';
import sidebarItems from './vertical-sidebar/sidebarItem';
import NavGroup from './vertical-sidebar/NavGroup/index.vue';
import NavItem from './vertical-sidebar/NavItem/index.vue';
import { Icon } from '@iconify/vue';
import Logo from './logo/Logo.vue';

import ProfileDD from './vertical-header/ProfileDD.vue';
import NavCollapse from './vertical-sidebar/NavCollapse/NavCollapse.vue';
import SidebarProfile from './vertical-header/SidebarProfile.vue';
import Topbar from './Topbar.vue';
import { useDisplay } from 'vuetify/lib/framework.mjs';
const sidebarMenu = shallowRef(sidebarItems);
const sDrawer = ref(true);

const { mdAndDown } = useDisplay();
onMounted(() => {
    sDrawer.value = !mdAndDown.value; // hide on mobile, show on desktop
});
watch(mdAndDown, (val) => {
    sDrawer.value = !val;
});
</script>

<template>

    <!------Header-------->
    <v-app-bar elevation="0" height="65" class="bg-primary px-6">
        <div class="d-flex align-center justify-space-between w-100">
            <div class="d-flex ga-lg-16 ga-3 align-center">
                <Logo class="d-sm-flex d-none" />
                <v-btn class="hidden-lg-and-up" @click="sDrawer = !sDrawer" rounded="pill" height="40" width="40">
                    <Icon icon="solar:list-bold" height="22" />
                </v-btn>

            </div>
            <div>
                <ProfileDD />
            </div>
        </div>
    </v-app-bar>
    <v-main>
        <v-navigation-drawer left elevation="0" app class="leftSidebar" :width="270" v-model="sDrawer">
            <!-- ---------------------------------------------- -->
            <!---Navigation -->
            <!-- ---------------------------------------------- -->

            <perfect-scrollbar class="scrollnavbar">
                <div class="profile">
                    <div class="profile-img py-5 px-3"></div>
                    <div class="profile-name d-flex align-center px-3">
                        <div class="profile-logout w-100">
                            <SidebarProfile />
                        </div>
                    </div>
                </div>
                <v-list class="px-4 py-4">
                    <!---Menu Loop -->
                    <template v-for="(item, i) in sidebarMenu">
                        <!---Item Sub Header -->
                        <NavGroup :item="item" v-if="item.header" :key="item.title" />

                        <NavCollapse class="leftPadding" :item="item" :level="0" v-else-if="item.children" />
                        <!---Single Item-->
                        <NavItem :item="item" v-else class="leftPadding" />
                        <!---End Single Item-->
                    </template>
                </v-list>
            </perfect-scrollbar>
        </v-navigation-drawer>
        <v-container class="page-wrapper">
            <div class="maxWidth">
                <RouterView />
            </div>
        </v-container>
    </v-main>

</template>
