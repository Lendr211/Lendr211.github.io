<template>
  <div id="app" class="min-h-screen bg-dark-900">
    <NuxtLayout>
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>

<script setup>
useHead({
  title: '3D Portfolio',
  meta: [
    { name: 'description', content: 'Professional 3D Portfolio showcasing creative work and projects' }
  ]
})
</script>
