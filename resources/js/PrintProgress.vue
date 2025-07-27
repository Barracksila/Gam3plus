<template>
  <div>
    <h1>Player Summary</h1>
    <div ref="printArea" v-if="player">
      <p><strong>Name:</strong> {{ player.Player_Name }}</p>
      <p><strong>Email:</strong> {{ player.email }}</p>
      <p><strong>Cash:</strong> ${{ formatNumber(cash) }}</p>
      <p><strong>BTC:</strong> {{ btc }} BTC</p>
    </div>
    <div v-else>Loading...</div>

    <button @click="print">🖨️ Print</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const player = ref(null)
const route = useRoute()

const cash = ref(0)
const btc = ref(0)

onMounted(async () => {
  const res = await fetch(`/api/players/${route.params.id}`)
  player.value = await res.json()
  cash.value = 10000 + player.value.Player_id * 123
  btc.value = (0.5 + player.value.Player_id * 0.1).toFixed(4)
})

const formatNumber = n => n.toLocaleString()

const print = () => {
  const content = document.querySelector('[ref="printArea"]').innerHTML
  const original = document.body.innerHTML
  document.body.innerHTML = content
  window.print()
  document.body.innerHTML = original
  location.reload()
}
</script>
