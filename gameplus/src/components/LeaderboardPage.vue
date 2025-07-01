<template>
  <Leaderboard :players="playersData" />
</template>

<script>
import Leaderboard from '../components/Leaderboard.vue';

export default {
  name: 'LeaderboardPage',
  components: { Leaderboard },
  data() {
    return {
      playersData: [
        { name: 'Lewis Hamilton', country: 'United Kingdom', countryCode: 'GB', points: 200 },
        { name: 'Max Verstappen', country: 'Netherlands', countryCode: 'NL', points: 195 },
        { name: 'Charles Leclerc', country: 'Monaco', countryCode: 'MC', points: 180 },
        // ...more drivers
      ],
    };
  },
};
</script>
