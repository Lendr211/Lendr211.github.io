<template>
  <div>
    <!-- Hero Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-6">
          <span class="gradient-text">Контакты</span>
        </h1>
        <p class="text-xl text-gray-400 max-w-2xl mx-auto">
          Готов обсудить ваш проект? Свяжитесь со мной любым удобным способом
        </p>
      </div>
    </section>
    
    <!-- Contact Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
          <!-- Contact Form -->
          <div>
            <h2 class="text-3xl font-bold mb-6">Отправить сообщение</h2>
            <form @submit.prevent="submitForm" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">
                    Имя *
                  </label>
                  <input
                    id="firstName"
                    v-model="form.firstName"
                    type="text"
                    required
                    class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white placeholder-gray-400"
                    placeholder="Ваше имя"
                  />
                </div>
                <div>
                  <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">
                    Фамилия
                  </label>
                  <input
                    id="lastName"
                    v-model="form.lastName"
                    type="text"
                    class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white placeholder-gray-400"
                    placeholder="Ваша фамилия"
                  />
                </div>
              </div>
              
              <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                  Email *
                </label>
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white placeholder-gray-400"
                  placeholder="your@email.com"
                />
              </div>
              
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                  Телефон
                </label>
                <input
                  id="phone"
                  v-model="form.phone"
                  type="tel"
                  class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white placeholder-gray-400"
                  placeholder="+7 (999) 123-45-67"
                />
              </div>
              
              <div>
                <label for="projectType" class="block text-sm font-medium text-gray-300 mb-2">
                  Тип проекта
                </label>
                <select
                  id="projectType"
                  v-model="form.projectType"
                  class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white"
                >
                  <option value="">Выберите тип проекта</option>
                  <option value="architecture">Архитектурная визуализация</option>
                  <option value="interior">Интерьерный дизайн</option>
                  <option value="product">Продуктовый дизайн</option>
                  <option value="concept">Концептуальный дизайн</option>
                  <option value="other">Другое</option>
                </select>
              </div>
              
              <div>
                <label for="budget" class="block text-sm font-medium text-gray-300 mb-2">
                  Бюджет проекта
                </label>
                <select
                  id="budget"
                  v-model="form.budget"
                  class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white"
                >
                  <option value="">Выберите бюджет</option>
                  <option value="small">До 50,000 ₽</option>
                  <option value="medium">50,000 - 150,000 ₽</option>
                  <option value="large">150,000 - 500,000 ₽</option>
                  <option value="enterprise">Более 500,000 ₽</option>
                </select>
              </div>
              
              <div>
                <label for="message" class="block text-sm font-medium text-gray-300 mb-2">
                  Сообщение *
                </label>
                <textarea
                  id="message"
                  v-model="form.message"
                  rows="6"
                  required
                  class="w-full px-4 py-3 bg-dark-700 border border-dark-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-white placeholder-gray-400 resize-none"
                  placeholder="Опишите ваш проект, требования и пожелания..."
                ></textarea>
              </div>
              
              <button 
                type="submit" 
                :disabled="isSubmitting"
                class="w-full btn-primary disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <span v-if="isSubmitting">Отправка...</span>
                <span v-else>Отправить сообщение</span>
              </button>
            </form>
          </div>
          
          <!-- Contact Info -->
          <div>
            <h2 class="text-3xl font-bold mb-6">Контактная информация</h2>
            <div class="space-y-8">
              <div class="card">
                <div class="flex items-center mb-4">
                  <Mail class="h-6 w-6 text-primary-400 mr-4" />
                  <h3 class="text-xl font-semibold">Email</h3>
                </div>
                <p class="text-gray-300 mb-2">contact@portfolio3d.com</p>
                <p class="text-gray-400 text-sm">Отвечаю в течение 24 часов</p>
              </div>
              
              <div class="card">
                <div class="flex items-center mb-4">
                  <Phone class="h-6 w-6 text-primary-400 mr-4" />
                  <h3 class="text-xl font-semibold">Телефон</h3>
                </div>
                <p class="text-gray-300 mb-2">+7 (999) 123-45-67</p>
                <p class="text-gray-400 text-sm">Пн-Пт: 9:00 - 18:00</p>
              </div>
              
              <div class="card">
                <div class="flex items-center mb-4">
                  <MapPin class="h-6 w-6 text-primary-400 mr-4" />
                  <h3 class="text-xl font-semibold">Местоположение</h3>
                </div>
                <p class="text-gray-300 mb-2">Москва, Россия</p>
                <p class="text-gray-400 text-sm">Работаю удаленно по всему миру</p>
              </div>
              
              <div class="card">
                <div class="flex items-center mb-4">
                  <Clock class="h-6 w-6 text-primary-400 mr-4" />
                  <h3 class="text-xl font-semibold">Время работы</h3>
                </div>
                <p class="text-gray-300 mb-2">Понедельник - Пятница</p>
                <p class="text-gray-400 text-sm">9:00 - 18:00 (МСК)</p>
              </div>
            </div>
            
            <!-- Social Links -->
            <div class="mt-12">
              <h3 class="text-xl font-semibold mb-6">Социальные сети</h3>
              <div class="flex space-x-4">
                <a 
                  href="#" 
                  class="w-12 h-12 bg-dark-700 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-300"
                >
                  <Instagram class="h-6 w-6 text-gray-400 hover:text-white" />
                </a>
                <a 
                  href="#" 
                  class="w-12 h-12 bg-dark-700 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-300"
                >
                  <Linkedin class="h-6 w-6 text-gray-400 hover:text-white" />
                </a>
                <a 
                  href="#" 
                  class="w-12 h-12 bg-dark-700 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-300"
                >
                  <Github class="h-6 w-6 text-gray-400 hover:text-white" />
                </a>
                <a 
                  href="#" 
                  class="w-12 h-12 bg-dark-700 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-300"
                >
                  <Youtube class="h-6 w-6 text-gray-400 hover:text-white" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-20 bg-dark-800">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">
            Часто задаваемые <span class="gradient-text">вопросы</span>
          </h2>
          <p class="text-xl text-gray-400">
            Ответы на популярные вопросы о моих услугах
          </p>
        </div>
        
        <div class="space-y-6">
          <div v-for="faq in faqs" :key="faq.id" class="card">
            <button 
              @click="toggleFaq(faq.id)"
              class="w-full text-left flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold">{{ faq.question }}</h3>
              <ChevronDown 
                class="h-5 w-5 text-gray-400 transition-transform duration-300"
                :class="{ 'rotate-180': openFaqs.includes(faq.id) }"
              />
            </button>
            <div 
              v-show="openFaqs.includes(faq.id)"
              class="mt-4 text-gray-300"
            >
              {{ faq.answer }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { Mail, Phone, MapPin, Clock, Instagram, Linkedin, Github, Youtube, ChevronDown } from 'lucide-vue-next'

const form = ref({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  projectType: '',
  budget: '',
  message: ''
})

const isSubmitting = ref(false)
const openFaqs = ref([])

const faqs = [
  {
    id: 1,
    question: 'Сколько времени занимает создание 3D визуализации?',
    answer: 'Время зависит от сложности проекта. Простая визуализация занимает 1-2 недели, сложные проекты могут занять 3-4 недели. Всегда обсуждаем сроки заранее.'
  },
  {
    id: 2,
    question: 'Какие форматы файлов вы предоставляете?',
    answer: 'Предоставляю рендеры в высоком разрешении (JPG, PNG), а также исходные файлы в форматах, совместимых с популярными 3D программами.'
  },
  {
    id: 3,
    question: 'Работаете ли вы с международными клиентами?',
    answer: 'Да, работаю с клиентами по всему миру. Использую современные инструменты для удаленного сотрудничества и общения.'
  },
  {
    id: 4,
    question: 'Предоставляете ли вы бесплатные правки?',
    answer: 'Включаю 2-3 бесплатные правки в стоимость проекта. Дополнительные изменения обсуждаются отдельно.'
  },
  {
    id: 5,
    question: 'Можете ли вы создать анимацию для проекта?',
    answer: 'Да, создаю как статичные визуализации, так и анимации. Анимация требует дополнительного времени и обсуждается отдельно.'
  }
]

const submitForm = async () => {
  isSubmitting.value = true
  
  // Имитация отправки формы
  await new Promise(resolve => setTimeout(resolve, 2000))
  
  // Здесь будет логика отправки на сервер
  console.log('Form submitted:', form.value)
  
  // Сброс формы
  form.value = {
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    projectType: '',
    budget: '',
    message: ''
  }
  
  isSubmitting.value = false
  
  // Показать уведомление об успешной отправке
  alert('Сообщение успешно отправлено! Я свяжусь с вами в ближайшее время.')
}

const toggleFaq = (id) => {
  const index = openFaqs.value.indexOf(id)
  if (index > -1) {
    openFaqs.value.splice(index, 1)
  } else {
    openFaqs.value.push(id)
  }
}
</script>
