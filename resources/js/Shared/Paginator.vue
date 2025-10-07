<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'

    /**
     * One pagination link from Laravel's paginator.
     */

    export interface PaginationLink {
        url: string | null
        label: string
        active: boolean
    }

    /**
     * Props
     */
    defineProps<{
        links: PaginationLink[]
    }>();

</script>

<template>
    <div
    v-if="links.length > 0"
    class="flex flex-wrap gap-1 mt-6 justify-center"
  >
    <template v-for="link in links" :key="link.label">
      <!-- Clickable link -->
      <Link
        v-if="link.url"
        :href="link.url"
        v-html="link.label"
        class="px-3 py-1 border rounded text-sm"
        :class="{
          'bg-indigo-600 text-white border-indigo-600': link.active,
          'hover:bg-gray-100': !link.active
        }"
      />

      <!-- Disabled span (null url) -->
      <span
        v-else
        v-html="link.label"
        class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed text-sm"
      />
    </template>
  </div>
</template>