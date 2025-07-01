<template>
  <div class="leaderboard">
    <h2 class="title">Leaderboard</h2>
    <table class="leaderboard-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Player</th>
          <th>Country</th>
          <th>Points</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(player, index) in players" :key="player.name">
          <td>{{ index + 1 }}</td>
          <td class="player-name">{{ player.name }}</td>
          <td class="country">{{ flagEmoji(player.countryCode) }} {{ player.country }}</td>
          <td>{{ player.points }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'Leaderboard',
  props: {
    players: {
      type: Array,
      required: true,
      // Each object: { name: String, country: String, countryCode: String, points: Number }
    },
  },
  methods: {
    flagEmoji(countryCode) {
      // Convert ISO country code to unicode flag emoji
      return countryCode
        .toUpperCase()
        .replace(/./g, char =>
          String.fromCodePoint(char.charCodeAt(0) + 0x1f1a5)
        );
    },
  },
};
</script>

<style scoped>
.leaderboard {
  max-width: 800px;
  margin: auto;
  background: #121212;
  color: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}
.title {
  margin: 0;
  padding: 16px;
  font-size: 1.5rem;
  background: #e10600; /* F1 red */
}
.leaderboard-table {
  width: 100%;
  border-collapse: collapse;
}
.leaderboard-table th,
.leaderboard-table td {
  padding: 12px 16px;
  text-align: left;
  border-bottom: 1px solid #333;
}
.leaderboard-table tbody tr:hover {
  background: #1f1f1f;
}
.player-name {
  font-weight: bold;
}
.country {
  display: flex;
  align-items: center;
  gap: 8px;
}
</style>

