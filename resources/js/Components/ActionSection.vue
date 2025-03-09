<script setup>
import SectionTitle from './SectionTitle.vue';
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <div class="text-h6 text-grey-7"><slot name="title" /></div>

            </template>
            <template #description>
                <div class="text-grey">
                    <slot name="description" />
                </div>
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
