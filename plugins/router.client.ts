export default defineNuxtPlugin(() => {
  const router = useRouter()
  
  // Обработчик успешной навигации
  router.afterEach((to, from) => {
    // Прокручиваем страницу вверх при навигации
    if (process.client) {
      window.scrollTo(0, 0)
    }
  })
  
  // Обработчик ошибок навигации
  router.onError((error) => {
    console.error('Navigation error:', error)
  })
})

