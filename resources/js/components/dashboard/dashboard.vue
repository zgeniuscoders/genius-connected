<template>
    <nav-left/>
    <div class="relative left-300" style="width: calc(100% - 300px);">
        <nav-top/>
        <slot></slot>
    </div>
</template>

<script setup>
import NavLeft from "./navLeft.vue";
import NavTop from "./navTop.vue";
</script>

