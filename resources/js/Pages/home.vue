<template>
  <v-app>
    <v-parallax src="https://cdn.pixabay.com/photo/2023/02/08/08/50/frequency-wave-7776034_1280.jpg">
    <v-main>
      <div class="d-flex justify-center" >
        <v-card elevation="2" width="400" height="500" class="mt-15" >
          <div class="text-center mt-5">
            <span>Log in</span>
          </div>
          <v-divider/>
          <v-card-text>
            <v-form>
              <v-text-field
                prepend-icon="mdi-account-circle"
                label="Username"
                v-model="form.username"
                :error-messages="errors.username"
              ></v-text-field>
              <v-text-field
                prepend-icon="mdi-lock"
                label="Password"
                type="password"
                v-model="form.password"
                :error-messages="errors.password"
              ></v-text-field>
              <v-btn block color="blue" @click="login"> login </v-btn>
              <div class="mt-5">
                <v-btn elevation="2" small @click="register">Register</v-btn>
              </div>
            </v-form>
          </v-card-text>
        </v-card>
      </div>
    </v-main>
    </v-parallax>
  </v-app>
</template>

<script>
import { router } from "@inertiajs/vue3";
export default {
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        username: "",
        password: ""
      },
    };
  },

  methods: {
    login() {
      router.post("/login", this.form);
    },
    // handleclick() {
    //     this.showPassword = !this.showPassword
    // },
    register() {
      router.get("/register");
    },
  },
};
</script>
