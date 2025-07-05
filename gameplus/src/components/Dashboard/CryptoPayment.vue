<template>
  <section class="page crypto-payment">
    <h1>Crypto Payment</h1>
    <p>Pay securely with your favorite cryptocurrency.</p>
    <button @click="goToCryptoBlade">Proceed to Payment (Laravel)</button>
  </section>
</template>

<script>
export default {
  name: "CryptoPayment",
  methods: {
    goToCryptoBlade() {
      window.location.href = "/crypto-payment";
    },
  },
};
</script>

<style scoped>
.page {
  padding: 2rem;
  background: #0c0c0d;
  color: white;
  font-family: 'Arial Black', Arial, sans-serif;
}
h1 {
  color: #e10600;
  margin-bottom: 1rem;
}
button {
  background: #e10600;
  color: white;
  border: none;
  padding: 0.7rem 1.3rem;
  font-weight: bold;
  cursor: pointer;
  border-radius: 3px;
}
button:hover {
  background: #b40500;
}
</style>
