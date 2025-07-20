<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-20 pb-20">
      <!-- Background decorative elements -->
      <div class="absolute inset-0 overflow-hidden">
        <!-- Floating geometric shapes -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-60 animate-pulse"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-lg opacity-70 animate-bounce"></div>
        <div class="absolute bottom-40 left-20 w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full opacity-50"></div>
        <div class="absolute top-60 left-1/3 w-12 h-12 bg-gradient-to-r from-green-400 to-cyan-500 rounded-lg opacity-60"></div>

        <!-- Gradient blobs -->
        <div class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-r from-purple-600/30 to-pink-600/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-gradient-to-r from-cyan-600/30 to-blue-600/30 rounded-full blur-3xl"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-8">
          <!-- Event Logo/Title -->
          <div class="space-y-4">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none">
              <span class="block text-gradient typewriter-text">{{ currentText }}</span>
              <span class="block text-white">Eclipse</span>
            </h1>
            <div class="text-white text-xl md:text-2xl font-bold tracking-wide">
              ONLINE HACKATHON
            </div>
          </div>

          <!-- Prize Information -->
          <div class="space-y-4">
            <h2 class="text-4xl md:text-6xl font-bold text-gradient typewriter-prize">
              {{ prizeText }}
            </h2>
            <h3 class="text-3xl md:text-5xl font-bold text-white">
              prizes & seed funding
            </h3>
          </div>

          <!-- Register Button -->
          <div class="pt-8">
            <router-link to="/register" class="btn-primary text-lg md:text-xl px-12 py-4">
              REGISTER TODAY
            </router-link>
          </div>

          <!-- Event Dates -->
          <div class="pt-8">
            <div class="inline-flex items-center space-x-4 bg-black/30 backdrop-blur-md rounded-full px-8 py-4 border border-white/20">
              <div class="flex items-center space-x-2">
                <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-white font-semibold">July</span>
                <span class="bg-white text-black rounded-full w-8 h-8 flex items-center justify-center font-bold">11</span>
              </div>
              <div class="text-white">-</div>
              <div class="flex items-center space-x-2">
                <span class="text-white font-semibold">August</span>
                <span class="bg-purple-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">16</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Decorative characters -->
        <div class="absolute bottom-0 left-0 right-0">
          <div class="flex justify-between items-end max-w-6xl mx-auto px-8">
            <!-- Left decorative elements -->
            <div class="hidden lg:block">
              <div class="relative">
                <!-- Character silhouette 1 -->
                <div class="w-32 h-48 bg-gradient-to-t from-purple-600/40 to-transparent rounded-t-full relative">
                  <div class="absolute top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-yellow-400 rounded-full"></div>
                  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-cyan-400 rounded-full"></div>
                </div>
                <!-- Character silhouette 2 -->
                <div class="absolute -right-8 bottom-0 w-24 h-40 bg-gradient-to-t from-cyan-600/40 to-transparent rounded-t-full">
                  <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-400 rounded-full"></div>
                </div>
              </div>
            </div>

            <!-- Right decorative elements -->
            <div class="hidden lg:block">
              <div class="relative">
                <!-- Character silhouette 3 -->
                <div class="w-36 h-52 bg-gradient-to-t from-green-600/40 to-transparent rounded-t-full relative">
                  <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-pink-400 rounded-full"></div>
                  <div class="absolute bottom-12 left-1/4 w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="absolute bottom-16 right-1/4 w-5 h-5 bg-purple-400 rounded-full"></div>
                </div>
                <!-- Character silhouette 4 -->
                <div class="absolute -left-6 bottom-0 w-28 h-44 bg-gradient-to-t from-yellow-600/40 to-transparent rounded-t-full">
                  <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-7 h-7 bg-cyan-400 rounded-full"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-b from-transparent to-purple-900/20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Why Join Our <span class="text-gradient typewriter-section">{{ sectionText }}</span>
          </h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Connect with developers worldwide, build innovative blockchain solutions, and compete for amazing prizes.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div class="bg-gradient-to-b from-purple-800/20 to-purple-900/20 backdrop-blur-md rounded-2xl p-8 border border-purple-500/20 hover:border-purple-400/40 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">$5M Prize Pool</h3>
            <p class="text-gray-300">
              Compete for substantial cash prizes and seed funding opportunities for the most innovative projects.
            </p>
          </div>

          <!-- Feature 2 -->
          <div class="bg-gradient-to-b from-cyan-800/20 to-blue-900/20 backdrop-blur-md rounded-2xl p-8 border border-cyan-500/20 hover:border-cyan-400/40 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Global Community</h3>
            <p class="text-gray-300">
              Connect with thousands of developers, designers, and blockchain enthusiasts from around the world.
            </p>
          </div>

          <!-- Feature 3 -->
          <div class="bg-gradient-to-b from-green-800/20 to-emerald-900/20 backdrop-blur-md rounded-2xl p-8 border border-green-500/20 hover:border-green-400/40 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Innovation Focus</h3>
            <p class="text-gray-300">
              Build cutting-edge applications on Solana blockchain with access to mentors and resources.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Event <span class="text-gradient">Timeline</span>
          </h2>
        </div>

        <div class="max-w-4xl mx-auto">
          <div class="space-y-8">
            <!-- Timeline Item 1 -->
            <div class="flex items-center space-x-8">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full flex items-center justify-center">
                <span class="text-black font-bold text-lg">11</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10">
                <h3 class="text-xl font-bold text-white mb-2">Registration Opens - July 11</h3>
                <p class="text-gray-300">Sign up and form your team. Get access to resources and mentorship.</p>
              </div>
            </div>

            <!-- Timeline Item 2 -->
            <div class="flex items-center space-x-8">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">25</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10">
                <h3 class="text-xl font-bold text-white mb-2">Hackathon Begins - July 25</h3>
                <p class="text-gray-300">Start building your innovative blockchain solutions.</p>
              </div>
            </div>

            <!-- Timeline Item 3 -->
            <div class="flex items-center space-x-8">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center">
                <span class="text-black font-bold text-lg">16</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10">
                <h3 class="text-xl font-bold text-white mb-2">Submission Deadline - August 16</h3>
                <p class="text-gray-300">Submit your projects and prepare for judging.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'HomeView',
  data() {
    return {
      currentText: '',
      textToType: ['SUMMER', 'CODING', 'BLOCKCHAIN', 'INNOVATION', 'FUTURE'],
      currentIndex: 0,
      prizeText: '',
      prizeTexts: ['$5 million in global', '$5M+ prize pool', 'Huge rewards await', 'Win big prizes'],
      prizeIndex: 0,
      sectionText: '',
      sectionTexts: ['Hackathon?', 'Community?', 'Challenge?', 'Event?'],
      sectionIndex: 0,
      typewriterSpeed: 150,
      deleteSpeed: 100,
      pauseTime: 2000
    }
  },
  mounted() {
    this.addFloatingAnimation()
    this.startTypewriter()
    // Start prize typewriter after a delay
    setTimeout(() => {
      this.startPrizeTypewriter()
    }, 1000)
    // Start section typewriter after a delay
    setTimeout(() => {
      this.startSectionTypewriter()
    }, 2000)
  },
  methods: {
    startTypewriter() {
      this.typeText()
    },

    async typeText() {
      const text = this.textToType[this.currentIndex]

      // Typing animation
      for (let i = 0; i <= text.length; i++) {
        this.currentText = text.substring(0, i)
        await this.sleep(this.typewriterSpeed)
      }

      // Pause
      await this.sleep(this.pauseTime)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.currentText = text.substring(0, i)
        await this.sleep(this.deleteSpeed)
      }

      // Move to next text
      this.currentIndex = (this.currentIndex + 1) % this.textToType.length

      // Continue the loop
      this.typeText()
    },

    startPrizeTypewriter() {
      this.typePrizeText()
    },

    async typePrizeText() {
      const text = this.prizeTexts[this.prizeIndex]

      // Typing animation
      for (let i = 0; i <= text.length; i++) {
        this.prizeText = text.substring(0, i)
        await this.sleep(120)
      }

      // Pause
      await this.sleep(3000)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.prizeText = text.substring(0, i)
        await this.sleep(80)
      }

      // Move to next text
      this.prizeIndex = (this.prizeIndex + 1) % this.prizeTexts.length

      // Continue the loop
      this.typePrizeText()
    },

    startSectionTypewriter() {
      this.typeSectionText()
    },

    async typeSectionText() {
      const text = this.sectionTexts[this.sectionIndex]

      // Typing animation
      for (let i = 0; i <= text.length; i++) {
        this.sectionText = text.substring(0, i)
        await this.sleep(140)
      }

      // Pause
      await this.sleep(4000)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.sectionText = text.substring(0, i)
        await this.sleep(90)
      }

      // Move to next text
      this.sectionIndex = (this.sectionIndex + 1) % this.sectionTexts.length

      // Continue the loop
      this.typeSectionText()
    },

    sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms))
    },

    addFloatingAnimation() {
      // Simple floating animation for decorative elements
      const elements = document.querySelectorAll('.animate-pulse, .animate-bounce')
      elements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.5}s`
      })
    }
  }
}
</script>

<style scoped>
/* Typewriter effect */
.typewriter-text {
  position: relative;
  min-height: 1.2em;
  display: inline-block;
}

.typewriter-text::after {
  content: '|';
  color: #22d3ee;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 4px;
}

.typewriter-prize {
  position: relative;
  min-height: 1.2em;
  display: inline-block;
}

.typewriter-prize::after {
  content: '|';
  color: #facc15;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 4px;
}

.typewriter-section {
  position: relative;
  min-height: 1.2em;
  display: inline-block;
}

.typewriter-section::after {
  content: '|';
  color: #4ade80;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 4px;
}

@keyframes blink {
  0%, 50% { opacity: 1; }
  51%, 100% { opacity: 0; }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-20px);
  }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}
</style>
