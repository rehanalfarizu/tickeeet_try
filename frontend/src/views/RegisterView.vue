<template>
  <div class="min-h-screen pt-20">
    <!-- Hero Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-8">
          <h1 class="text-5xl md:text-7xl font-bold text-white">
            <span class="text-gradient">Register</span> Now
          </h1>
          <p class="text-xl text-gray-300 max-w-4xl mx-auto">
            Join thousands of developers in the biggest blockchain hackathon of the year.
            Registration is free and takes less than 5 minutes.
          </p>
        </div>
      </div>
    </section>

    <!-- Registration Form -->
    <section class="py-20">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-b from-purple-900/20 to-black/20 backdrop-blur-md rounded-2xl p-8 md:p-12 border border-white/10">
          <form @submit.prevent="submitRegistration" class="space-y-8">
            <!-- Event Selection (if eventId not in URL) -->
            <div v-if="!selectedEventId">
              <label for="event" class="block text-white font-semibold mb-2">Select Event</label>
              <select
                id="event"
                v-model="form.event_id"
                required
                class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
              >
                <option value="" disabled>Choose an event</option>
                <option v-for="event in events" :key="event.id" :value="event.id">
                  {{ event.name }}
                </option>
              </select>
            </div>

            <!-- Event Info (if eventId in URL) -->
            <div v-else-if="selectedEvent" class="bg-cyan-500/10 border border-cyan-500/30 rounded-xl p-4">
              <h3 class="text-cyan-400 font-semibold mb-2">Registering for:</h3>
              <p class="text-white text-lg">{{ selectedEvent.name }}</p>
              <p class="text-gray-300 text-sm">{{ selectedEvent.location }} • {{ formatDate(selectedEvent.start_date) }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- First Name -->
              <div>
                <label for="firstName" class="block text-white font-semibold mb-2">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  v-model="form.first_name"
                  required
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="Enter your first name"
                />
              </div>

              <!-- Last Name -->
              <div>
                <label for="lastName" class="block text-white font-semibold mb-2">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  v-model="form.last_name"
                  required
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="Enter your last name"
                />
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Email -->
              <div>
                <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
                <input
                  type="email"
                  id="email"
                  v-model="form.email"
                  required
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="your.email@example.com"
                />
              </div>

              <!-- Phone -->
              <div>
                <label for="phone" class="block text-white font-semibold mb-2">Phone Number</label>
                <input
                  type="tel"
                  id="phone"
                  v-model="form.phone"
                  required
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="+62 812 3456 7890"
                />
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Institution -->
              <div>
                <label for="institution" class="block text-white font-semibold mb-2">Institution/Organization</label>
                <input
                  type="text"
                  id="institution"
                  v-model="form.institution"
                  required
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="University, Company, etc."
                />
              </div>

              <!-- Major/Field -->
              <div>
                <label for="major" class="block text-white font-semibold mb-2">Major/Field of Study</label>
                <input
                  type="text"
                  id="major"
                  v-model="form.major"
                  class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                  placeholder="Computer Science, Business, etc."
                />
              </div>
            </div>

            <!-- Motivation -->
            <div>
              <label for="motivation" class="block text-white font-semibold mb-2">Why do you want to participate?</label>
              <textarea
                id="motivation"
                v-model="form.motivation"
                rows="4"
                class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all resize-none"
                placeholder="Share your motivation and goals for participating in this event..."
              ></textarea>
            </div>

            <!-- Experience -->
            <div>
              <label for="experience" class="block text-white font-semibold mb-2">Previous Experience</label>
              <textarea
                id="experience"
                v-model="form.experience"
                rows="3"
                class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all resize-none"
                placeholder="Describe your relevant experience, projects, or achievements..."
              ></textarea>
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
              <input
                type="email"
                id="email"
                v-model="form.email"
                required
                class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
                placeholder="your.email@example.com"
              />
            </div>

            <!-- Country -->
            <div>
              <label for="country" class="block text-white font-semibold mb-2">Country</label>
              <select
                id="country"
                v-model="form.country"
                required
                class="w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all"
              >
                <option value="">Select your country</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="UK">United Kingdom</option>
                <option value="DE">Germany</option>
                <option value="FR">France</option>
                <option value="JP">Japan</option>
                <option value="AU">Australia</option>
                <option value="ID">Indonesia</option>
                <option value="SG">Singapore</option>
                <option value="other">Other</option>
              </select>
            </div>

            <!-- Experience Level -->
            <div>
              <label class="block text-white font-semibold mb-4">Experience Level</label>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="experience"
                    value="beginner"
                    v-model="form.experience"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">Beginner</div>
                    <div class="text-gray-400 text-sm">New to blockchain</div>
                  </div>
                </label>
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="experience"
                    value="intermediate"
                    v-model="form.experience"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">Intermediate</div>
                    <div class="text-gray-400 text-sm">Some blockchain experience</div>
                  </div>
                </label>
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="experience"
                    value="advanced"
                    v-model="form.experience"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">Advanced</div>
                    <div class="text-gray-400 text-sm">Experienced developer</div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Skills -->
            <div>
              <label class="block text-white font-semibold mb-4">Skills (Select all that apply)</label>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <label
                  v-for="skill in availableSkills"
                  :key="skill"
                  class="flex items-center space-x-2 p-3 bg-black/20 border border-white/20 rounded-lg cursor-pointer hover:border-cyan-400/40 transition-all"
                  :class="{ 'border-cyan-400 bg-cyan-400/10': form.skills.includes(skill) }"
                >
                  <input
                    type="checkbox"
                    :value="skill"
                    v-model="form.skills"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <span class="text-white text-sm">{{ skill }}</span>
                </label>
              </div>
            </div>

            <!-- Team Preference -->
            <div>
              <label class="block text-white font-semibold mb-4">Team Preference</label>
              <div class="space-y-3">
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="teamPreference"
                    value="solo"
                    v-model="form.teamPreference"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">Solo</div>
                    <div class="text-gray-400 text-sm">I want to work alone</div>
                  </div>
                </label>
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="teamPreference"
                    value="hasTeam"
                    v-model="form.teamPreference"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">I have a team</div>
                    <div class="text-gray-400 text-sm">I'm registering with my existing team</div>
                  </div>
                </label>
                <label class="flex items-center space-x-3 p-4 bg-black/20 border border-white/20 rounded-xl cursor-pointer hover:border-cyan-400/40 transition-all">
                  <input
                    type="radio"
                    name="teamPreference"
                    value="needTeam"
                    v-model="form.teamPreference"
                    class="text-cyan-400 focus:ring-cyan-400"
                  />
                  <div>
                    <div class="text-white font-semibold">Looking for team</div>
                    <div class="text-gray-400 text-sm">Help me find teammates</div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-start space-x-3">
              <input
                type="checkbox"
                id="terms"
                v-model="form.acceptTerms"
                required
                class="mt-1 text-cyan-400 focus:ring-cyan-400"
              />
              <label for="terms" class="text-gray-300 text-sm">
                I agree to the
                <a href="#" class="text-cyan-400 hover:text-cyan-300">Terms and Conditions</a>
                and
                <a href="#" class="text-cyan-400 hover:text-cyan-300">Privacy Policy</a>
              </label>
            </div>

            <!-- Submit Button -->
            <div class="text-center pt-6">
              <button
                type="submit"
                :disabled="isSubmitting"
                class="btn-primary text-lg px-12 py-4 disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <span v-if="!isSubmitting">Register for Hackathon</span>
                <span v-else>Registering...</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Success Modal -->
    <div
      v-if="showSuccessModal"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50"
    >
      <div class="bg-gradient-to-b from-green-900/90 to-black/90 backdrop-blur-md rounded-2xl p-8 max-w-md mx-4 border border-green-500/30">
        <div class="text-center">
          <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-white mb-4">Registration Successful!</h3>
          <p class="text-gray-300 mb-6">
            Welcome to Summer Eclipse! Check your email for confirmation and next steps.
          </p>
          <button
            @click="showSuccessModal = false"
            class="btn-primary"
          >
            Continue
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'RegisterView',
  data() {
    return {
      form: {
        event_id: '',
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        institution: '',
        major: '',
        motivation: '',
        experience: '',
        skills: [],
        preferences: []
      },
      events: [],
      selectedEvent: null,
      selectedEventId: null,
      availableSkills: [
        'JavaScript', 'TypeScript', 'Rust', 'Python',
        'Solidity', 'React', 'Vue.js', 'Node.js',
        'Blockchain', 'Smart Contracts', 'DeFi', 'NFTs',
        'UI/UX Design', 'Mobile Dev', 'DevOps', 'AI/ML'
      ],
      isSubmitting: false,
      showSuccessModal: false,
      error: null,
      loading: true
    }
  },
  async mounted() {
    // Check if eventId is passed in query parameters
    this.selectedEventId = this.$route.query.eventId

    if (this.selectedEventId) {
      this.form.event_id = this.selectedEventId
      await this.fetchEventDetails(this.selectedEventId)
    } else {
      await this.fetchEvents()
    }

    this.loading = false
  },
  methods: {
    async fetchEvents() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/events')
        const data = await response.json()

        if (data.success) {
          this.events = data.data.filter(event => event.is_active)
        }
      } catch (error) {
        console.error('Error fetching events:', error)
        this.error = 'Failed to load events'
      }
    },

    async fetchEventDetails(eventId) {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/events/${eventId}`)
        const data = await response.json()

        if (data.success) {
          this.selectedEvent = data.data
        }
      } catch (error) {
        console.error('Error fetching event details:', error)
        this.error = 'Failed to load event details'
      }
    },

    async submitRegistration() {
      if (!this.form.event_id) {
        this.error = 'Please select an event'
        return
      }

      this.isSubmitting = true
      this.error = null

      try {
        const response = await fetch('http://127.0.0.1:8000/api/registrations', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(this.form)
        })

        // Check if response has content before parsing JSON
        const responseText = await response.text()
        let data = {}

        if (responseText) {
          try {
            data = JSON.parse(responseText)
          } catch (parseError) {
            console.error('JSON parse error:', parseError)
            throw new Error('Invalid response from server')
          }
        }

        if (response.ok && data.success) {
          this.showSuccessModal = true

          // Reset form
          this.form = {
            event_id: this.selectedEventId || '',
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            institution: '',
            major: '',
            motivation: '',
            experience: '',
            skills: [],
            preferences: []
          }
        } else {
          throw new Error(data.message || `Server error: ${response.status}`)
        }
      } catch (error) {
        console.error('Registration error:', error)
        this.error = error.message || 'Registration failed. Please try again.'
      } finally {
        this.isSubmitting = false
      }
    },

    formatDate(dateString) {
      const date = new Date(dateString)
      return date.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
      })
    }
  }
}
</script>

<style scoped>
input[type="checkbox"], input[type="radio"] {
  accent-color: #06b6d4;
}
</style>
