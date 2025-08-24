<template>
  <RouterView></RouterView>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { RouterView } from "vue-router";
import { loadReference } from "./plugins/servis-utils";
onMounted(() => {
  loadReference();
})
</script>