import { createRouter, createWebHistory } from 'vue-router';
import LeaderboardPage from '../components/Dashboard/Leaderboard.vue';
import RewardPage from '../components/Dashboard/RewardPage.vue';
import WinnerPage from '../components/Dashboard/WinnerPage.vue';
import CryptoPayment from '../components/Dashboard/CryptoPayment.vue';
import NewsPage from '../components/Dashboard/NewsPage.vue';

const routes = [
  { path: '/dashboard/leaderboard', component: LeaderboardPage },
  { path: '/dashboard/rewards', component: RewardPage },
  { path: '/dashboard/winners', component: WinnerPage },
  { path: '/dashboard/crypto-payment', component: CryptoPayment },
  { path: '/dashboard/news', component: NewsPage },
  { path: '/', redirect: '/dashboard/leaderboard' }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
