<template>
    <q-page>
        <q-toolbar>
            <q-toolbar-title>Products</q-toolbar-title>
            <q-btn label="Add Product" @click="createProduct" color="primary" />
        </q-toolbar>
        <q-list bordered>
            <q-item v-for="product in products" :key="product.id" clickable @click="viewProduct(product.id)">
                <q-item-section>{{ product.name }}</q-item-section>
                <q-item-section>{{ product.description }}</q-item-section>
                <q-item-section>{{ product.price }}</q-item-section>
            </q-item>
        </q-list>
    </q-page>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const products = ref(props.products);

const createProduct = () => {
    // Logic to create a product
};

const viewProduct = (id) => {
    // Logic to view a product
};
</script>
