<template>
  <section class="page winner">
    <h1>Winners</h1>
    <ul>
      <li v-for="winner in winners" :key="winner.id">
        {{ winner.name }} - {{ winner.event }}
      </li>
    </ul>
    <button @click="goToWinnerBlade">Full Winner List (Laravel)</button>
  </section>
</template>

<script>
export default {
  name: "WinnerPage",
  data() {
    return {
      winners: [
        { id: 1, name: "Max Verstappen", event: "2025 Monaco GP" },
        { id: 2, name: "Lewis Hamilton", event: "2025 British GP" },
      ],
    };
  },
  methods: {
    goToWinnerBlade() {
      window.location.href = "/winners";
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
ul {
  list-style: none;
  padding: 0;
}
li {
  padding: 0.5rem 0;
  border-bottom: 1px solid #222;
}
button {
  background: #e10600;
  color: white;
  border: none;
  padding: 0.7rem 1.3rem;
  font-weight: bold;
  cursor: pointer;
  border-radius: 3px;
  margin-top: 1rem;
}
button:hover {
  background: #b40500;
}
</style>
