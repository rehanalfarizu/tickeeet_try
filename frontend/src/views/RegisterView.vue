<template>
  <div class="min-h-screen pt-20">
    <!-- Hero Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-8">
          <h1 class="text-5xl md:text-7xl font-bold text-white fade-in-up">
            <span class="text-gradient">Register</span> Now
          </h1>
          <p class="text-xl text-gray-300 max-w-4xl mx-auto fade-in-up stagger-1">
            Join thousands of developers in the biggest blockchain hackathon of the year.
            Registration is free and takes less than 5 minutes.
          </p>
        </div>
      </div>
    </section>

    <!-- Registration Form -->
    <section class="py-20">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-b from-purple-900/20 to-black/20 backdrop-blur-md rounded-2xl p-8 md:p-12 border border-white/10 fade-in-up stagger-2 card-hover">
          <form @submit.prevent="submitRegistration" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- First Name -->
              <div class="fade-in-up stagger-3">
                <label for="firstName" class="block text-white font-semibold mb-2">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  v-model="form.firstName"
                  required
                  class="form-input w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all duration-300 hover:border-cyan-300/40"
                  placeholder="Enter your first name"
                />
              </div>

              <!-- Last Name -->
              <div class="fade-in-up stagger-4">
                <label for="lastName" class="block text-white font-semibold mb-2">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  v-model="form.lastName"
                  required
                  class="form-input w-full px-4 py-3 bg-black/30 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition-all duration-300 hover:border-cyan-300/40"
                  placeholder="Enter your last name"
                />
              </div>
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
        firstName: '',
        lastName: '',
        email: '',
        country: '',
        experience: '',
        skills: [],
        teamPreference: '',
        acceptTerms: false
      },
      availableSkills: [
        'JavaScript', 'TypeScript', 'Rust', 'Python',
        'Solidity', 'React', 'Vue.js', 'Node.js',
        'Blockchain', 'Smart Contracts', 'DeFi', 'NFTs',
        'UI/UX Design', 'Mobile Dev', 'DevOps', 'AI/ML'
      ],
      isSubmitting: false,
      showSuccessModal: false
    }
  },
  methods: {
    async submitRegistration() {
      this.isSubmitting = true

      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 2000))

      console.log('Registration data:', this.form)

      this.isSubmitting = false
      this.showSuccessModal = true

      // Reset form
      this.form = {
        firstName: '',
        lastName: '',
        email: '',
        country: '',
        experience: '',
        skills: [],
        teamPreference: '',
        acceptTerms: false
      }
    }
  },
  mounted() {
    this.initAnimations()
  },
  methods: {
    async submitRegistration() {
      this.isSubmitting = true

      // Add loading animation
      const submitBtn = document.querySelector('button[type="submit"]')
      submitBtn.classList.add('animate-pulse')

      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 2000))

      console.log('Registration data:', this.form)

      submitBtn.classList.remove('animate-pulse')
      this.isSubmitting = false
      this.showSuccessModal = true

      // Reset form
      this.form = {
        firstName: '',
        lastName: '',
        email: '',
        country: '',
        experience: '',
        skills: [],
        teamPreference: '',
        acceptTerms: false
      }
    },
    initAnimations() {
      // Intersection Observer for animations
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-visible')
          }
        })
      }, observerOptions)

      // Observe all elements with fade-in-up class
      document.querySelectorAll('.fade-in-up').forEach(el => {
        observer.observe(el)
      })
    }
  }
}
</script>

<style scoped>
input[type="checkbox"], input[type="radio"] {
  accent-color: #06b6d4;
}

.form-input {
  transition: all 0.3s ease;
}

.form-input:focus {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(6, 182, 212, 0.1);
}

.animate-visible {
  animation-play-state: running;
}

.fade-in-up {
  animation-play-state: paused;
}

/* Skill checkbox animations */
.skill-checkbox {
  transition: all 0.3s ease;
}

.skill-checkbox:hover {
  transform: scale(1.05);
}

/* Success modal animation */
.modal-enter-active {
  animation: modalEnter 0.3s ease-out;
}

.modal-leave-active {
  animation: modalEnter 0.3s ease-in reverse;
}

@keyframes modalEnter {
  from {
    opacity: 0;
    transform: scale(0.9) translateY(20px);
  }
  to {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

/* Custom radio and checkbox styles */
input[type="radio"], input[type="checkbox"] {
  transition: all 0.2s ease;
}

input[type="radio"]:checked, input[type="checkbox"]:checked {
  transform: scale(1.1);
}
</style>
