// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  modules: ['@nuxtjs/tailwindcss'],
  
  // Настройки роутинга
  router: {
    options: {
      strict: false
    }
  },
  
  // Настройки приложения
  app: {
    // Базовый префикс для GitHub Pages. Для проекта в виде username.github.io оставьте '/'
    // Для project pages будет вида '/repo-name/' и берётся из переменной окружения BASE_URL
    baseURL: process.env.BASE_URL || '/',
    head: {
      title: '3D Portfolio',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'description', content: '3D Portfolio Website' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ]
    }
  },
  
  // Настройки времени выполнения
  runtimeConfig: {
    public: {
      apiBase: process.env.API_BASE || 'http://localhost:8000'
    }
  },

  // Настройки сборки для GitHub Pages и предварительный рендер статических маршрутов
  nitro: {
    preset: 'github_pages',
    prerender: {
      routes: ['/', '/about', '/contact', '/portfolio', '/test']
    }
  },
  
  // Настройки совместимости
  compatibilityDate: '2025-08-17'
})
