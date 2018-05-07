<template>
  <div class="">
    <div class="uk-margin">
      <div class="uk-child-width-1-3 uk-grid-small" uk-grid>
        <div v-for="prod in items" class="">
          <div class="">
            <div class="uk-card uk-card-default uk-card-small uk-card-body">
              <div class="">
                <a class="uk-link-reset" :href="'/product/'+prod.id">
                  <h3 class="uk-card-title">{{ prod.name }}</h3>
                </a>
              </div>
              <div>
                <div class="uk-margin">
                  <img src="https://placeimg.com/250/150" alt="">
                </div>
                <div class="uk-margin">
                  {{ prod.description }}
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
</template>

<script>
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

      },
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

    }
  }
</script>

<style lang="scss">

</style>
