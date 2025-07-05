<template>
  <section class="page reward">
    <h1>Rewards</h1>
    <p>Earn points by participating and redeem exclusive rewards.</p>
    <button @click="goToRewardBlade">Go to Rewards (Laravel)</button>
  </section>
</template>

<script>
export default {
  name: "RewardPage",
  methods: {
    goToRewardBlade() {
      window.location.href = "/reward"; // Laravel Blade route
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
