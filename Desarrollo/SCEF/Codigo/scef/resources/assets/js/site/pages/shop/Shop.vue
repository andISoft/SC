<template>
  <div class="">
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-4@m uk-width-1-1">
              <Filters></Filters>
            </div>
            <div class="uk-width-3-4@m uk-width-1-1">
              <Products></Products>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Filters from './Filters'
  import Products from './Products'
  export default {
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
      Filters,
      Products
    }
  }
</script>

<style lang="scss">

</style>
