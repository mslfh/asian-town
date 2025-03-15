<script setup>
import { ref } from "vue";
import { usePage, useForm, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useQuasar, QDialog, QInput, QForm, QBtn, QTree } from "quasar";

const { props } = usePage();
const categories = ref(props.categories);
const dialog = ref(false);
const selected = ref(null);
const $q = useQuasar();

const form = useForm({
    name: "",
    chinese_name: "",
    parent_id: 0,
});

const resetFilter = () => {
    filter.value = "";
    filterRef.value.focus();
};

const openDialog = () => {
    if (selected.value) {
        form.parent_id = selected.value;
    }
    dialog.value = true;
};

const submitForm = () => {
    form.post(route("categories.store"), {
        onSuccess: (response) => {
            dialog.value = false;
            $q.notify({
                message: "Category created successfully",
                timeout: 1000,
                color: "purple",
            });
            categories.value = response.props.categories;
        },
        onError: (error) => {
            $q.notify({
                message: "Error creating category",
                timeout: 1000,
                color: "red",
            });
        },
    });
};

const deleteCategory = () => {
    if (selected.value) {
        $q.dialog({
            title: 'Confirm',
            message: 'Are you sure you want to delete this category?',
            cancel: true,
            persistent: true
        }).onOk(() => {
            router.delete(route('categories.destroy', selected.value), {
                onSuccess: (response) => {
                    $q.notify({
                        message: 'Category deleted successfully',
                        timeout: 1000,
                        color: 'purple'
                    });
                    categories.value = response.props.categories;
                    selected.value = null;
                },
                onError: (error) => {
                    $q.notify({
                        message: 'Error deleting category',
                        timeout: 1000,
                        color: 'red'
                    });
                }
            });
        });
    } else {
        $q.notify({
            message: 'No category selected',
            timeout: 1000,
            color: 'red'
        });
    }
};
</script>

<template>
    <AppLayout>
            <q-card>
                <q-toolbar>
                    <q-toolbar-title>Categories </q-toolbar-title>
                    <q-btn
                        label="Add New Category"
                        color="primary"
                        @click="openDialog"
                    />
                    <q-btn
                        label="Delete Category"
                        color="negative"
                        @click="deleteCategory"
                    />
                </q-toolbar>
                <q-input
                    filled
                    v-model="filter"
                    label="Filter"
                    class="q-mb-md"
                />
                <q-tree
                    :nodes="categories"
                    node-key="id"
                    label-key="label"
                    v-model:selected="selected"
                    :filter="filter"
                    default-expand-all
                />
            </q-card>
        <q-dialog v-model="dialog">
            <q-card>
                <q-card-section>
                    <q-form @submit.prevent="submitForm">
                        <q-input v-model="form.name" label="Category Name" />
                        <q-input
                            v-model="form.chinese_name"
                            label="Chinese Name"
                        />
                        <q-btn type="submit" label="Save" color="primary" />
                        <q-btn
                            type="button"
                            label="Cancel"
                            color="secondary"
                            @click="dialog = false"
                        />
                    </q-form>
                </q-card-section>
            </q-card>
        </q-dialog>
    </AppLayout>
</template>
