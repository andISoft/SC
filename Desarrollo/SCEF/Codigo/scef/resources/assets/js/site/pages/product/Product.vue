<template>
  <div class="">
    <div class="uk-margin">
      <div class="uk-grid-match" uk-grid>
        <div class="uk-width-1-2">
          <div class="">
            <img class="uk-width-1-1" src="https://placeimg.com/600/400" alt="">
          </div>
        </div>
        <div class="uk-width-1-2">
          <div class="uk-margin">
            <h2 class="uk-text-uppercase">{{ prod.name }}</h2>
            <h4 class="">S/. {{ prod.price }}</h4>
          </div>
          <div class="">
            <strong>Descripción:</strong>
            <p class="">{{ prod.description }}</p>
          </div>
          <div class="uk-margin">
            <a class="uk-button uk-button-primary uk-button-large" @click="addToCart()">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['prod'],
  data () {
    return {

    }
  },
  mounted () {

  },
  methods: {
    async addToCart () {
      axios.post('/cart', this.prod)
      .then(res => {
        var response = res.data
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
