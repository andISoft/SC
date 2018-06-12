<template>
  <div class="">
    <div class="">
      <Navbar></Navbar>
    </div>
    <div class="uk-section">
      <div class="uk-container">
        <div class="">
          <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
              <tr>
                <th></th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products">
                <td class="uk-text-center">
                  <img :src="product.options.image ? product.options.image : 'https://placeimg.com/40/40'" alt="">
                </td>
                <td>
                  {{ product.name }}
                </td>
                <td>
                  <select class="uk-select" v-model="product.qty" @change="changeQty(product.rowId, product.qty)">
                    <option v-for="i in 15" :value="i">{{ i }}</option>
                  </select>
                </td>
                <td>
                  {{ product.price }}
                </td>
                <td>
                  {{ product.subtotal }}
                </td>
                <td>
                  <a class="uk-button uk-button-danger" @click="deleteProduct(product.rowId)" href="#">Eliminar</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="">
          <div class="uk-text-center">
            <a class="uk-button uk-button-primary" @click="payCulqi()" href="#">Pagar con Culqi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../partials/Navbar'
import { openCulqi } from './culqi'

export default {
  props: ['artcls'],
  data () {
    return {
      articles: this.artcls,
      products: this.artcls.items
    }
  },
  mounted () {
  },
  methods: {
    async payCulqi () {
      setReserve(this.articles)
      openCulqi(this.articles.subtotal*100)
    },
    changeQty (id, qty) {
      axios.post('/cart/'+id, {
        'qty': qty
      })
      .then(res => {
        var response = res.data
        if (response.success) {
          this.articles = response.articles
          this.products = response.articles.items
          UIkit.notification({
            message: response.message,
            status: 'success',
            pos: 'bottom-center',
            timeout: 5000
          });
        } else {
          UIkit.notification({
            message: response.message,
            status: 'danger',
            pos: 'bottom-center',
            timeout: 5000
          });
        }
      })
      .catch(error => {

      })
    },
    deleteProduct (id) {
      axios.post('/cartDelete/'+id)
      .then(res => {
        var response = res.data
        if (response.success) {
          this.articles = response.articles
          this.products = response.articles.items
          UIkit.notification({
            message: response.message,
            status: 'success',
            pos: 'bottom-center',
            timeout: 5000
          });
        } else {
          UIkit.notification({
            message: response.message,
            status: 'danger',
            pos: 'bottom-center',
            timeout: 5000
          });
        }
      })
      .catch(error => {

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
