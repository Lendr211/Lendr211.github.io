<template>
  <div>
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-sakura">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-6">
          <span class="bg-gradient-to-r from-pink-500 to-pink-700 bg-clip-text text-transparent">Портфолио</span>
        </h1>
        <p class="text-xl text-gray-700 max-w-2xl mx-auto">
          Коллекция моих лучших работ в области 3D моделирования, визуализации и дизайна
        </p>
      </div>
    </section>
    
    <!-- Filters -->
    <section class="py-8 border-b border-pink-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 justify-center">
          <button 
            v-for="category in categories" 
            :key="category"
            @click="selectedCategory = category"
            :class="[
              'px-6 py-2 rounded-full transition-all duration-300',
              selectedCategory === category 
                ? 'bg-gradient-to-r from-pink-500 to-pink-600 text-white shadow-sakura' 
                : 'bg-pink-200 text-gray-700 hover:bg-pink-300 hover:shadow-sakura'
            ]"
          >
            {{ category }}
          </button>
        </div>
      </div>
    </section>
    
    <!-- Projects Grid -->
    <section class="py-20 bg-gradient-to-b from-white to-pink-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div 
            v-for="project in filteredProjects" 
            :key="project.id" 
            class="group cursor-pointer"
            @click="openProject(project)"
          >
            <div class="relative overflow-hidden rounded-xl bg-white shadow-lg hover:shadow-sakura-lg transition-all duration-300">
              <img 
                :src="project.image" 
                :alt="project.title"
                class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-pink-200/60 via-pink-200/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="text-center">
                  <Eye class="h-12 w-12 text-pink-600 mx-auto mb-4" />
                  <span class="text-gray-800 font-medium">Посмотреть детали</span>
                </div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ project.title }}</h3>
                <p class="text-gray-700 mb-4">{{ project.description }}</p>
                <div class="flex flex-wrap gap-2">
                  <span 
                    v-for="tag in project.tags" 
                    :key="tag"
                    class="px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm border border-pink-300/50"
                  >
                    {{ tag }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Load More Button -->
        <div v-if="hasMoreProjects" class="text-center mt-12">
          <button @click="loadMore" class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-sakura-lg interactive-button">
            <span class="flex items-center">
              <ArrowDown class="w-5 h-5 mr-2" />
              Загрузить еще
            </span>
          </button>
        </div>
      </div>
    </section>
    
    <!-- Project Modal -->
    <div v-if="selectedProject" class="fixed inset-0 z-50 flex items-center justify-center p-4">
      <div class="absolute inset-0 bg-black/80" @click="closeProject"></div>
      <div class="relative bg-white rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-sakura-lg">
        <div class="p-6">
          <div class="flex justify-between items-start mb-6">
            <h2 class="text-3xl font-bold text-gray-800">{{ selectedProject.title }}</h2>
            <button @click="closeProject" class="text-gray-600 hover:text-pink-600 transition-colors duration-300">
              <X class="h-6 w-6" />
            </button>
          </div>
          
          <img 
            :src="selectedProject.image" 
            :alt="selectedProject.title"
            class="w-full h-96 object-cover rounded-lg mb-6"
          />
          
          <div class="mb-6">
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Описание проекта</h3>
            <p class="text-gray-600 mb-4">{{ selectedProject.description }}</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span 
                v-for="tag in selectedProject.tags" 
                :key="tag"
                class="px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm border border-pink-300/50"
              >
                {{ tag }}
              </span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <h4 class="font-semibold text-gray-800 mb-2">Технологии</h4>
                <ul class="text-gray-600 space-y-1">
                  <li v-for="tech in selectedProject.technologies" :key="tech">• {{ tech }}</li>
                </ul>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-2">Детали проекта</h4>
                <ul class="text-gray-600 space-y-1">
                  <li>• Категория: {{ selectedProject.category }}</li>
                  <li>• Год: {{ selectedProject.year }}</li>
                  <li>• Клиент: {{ selectedProject.client }}</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row gap-4">
            <a 
              :href="selectedProject.link" 
              target="_blank" 
              class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-sakura-lg interactive-button text-center"
            >
              <span class="flex items-center justify-center">
                <ExternalLink class="w-5 h-5 mr-2" />
                Посмотреть проект
              </span>
            </a>
            <button 
              @click="closeProject" 
              class="bg-transparent border-2 border-pink-500 text-pink-600 hover:bg-pink-500 hover:text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 hover:shadow-sakura interactive-button"
            >
              Закрыть
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Eye, X, ArrowDown, ExternalLink } from 'lucide-vue-next'

