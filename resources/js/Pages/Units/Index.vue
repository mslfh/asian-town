<template>
    <q-page>
        <q-toolbar>
            <q-toolbar-title>Units</q-toolbar-title>
            <q-btn label="Add Unit" @click="createUnit" color="primary" />
        </q-toolbar>
        <q-list bordered>
            <q-item v-for="unit in units" :key="unit.id" clickable @click="viewUnit(unit.id)">
                <q-item-section>{{ unit.name }}</q-item-section>
                <q-item-section>{{ unit.description }}</q-item-section>
            </q-item>
        </q-list>
    </q-page>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const units = ref(props.units);

const createUnit = () => {
    // Logic to create a unit
};

const viewUnit = (id) => {
    // Logic to view a unit
};
</script>
