<script setup>
import { ref, computed } from "vue";
import { usePage, useForm, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import {
    QExpansionItem,
    QSeparator,
    QCard,
    QCardSection,
    useQuasar,
} from "quasar";

const { props } = usePage();
const categries = props.categories;
const units = props.units;
const $q = useQuasar();

const form = useForm({
    main_name: "",
    chinese_name: "",
    barcode: "",
    image_url: "",
    image_url_extra: "",
    status: "",
    type: "",
    category_id: "",
    category: "",
    unit_id: "",
    unit: "",
    brand: "",
    description: "",
    cost_price: "",
    retail_price: "",
    discount: {},
    event: {},
    tag: {},
});
</script>

<template>
    <AppLayout>
        <q-card>
            <q-toolbar>
                <q-toolbar-title>Product/Create </q-toolbar-title>
            </q-toolbar>
            <div class="q-pa-md" style="max-width: 50%">
                <q-list>
                    <!-- Basic -->
                    <q-expansion-item
                        popup
                        default-opened
                        icon="storefront"
                        label="Basic"
                        caption="Basic information"
                    >
                        <q-separator />
                        <q-card>
                            <q-card-section>
                                <q-input

                                    filled
                                    bottom-slots
                                    v-model="form.main_name"
                                    label="Main Name"
                                    counter
                                    :rules="[
                                        (val) => !!val || 'Field is required',
                                    ]"
                                >
                                    <template v-slot:prepend>
                                        <q-icon name="grade" />
                                    </template>
                                    <template v-slot:append>
                                        <q-icon
                                            name="close"
                                            @click="form.main_name = ''"
                                            class="cursor-pointer"
                                        />
                                    </template>

                                </q-input>
                                <q-input
                                outlined
                                    bottom-slots
                                    v-model="form.chinese_name"
                                    label="Chinese Name"
                                    counter
                                    :dense="dense"
                                >
                                    <template v-slot:prepend>
                                        <q-icon name="hotel_class" />
                                    </template>
                                    <template v-slot:append>
                                        <q-icon
                                            name="close"
                                            @click="text = ''"
                                            class="cursor-pointer"
                                        />
                                    </template>

                                    <template v-slot:hint>
                                        Field hint
                                    </template>
                                </q-input>
                                <q-input
                                    v-model="form.barcode"
                                    label="Barcode"
                                    outlined
                                />
                                <q-input
                                    v-model="form.image_url"
                                    label="Image URL"
                                    outlined
                                />
                                <q-input
                                    v-model="form.image_url_extra"
                                    label="Extra Image URL"
                                    outlined
                                />
                                <q-select
                                    v-model="form.status"
                                    :options="[
                                        { label: 'Active', value: 'active' },
                                        { label: 'Inactive', value: 'inactive' },
                                    ]"
                                    label="Status"
                                    outlined
                                />
                                <q-select
                                    v-model="form.type"
                                    :options="[
                                        { label: 'Product', value: 'product' },
                                        { label: 'Service', value: 'service' },
                                    ]"
                                    label="Type"
                                    outlined
                                />

                            </q-card-section>
                        </q-card>
                    </q-expansion-item>
                    <!-- Price- discount-->
                    <q-expansion-item
                        popup
                        icon="sym_o_paid"
                        label="Price"
                        caption="Price information"
                    >
                        <q-separator />
                        <q-card>
                            <q-card-section>
                                <q-input
                                    v-model="form.cost_price"
                                    label="Cost Price"
                                    type="number"
                                    outlined
                                />
                                <q-input
                                    v-model="form.retail_price"
                                    label="Retail Price"
                                    type="number"
                                    outlined
                                />
                            </q-card-section>
                        </q-card>
                    </q-expansion-item>
                    <!-- Advanced event tag-->
                    <q-expansion-item
                        popup
                        icon="sym_o_pending"
                        label="Advanced"
                        caption="Advanced information"
                    >
                        <q-separator />
                        <q-card>
                            <q-card-section>
                                <q-select
                                    v-model="form.category_id"
                                    :options="categories"
                                    label="Category"
                                    option-label="name"
                                    option-value="id"
                                    outlined
                                />
                                <q-select
                                    v-model="form.unit_id"
                                    :options="units"
                                    label="Unit"
                                    option-label="name"
                                    option-value="id"
                                    outlined
                                />
                                <q-input
                                    v-model="form.brand"
                                    label="Brand"
                                    outlined
                                />
                                <q-input
                                    v-model="form.description"
                                    label="Description"
                                    type="textarea"
                                    outlined
                                />
                            </q-card-section>
                        </q-card>
                    </q-expansion-item>
                </q-list>
            </div>

            <div class="q-pa-md"  >
                <q-btn label="Submit" type="submit" color="primary" />
                <q-btn
                    label="Reset"
                    type="reset"
                    color="primary"
                    flat
                    class="q-ml-sm"
                />
            </div>
        </q-card>
    </AppLayout>
</template>
