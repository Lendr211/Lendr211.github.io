<template>
  <div class="min-h-screen bg-dark-900">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <div class="flex-shrink-0">
            <button @click="navigateToHome" class="text-2xl font-bold gradient-text hover:opacity-80 transition-opacity">
              3D Portfolio
            </button>
          </div>
          
          <!-- Desktop Navigation -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <button 
                v-for="item in navigation" 
                :key="item.name"
                @click="navigateTo(item.href)"
                class="text-gray-300 hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300"
                :class="{ 'text-primary-400': $route.path === item.href }"
              >
                {{ item.name }}
              </button>
            </div>
          </div>
          
          <!-- Mobile menu button -->
          <div class="md:hidden">
            <button 
              @click="mobileMenuOpen = !mobileMenuOpen"
              class="text-gray-400 hover:text-white focus:outline-none focus:text-white"
            >
              <Menu class="h-6 w-6" />
            </button>
          </div>
        </div>
      </div>
      
      <!-- Mobile Navigation -->
      <div v-if="mobileMenuOpen" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-dark-800/95 backdrop-blur-md">
          <button 
            v-for="item in navigation" 
            :key="item.name"
            @click="navigateTo(item.href)"
            class="text-gray-300 hover:text-primary-400 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 w-full text-left"
            :class="{ 'text-primary-400': $route.path === item.href }"
          >
            {{ item.name }}
          </button>
        </div>
      </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-16">
      <slot />
    </main>
    
    <!-- Footer -->
    <footer class="bg-dark-800 border-t border-dark-700">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Brand -->
          <div>
            <h3 class="text-xl font-bold gradient-text mb-4">3D Portfolio</h3>
            <p class="text-gray-400">
              Создаю уникальные 3D макеты и визуализации для ваших проектов
            </p>
          </div>
          
          <!-- Quick Links -->
          <div>
            <h4 class="text-lg font-semibold text-white mb-4">Быстрые ссылки</h4>
            <ul class="space-y-2">
              <li v-for="item in navigation" :key="item.name">
                <button 
                  @click="navigateTo(item.href)"
                  class="text-gray-400 hover:text-primary-400 transition-colors duration-300"
                >
                  {{ item.name }}
                </button>
              </li>
            </ul>
          </div>
          
          <!-- Contact -->
          <div>
            <h4 class="text-lg font-semibold text-white mb-4">Контакты</h4>
            <div class="space-y-2 text-gray-400">
              <p>Email: contact@portfolio3d.com</p>
              <p>Телефон: +7 (999) 123-45-67</p>
              <div class="flex space-x-4 mt-4">
                <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors duration-300">
                  <Instagram class="h-5 w-5" />
                </a>
                <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors duration-300">
                  <Linkedin class="h-5 w-5" />
                </a>
                <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors duration-300">
                  <Github class="h-5 w-5" />
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-dark-700 text-center text-gray-400">
          <p>&copy; 2024 3D Portfolio. Все права защищены.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Menu, Instagram, Linkedin, Github } from 'lucide-vue-next'

const mobileMenuOpen = ref(false)
const router = useRouter()
const route = useRoute()

const navigation = [
  { name: 'Главная', href: '/' },
  { name: 'Портфолио', href: '/portfolio' },
  { name: 'Обо мне', href: '/about' },
  { name: 'Контакты', href: '/contact' }
]

// Функция навигации
const navigateTo = (path) => {
  mobileMenuOpen.value = false
  
  // Используем программную навигацию
  router.push(path).then(() => {
    // Прокручиваем страницу вверх после успешной навигации
    if (process.client) {
      window.scrollTo(0, 0)
    }
  }).catch((error) => {
    console.error('Navigation error:', error)
  })
}

// Навигация на главную
const navigateToHome = () => {
  navigateTo('/')
}
</script>
