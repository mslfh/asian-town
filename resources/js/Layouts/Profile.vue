
<script setup>

</script>

<template>
  <div>

      <q-item class="q-mb-sm" clickable v-ripple>
        <q-item-section avatar>
            <q-avatar size="26px">
                            <img
                                src="https://cdn.quasar.dev/img/boy-avatar.png"
                            />
                        </q-avatar>
        </q-item-section>

        <q-item-section>
          <q-item-label> {{ $page.props.auth.user.name }}</q-item-label>
          <q-item-label caption lines="1">{{ $page.props.auth.user.email }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <q-item :href="route('profile.show')" class="q-mb-sm" clickable v-ripple>
        <q-item-section avatar>
          <q-avatar  text-color="grey" icon="person" />
        </q-item-section>
        <q-item-section>
          <q-item-label>Profile</q-item-label>
        </q-item-section>
      </q-item>
      <q-item class="q-mb-sm" clickable v-ripple>
        <q-item-section avatar>
          <q-avatar  text-color="grey" icon="help" />
        </q-item-section>
        <q-item-section>
          <q-item-label>Help</q-item-label>
        </q-item-section>
      </q-item>
      <q-item class="q-mb-sm" clickable v-ripple>
        <q-item-section avatar>
          <q-avatar  text-color="grey" icon="settings" />
        </q-item-section>
        <q-item-section>
          <q-item-label>Settings</q-item-label>
        </q-item-section>
      </q-item>
      <q-item class="q-mb-sm" clickable v-ripple>
        <q-item-section avatar>
          <q-avatar  text-color="grey" icon="logout" />
        </q-item-section>
        <q-item-section>
          <q-item-label>Log Out</q-item-label>
        </q-item-section>
      </q-item>

  </div>
</template>

<style scoped>

</style>
