<template>
    <q-page>
        <q-toolbar>
            <q-toolbar-title>Product Details</q-toolbar-title>
        </q-toolbar>
        <q-card>
            <q-card-section>
                <div>Name: {{ product.name }}</div>
                <div>Description: {{ product.description }}</div>
                <div>Price: {{ product.price }}</div>
            </q-card-section>
        </q-card>
    </q-page>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const product = ref(props.product);
</script>
