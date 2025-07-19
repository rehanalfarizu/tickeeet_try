<template>
  <div id="app">
    <NavBar />
    <RouterView />
    <Footer />
  </div>
</template>

<script>
import { RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'
import Footer from './components/Footer.vue'

export default {
  name: 'App',
  components: {
    RouterView,
    NavBar,
    Footer
  }
}
</script>

<style>
html, body {
  margin: 0;
  padding: 0;
  background-color: #0f0f23;
  color: white;
  overflow-x: hidden;
}

#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>
