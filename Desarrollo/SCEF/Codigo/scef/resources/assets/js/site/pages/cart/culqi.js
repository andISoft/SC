const culqiPk = window.culqi_pk

export function openCulqi (amount) {
  console.log('amount:' + amount)
  Culqi.publicKey = culqiPk
  Culqi.settings({
    title: 'Chagua Farma',
    currency: 'PEN',
    description: 'Esta es tu compra en Chagua Farma',
    amount: amount
  })
  Culqi.open()
}
