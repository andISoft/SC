<template>
  <div class="">
    <div class="uk-margin">
      <div class="">
        <div class="uk-grid-small" uk-grid>
          <div class="uk-width-1-3@m uk-width-1-3 uk-margin-auto">
            <img :src="product.image ? product.image : 'https://placeimg.com/400/600'" alt="">
          </div>
          <div class="uk-width-2-3@m uk-width-1-1">
            <div class="">
              <div class="">
                {{ product.name }}
              </div>
              <div class="">
                {{ product.description }}
              </div>
              <div class="">
                {{ product.price }}
              </div>
              <div class="">
                <a href="#" @click="addToCart()">Agregar al carrito</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['product'],
  data () {
    return {
    }
  },
  mounted () {
  },
  methods: {
    async addToCart () {
      /* var axios */
      axios.post('/cart', this.product)
      .then(response => {
        if (response.success) {
          UIkit.notification({
            message: response.message,
            status: 'success',
            pos: 'bottom-center',
            timeout: 3000
          })
        } else {
          UIkit.notification({
            message: response.message,
            status: 'danger',
            pos: 'bottom-center',
            timeout: 3000
          })
        }
      })
      .catch(error => {

      })
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
