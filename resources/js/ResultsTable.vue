<template>
  <div class="ps-leaderboard">
    <h1>Grand Champions</h1>
    <table>
      <thead>
        <tr>
          <th>Rank</th>
          <th>Country</th>
          <th>Player</th>
          <th>Avatar</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Credits</th>
          <th>BTC</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(player, idx) in players" :key="player.Player_id" :class="{ top: idx < 3 }">
          <td>{{ idx + 1 }}</td>
          <td>
            <img :src="getFlag(player.Country)" alt="flag" />
            <span>{{ player.Country }}</span>
          </td>
          <td>
            <router-link :to="`/print/${player.Player_id}`">{{ player.Player_Name }}</router-link>
          </td>
          <td><img :src="player.Avatar" alt="avatar" /></td>
          <td>{{ player.email }}</td>
          <td>{{ player.Phone_Number }}</td>
          <td>${{ formatNumber(randomCredits(player.Player_id)) }}</td>
          <td>{{ randomBTC(player.Player_id) }} BTC</td>
        </tr>
      </tbody>
    </table>


  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'

const players = ref([])
onMounted(async () => {
  try {
    const res = await fetch('http://localhost:8000/api/players');

    console.log('Fetch response status:', res.status);

    if (!res.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await res.json();
    console.log('Data fetched:', data);

    players.value = data;
  } catch (error) {
    console.error('Fetch error:', error);
  }
});

</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap');

.ps-leaderboard {
  max-width: 900px;
  margin: 40px auto;
  padding: 25px 30px;
  background: #ffffff; /* White background */
  border-radius: 16px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  font-family: 'Inter', sans-serif;
  color: #1d1f23;
  user-select: none;
  border: 1px solid #e0e6ed;
}

h1 {
  text-align: center;
  font-size: 2.5rem;
  color: #0044aa; /* Blue title */
  margin-bottom: 25px;
  letter-spacing: 1px;
  font-weight: 700;
  text-shadow: none;
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 14px;
}

thead th {
  font-weight: 600;
  font-size: 1rem;
  padding: 12px 18px;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: #555;
  border-bottom: 2px solid #ccc;
  text-align: left;
}

tbody tr {
  background: #f9fafc;
  border-radius: 14px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.05);
}

tbody tr.top {
  background: #e5f0ff;
  color: #002f6c;
  font-weight: 700;
}

tbody tr.top:hover {
  transform: scale(1.02);
  box-shadow: 0 4px 12px rgba(0, 80, 180, 0.15);
}

tbody tr:hover {
  cursor: pointer;
  transform: translateY(-3px);
  box-shadow: 0 4px 8px rgba(0, 60, 140, 0.1);
}

td {
  padding: 15px 18px;
  vertical-align: middle;
  border-collapse: separate;
  color: #1d1f23;
}

.rank {
  font-weight: 700;
  font-size: 1.2rem;
  width: 70px;
  text-align: center;
  color: #005bbb;
  text-shadow: none;
}

.country-cell {
  display: flex;
  align-items: center;
  gap: 12px;
  font-weight: 600;
  font-size: 1rem;
}

.country-cell img {
  width: 36px;
  height: 24px;
  border-radius: 4px;
  object-fit: cover;
  border: 1px solid #ccc;
}

.player-name a {
  color: #1d1f23;
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
}

.player-name a:hover {
  color: #005bbb;
  text-decoration: underline;
}

.avatar-cell img {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  border: 2px solid #ccc;
  object-fit: cover;
}

.credits,
.btc {
  font-weight: 600;
  font-size: 1rem;
  letter-spacing: 0.5px;
  text-align: right;
  padding-right: 20px;
}

.credits {
  color: #0070c9;
  text-shadow: none;
}

.btc {
  color: #4a7ebb;
  text-shadow: none;
}
.result-wrapper {
  min-height: 100vh;
  background-color: #e5f4ff; /* Light blue or aqua */
  padding: 40px;
  color: #002b55;
  font-family: 'Inter', sans-serif;
}

</style>
