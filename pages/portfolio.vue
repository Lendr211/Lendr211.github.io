<template>
  <div>
    <!-- Hero Section -->
    <section class="py-20 bg-rose-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-6">
          <span class="gradient-text">Портфолио</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Коллекция моих лучших работ в области 3D моделирования, визуализации и дизайна
        </p>
      </div>
    </section>
    
    <!-- Filters -->
    <section class="py-8 border-b border-rose-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 justify-center">
          <button 
            v-for="category in categories" 
            :key="category"
            @click="selectedCategory = category"
            :class="[
              'px-6 py-2 rounded-full transition-all duration-300',
              selectedCategory === category 
                ? 'bg-primary-500 text-white' 
                : 'bg-rose-200 text-gray-700 hover:bg-rose-300'
            ]"
          >
            {{ category }}
          </button>
        </div>
      </div>
    </section>
    
    <!-- Projects Grid -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div 
            v-for="project in filteredProjects" 
            :key="project.id" 
            class="group cursor-pointer"
            @click="openProject(project)"
          >
            <div class="relative overflow-hidden rounded-xl bg-white">
              <img 
                :src="project.image" 
                :alt="project.title"
                class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-rose-200/60 via-rose-200/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="text-center">
                  <Eye class="h-12 w-12 text-primary-600 mx-auto mb-4" />
                  <span class="text-gray-800 font-medium">Посмотреть детали</span>
                </div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-xl font-semibold mb-2">{{ project.title }}</h3>
                <p class="text-gray-700 mb-4">{{ project.description }}</p>
                <div class="flex flex-wrap gap-2">
                  <span 
                    v-for="tag in project.tags" 
                    :key="tag"
                    class="px-3 py-1 bg-primary-100 text-primary-600 rounded-full text-sm"
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
          <button @click="loadMore" class="btn-secondary">
            Загрузить еще
          </button>
        </div>
      </div>
    </section>
    
    <!-- Project Modal -->
    <div v-if="selectedProject" class="fixed inset-0 z-50 flex items-center justify-center p-4">
      <div class="absolute inset-0 bg-black/80" @click="closeProject"></div>
      <div class="relative bg-rose-100 rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
          <div class="flex justify-between items-start mb-6">
            <h2 class="text-3xl font-bold">{{ selectedProject.title }}</h2>
            <button @click="closeProject" class="text-gray-600 hover:text-primary-600">
              <X class="h-6 w-6" />
            </button>
          </div>
          
          <img 
            :src="selectedProject.image" 
            :alt="selectedProject.title"
            class="w-full h-96 object-cover rounded-lg mb-6"
          />
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <h3 class="text-xl font-semibold mb-4">Описание проекта</h3>
              <p class="text-gray-600 mb-4">{{ selectedProject.fullDescription }}</p>
              
              <h4 class="text-lg font-semibold mb-3">Технологии</h4>
              <div class="flex flex-wrap gap-2 mb-6">
                <span 
                  v-for="tech in selectedProject.technologies" 
                  :key="tech"
                  class="px-3 py-1 bg-primary-100 text-primary-600 rounded-full text-sm"
                >
                  {{ tech }}
                </span>
              </div>
            </div>
            
            <div>
              <h3 class="text-xl font-semibold mb-4">Детали проекта</h3>
              <div class="space-y-3">
                <div>
                  <span class="text-gray-600">Категория:</span>
                  <span class="text-gray-800 ml-2">{{ selectedProject.category }}</span>
                </div>
                <div>
                  <span class="text-gray-600">Дата:</span>
                  <span class="text-gray-800 ml-2">{{ selectedProject.date }}</span>
                </div>
                <div>
                  <span class="text-gray-600">Клиент:</span>
                  <span class="text-gray-800 ml-2">{{ selectedProject.client }}</span>
                </div>
                <div>
                  <span class="text-gray-600">Время работы:</span>
                  <span class="text-gray-800 ml-2">{{ selectedProject.duration }}</span>
                </div>
              </div>
              
              <div class="mt-6">
                <a :href="selectedProject.link" target="_blank" class="btn-primary inline-block">
                  Посмотреть проект
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Eye, X } from 'lucide-vue-next'

