<template>
  <div>
    <!-- Hero Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <h1 class="text-5xl font-bold mb-6">
              О <span class="gradient-text">мне</span>
            </h1>
            <p class="text-xl text-gray-300 mb-8">
              Привет! Я 3D художник и визуализатор с более чем 3-летним опытом создания качественных 3D моделей и визуализаций.
            </p>
            <div class="flex flex-wrap gap-4">
              <NuxtLink to="/contact" class="btn-primary">
                Связаться со мной
              </NuxtLink>
              <a href="#" class="btn-secondary">
                Скачать резюме
              </a>
            </div>
          </div>
          <div class="relative">
            <div class="w-full h-96 bg-gradient-to-br from-primary-500/20 to-primary-600/20 rounded-2xl flex items-center justify-center">
              <User class="h-32 w-32 text-primary-400" />
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- About Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
          <div>
            <h2 class="text-3xl font-bold mb-6">Мой путь</h2>
            <p class="text-gray-300 mb-6">
              Я начал свой путь в 3D графике еще в университете, изучая архитектуру. С тех пор я работал над множеством проектов, от архитектурных визуализаций до концептуального дизайна продуктов.
            </p>
            <p class="text-gray-300 mb-6">
              Моя страсть к 3D моделированию и визуализации привела меня к работе с различными клиентами по всему миру. Я специализируюсь на создании фотореалистичных рендеров и инновационных 3D концептов.
            </p>
            <p class="text-gray-300">
              Каждый проект для меня - это возможность создать что-то уникальное и вдохновляющее. Я постоянно изучаю новые технологии и техники, чтобы оставаться на переднем крае индустрии.
            </p>
          </div>
          
          <div>
            <h2 class="text-3xl font-bold mb-6">Образование</h2>
            <div class="space-y-6">
              <div class="card">
                <h3 class="text-xl font-semibold mb-2">Бакалавр архитектуры</h3>
                <p class="text-primary-400 mb-2">Московский архитектурный институт</p>
                <p class="text-gray-400">2018 - 2022</p>
              </div>
              <div class="card">
                <h3 class="text-xl font-semibold mb-2">Курсы 3D визуализации</h3>
                <p class="text-primary-400 mb-2">CG School</p>
                <p class="text-gray-400">2021 - 2022</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Skills Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Мои <span class="gradient-text">навыки</span>
          </h2>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">
            Профессиональные инструменты и технологии, которые я использую в работе
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="skill in skills" :key="skill.category" class="card">
            <h3 class="text-xl font-semibold mb-4">{{ skill.category }}</h3>
            <div class="space-y-3">
              <div v-for="item in skill.items" :key="item.name" class="flex justify-between items-center">
                <span class="text-gray-300">{{ item.name }}</span>
                <div class="flex items-center">
                  <div class="w-24 bg-dark-700 rounded-full h-2 mr-3">
                    <div 
                      class="bg-primary-500 h-2 rounded-full transition-all duration-1000"
                      :style="{ width: item.level + '%' }"
                    ></div>
                  </div>
                  <span class="text-sm text-gray-400 w-8">{{ item.level }}%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Experience Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Опыт <span class="gradient-text">работы</span>
          </h2>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">
            Моя профессиональная карьера и достижения
          </p>
        </div>
        
        <div class="space-y-8">
          <div v-for="experience in experiences" :key="experience.id" class="card">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
              <div>
                <h3 class="text-xl font-semibold">{{ experience.position }}</h3>
                <p class="text-primary-400">{{ experience.company }}</p>
              </div>
              <div class="text-gray-400 mt-2 md:mt-0">
                {{ experience.period }}
              </div>
            </div>
            <p class="text-gray-300 mb-4">{{ experience.description }}</p>
            <div class="flex flex-wrap gap-2">
              <span 
                v-for="tech in experience.technologies" 
                :key="tech"
                class="px-3 py-1 bg-primary-600/20 text-primary-400 rounded-full text-sm"
              >
                {{ tech }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Отзывы <span class="gradient-text">клиентов</span>
          </h2>
          <p class="text-xl text-gray-400 max-w-2xl mx-auto">
            Что говорят о моей работе клиенты и партнеры
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="testimonial in testimonials" :key="testimonial.id" class="card">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-primary-500/20 rounded-full flex items-center justify-center mr-4">
                <User class="h-6 w-6 text-primary-400" />
              </div>
              <div>
                <h4 class="font-semibold">{{ testimonial.name }}</h4>
                <p class="text-gray-400 text-sm">{{ testimonial.position }}</p>
              </div>
            </div>
            <p class="text-gray-300 italic">"{{ testimonial.text }}"</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { User } from 'lucide-vue-next'

const skills = [
  {
    category: '3D Моделирование',
    items: [
      { name: '3ds Max', level: 95 },
      { name: 'Blender', level: 90 },
      { name: 'Maya', level: 85 },
      { name: 'Rhino', level: 80 }
    ]
  },
  {
    category: 'Рендеринг',
    items: [
      { name: 'V-Ray', level: 95 },
      { name: 'Corona', level: 90 },
      { name: 'Arnold', level: 85 },
      { name: 'Keyshot', level: 80 }
    ]
  },
  {
    category: 'Постобработка',
    items: [
      { name: 'Photoshop', level: 90 },
      { name: 'After Effects', level: 75 },
      { name: 'Nuke', level: 70 },
      { name: 'DaVinci Resolve', level: 65 }
    ]
  }
]

const experiences = [
  {
    id: 1,
    position: 'Senior 3D Artist',
    company: 'Creative Studio',
    period: '2022 - настоящее время',
    description: 'Создание высококачественных 3D визуализаций для архитектурных и дизайнерских проектов. Работа с крупными клиентами и управление командой художников.',
    technologies: ['3ds Max', 'V-Ray', 'Photoshop', 'Corona']
  },
  {
    id: 2,
    position: '3D Visualizer',
    company: 'Architecture Bureau',
    period: '2021 - 2022',
    description: 'Специализация на архитектурной визуализации. Создание фотореалистичных рендеров для презентаций проектов.',
    technologies: ['SketchUp', 'V-Ray', 'Photoshop', 'Lumion']
  },
  {
    id: 3,
    position: 'Junior 3D Artist',
    company: 'Design Agency',
    period: '2020 - 2021',
    description: 'Начальный опыт в создании 3D моделей и визуализаций для различных проектов.',
    technologies: ['Blender', 'Cycles', 'Photoshop']
  }
]

const testimonials = [
  {
    id: 1,
    name: 'Александр Петров',
    position: 'Архитектор',
    text: 'Отличная работа! Визуализации получились именно такими, как мы и хотели. Профессиональный подход и качественный результат.'
  },
  {
    id: 2,
    name: 'Мария Сидорова',
    position: 'Дизайнер интерьеров',
    text: 'Сотрудничество было очень плодотворным. 3D модели помогли клиентам лучше понять концепцию проекта.'
  },
  {
    id: 3,
    name: 'Дмитрий Козлов',
    position: 'CEO Tech Startup',
    text: 'Концептуальный дизайн нашего продукта превзошел все ожидания. Рекомендую всем, кто ценит качество и креативность.'
  }
]
</script>
