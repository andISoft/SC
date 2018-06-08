<template>
  <div class="">
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <div v-for="item in articles.items" class="uk-grid-small uk-margin" uk-grid>
            <div class="uk-width-1-3">
              <img :src="item.options.image ? item.options.image : 'https://placeimg.com/500/300'" alt="">
            </div>
            <div class="uk-width-2-3">
              <div class="">
                Nombre: <strong>{{ item.name }}</strong>
              </div>
              <div class="">
                Cantidad: <strong>{{ item.qty }}</strong>
              </div>
              <div class="">
                Precio: <strong>{{ item.price }}</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <div class="">
            <a @click="payCulqi()" href="#">Pagar con Culqi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { openCulqi } from './culqi'

export default {
  props: ['articles'],
  data () {
    return {
    }
  },
  mounted () {
  },
  methods: {
    async payCulqi () {
      setReserve(this.articles)
      openCulqi(this.articles.subtotal*1000)
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
