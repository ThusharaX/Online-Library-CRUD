<template>
  <div>
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">Register Page</h1>

    <div class="flex justify-center">
      <div class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 py-2">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="title"
              >
                Name
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name"
                type="name"
                v-model="user.name"
              />
            </div>

            <div class="w-full px-3 py-2">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="title"
              >
                Email
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                v-model="user.email"
              />
            </div>

            <div class="w-full px-3 py-2">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="title"
              >
                Confirm Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password"
                type="password"
                v-model="user.password"
              />
            </div>

            <div class="w-full px-3 py-2">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="title"
              >
                Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password_confirm"
                type="password"
                v-model="user.password_confirmation"
              />
            </div>

            <div class="w-full px-3 py-2">
              <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                @click="register"
              >
                Register
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import repository from "@/api/repository";

export default {
  name: "RegisterView",
  components: {},

  data() {
    return {
      user: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
    };
  },
  methods: {
    // Login and store token in localStorage
    register() {
      repository.createSession();
      repository.register(this.user).then((response) => {
        console.log(response);
        repository.setToken(response.data.token);
        this.reloadPage();
        this.$router.push("/books");
      });
    },
  },
};
</script>
