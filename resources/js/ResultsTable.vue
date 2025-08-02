<template>
  <div class="ps-leaderboard">
    <h1>Live Leaderboard</h1>
    <table>
      <thead>
        <tr>
          <th>Rank</th>
          <th>Country</th>
          <th>Player</th>
          <th>Avatar</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(player, idx) in players"
          :key="player.id"
          :class="{ top: idx < 3 }"
        >
          <td>{{ idx + 1 }}</td>
          <td>
            <img
              :src="getFlag(player.Country)"
              alt="flag"
              class="flag"
            />
            {{ player.Country }}
          </td>
          <td>{{ player.Player_Name }}</td>
          <td>
            <img :src="player.Avatar" alt="avatar" class="avatar" />
          </td>
          <td>{{ player.email }}</td>
          <td>{{ player.Phone_Number }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const players = ref([])

const getFlag = (country) => {
  // Optionally map country names to flag URLs
  const flags = {
    Kenya: 'https://flagcdn.com/w320/ke.png',
    Nigeria: 'https://flagcdn.com/w320/ng.png',
    UK: 'https://flagcdn.com/w320/gb.png',
    Netherlands: 'https://flagcdn.com/w320/nl.png',
    Germany: 'https://flagcdn.com/w320/de.png',
  }
  return flags[country] || 'https://flagcdn.com/w320/un.png'
}

onMounted(async () => {
  try {
    const res = await fetch('http:localhost:8000/api/players', {
      headers: {
        Accept: 'application/json',
      },
    })

    if (!res.ok) throw new Error('Failed to fetch players')

    players.value = await res.json()
  } catch (err) {
    console.error(err)
  }
});

</script>

<style scoped>
.ps-leaderboard {
  max-width: 900px;
  margin: 40px auto;
  padding: 25px;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  font-family: 'Inter', sans-serif;
}

h1 {
  text-align: center;
  font-size: 2.5rem;
  color: #003366;
  margin-bottom: 25px;
}

table {
  width: 100%;
  border-spacing: 0 14px;
}

th,
td {
  padding: 14px 18px;
  text-align: left;
}

thead th {
  font-size: 0.9rem;
  color: #555;
  border-bottom: 2px solid #ccc;
  text-transform: uppercase;
  letter-spacing: 1px;
}

tbody tr {
  background: #f9fafc;
  transition: transform 0.2s ease;
}

tbody tr.top {
  background: #e1f0ff;
  font-weight: bold;
  color: #002244;
}

tbody tr:hover {
  transform: scale(1.01);
}

.avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  object-fit: cover;
}

.flag {
  width: 36px;
  height: 24px;
  object-fit: cover;
  margin-right: 10px;
}
</style>
