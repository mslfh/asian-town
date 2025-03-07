<script setup>
import { reactive } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const user_details = reactive({
    user_name: "",
    email: "",
    first_name: "",
    last_name: "",
    address: "",
    city: "",
    post_code: "",
    about: "",
});

const password_dict = reactive({
    current_password: "",
    new_password: "",
    confirm_new_password: "",
});
</script>

<style scoped>
/* .card-bg {
    background-color: #a4bce3;
} */
</style>

<template>
    <AppLayout>
        <q-page class="q-pa-lg q-mt-md">
            <div class="text-h5 color q-mb-lg q-py-sm">
                <span class="text-weight-regular text-grey-6"> Profile/ </span>
                <span class="text-grey-9"> Details </span>
            </div>
            <div class="row q-col-gutter-sm">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <q-card class="card-bg text-grey no-shadow" bordered>
                        <q-card-section class="text-h6">
                            <div class="text-h6">Edit Profile</div>
                            <div class="text-subtitle2">
                                Complete your profile
                            </div>
                        </q-card-section>
                        <q-card-section class="q-pa-sm">
                            <q-list class="row">
                                <q-item
                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                >
                                    <q-item-section side>
                                        <q-avatar size="100px">
                                            <img
                                                src="https://cdn.quasar.dev/img/boy-avatar.png"
                                            />
                                        </q-avatar>
                                    </q-item-section>
                                    <q-item-section>
                                        <q-btn
                                            label="Add Photo"
                                            class="text-capitalize"
                                            rounded
                                            color="info"
                                            style="max-width: 120px"
                                        ></q-btn>
                                    </q-item-section>
                                </q-item>

                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.user_name"
                                            label="User Name"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.email"
                                            label="Email Address"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.first_name"
                                            label="First Name"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.last_name"
                                            label="Last Name"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            autogrow
                                            dense
                                            v-model="user_details.address"
                                            label="Address"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.city"
                                            label="City"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            dense
                                            v-model="user_details.post_code"
                                            label="Postal Code"
                                        />
                                    </q-item-section>
                                </q-item>
                                <q-item
                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                >
                                    <q-item-section>
                                        <q-input
                                            type="textarea"
                                            dense
                                            v-model="user_details.about"
                                            label="About"
                                        />
                                    </q-item-section>
                                </q-item>
                            </q-list>
                        </q-card-section>
                        <q-card-actions align="right">
                            <q-btn class="text-capitalize bg-info text-white"
                                >Update User Info</q-btn
                            >
                        </q-card-actions>
                    </q-card>
                </div>

                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <q-card class="card-bg text-grey no-shadow" bordered>
                        <q-card-section class="text-h6 q-pa-sm">
                            <div class="text-h6">Change Password</div>
                        </q-card-section>
                        <q-card-section class="q-pa-sm row">
                            <q-item
                                class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
                            >
                                <q-item-section>
                                    Current Password
                                </q-item-section>
                            </q-item>
                            <q-item
                                class="col-lg-8 col-md-8 col-sm-12 col-xs-12"
                            >
                                <q-item-section>
                                    <q-input
                                        type="password"
                                        dense
                                        outlined
                                        round
                                        v-model="password_dict.current_password"
                                        label="Current Password"
                                    />
                                </q-item-section>
                            </q-item>
                            <q-item
                                class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
                            >
                                <q-item-section> New Password </q-item-section>
                            </q-item>
                            <q-item
                                class="col-lg-8 col-md-8 col-sm-12 col-xs-12"
                            >
                                <q-item-section>
                                    <q-input
                                        type="password"
                                        dense
                                        outlined
                                        round
                                        v-model="password_dict.new_password"
                                        label="New Password"
                                    />
                                </q-item-section>
                            </q-item>
                            <q-item
                                class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
                            >
                                <q-item-section>
                                    Confirm New Password
                                </q-item-section>
                            </q-item>
                            <q-item
                                class="col-lg-8 col-md-8 col-sm-12 col-xs-12"
                            >
                                <q-item-section>
                                    <q-input
                                        type="password"
                                        dense
                                        outlined
                                        round
                                        v-model="
                                            password_dict.confirm_new_password
                                        "
                                        label="Confirm New Password"
                                    />
                                </q-item-section>
                            </q-item>
                        </q-card-section>
                        <q-card-actions align="right">
                            <q-btn class="text-capitalize bg-info text-white"
                                >Change Password</q-btn
                            >
                        </q-card-actions>
                    </q-card>
                </div>
            </div>
        </q-page>
    </AppLayout>
</template>
