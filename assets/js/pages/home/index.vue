<template>
    <div id="wp-bg" class="tw-w-full tw-min-h-screen tw-flex tw-flex-col tw-gap-10 tw-items-center tw-justify-center">
        <div class="tw-rounded-3xl tw-p-8 tw-text-center tw-bg-clip-padding tw-backdrop-filter tw-backdrop-blur-lg tw-bg-opacity-30 tw-bg-gray-900 tw-flex tw-flex-col tw-gap-2 tw-select-none animate__animated animate__zoomInDown">
            <h1 class="tw-text-6xl tw-font-semibold tw-text-white">Location project</h1>
        </div>

        <div class="tw-flex tw-gap-5">
            <router-link class="button animate__animated animate__slideInLeft" :to="{name: 'cyril'}">
                Le truc de Cyril
            </router-link>

            <router-link class="button animate__animated animate__slideInRight" :to="{name: 'guillaume'}">
                Le truc de Guillaume
            </router-link>
        </div>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.button {
    @apply
        tw-text-white
        tw-cursor-pointer
        tw-rounded-2xl
        tw-p-5
        tw-text-center
        tw-bg-clip-padding
        tw-backdrop-filter tw-backdrop-blur-lg tw-bg-opacity-30 tw-bg-gray-900
        tw-flex tw-flex-col tw-gap-2
        tw-select-none
        hover:tw-brightness-150 hover:tw-shadow-lg
        tw-transition-all;
}
</style>
