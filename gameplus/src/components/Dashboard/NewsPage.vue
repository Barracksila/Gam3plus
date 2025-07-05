<template>
  <section class="page news">
    <h1>Latest News</h1>
    <article v-for="item in news" :key="item.id" class="news-item">
      <h2>{{ item.title }}</h2>
      <p>{{ item.summary }}</p>
    </article>
    <button @click="goToNewsBlade">More News (Laravel)</button>
  </section>
</template>

<script>
export default {
  name: "NewsPage",
  data() {
    return {
      news: [
        {
          id: 1,
          title: "F1 2025 Season Kicks Off",
          summary: "New regulations and exciting circuits make for a thrilling season."
        },
        {
          id: 2,
          title: "Max Verstappen Wins Monaco GP",
          summary: "Dominant performance secures a key win for Verstappen."
        }
      ]
    };
  },
  methods: {
    goToNewsBlade() {
      window.location.href = "/news";
    }
  }
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
.news-item {
  margin-bottom: 1rem;
  border-bottom: 1px solid #222;
  padding-bottom: 1rem;
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
