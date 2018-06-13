<template>
  <div class="">
    <div class="uk-margin">
      <div class="uk-child-width-1-3@s uk-width-1-1 uk-margin-auto" uk-grid>
        <div v-for="prod in items" class="">
          <div class="uk-card uk-card-default">
            <div>
              <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                  <a :href="'/producto/'+prod.id" class="uk-text-center uk-link-reset">
                    <img class="uk-width-1-1" src="https://placeimg.com/300/200" alt="">
                  </a>
                </div>
                <div class="uk-padding-small">
                  <a :href="'/producto/'+prod.id" class="uk-text-center uk-link-reset">
                    <h3 class="uk-margin-remove uk-text-uppercase">{{ prod.name }}</h3>
                  </a>
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
