import { createRouter, createWebHistory } from 'vue-router'
import LeaderboardPage from '../views/LeaderboardPage.vue'
import Home from '../views/Home.vue' // Optional home page

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/leaderboard', name: 'Leaderboard', component: LeaderboardPage }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
