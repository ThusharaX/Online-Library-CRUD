<template>
  <div>
    <NavbarComp />
    <router-view />
  </div>
</template>

<script>
import NavbarComp from "./components/NavbarComp.vue";

export default {
  name: "AppView",
  components: {
    NavbarComp,
  },
  data() {
    return {
      isLoggedIn: localStorage.getItem("token") ? true : false,
    };
  },
  methods: {},
};
</script>

<style></style>
