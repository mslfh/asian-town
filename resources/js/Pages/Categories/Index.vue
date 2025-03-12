<script setup>
import { ref, reactive } from "vue";
import { usePage, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { QDialog, QInput, QForm, QBtn } from 'quasar';

const { props } = usePage();
const categories = reactive(props.categories);
const filter = ref("");
const selectedNode = ref(null);
const dialog = ref(false);
const newCategoryName = ref("");

const form = useForm({
    name: '',
    chinese_name: '',
    parent_id: null,
});

const createCategory = (parentId = 0) => {
    selectedNode.value = parentId;
    dialog.value = true;
    form.name = '';
    form.chinese_name = '';
    form.parent_id = parentId;
};

const saveCategory = () => {
    form.post(route('categories.store'), {
        onSuccess: () => {
            dialog.value = false;
        }
    });
};

const deleteCategory = (id) => {
    // Logic to delete a category
};

const resetFilter = () => {
    filter.value = "";
    filterRef.value.focus();
};
</script>

<template>
    <AppLayout>
        <q-page class="q-pa-lg q-mt-md">
            <q-card>
                <q-toolbar>
                    <q-toolbar-title>Categories</q-toolbar-title>
                    <q-btn
                        label="Add Category"
                        @click="createCategory"
                        color="primary"
                    />
                </q-toolbar>
                <q-input filled v-model="filter" label="Filter" class="q-mb-md" />
                <q-tree
                    :nodes="categories"
                    node-key="id"
                    :filter="filter"
                    @update:selected="createCategory"
                />
            </q-card>
        </q-page>
        <q-dialog v-model="dialog">
            <q-card>
                <q-card-section>
                    <q-form @submit.prevent="saveCategory">
                        <q-input v-model="form.name" label="Category Name" />
                        <q-input v-model="form.chinese_name" label="Chinese Name" />
                        <q-btn type="submit" label="Save" color="primary" />
                        <q-btn type="button" label="Cancel" color="secondary" @click="dialog.value = false" />
                    </q-form>
                </q-card-section>
            </q-card>
        </q-dialog>
    </AppLayout>
</template>
