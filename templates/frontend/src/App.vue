<template>
  <div id="app">
    <RandomBeerApp />
  </div>
</template>

<script>
import RandomBeerApp from './components/RandomBeerApp.vue'
import styles from './assets/styles.css';
export default {
  name: 'app',
  components: {
    RandomBeerApp
  }
}
</script>
