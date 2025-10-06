<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';

    defineProps<{
        active: boolean,
    }>();
</script>

<template>
    <Link 
        href="/" 
        class="text-black hover:underline" 
        :class="{'font-bold underline': active}">
        <slot></slot>
    </Link>
</template>