const selectedCategory = ref('Все')
const selectedProject = ref(null)
const projectsPerPage = 9
const currentPage = ref(1)

const categories = ['Все', 'Архитектура', 'Автомобили', 'Интерьер', 'Продукты', 'Концепты']

const projects = [
  {
    id: 1,
    title: 'Современный дом',
    description: 'Архитектурная визуализация частного дома',
    fullDescription: 'Детальная 3D визуализация современного частного дома с продуманным дизайном и качественными материалами. Проект включает в себя экстерьер и интерьер.',
    image: '/assets/images/project1.jpg',
    category: 'Архитектура',
    tags: ['Архитектура', 'Визуализация', '3D'],
    technologies: ['3ds Max', 'V-Ray', 'Photoshop'],
    date: '2024',
    client: 'Частный заказчик',
    duration: '2 недели',
    link: '#'
  },
  {
    id: 2,
    title: 'Концепт автомобиля',
    description: 'Футуристический дизайн автомобиля',
    fullDescription: 'Концептуальный дизайн автомобиля будущего с инновационными решениями и стильным внешним видом.',
    image: '/assets/images/project2.jpg',
    category: 'Автомобили',
    tags: ['Автомобили', 'Концепт', '3D'],
    technologies: ['Blender', 'Substance Painter', 'Keyshot'],
    date: '2024',
    client: 'Автопроизводитель',
    duration: '3 недели',
    link: '#'
  },
  {
    id: 3,
    title: 'Интерьер офиса',
    description: 'Современный офисный интерьер',
    fullDescription: 'Дизайн современного офисного пространства с функциональной планировкой и стильным оформлением.',
    image: '/assets/images/project3.jpg',
    category: 'Интерьер',
    tags: ['Интерьер', 'Дизайн', '3D'],
    technologies: ['SketchUp', 'V-Ray', 'Photoshop'],
    date: '2024',
    client: 'IT компания',
    duration: '1 неделя',
    link: '#'
  },
  {
    id: 4,
    title: 'Смартфон будущего',
    description: 'Концептуальный дизайн смартфона',
    fullDescription: 'Инновационный дизайн смартфона с гибким экраном и модульной конструкцией.',
    image: '/assets/images/project4.jpg',
    category: 'Продукты',
    tags: ['Продукты', 'Концепт', '3D'],
    technologies: ['Rhino', 'Keyshot', 'Photoshop'],
    date: '2024',
    client: 'Технологическая компания',
    duration: '2 недели',
    link: '#'
  },
  {
    id: 5,
    title: 'Небоскреб',
    description: 'Архитектурная визуализация высотного здания',
    fullDescription: 'Визуализация современного небоскреба с уникальной архитектурой и экологичными решениями.',
    image: '/assets/images/project5.jpg',
    category: 'Архитектура',
    tags: ['Архитектура', 'Визуализация', '3D'],
    technologies: ['3ds Max', 'Corona', 'Photoshop'],
    date: '2024',
    client: 'Девелоперская компания',
    duration: '4 недели',
    link: '#'
  },
  {
    id: 6,
    title: 'Космический корабль',
    description: 'Концепт межпланетного корабля',
    fullDescription: 'Футуристический дизайн космического корабля для межпланетных путешествий.',
    image: '/assets/images/project6.jpg',
    category: 'Концепты',
    tags: ['Концепты', 'Космос', '3D'],
    technologies: ['Blender', 'Substance Painter', 'Unreal Engine'],
    date: '2024',
    client: 'Космическая компания',
    duration: '5 недель',
    link: '#'
  }
]

const filteredProjects = computed(() => {
  const filtered = selectedCategory.value === 'Все' 
    ? projects 
    : projects.filter(project => project.category === selectedCategory.value)
  
  return filtered.slice(0, currentPage.value * projectsPerPage)
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

// Reset page when category changes
watch(selectedCategory, () => {
  currentPage.value = 1
})
</script>
