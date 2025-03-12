<template>
    <q-page>
        <q-toolbar>
            <q-toolbar-title>Unit Details</q-toolbar-title>
        </q-toolbar>
        <q-card>
            <q-card-section>
                <div>Name: {{ unit.name }}</div>
                <div>Description: {{ unit.description }}</div>
            </q-card-section>
        </q-card>
    </q-page>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const unit = ref(props.unit);
</script>
