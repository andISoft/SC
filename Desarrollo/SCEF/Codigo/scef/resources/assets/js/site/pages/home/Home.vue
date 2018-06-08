<template>
  <div class="">
    <div class="">
      <Navbar></Navbar>
    </div>
    <div class="uk-section uk-background-primary uk-light">
      <div class="uk-container">
        <div class="uk-text-center">
          <h1 class="uk-text-uppercase">Chagua Farma</h1>
        </div>
      </div>
    </div>
    <div class="uk-section uk-background-secondary uk-light">
      <div class="uk-container">
        <div class="">
          <div class="uk-text-center">
            <h3 class="uk-text-uppercase">Productos</h3>
          </div>
          <div class="uk-margin-medium">
            <div class="uk-margin">
              <div class="uk-child-width-1-3" uk-grid>
                <div v-for="prod in items" class="">
                  <div class="uk-card uk-card-default">
                    <div>
                      <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                          <img class="uk-width-1-1" src="https://placeimg.com/250/250" alt="">
                        </div>
                        <div class="uk-card-body">
                          <a :href="'/producto/'+prod.id" class="uk-text-center">
                            <h3 class="uk-card-title uk-text-uppercase">{{ prod.name }}</h3>
                          </a>
                          <p>{{ prod.description }}</p>
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
      readProducts () {
        axios.get('/api/products?page='+this.currentPage)
        .then(response => {
          this.items = response.data.data
          this.totalPages = response.data.last_page
          this.last_page = response.data.prev_page_url
          this.pages = response.data.last_page
        })
        .catch(error => {
          console.log(error)
        })
      },
      selectPage (i) {
        this.currentPage = i
        this.readProducts()
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
