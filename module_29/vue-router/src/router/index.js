import AboutView from '@/view/AboutView.vue'
import BlogPostView from '@/view/BlogPostView.vue'
import Orders from '@/view/child/Orders.vue'
import Profile from '@/view/child/Profile.vue'
import Settings from '@/view/child/Settings.vue'
import ContactView from '@/view/ContactView.vue'
import DashboardView from '@/view/DashboardView.vue'
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
      meta: {
        title: 'Home Page', description: 'Welcome to our home page', keywords: 'home, welcome, vue'
      }
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
      meta: {title: 'About Page', description: 'Learn more about us', keywords: 'about, team, company'}
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView,
      meta: {title: 'Contact Page', description: 'Get in touch with us', keywords: 'contact, email, phone'}
    },
    {
      path: '/services',
      name: 'services',
      component: ServicesView,
      meta: {title: 'Service Page', description: 'Explore our service', keywords: 'services, solutions, offerings'}
    },
    {
      path: '/blogs/:id',
      name: 'blogs',
      component: BlogPostView,
    },
    {
      path: '/dashboard',
      component: DashboardView,
      children: [
        {
          path: '',
          redirect: {name: 'profile'}
        },
        {
          path: '/profile',
          name: 'profile',
          component: Profile
        },
        {
          path: '/settings',
          name: 'settings',
          component: Settings
        },
        {
          path: '/orders',
          name: 'orders',
          component: Orders
        },
      ],
    }
  ],
})

 router.beforeEach( (to, from, next) => {
  document.title = to.meta.title || 'Vue App'

  // update meta description
  let descTag = document.querySelector('meta[name="description"]')
  if(!descTag){
    descTag = document.createElement('meta')
    descTag.setAttribute('name', 'description')
    document.head.appendChild(descTag)
  }

  // Update meta keywords

  let keywordsTag = document.querySelector('meata[name = "keywords"]' )
  if(!keywordsTag){
    keywordsTag = document.createElement('meta')
    keywordsTag.setAttribute('name', 'keywords')
    document.head.appendChild(keywordsTag)
  }
  keywordsTag.setAttribute('content', to.meta.keywords || '');

  next()
 
});


export default router

