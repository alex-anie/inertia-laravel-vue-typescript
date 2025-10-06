<script setup lang="ts">
    import Layouts from '@/Shared/Layouts.vue';
    // import { Head } from '@inertiajs/vue3';

    defineOptions({
        layout: Layouts
    });

</script>

<template>
    <Head>
        <title>My App - home</title>
        <meta type="description" content="Information about my app" head-key="description">
    </Head>
    <h1 class="text-3xl mb-4">Home</h1>
</template>
