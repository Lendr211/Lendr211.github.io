<template>
  <div>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
      <!-- Background 3D Elements -->
      <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-primary-500/20 rounded-full blur-xl animate-float"></div>
        <div class="absolute top-40 right-32 w-24 h-24 bg-primary-400/30 rounded-full blur-xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-32 left-1/3 w-40 h-40 bg-primary-600/20 rounded-full blur-xl animate-float" style="animation-delay: 4s;"></div>
      </div>
      
      <!-- Main Content -->
      <div class="relative z-10 text-center max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl md:text-7xl font-bold mb-6">
          <span class="gradient-text">3D Портфолио</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-2xl mx-auto">
          Создаю уникальные 3D макеты, визуализации и интерактивные проекты для ваших идей
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <NuxtLink to="/portfolio" class="btn-primary">
            Смотреть работы
          </NuxtLink>
          <NuxtLink to="/contact" class="btn-secondary">
            Связаться со мной 
          </NuxtLink>
        </div>
      </div>
      
      <!-- Scroll Indicator -->
      <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <ChevronDown class="h-6 w-6 text-gray-400" />
      </div>
    </section>
    
    <!-- Services Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Что я <span class="gradient-text">создаю</span>
          </h2>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">
            Профессиональные 3D решения для множества отраслей и проектов
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div v-for="service in services" :key="service.title" class="card group">
            <div class="text-primary-400 mb-4">
              <component :is="service.icon" class="h-12 w-12" />
            </div>
            <h3 class="text-xl font-semibold mb-3">{{ service.title }}</h3>
            <p class="text-gray-400">{{ service.description }}</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Featured Projects -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Избранные <span class="gradient-text">проекты</span>
          </h2>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">
            Посмотрите на мои лучшие работы в области 3D моделирования и визуализации
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="project in featuredProjects" :key="project.id" class="group">
            <div class="relative overflow-hidden rounded-xl bg-dark-800">
              <img 
                :src="project.image" 
                :alt="project.title"
                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-dark-900/80 to-transparent"></div>
              <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-xl font-semibold mb-2">{{ project.title }}</h3>
                <p class="text-gray-300 mb-4">{{ project.description }}</p>
                <div class="flex flex-wrap gap-2">
                  <span 
                    v-for="tag in project.tags" 
                    :key="tag"
                    class="px-3 py-1 bg-primary-600/20 text-primary-400 rounded-full text-sm"
                  >
                    {{ tag }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-12">
          <NuxtLink to="/portfolio" class="btn-primary">
            Смотреть все проекты
          </NuxtLink>
        </div>
      </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div v-for="stat in stats" :key="stat.label">
            <div class="text-4xl font-bold gradient-text mb-2">{{ stat.value }}</div>
            <div class="text-gray-400">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ChevronDown, Box, Camera, Palette, Zap } from 'lucide-vue-next'

const services = [
  {
    title: '3D Моделирование',
    description: 'Создание детализированных 3D моделей для различных целей',
    icon: Box
  },
  {
    title: 'Визуализация',
    description: 'Фотореалистичные рендеры и анимации для презентаций',
    icon: Camera
  },
  {
    title: 'Текстурирование',
    description: 'Профессиональное текстурирование и материалы',
    icon: Palette
  }
]

const featuredProjects = [
  {
    id: 1,
    title: 'Современный дом',
    description: 'Архитектурная визуализация частного дома',
    image: '/assets/images/project1.jpg',
    tags: ['Архитектура', 'Визуализация', '3D']
  },
  {
    id: 2,
    title: 'Концепт автомобиля',
    description: 'Футуристический дизайн автомобиля',
    image: '/assets/images/project2.jpg',
    tags: ['Автомобили', 'Концепт', '3D']
  },
  {
    id: 3,
    title: 'Интерьер офиса',
    description: 'Современный офисный интерьер',
    image: '/assets/images/project3.jpg',
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
