import AboutView from '@/view/AboutView.vue'
import BlogPostView from '@/view/BlogPostView.vue'
import ContactView from '@/view/ContactView.vue'
import HomeView from '@/view/HomeView.vue'
import ServicesView from '@/view/ServicesView.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView,
    },
    {
      path: '/services',
      name: 'services',
      component: ServicesView,
    },
    {
      path: '/blogs/:id',
      name: 'blogs',
      component: BlogPostView,
    },
    // {
    //   path: '/blog/1',
    //   name: 'blog-1',
    //   component: BlogPostView
    // }
  ],
})

export default router

