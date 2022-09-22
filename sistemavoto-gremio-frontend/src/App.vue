<template>
  <div class="app">
    <app-nav-bar></app-nav-bar>
    <!-- <vote-screen></vote-screen> -->
    <login-screen></login-screen>
    <!-- <router-view>
      
    </router-view> -->
  </div>
</template>

<script>
import AppNavBar from "./components/Navbar.vue";
// import VoteScreen from './views/VoteScreen.vue'
import LoginScreen from "./views/LoginScreen.vue";

export default {
  name: "App",
  components: {
    AppNavBar,
    LoginScreen,
    // VoteScreen
  },
};
</script>

<style>
* {
  padding: 0px;
  margin: 0px;
  box-sizing: border-box;
}
</style>
