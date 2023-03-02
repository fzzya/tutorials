<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer">
      <v-list density="compact">
        <v-list-subheader>{{ user.nama }} ({{ user.level }})</v-list-subheader>
        <Link  v-if="user.level=='petugas'" href="/petugas" as="div">
          <v-list-item active-color="primary" to="/admin">
            <template v-slot:prepend>
              <v-icon icon="mdi mdi-view-dashboard"></v-icon>
            </template>

            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item>
        </Link>
        <Link  v-if="user.level=='admin'" href="/admin" as="div">
          <v-list-item active-color="primary" to="/admin">
            <template v-slot:prepend>
              <v-icon icon="mdi mdi-view-dashboard"></v-icon>
            </template>

            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item>
        </Link>
        <Link v-if="user.level=='admin'" href="/admin/user" as="div">
          <v-list-item
            active-color="primary"
            to="/admin/user"
            class="text-blue lighten-3"
          >
            <template v-slot:prepend>
              <v-icon icon="mdi mdi-account-group"></v-icon>
            </template>
            <v-list-item-title>User</v-list-item-title>
          </v-list-item>
        </Link>
        <Link v-if="user.level=='admin'" href="/admin/register" as="div">
          <v-list-item
            active-color="primary"
            to="/admin/user"
            class="text-blue lighten-3"
          >
            <template v-slot:prepend>
              <v-icon icon="mdi mdi-account-group"></v-icon>
            </template>

            <v-list-item-title>User Register</v-list-item-title>
          </v-list-item>
        </Link>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar style="background-color:blueviolet">
      <v-app-bar-nav-icon @click="drawer = !drawer">Faizah</v-app-bar-nav-icon>
      <v-toolbar-title>{{ user.level }}</v-toolbar-title>
      <!-- <v-spacer/> -->

    </v-app-bar>

    <!-- <v-system-bar class="bg-blue">
        <v-spacer></v-spacer>
        <v-tooltip text="Logout">
          <template v-slot:activator="{ props }">
            <v-icon v-bind="props" color="red" @click="logout"
              >mdi mdi-logout</v-icon
            >
          </template>
        </v-tooltip>
      </v-system-bar> -->

    <v-main>
      <v-container>
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { router, Link } from "@inertiajs/vue3";
export default {
  components: {
    Link,
  },
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
  },
  data: () => ({ drawer: null }),
  methods: {
    logout() {
      router.get("/logout");
    },
  },
};
</script>

<style></style>
