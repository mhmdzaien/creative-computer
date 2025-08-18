<script setup>
import Logo from "@/assets/images/logo.png";

</script>
<style>
.brand {
    background-color: #fff;
    padding: 5px;
    border-radius: 10px;
}
</style>
<template>

    <RouterLink to="/" class="lh-0">
        <div class="d-flex align-center brand">
            <img :src="Logo" class="img-thumbnail" style="height: 40px;" alt="logo" />
        </div>
    </RouterLink>

</template>
