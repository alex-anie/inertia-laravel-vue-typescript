<script setup lang="ts">
    import Layouts from '@/Shared/Layouts.vue';
    import Paginator, {PaginationLink} from '@/Shared/Paginator.vue';
    import { Link, Head } from '@inertiajs/vue3';

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

    defineProps<{
        users: Paginated<User>
    }>()

</script>

<template>
    <Head title="my users" />
    <h1 class="text-2xl mb-4">Users</h1>

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