const selectedCategory = ref('Все')
const selectedProject = ref(null)
const projectsPerPage = 6
const currentPage = ref(1)

const categories = ['Все', '3D Моделирование', 'Визуализация', 'Анимация', 'Концепт-арт']

const projects = [
  {
    id: 1,
    title: 'Современный дом',
    description: 'Архитектурная визуализация современного жилого дома с минималистичным дизайном',
    category: 'Визуализация',
    image: '/images/project1.jpg',
    tags: ['3ds Max', 'V-Ray', 'Photoshop'],
    technologies: ['3ds Max', 'V-Ray', 'Photoshop', 'Corona'],
    year: '2023',
    client: 'Архитектурное бюро',
    link: '#'
  },
  {
    id: 2,
    title: 'Концепт автомобиля',
    description: 'Концептуальный дизайн электромобиля будущего с инновационными решениями',
    category: 'Концепт-арт',
    image: '/images/project2.jpg',
    tags: ['Blender', 'Substance', 'Photoshop'],
    technologies: ['Blender', 'Substance Painter', 'Photoshop', 'ZBrush'],
    year: '2023',
    client: 'Автопроизводитель',
    link: '#'
  },
  {
    id: 3,
    title: 'Интерьер кафе',
    description: 'Визуализация интерьера современного кафе с теплой атмосферой',
    category: 'Визуализация',
    image: '/images/project3.jpg',
    tags: ['3ds Max', 'Corona', 'Photoshop'],
    technologies: ['3ds Max', 'Corona', 'Photoshop', 'SketchUp'],
    year: '2023',
    client: 'Ресторанная сеть',
    link: '#'
  },
  {
    id: 4,
    title: 'Анимация персонажа',
    description: '3D анимация персонажа для игрового проекта с реалистичными движениями',
    category: 'Анимация',
    image: '/images/project4.jpg',
    tags: ['Maya', 'Arnold', 'After Effects'],
    technologies: ['Maya', 'Arnold', 'After Effects', 'ZBrush'],
    year: '2023',
    client: 'Игровая студия',
    link: '#'
  },
  {
    id: 5,
    title: 'Продуктовая визуализация',
    description: 'Фотореалистичная визуализация продукта для маркетинговых материалов',
    category: '3D Моделирование',
    image: '/images/project5.jpg',
    tags: ['Blender', 'Cycles', 'Photoshop'],
    technologies: ['Blender', 'Cycles', 'Photoshop', 'Substance'],
    year: '2023',
    client: 'Производитель товаров',
    link: '#'
  },
  {
    id: 6,
    title: 'Ландшафтный дизайн',
    description: 'Визуализация ландшафтного проекта с детальной проработкой растительности',
    category: 'Визуализация',
    image: '/images/project6.jpg',
    tags: ['3ds Max', 'V-Ray', 'Forest Pack'],
    technologies: ['3ds Max', 'V-Ray', 'Forest Pack', 'Photoshop'],
    year: '2023',
    client: 'Ландшафтная компания',
    link: '#'
  }
]

const filteredProjects = computed(() => {
  if (selectedCategory.value === 'Все') {
    return projects.slice(0, currentPage.value * projectsPerPage)
  }
  return projects
    .filter(project => project.category === selectedCategory.value)
    .slice(0, currentPage.value * projectsPerPage)
})

const hasMoreProjects = computed(() => {
  const filtered = selectedCategory.value === 'Все' 
    ? projects 
    : projects.filter(project => project.category === selectedCategory.value)
  return filtered.length > currentPage.value * projectsPerPage
})

const openProject = (project) => {
  selectedProject.value = project
}

const closeProject = () => {
  selectedProject.value = null
}

const loadMore = () => {
  currentPage.value++
}
</script>
