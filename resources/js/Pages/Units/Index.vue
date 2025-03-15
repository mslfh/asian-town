<template>
    <AppLayout>
        <q-card>
            <q-toolbar>
                <q-toolbar-title>Units</q-toolbar-title>
                <q-btn
                    v-if="selected <= 0"
                    label="Add Unit"
                    @click="openCreateDialog"
                    color="primary"
                />
                <q-btn
                    v-if="selected.length > 0"
                    label="Delete"
                    @click="deleteUnits"
                    color="negative"
                    class="q-ml-sm"
                />
            </q-toolbar>
            <div class="q-pa-md">
                <q-table
                    grid
                    :card-container-class="cardContainerClass"
                    :rows="units"
                    :columns="columns"
                    row-key="id"
                    :filter="filter"
                    hide-header
                    v-model:pagination="pagination"
                    :rows-per-page-options="rowsPerPageOptions"
                    selection="multiple"
                    v-model:selected="selected"
                >
                    <template v-slot:top-left>
                        <q-input
                            borderless
                            dense
                            debounce="300"
                            v-model="filter"
                            placeholder="Search"
                        >
                            <template v-slot:append>
                                <q-icon name="search" />
                            </template>
                        </q-input>
                    </template>

                    <template v-slot:item="props">
                        <div
                            class="q-pa-xs col-xs-6 col-sm-3 col-md-2"
                            :style="
                                props.selected ? 'transform: scale(0.95);' : ''
                            "
                        >
                            <q-card :class="props.selected ? 'bg-grey-2' : ''">
                                <q-card-section class="text-center">
                                    <div class="row">
                                        <q-checkbox
                                            class="col-2"
                                            dense
                                            v-model="props.selected"
                                        />
                                        <strong class="col-8">
                                            {{ props.row.title }}
                                            <q-popup-edit
                                                v-model="props.row.title"
                                                buttons
                                                auto-save
                                                v-slot="scope"
                                                @save="
                                                    (newValue) => {
                                                        props.row.title =
                                                            newValue;
                                                        updateUnit(props.row);
                                                    }
                                                "
                                            >
                                                <q-input
                                                    v-model="scope.value"
                                                    dense
                                                    autofocus
                                                    counter
                                                    @keyup.enter="scope.set"
                                                />
                                            </q-popup-edit>
                                        </strong>
                                    </div>
                                    <br />
                                    <span>
                                        {{ props.row.chinese_title }}
                                        <q-popup-edit
                                            v-model="props.row.chinese_title"
                                            buttons
                                            auto-save
                                            v-slot="scope"
                                            @save="
                                                (newValue) => {
                                                    props.row.chinese_title =
                                                        newValue;
                                                    updateUnit(props.row);
                                                }
                                            "
                                        >
                                            <q-input
                                                v-model="scope.value"
                                                dense
                                                autofocus
                                                counter
                                                @keyup.enter="scope.set"
                                            />
                                        </q-popup-edit>
                                    </span>
                                </q-card-section>
                                <q-separator />
                                <q-card-section class="flex flex-center">
                                    <div
                                        class="text-weight-regular text-italic"
                                    >
                                        {{ props.row.norm }}
                                        <q-popup-edit
                                            v-model="props.row.norm"
                                            buttons
                                            auto-save
                                            v-slot="scope"
                                            @save="
                                                (newValue) => {
                                                    props.row.norm = newValue;
                                                    updateUnit(props.row);
                                                }
                                            "
                                        >
                                            <q-input
                                                v-model="scope.value"
                                                dense
                                                autofocus
                                                counter
                                                @keyup.enter="scope.set"
                                            />
                                        </q-popup-edit>
                                    </div>
                                </q-card-section>
                            </q-card>
                        </div>
                    </template>
                </q-table>
            </div>
        </q-card>
        <q-dialog v-model="isDialogOpen">
            <q-card>
                <q-card-section>
                    <div class="text-h6">Add Unit</div>
                </q-card-section>
                <q-card-section>
                    <q-form @submit="submitForm">
                        <q-input v-model="form.title" label="Title" required />
                        <q-input
                            v-model="form.chinese_title"
                            label="Chinese Title"
                            required
                        />
                        <q-input v-model="form.norm" label="Norm" required />
                        <q-card-actions align="right">
                            <q-btn flat label="Cancel" v-close-popup />
                            <q-btn type="submit" label="Save" color="primary" />
                        </q-card-actions>
                    </q-form>
                </q-card-section>
            </q-card>
        </q-dialog>
    </AppLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import { usePage, useForm, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useQuasar } from "quasar";

const { props } = usePage();
const $q = useQuasar();
const units = ref(props.units);

const filter = ref("");
const pagination = ref({
    page: 1,
    rowsPerPage: 9,
});

const selected = ref([]);
const isDialogOpen = ref(false);
const form = useForm({
    title: "",
    chinese_title: "",
    norm: "",
});

const columns = [
    { name: "title", label: "Title", field: "title" },
    { name: "chinese_title", label: "Chinese Title", field: "chinese_title" },
    { name: "norm", label: "Norm", field: "norm" },
];

const cardContainerClass = computed(() => {
    return "grid-masonry grid-masonry--3";
});

const rowsPerPageOptions = computed(() => {
    return [3, 6, 9];
});

const openCreateDialog = () => {
    form.reset();
    isDialogOpen.value = true;
};

const submitForm = () => {
    form.post(route("units.store"), {
        onSuccess: (response) => {
            isDialogOpen.value = false;
            units.value = response.props.units;
        },
        onError: (response) => {
            // Handle error
            console.log(response);
        },
    });
};

const updateUnit = (unit) => {
    router.put(
        route("units.update", unit.id),
        {
            title: unit.title,
            chinese_title: unit.chinese_title,
            norm: unit.norm,
        },
        {
            onSuccess: (response) => {
                $q.notify({
                    message: "Units Update Successfully",
                    timeout: 1000,
                    color: "purple",
                });
                units.value = response.props.units;
                console.log(response);
            },
            onError: (response) => {
                // Handle error
                console.log(response);
            },
        }
    );
};

const deleteUnits = () => {
    const ids = selected.value.map((unit) => unit.id);
    router.delete(route("units.delete"), {
        data: { ids },
        onSuccess: (response) => {
            units.value = response.props.units;
            selected.value = [];
            $q.notify({
                message: "Units Delete Successfully",
                timeout: 1000,
                color: "purple",
            });
        },
        onError: (response) => {
            // Handle error
            console.log(response);
        },
    });
};
</script>
