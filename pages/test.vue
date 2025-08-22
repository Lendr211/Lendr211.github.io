<template>
  <div class="min-h-screen bg-rose-50 flex items-center justify-center">
    <div class="text-center">
      <h1 class="text-4xl font-bold gradient-text mb-8">Тестовая страница</h1>
      <p class="text-gray-600 mb-8">Эта страница создана для тестирования навигации</p>
      
      <div class="space-y-4">
        <button 
          @click="navigateTo('/')"
          class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-lg transition-colors duration-300"
        >
          Перейти на главную
        </button>
        
        <div class="text-gray-600">
          <p>Текущий путь: {{ $route.path }}</p>
          <p>Полный URL: {{ $route.fullPath }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const router = useRouter()

const navigateTo = (path) => {
  router.push(path)
}
</script>
