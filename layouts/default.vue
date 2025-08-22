<template>
  <div class="min-h-screen bg-gradient-to-b from-pink-50 to-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-pink-200/50 shadow-sakura">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <div class="flex-shrink-0">
            <button @click="navigateToHome" class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-pink-700 bg-clip-text text-transparent hover:opacity-80 transition-opacity interactive-button">
              <span class="flex items-center">
                <Cube class="w-8 h-8 mr-2 text-pink-500" />
                3D Portfolio
              </span>
            </button>
          </div>
          
          <!-- Desktop Navigation -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <button 
                v-for="item in navigation" 
                :key="item.name"
                @click="navigateTo(item.href)"
                :class="[
                  'text-gray-600 hover:text-pink-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-pink-50',
                  $route.path === item.href ? 'text-pink-600 bg-pink-50' : ''
                ]"
              >
                <span class="flex items-center">
                  <component :is="item.icon" class="w-4 h-4 mr-2" />
                  {{ item.name }}
                </span>
              </button>
            </div>
          </div>
          
          <!-- Mobile menu button -->
          <div class="md:hidden">
            <button 
              @click="mobileMenuOpen = !mobileMenuOpen"
              class="text-gray-600 hover:text-pink-600 focus:outline-none focus:text-pink-600 interactive-button"
            >
              <Menu class="h-6 w-6" />
            </button>
          </div>
        </div>
      </div>
      
      <!-- Mobile Navigation -->
      <div v-if="mobileMenuOpen" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white/95 backdrop-blur-md border-t border-pink-200/50">
          <button 
            v-for="item in navigation" 
            :key="item.name"
            @click="navigateTo(item.href)"
            :class="[
              'block w-full text-left px-3 py-2 rounded-md text-base font-medium transition-all duration-300',
              $route.path === item.href 
                ? 'text-pink-600 bg-pink-50' 
                : 'text-gray-600 hover:text-pink-600 hover:bg-pink-50'
            ]"
          >
            <span class="flex items-center">
              <component :is="item.icon" class="w-4 h-4 mr-2" />
              {{ item.name }}
            </span>
          </button>
        </div>
      </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-16">
      <slot />
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-b from-pink-100 to-pink-200 border-t border-pink-300/50">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Brand -->
          <div>
            <div class="flex items-center mb-4">
              <Cube class="w-8 h-8 mr-2 text-pink-600" />
              <h3 class="text-xl font-bold bg-gradient-to-r from-pink-600 to-pink-700 bg-clip-text text-transparent">3D Portfolio</h3>
            </div>
            <p class="text-gray-600 mb-4">
              Создаю уникальные 3D макеты и визуализации для ваших проектов
            </p>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 interactive-button">
                <Instagram class="h-5 w-5" />
              </a>
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 interactive-button">
                <Linkedin class="h-5 w-5" />
              </a>
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 interactive-button">
                <Github class="h-5 w-5" />
              </a>
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 interactive-button">
                <Behance class="h-5 w-5" />
              </a>
            </div>
          </div>
          
          <!-- Quick Links -->
          <div>
            <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
              <Link class="w-4 h-4 mr-2 text-pink-600" />
              Быстрые ссылки
            </h4>
            <ul class="space-y-2">
              <li v-for="item in navigation" :key="item.name">
                <button 
                  @click="navigateTo(item.href)"
                  class="text-gray-600 hover:text-pink-600 transition-colors duration-300 flex items-center interactive-button"
                >
                  <ArrowRight class="w-3 h-3 mr-2" />
                  {{ item.name }}
                </button>
              </li>
            </ul>
          </div>
          
          <!-- Contact -->
          <div>
            <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
              <MessageCircle class="w-4 h-4 mr-2 text-pink-600" />
              Контакты
            </h4>
            <div class="space-y-3 text-gray-600">
              <div class="flex items-center">
                <Mail class="w-4 h-4 mr-2 text-pink-600" />
                <span>contact@portfolio3d.com</span>
              </div>
              <div class="flex items-center">
                <Phone class="w-4 h-4 mr-2 text-pink-600" />
                <span>+7 (999) 123-45-67</span>
              </div>
              <div class="flex items-center">
                <MapPin class="w-4 h-4 mr-2 text-pink-600" />
                <span>Москва, Россия</span>
              </div>
              <div class="flex items-center">
                <Clock class="w-4 h-4 mr-2 text-pink-600" />
                <span>Пн-Пт: 9:00 - 18:00</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-pink-300/50 text-center">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-600 mb-4 md:mb-0">
              &copy; 2024 3D Portfolio. Все права защищены.
            </p>
            <div class="flex space-x-6">
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 text-sm">
                Политика конфиденциальности
              </a>
              <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors duration-300 text-sm">
                Условия использования
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { 
  Menu, 
  Instagram, 
  Linkedin, 
  Github, 
  Behance,
  Cube,
  Home,
  FolderOpen,
  User,
  MessageCircle,
  Link,
  ArrowRight,
  Mail,
  Phone,
  MapPin,
  Clock
} from 'lucide-vue-next'

const mobileMenuOpen = ref(false)
const router = useRouter()
const route = useRoute()

const navigation = [
  { name: 'Главная', href: '/', icon: Home },
  { name: 'Портфолио', href: '/portfolio', icon: FolderOpen },
  { name: 'Обо мне', href: '/about', icon: User },
  { name: 'Контакты', href: '/contact', icon: MessageCircle }
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
