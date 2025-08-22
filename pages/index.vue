<template>
  <div>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-sakura">
      <!-- Sakura Background Elements -->
      <div class="absolute inset-0 overflow-hidden">
        <!-- Sakura Petals -->
        <div class="absolute top-10 left-10 w-8 h-8 bg-pink-300/40 rounded-full blur-md animate-sakura-float"></div>
        <div class="absolute top-20 right-20 w-6 h-6 bg-pink-400/50 rounded-full blur-md animate-sakura-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-40 left-1/4 w-10 h-10 bg-pink-200/60 rounded-full blur-lg animate-sakura-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-60 right-1/3 w-7 h-7 bg-pink-300/40 rounded-full blur-md animate-sakura-float" style="animation-delay: 3s;"></div>
        <div class="absolute top-80 left-1/3 w-9 h-9 bg-pink-400/50 rounded-full blur-lg animate-sakura-float" style="animation-delay: 4s;"></div>
        
        <!-- Larger Sakura Blossoms -->
        <div class="absolute top-1/4 left-1/6 w-16 h-16 bg-pink-300/30 rounded-full blur-xl animate-sakura-glow"></div>
        <div class="absolute top-1/3 right-1/6 w-20 h-20 bg-pink-400/40 rounded-full blur-xl animate-sakura-glow" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-1/4 left-1/4 w-18 h-18 bg-pink-200/35 rounded-full blur-xl animate-sakura-glow" style="animation-delay: 4s;"></div>
        <div class="absolute bottom-1/3 right-1/4 w-14 h-14 bg-pink-300/45 rounded-full blur-xl animate-sakura-glow" style="animation-delay: 1s;"></div>
        
        <!-- Floating Sakura Petals -->
        <div class="absolute top-0 left-1/2 w-4 h-4 bg-pink-300/60 rounded-full blur-sm animate-sakura-fall" style="animation-delay: 0s;"></div>
        <div class="absolute top-0 left-1/3 w-3 h-3 bg-pink-400/50 rounded-full blur-sm animate-sakura-fall" style="animation-delay: 2s;"></div>
        <div class="absolute top-0 right-1/3 w-5 h-5 bg-pink-200/70 rounded-full blur-sm animate-sakura-fall" style="animation-delay: 4s;"></div>
        <div class="absolute top-0 right-1/4 w-4 h-4 bg-pink-300/55 rounded-full blur-sm animate-sakura-fall" style="animation-delay: 6s;"></div>
        <div class="absolute top-0 left-1/5 w-3 h-3 bg-pink-400/45 rounded-full blur-sm animate-sakura-fall" style="animation-delay: 8s;"></div>
      </div>
      
      <!-- Main Content -->
      <div class="relative z-10 text-center max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
          <div class="inline-flex items-center px-4 py-2 bg-pink-500/20 border border-pink-500/30 rounded-full text-pink-700 text-sm font-medium mb-6 shadow-sakura">
            <span class="w-2 h-2 bg-pink-500 rounded-full mr-2 animate-pulse"></span>
            Доступен для новых проектов
          </div>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-bold mb-6">
          <span class="bg-gradient-to-r from-pink-600 via-pink-500 to-pink-700 bg-clip-text text-transparent">3D Портфолио</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-2xl mx-auto leading-relaxed">
          Создаю уникальные 3D макеты, визуализации и интерактивные проекты для ваших идей
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
          <NuxtLink to="/portfolio" class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-sakura-lg interactive-button">
            <span class="flex items-center">
              <Eye class="w-5 h-5 mr-2" />
              Смотреть работы
            </span>
          </NuxtLink>
          <NuxtLink to="/contact" class="bg-transparent border-2 border-pink-500 text-pink-600 hover:bg-pink-500 hover:text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 hover:shadow-sakura interactive-button">
            <span class="flex items-center">
              <MessageCircle class="w-5 h-5 mr-2" />
              Связаться с нами 
            </span>
          </NuxtLink>
        </div>
        
        <!-- Stats Preview -->
        <div class="grid grid-cols-3 gap-6 max-w-md mx-auto">
          <div class="text-center">
            <div class="text-2xl font-bold text-pink-600 mb-1">50+</div>
            <div class="text-xs text-gray-600">Проектов</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-bold text-pink-500 mb-1">3+</div>
            <div class="text-xs text-gray-600">Года опыта</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-bold text-pink-700 mb-1">100%</div>
            <div class="text-xs text-gray-600">Довольных клиентов</div>
          </div>
        </div>
      </div>
      
      <!-- Scroll Indicator -->
      <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <ChevronDown class="h-6 w-6 text-pink-600" />
      </div>
    </section>
    
    <!-- Services Section -->
    <section class="py-20 bg-gradient-to-b from-pink-50 to-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-flex items-center px-4 py-2 bg-pink-500/10 border border-pink-500/20 rounded-full text-pink-600 text-sm font-medium mb-6">
            <Zap class="w-4 h-4 mr-2" />
            Услуги
          </div>
          <h2 class="text-4xl font-bold mb-4 text-gray-800">
            Что я <span class="bg-gradient-to-r from-pink-500 to-pink-700 bg-clip-text text-transparent">создаю</span>
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Профессиональные 3D решения для множества отраслей и проектов
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div v-for="service in services" :key="service.title" class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-pink-200 hover:border-pink-300 transition-all duration-300 hover:shadow-sakura-lg group interactive-card">
            <div class="text-pink-500 mb-4 group-hover:text-pink-600 transition-colors duration-300">
              <component :is="service.icon" class="h-12 w-12" />
            </div>
            <h3 class="text-xl font-semibold mb-3 text-gray-800 group-hover:text-pink-700 transition-colors duration-300">{{ service.title }}</h3>
            <p class="text-gray-600 group-hover:text-gray-700 transition-colors duration-300">{{ service.description }}</p>
            <div class="mt-4 flex items-center text-pink-500 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              <span>Узнать больше</span>
              <ArrowRight class="w-4 h-4 ml-1" />
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Featured Projects -->
    <section class="py-20 bg-gradient-to-b from-white to-pink-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-flex items-center px-4 py-2 bg-pink-500/10 border border-pink-500/20 rounded-full text-pink-600 text-sm font-medium mb-6">
            <Star class="w-4 h-4 mr-2" />
            Избранное
          </div>
          <h2 class="text-4xl font-bold mb-4 text-gray-800">
            Избранные <span class="bg-gradient-to-r from-pink-500 to-pink-700 bg-clip-text text-transparent">проекты</span>
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Посмотрите на мои лучшие работы в области 3D моделирования и визуализации
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="project in featuredProjects" :key="project.id" class="group interactive-card">
            <div class="relative overflow-hidden rounded-xl bg-white shadow-lg hover:shadow-sakura-lg transition-all duration-300">
              <img 
                :src="project.image" 
                :alt="project.title"
                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-pink-900/60 via-pink-900/20 to-transparent"></div>
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-pink-500/20 text-pink-700 rounded-full text-sm border border-pink-300/50">{{ project.category }}</span>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-xl font-semibold mb-2 text-white">{{ project.title }}</h3>
                <p class="text-pink-100 mb-4">{{ project.description }}</p>
                <div class="flex flex-wrap gap-2">
                  <span 
                    v-for="tag in project.tags" 
                    :key="tag"
                    class="px-3 py-1 bg-pink-500/30 text-pink-200 rounded-full text-sm border border-pink-400/30"
                  >
                    {{ tag }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-12">
          <NuxtLink to="/portfolio" class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-sakura-lg interactive-button">
            <span class="flex items-center">
              <FolderOpen class="w-5 h-5 mr-2" />
              Смотреть все проекты
            </span>
          </NuxtLink>
        </div>
      </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-b from-pink-50 to-pink-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div v-for="stat in stats" :key="stat.label" class="group">
            <div class="text-4xl font-bold bg-gradient-to-r from-pink-600 to-pink-700 bg-clip-text text-transparent mb-2 group-hover:scale-110 transition-transform duration-300">{{ stat.value }}</div>
            <div class="text-gray-600 group-hover:text-gray-700 transition-colors duration-300">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-pink">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
          Готовы начать проект?
        </h2>
        <p class="text-xl text-pink-100 mb-8 max-w-2xl mx-auto">
          Давайте обсудим ваши идеи и создадим что-то удивительное вместе
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <NuxtLink to="/contact" class="bg-white text-pink-600 hover:bg-pink-50 font-medium py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-sakura-lg interactive-button">
            <span class="flex items-center">
              <MessageSquare class="w-5 h-5 mr-2" />
              Начать проект
            </span>
          </NuxtLink>
          <a href="tel:+79991234567" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-pink-600 font-medium py-3 px-8 rounded-lg transition-all duration-300 interactive-button">
            <span class="flex items-center">
              <Phone class="w-5 h-5 mr-2" />
              Позвонить
            </span>
          </a>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { 
  ChevronDown, 
  Box, 
  Camera, 
  Palette, 
  Zap, 
  Eye, 
  MessageCircle, 
  ArrowRight, 
  Star, 
  FolderOpen, 
  MessageSquare, 
  Phone 
} from 'lucide-vue-next'

const services = [
  {
    title: '3D Моделирование',
    description: 'Создание детализированных 3D моделей для различных целей и отраслей',
    icon: Box,
    category: 'Моделирование'
  },
  {
    title: 'Визуализация',
    description: 'Фотореалистичные рендеры и анимации для презентаций и маркетинга',
    icon: Camera,
    category: 'Рендеринг'
  },
  {
    title: 'Текстурирование',
    description: 'Профессиональное текстурирование и настройка материалов',
    icon: Palette,
    category: 'Материалы'
  }
]

const featuredProjects = [
  {
    id: 1,
    title: 'Современный дом',
    description: 'Архитектурная визуализация частного дома в современном стиле',
    image: '/assets/images/project1.jpg',
    category: 'Архитектура',
    tags: ['Архитектура', 'Визуализация', '3D']
  },
  {
    id: 2,
    title: 'Концепт автомобиля',
    description: 'Футуристический дизайн автомобиля будущего',
    image: '/assets/images/project2.jpg',
    category: 'Автомобили',
    tags: ['Автомобили', 'Концепт', '3D']
  },
  {
    id: 3,
    title: 'Интерьер офиса',
    description: 'Современный офисный интерьер с акцентом на комфорт',
    image: '/assets/images/project3.jpg',
    category: 'Интерьер',
    tags: ['Интерьер', 'Дизайн', '3D']
  }
]

const stats = [
  { value: '50+', label: 'Завершенных проектов' },
  { value: '3+', label: 'Года опыта' },
  { value: '100%', label: 'Довольных клиентов' },
  { value: '24/7', label: 'Поддержка' }
]
</script>
