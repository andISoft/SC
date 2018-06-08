<template>
  <div class="">
    <div class="uk-margin">
      <div class="" uk-grid>
        <div class="uk-width-1-3">
          <img class="uk-width-1-1" src="https://placeimg.com/250/250" alt="">
        </div>
        <div class="uk-width-2-3">
          <div class="uk-margin">
            <h2 class="">{{ prod.name }}</h2>
            <h4 class="">{{ prod.price }}</h4>
          </div>
          <p class="">{{ prod.description }}</p>
          <div class="uk-margin">
            <a class="uk-button uk-button-primary" @click="addToCart()">Agregar al carrito</a>
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
