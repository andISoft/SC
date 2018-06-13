<template>
  <div class="">
    <div class="">
      <Navbar></Navbar>
    </div>
    <div class="">
      <div class="">
        <div class="">
          <div class="">
            <div class="uk-grid-collapse" uk-grid>
              <div class="uk-width-1-4@m uk-width-1-1 uk-background-muted">
                <div class="uk-section">
                  <div class="uk-container">
                    <Filters></Filters>
                  </div>
                </div>
              </div>
              <div class="uk-width-3-4@m uk-width-1-1">
                <div class="uk-section">
                  <div class="uk-container">
                    <Products></Products>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../partials/Navbar'
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
    Products,
    Navbar
  }
}
</script>

<style lang="scss">

</style>
