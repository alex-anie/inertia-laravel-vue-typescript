<script setup lang="ts">
    import Layouts from '@/Shared/Layouts.vue';
    import Paginator, { PaginationLink } from '@/Shared/Paginator.vue';
    import { Link, Head, router } from '@inertiajs/vue3';
    import { ref, watch } from 'vue';
    
    defineOptions({
        layout: Layouts
    });

    interface User {
        id: number
        name: string
    }

    interface Paginated<T> {
        data: T[]
        links: PaginationLink[]
    }

    interface Filter {
        search?: string
    }

    const props = defineProps<{
        users: Paginated<User>,
        filters: Filter
    }>()

    // bind initial search value from backend
    const search = ref(props.filters.search || '');

    watch(search, (value) => {
        router.get('/users',
            {search: value},
            {
                preserveState: true,
                replace: true
            }
        )
    });

</script>

<template>
    <Head title="my users" />

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl">Users</h1>
        <input v-model="search" type="text" placeholder="Sweater..." class="border px-2 rounded-2xl"/>
    </div>

    <table class="min-w-full divide-y divide-gray-200 border">
    <tbody class="divide-y divide-gray-200">
    <tr v-for="user in users.data" :key="user.id">
        <td class="px-6 py-3 text-gray-900">{{ user.name }}</td>

        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
        </td>
    </tr>
    </tbody>
</table>

    <!-- Reusable paginator -->
    <Paginator :links="users.links" />
    
</template>

