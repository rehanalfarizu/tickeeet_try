<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Hero Section -->
    <div class="relative pt-20 pb-16 px-4 sm:px-6 lg:px-8">
      <div class="absolute inset-0 bg-black/20"></div>
      <div class="relative max-w-7xl mx-auto">
        <div class="text-center">
          <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
            Upcoming <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-600">Events</span>
          </h1>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Discover amazing hackathons, workshops, and competitions. Join the community of innovators and creators.
          </p>
        </div>
      </div>
    </div>

    <!-- Events Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24">
      <!-- Loading State -->
      <div v-if="loading" class="text-center py-16">
        <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-cyan-400"></div>
        <p class="text-white mt-4">Loading events...</p>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="text-center py-16">
        <div class="bg-red-900/50 border border-red-500 rounded-lg p-6 max-w-md mx-auto">
          <p class="text-red-300">{{ error }}</p>
          <button @click="fetchEvents" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
            Try Again
          </button>
        </div>
      </div>

      <!-- Events Grid -->
      <div v-else-if="events.length > 0" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 lg:gap-10 xl:gap-12">
        <div
          v-for="event in events"
          :key="event.id"
          class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-8 hover:border-cyan-400/50 transition-all duration-300 hover:transform hover:scale-[1.02] shadow-lg hover:shadow-xl hover:shadow-cyan-400/10 flex flex-col h-full"
        >
          <!-- Event Type Badge -->
          <div class="flex justify-between items-start mb-6">
            <span
              class="px-3 py-1 rounded-full text-xs font-semibold capitalize"
              :class="getEventTypeBadgeClass(event.event_type)"
            >
              {{ event.event_type }}
            </span>
            <span v-if="event.is_team_based" class="px-2 py-1 bg-purple-900/50 text-purple-300 rounded-full text-xs">
              Team Event
            </span>
          </div>

          <!-- Event Title -->
          <h3 class="text-xl font-bold text-white mb-4 leading-tight">
            {{ event.name }}
          </h3>

          <!-- Event Description -->
          <p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed">
            {{ event.description }}
          </p>

          <!-- Event Details -->
          <div class="space-y-4 mb-8">
            <div class="flex items-center text-sm text-gray-300">
              <svg class="w-4 h-4 mr-3 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span class="truncate">{{ event.location }}</span>
            </div>

            <div class="flex items-center text-sm text-gray-300">
              <svg class="w-4 h-4 mr-3 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span>{{ formatDate(event.start_date) }} - {{ formatDate(event.end_date) }}</span>
            </div>

            <div class="flex items-center text-sm text-gray-300">
              <svg class="w-4 h-4 mr-3 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
              </svg>
              <span class="font-medium">{{ formatCurrency(event.entry_fee) }}</span>
            </div>

            <div class="flex items-center text-sm text-gray-300">
              <svg class="w-4 h-4 mr-3 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
              <span>Max {{ event.max_participants }} participants</span>
            </div>
          </div>

          <!-- Prizes Section -->
          <div v-if="event.prizes && event.prizes.length > 0" class="mb-6">
            <h4 class="text-sm font-semibold text-yellow-400 mb-3 flex items-center">
              <span class="mr-1">🏆</span> Prizes:
            </h4>
            <div class="space-y-2">
              <div
                v-for="(prize, index) in event.prizes.slice(0, 2)"
                :key="index"
                class="text-xs text-gray-300 bg-slate-700/30 rounded-md px-3 py-2"
              >
                <span class="font-medium text-yellow-300">{{ prize.position }}:</span> {{ prize.prize }}
              </div>
              <p v-if="event.prizes.length > 2" class="text-xs text-gray-400 italic">
                +{{ event.prizes.length - 2 }} more prizes...
              </p>
            </div>
          </div>

          <!-- Registration Status -->
          <div class="mb-6">
            <div class="bg-slate-700/30 rounded-lg p-4">
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-400">Registration ends:</span>
                <span
                  class="text-sm font-medium px-2 py-1 rounded-md"
                  :class="isRegistrationOpen(event.registration_deadline) ?
                    'text-green-300 bg-green-900/30' : 'text-red-300 bg-red-900/30'"
                >
                  {{ formatDate(event.registration_deadline) }}
                </span>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex gap-3 mt-auto">
            <router-link
              :to="{ name: 'register', query: { eventId: event.id } }"
              :class="isRegistrationOpen(event.registration_deadline) ?
                'bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-cyan-600 hover:to-purple-700' :
                'bg-gray-600 cursor-not-allowed'"
              class="flex-1 px-4 py-2.5 text-white text-center font-semibold rounded-lg transition-all duration-300 text-sm"
              :disabled="!isRegistrationOpen(event.registration_deadline)"
            >
              {{ isRegistrationOpen(event.registration_deadline) ? 'Register Now' : 'Registration Closed' }}
            </router-link>

            <button
              @click="viewEventDetails(event)"
              class="px-4 py-2.5 border border-cyan-400 text-cyan-400 hover:bg-cyan-400 hover:text-black rounded-lg transition-colors text-sm font-medium"
            >
              Details
            </button>
          </div>
        </div>
      </div>

      <!-- No Events State -->
      <div v-else class="text-center py-16">
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-8 max-w-md mx-auto">
          <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <h3 class="text-xl font-semibold text-white mb-2">No Events Available</h3>
          <p class="text-gray-400">Check back soon for upcoming events and competitions!</p>
        </div>
      </div>
    </div>

    <!-- Event Details Modal -->
    <div v-if="selectedEvent" class="fixed inset-0 bg-black/75 flex items-center justify-center p-4 z-50" @click="closeModal">
      <div class="bg-slate-800 rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="p-6">
          <!-- Modal Header -->
          <div class="flex justify-between items-start mb-4">
            <h2 class="text-2xl font-bold text-white">{{ selectedEvent.name }}</h2>
            <button @click="closeModal" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>

          <!-- Event Type and Team Badge -->
          <div class="flex gap-2 mb-4">
            <span
              class="px-3 py-1 rounded-full text-sm font-semibold capitalize"
              :class="getEventTypeBadgeClass(selectedEvent.event_type)"
            >
              {{ selectedEvent.event_type }}
            </span>
            <span v-if="selectedEvent.is_team_based" class="px-3 py-1 bg-purple-900/50 text-purple-300 rounded-full text-sm">
              Team Event
            </span>
          </div>

          <!-- Description -->
          <div class="mb-6">
            <h3 class="text-lg font-semibold text-white mb-2">Description</h3>
            <p class="text-gray-300 leading-relaxed">{{ selectedEvent.description }}</p>
          </div>

          <!-- Event Details -->
          <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div>
              <h3 class="text-lg font-semibold text-white mb-3">Event Details</h3>
              <div class="space-y-2">
                <div class="flex items-center text-sm">
                  <span class="text-gray-400 w-20">Location:</span>
                  <span class="text-white">{{ selectedEvent.location }}</span>
                </div>
                <div class="flex items-center text-sm">
                  <span class="text-gray-400 w-20">Start:</span>
                  <span class="text-white">{{ formatDateTime(selectedEvent.start_date) }}</span>
                </div>
                <div class="flex items-center text-sm">
                  <span class="text-gray-400 w-20">End:</span>
                  <span class="text-white">{{ formatDateTime(selectedEvent.end_date) }}</span>
                </div>
                <div class="flex items-center text-sm">
                  <span class="text-gray-400 w-20">Fee:</span>
                  <span class="text-white">{{ formatCurrency(selectedEvent.entry_fee) }}</span>
                </div>
                <div class="flex items-center text-sm">
                  <span class="text-gray-400 w-20">Max:</span>
                  <span class="text-white">{{ selectedEvent.max_participants }} participants</span>
                </div>
              </div>
            </div>

            <!-- Requirements -->
            <div v-if="selectedEvent.requirements && selectedEvent.requirements.length > 0">
              <h3 class="text-lg font-semibold text-white mb-3">Requirements</h3>
              <ul class="space-y-1">
                <li
                  v-for="(requirement, index) in selectedEvent.requirements"
                  :key="index"
                  class="text-sm text-gray-300 flex items-start"
                >
                  <span class="text-cyan-400 mr-2">•</span>
                  {{ requirement }}
                </li>
              </ul>
            </div>
          </div>

          <!-- Prizes -->
          <div v-if="selectedEvent.prizes && selectedEvent.prizes.length > 0" class="mb-6">
            <h3 class="text-lg font-semibold text-white mb-3">🏆 Prizes</h3>
            <div class="grid gap-2">
              <div
                v-for="(prize, index) in selectedEvent.prizes"
                :key="index"
                class="bg-gradient-to-r from-yellow-900/30 to-orange-900/30 border border-yellow-500/30 rounded-lg p-3"
              >
                <div class="flex justify-between items-center">
                  <span class="font-semibold text-yellow-400">{{ prize.position }}</span>
                  <span class="text-white">{{ prize.prize }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Actions -->
          <div class="flex gap-3">
            <router-link
              :to="{ name: 'register', query: { eventId: selectedEvent.id } }"
              :class="isRegistrationOpen(selectedEvent.registration_deadline) ?
                'bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-cyan-600 hover:to-purple-700' :
                'bg-gray-600 cursor-not-allowed'"
              class="flex-1 px-6 py-3 text-white text-center font-semibold rounded-lg transition-all duration-300"
              @click="closeModal"
            >
              {{ isRegistrationOpen(selectedEvent.registration_deadline) ? 'Register for this Event' : 'Registration Closed' }}
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'EventsView',
  data() {
    return {
      events: [],
      loading: true,
      error: null,
      selectedEvent: null,
      apiUrl: 'http://127.0.0.1:8000/api'
    }
  },
  mounted() {
    this.fetchEvents()
  },
  methods: {
    async fetchEvents() {
      this.loading = true
      this.error = null

      try {
        const response = await fetch(`${this.apiUrl}/events`, {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        })

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`)
        }

        const data = await response.json()

        if (data.success) {
          this.events = data.data || []
        } else {
          throw new Error(data.message || 'Failed to fetch events')
        }
      } catch (error) {
        console.error('Error fetching events:', error)
        this.error = `Failed to load events: ${error.message}`
      } finally {
        this.loading = false
      }
    },

    getEventTypeBadgeClass(eventType) {
      const classes = {
        'hackathon': 'bg-cyan-900/50 text-cyan-300 border border-cyan-500/30',
        'workshop': 'bg-green-900/50 text-green-300 border border-green-500/30',
        'competition': 'bg-orange-900/50 text-orange-300 border border-orange-500/30',
        'seminar': 'bg-purple-900/50 text-purple-300 border border-purple-500/30'
      }
      return classes[eventType] || 'bg-gray-900/50 text-gray-300 border border-gray-500/30'
    },

    formatDate(dateString) {
      if (!dateString) return 'N/A'
      const date = new Date(dateString)
      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
      })
    },

    formatDateTime(dateString) {
      if (!dateString) return 'N/A'
      const date = new Date(dateString)
      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      })
    },

    formatCurrency(amount) {
      if (!amount || amount === 0) return 'Free'
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      }).format(amount)
    },

    isRegistrationOpen(deadline) {
      if (!deadline) return false
      const now = new Date()
      const deadlineDate = new Date(deadline)
      return now < deadlineDate
    },

    viewEventDetails(event) {
      this.selectedEvent = event
    },

    closeModal() {
      this.selectedEvent = null
    }
  }
}
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Custom scrollbar for modal */
.overflow-y-auto::-webkit-scrollbar {
  width: 6px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: rgba(30, 41, 59, 0.5);
  border-radius: 3px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background: rgba(6, 182, 212, 0.5);
  border-radius: 3px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background: rgba(6, 182, 212, 0.7);
}

/* Smooth animations */
.transition-all {
  transition: all 0.3s ease;
}

/* Card hover effects */
.hover\:transform:hover {
  transform: translateY(-2px);
}

.hover\:scale-105:hover {
  transform: scale(1.02) translateY(-2px);
}

/* Ensure equal height cards */
.grid > div {
  height: 100%;
}

/* Smooth scale animation */
.hover\:scale-\[1\.02\]:hover {
  transform: scale(1.02) translateY(-2px);
}

/* Better spacing for mobile */
@media (max-width: 768px) {
  .gap-8 {
    gap: 1.5rem;
  }
}

@media (min-width: 768px) and (max-width: 1024px) {
  .gap-8 {
    gap: 2rem;
  }
}

@media (min-width: 1280px) {
  .xl\:gap-12 {
    gap: 3rem;
  }
}
</style>
