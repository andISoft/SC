<template>
  <div class="">
    <div class="">
      <Navbar></Navbar>
    </div>
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <Product :prod="prod"></Product>
        </div>
      </div>
    </div>
    <div class="uk-section uk-background-muted">
      <div class="uk-container">
        <div class="">
          <Related></Related>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../partials/Navbar'
import Product from './Product'
import Related from './Related'
export default {
  props: ['prod'],
  data () {
    return {

    }
  },
  mounted () {

  },
  methods: {

  },
  computed: {

  },
  components: {
    Product,
    Related,
    Navbar
  }
}
</script>

<style lang="scss">

</style>
