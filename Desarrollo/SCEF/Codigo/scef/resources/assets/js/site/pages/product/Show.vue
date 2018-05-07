<template>
  <div class="">
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <Product :product="prod"></Product>
        </div>
      </div>
    </div>
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <Related></Related>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
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
      Related
    }
  }
</script>

<style lang="scss">

</style>
