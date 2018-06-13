<template>
  <div class="">
    <div class="">
      <Navbar></Navbar>
    </div>
    <div class="uk-section uk-background-primary uk-light">
      <div class="uk-container">
        <div class="uk-margin">
          <div class="uk-width-1-3 uk-margin-auto">
            <img class="uk-width-1-1" src="/images/background.png" alt="">
          </div>
        </div>
        <div class="uk-margin">
          <h1 class="uk-text-uppercase uk-text-center">Chagua Farma</h1>
        </div>
        <div class="uk-margin-medium">
          <div class="uk-width-2-3 uk-margin-auto uk-text-center">
            <strong>ChaguaFarma es un sistema web para la venta online de producto de farmacia.</strong>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
    </div>
    <div class="uk-section uk-background-secondary">
      <div class="uk-container">
        <div class="">
          <div class="uk-text-center uk-light">
            <h2 class="uk-text-uppercase">Productos</h2>
          </div>
          <div class="uk-margin-medium">
            <div class="uk-margin">
              <div class="uk-child-width-1-3" uk-grid>
                <div v-for="prod in items" class="">
                  <div class="uk-card uk-card-default">
                    <div>
                      <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                          <img class="uk-width-1-1" src="https://placeimg.com/350/200" alt="">
                        </div>
                        <div class="uk-card-body uk-padding-small">
                          <div class="uk-text-center">
                            <a :href="'/producto/'+prod.id" class="uk-link-reset">
                              <h3 class="uk-card-title uk-text-uppercase uk-text-bold">{{ prod.name }}</h3>
                            </a>
                          </div>
                          <p class="uk-text-center">{{ prod.description }}</p>
                          <div class="uk-text-center">
                            <a :href="'/product/'+prod.id" class="uk-button uk-button-primary">Ver producto</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <div class="">
                <ul v-if="pages" class="uk-pagination uk-flex-center" uk-margin>
                  <li v-for="(page,index) in totalPages">
                    <a class="" @click="selectPage(index+1)" href="#">{{ index+1 }}</a>
                  </li>
                </ul>
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

export default {
  data () {
    return {
      items: [],
      currentPage: 1,
      last_page: 0,
      totalPages: 0,
      pages: 0
    }
  },
  mounted () {
    this.readProducts()
  },
  methods: {
    selectPage (i) {
      this.currentPage = i
      this.readProducts()
    },
    readProducts () {
      axios.get('/api/products?page='+this.currentPage)
      .then(res => {
        var response = res.data
        this.items = response.data
        this.totalPages = response.last_page
        this.last_page = response.prev_page_url
        this.pages = response.last_page
      })
      .catch(error => {
        console.log(error)
      })
    }
  },
  computed: {

  },
  components: {
    Navbar
  }
}
</script>

<style lang="scss">

</style>
