<template>
  <div id="app">
    <nav class="nav-bar">
      <router-link to="/dashboard/leaderboard" active-class="active-link">Leaderboard</router-link>
      <router-link to="/dashboard/rewards" active-class="active-link">Rewards</router-link>
      <router-link to="/dashboard/winners" active-class="active-link">Winners</router-link>
      <router-link to="/dashboard/crypto-payment" active-class="active-link">Crypto Payment</router-link>
      <router-link to="/dashboard/news" active-class="active-link">News</router-link>
    </nav>
    <router-view />
  </div>
</template>

<style>
body {
  margin: 0;
  background-color: #0c0c0d;
  color: white;
  font-family: 'Arial Black', Arial, sans-serif;
}
#app {
  max-width: 1200px;
  margin: auto;
}
.nav-bar {
  display: flex;
  background-color: #111;
  padding: 1rem 2rem;
  gap: 2rem;
}
.nav-bar a {
  color: #ccc;
  text-decoration: none;
  font-weight: bold;
}
.active-link {
  color: #e10600;
  border-bottom: 2px solid #e10600;
}
</style>


