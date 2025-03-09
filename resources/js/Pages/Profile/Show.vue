<script setup>
import { reactive, ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import LogoutOtherBrowserSessionsForm from "@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import TwoFactorAuthenticationForm from "@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";

const user_details = reactive({
    user_name: "",
    email: "",
    first_name: "",
    last_name: "",
    address: "",
    city: "",
    post_code: "",
});

const password_dict = reactive({
    current_password: "",
    new_password: "",
    confirm_new_password: "",
});
const model = ref("one");

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout>
        <q-page class="q-pa-lg q-mt-md">
            <div class="text-h5 text-grey q-mb-lg q-py-sm bordered">
                <q-btn-toggle
                    v-model="model"
                    no-caps
                    unelevated
                    toggle-color="primary"
                    text-color="write"
                    :options="[
                        { label: 'Account', value: 'one', icon: 'person' },
                        { label: 'Security', value: 'two', icon: 'lock' },
                        {
                            label: 'Notification',
                            value: 'three',
                            icon: 'notifications',
                        },
                    ]"
                />
            </div>

            <div class="row q-col-gutter-sm">
                <!-- Profile Information -->
                <div v-if="model === 'one'" class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <q-card class="card-bg text-grey no-shadow" bordered>
                        <q-card-section class="text-h6">
                            <div class="text-h6">Profile Information</div>
                            <!-- <div class="text-subtitle2">Edit Profile</div> -->
                        </q-card-section>
                        <q-card-section class="q-pa-sm">
                            <div>
                                <UpdateProfileInformationForm
                                    :user="$page.props.auth.user"
                                />
                                <SectionBorder />
                            </div>
                        </q-card-section>
                    </q-card>
                </div>

                <!-- Security -->
                <div v-if="model === 'two'" class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <q-card class="card-bg text-grey no-shadow" bordered>
                        <q-card-section class="text-h6">
                            <div class="text-h6">Change Password</div>
                        </q-card-section>
                        <q-card-section class="q-pa-sm">
                            <UpdatePasswordForm />
                            <q-separator class="q-mt-lg q-mb-lg" />
                            <TwoFactorAuthenticationForm
                                :requires-confirmation="
                                    confirmsTwoFactorAuthentication
                                "
                                class="mt-10 sm:mt-0"
                            />
                            <q-separator class="q-mt-lg q-mb-lg" />
                            <LogoutOtherBrowserSessionsForm
                                :sessions="sessions"
                                class="mt-10 sm:mt-0"
                            />
                            <SectionBorder />
                        </q-card-section>
                    </q-card>
                </div>

                <!-- Notification -->
                <div v-if="model === 'three'" class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <q-card class="card-bg text-grey no-shadow" bordered>
                        <q-card-section class="text-h6">
                            <div class="text-h6">Notification</div>
                        </q-card-section>
                        <q-card-section class="q-pa-sm">
                            <div>
                                <q-item>
                                    <q-item-section>
                                        <q-item-label>Notify me when someone follows me</q-item-label>
                                    </q-item-section>
                                    <q-item-section side>
                                        <q-toggle v-model="model" />
                                    </q-item-section>
                                </q-item>
                                <SectionBorder />
                            </div>
                        </q-card-section>
                    </q-card>
                </div>
            </div>
        </q-page>
    </AppLayout>
</template>
