<template>
  <section class="page leaderboard">
    <h1>Leaderboard</h1>
    <ul>
      <li v-for="racer in racers" :key="racer.id">
        {{ racer.position }}. {{ racer.name }} — {{ racer.points }} pts
      </li>
    </ul>
    <button @click="goToResults">Full Results (Laravel)</button>
  </section>
</template>

<script>
export default {
  name: "Leaderboard",
  data() {
    return {
      racers: [
        { id: 1, position: 1, name: "Max Verstappen", points: 369 },
        { id: 2, position: 2, name: "Lewis Hamilton", points: 305 },
        { id: 3, position: 3, name: "Charles Leclerc", points: 246 },
      ],
    };
  },
  methods: {
    goToResults() {
      window.location.href = "/results"; // Laravel Blade route
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
  margin-top: 1.5rem;
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
