// resources/js/router.js
import { createRouter, createWebHistory } from 'vue-router'
import ResultsTable from './ResultsTable.vue'
import PrintProgress from './PrintProgress.vue'


// router.js
const routes = [
  { path: '/', redirect: '/ResultsTable' },
  { path: '/ResultsTable', component: ResultsTable },
  { path: '/print/:id', component: PrintProgress },
];


const router = createRouter({
  history: createWebHistory(), // Important for Laravel SPA
  routes
})

export default router
