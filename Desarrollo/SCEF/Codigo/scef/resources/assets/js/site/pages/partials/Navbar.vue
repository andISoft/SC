<template>
  <div class="">
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
      <nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
        <div class="uk-navbar-left">

          <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="/">Inicio</a></li>
            <!-- <li>
              <a href="#">Parent</a>
              <div class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                  <li class="uk-active"><a href="#">Active</a></li>
                  <li><a href="#">Item</a></li>
                  <li><a href="#">Item</a></li>
                </ul>
              </div>
            </li> -->
            <li><a href="/tienda">Tienda</a></li>
          </ul>

        </div>
      </nav>
    </div>
  </div>
</template>

<script>
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

  }
}
</script>

<style lang="scss">

</style>
