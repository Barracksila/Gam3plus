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
          <th>Credits</th>
          <th>BTC</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(player, idx) in players" :key="player.Player_id" :class="{ top: idx < 3 }">
          <td class="rank">
            <span v-if="idx === 0" class="gold">🥇</span>
            <span v-else-if="idx === 1" class="silver">🥈</span>
            <span v-else-if="idx === 2" class="bronze">🥉</span>
            {{ idx + 1 }}
          </td>
          <td class="country-cell">
            <img :src="getFlag(player.Country)" alt="flag" />
            <span>{{ player.Country }}</span>
          </td>
          <td class="player-name">
            <router-link :to="`/print/${player.Player_id}`">{{ player.Player_Name }}</router-link>
          </td>
          <td class="avatar-cell">
            <img :src="player.Avatar" alt="avatar" />
          </td>
          <td class="credits">${{ formatNumber(randomCredits(player.Player_id)) }}</td>
          <td class="btc">{{ randomBTC(player.Player_id) }} BTC</td>
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
    const res = await fetch('/api/players')
    if (!res.ok) throw new Error('Failed to fetch players')
    players.value = await res.json()
  } catch (e) {
    console.error(e)
  }
})

const getFlag = country => `https://flagcdn.com/w40/${country.toLowerCase()}.png`
const randomCredits = id => 12000 + id * 175
const randomBTC = id => (0.7 + id * 0.09).toFixed(4)
const formatNumber = n => n.toLocaleString()
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap');

.ps-leaderboard {
  max-width: 900px;
  margin: 40px auto;
  padding: 25px 30px;
  background: #121519;
  border-radius: 16px;
  box-shadow:
    inset 2px 2px 5px #1c2026,
    inset -2px -2px 8px #0b0d11,
    0 6px 15px rgba(0, 104, 255, 0.6);
  font-family: 'Rajdhani', sans-serif;
  color: #d6e5ff;
  user-select: none;
  border: 2px solid #072146;
}

h1 {
  text-align: center;
  font-size: 2.5rem;
  color: #00a3ff;
  text-shadow:
    0 0 8px #00a3ffcc,
    0 0 16px #00a3ff88;
  margin-bottom: 25px;
  letter-spacing: 4px;
  font-weight: 800;
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 14px;
}

thead th {
  font-weight: 700;
  font-size: 1.15rem;
  padding: 12px 18px;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: #8cb6ff;
  border-bottom: 2px solid #1f2a42;
  text-align: left;
}

tbody tr {
  background: #1a202b;
  border-radius: 14px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow:
    3px 3px 8px rgba(0, 0, 0, 0.6),
    -2px -2px 7px #1f2a42;
}

tbody tr.top {
  background: linear-gradient(90deg, #0041d0, #00a3ff);
  box-shadow:
    0 0 15px #00a3ff,
    inset 0 0 20px #0041d0;
  color: #e0f0ff;
  font-weight: 900;
}

tbody tr.top:hover {
  transform: scale(1.04);
  box-shadow:
    0 0 22px #00c3ff,
    inset 0 0 30px #0061c1;
}

tbody tr:hover {
  cursor: pointer;
  transform: translateY(-4px);
  box-shadow:
    0 0 15px #00a3ffaa,
    inset 0 0 10px #0f2c60;
}

td {
  padding: 15px 18px;
  vertical-align: middle;
  border-collapse: separate;
  border-spacing: 10px;
  color: #d6e5ff;
}

.rank {
  font-weight: 900;
  font-size: 1.3rem;
  width: 70px;
  text-align: center;
  color: #00a3ff;
  text-shadow:
    0 0 8px #00a3ffcc;
}

.gold {
  color: #ffd700;
  filter: drop-shadow(0 0 4px #ffd700);
}

.silver {
  color: #c0c0c0;
  filter: drop-shadow(0 0 4px #c0c0c0);
}

.bronze {
  color: #cd7f32;
  filter: drop-shadow(0 0 4px #cd7f32);
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
  box-shadow:
    0 0 6px #007fffaa;
  object-fit: cover;
}

.player-name a {
  color: #d6e5ff;
  font-weight: 700;
  font-size: 1rem;
  text-decoration: none;
  transition: color 0.3s ease, text-shadow 0.3s ease;
}

.player-name a:hover {
  color: #00a3ff;
  text-shadow:
    0 0 8px #00a3ffcc,
    0 0 16px #00a3ff99;
}

.avatar-cell img {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  border: 2px solid #00a3ff;
  box-shadow:
    0 0 10px #00a3ff99;
  object-fit: cover;
}

.credits,
.btc {
  font-weight: 700;
  font-size: 1rem;
  letter-spacing: 1px;
  text-align: right;
  padding-right: 20px;
}

.credits {
  color: #00d1ff;
  text-shadow: 0 0 4px #00d1ffcc;
}

.btc {
  color: #a1d4ff;
  text-shadow: 0 0 3px #a1d4ffbb;
}
</style>
