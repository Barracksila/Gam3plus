<template>
  <div>
    <h1>{{ message }}</h1>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const message = ref('Loading...')

onMounted(() => {
  axios.get('http://127.0.0.1:8000/api/hello')
    .then(response => {
      message.value = response.data.message
    })
    .catch(error => {
      console.error('API Error:', error)
      message.value = 'Failed to fetch'
    })
})
</script>
