<template>
    <q-page>
        <div class="row q-col-gutter-sm">
                <div>Name: {{ category.name }}</div>
                <div>Description: {{ category.description }}</div>
    </div>
    </q-page>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const category = ref(props.category);
</script>
