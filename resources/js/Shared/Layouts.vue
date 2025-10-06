<script setup lang="ts">
    import Nav from './Nav.vue';
    // import { Head } from '@inertiajs/vue3';

    defineProps<{
        username?: string
    }>();
</script>

<template>
    <Head>
        <title>My App - home</title>
        <meta type="description" content="Layout of the app" head-key="description">
    </Head>

    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <!-- <p class="text-sm ml-4">Welcome Back, {{ $page.props.auth.user.username }}</p> -->
            </div>
            
            <Nav />
        </header>
    </section>

    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot></slot>
        </div>
    </section>
</template>