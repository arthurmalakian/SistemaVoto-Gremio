<template>
  <div class="app">
    <app-nav-bar></app-nav-bar>
    <vote-screen></vote-screen>
    <!-- <router-view>
      
    </router-view> -->
  </div>
</template>

<script>
import AppNavBar from './components/Navbar.vue'
import VoteScreen from './views/VoteScreen.vue'

export default {
  name: 'App',
  components: {
    AppNavBar,
    VoteScreen
  }
}
</script>

<style>
  * {
  padding: 0px;
  margin: 0px;
  box-sizing: border-box;
  }
</style>
