<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-20 pb-20">
      <!-- Background decorative elements -->
      <div class="absolute inset-0 overflow-hidden -z-10">
        <!-- Floating geometric shapes with animations -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-40 animate-pulse floating-1"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-lg opacity-50 animate-bounce floating-2"></div>
        <div class="absolute bottom-40 left-20 w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full opacity-30 floating-3"></div>
        <div class="absolute top-60 left-1/3 w-12 h-12 bg-gradient-to-r from-green-400 to-cyan-500 rounded-lg opacity-40 floating-4"></div>

        <!-- Gradient blobs - moved further back and reduced opacity -->
        <div class="absolute -top-60 -left-60 w-80 h-80 bg-gradient-to-r from-purple-600/15 to-pink-600/15 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute -bottom-60 -right-60 w-80 h-80 bg-gradient-to-r from-cyan-600/15 to-blue-600/15 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute top-3/4 left-1/4 w-96 h-96 bg-gradient-to-r from-green-600/10 to-yellow-600/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="text-center space-y-8 animate-fade-in-up relative z-20">
          <!-- Event Logo/Title -->
          <div class="space-y-4">
            <h1 class="text-6xl md:text-8xl font-black text-white leading-none relative z-30">
              <span class="block text-gradient typewriter-text" ref="typewriterText">{{ currentText }}</span>
              <span class="block text-white drop-shadow-2xl">Eclipse</span>
            </h1>
            <div class="text-white text-xl md:text-2xl font-bold tracking-wide animate-slide-in-left drop-shadow-lg">
              ONLINE HACKATHON
            </div>
          </div>

          <!-- Prize Information -->
          <div class="space-y-4 animate-slide-in-right animation-delay-500 relative z-20">
            <h2 class="text-4xl md:text-6xl font-bold text-gradient drop-shadow-2xl typewriter-prize">
              {{ prizeText }}
            </h2>
            <h3 class="text-3xl md:text-5xl font-bold text-white animate-slide-up animation-delay-1000 drop-shadow-2xl">
              prizes & seed funding
            </h3>
          </div>

          <!-- Register Button -->
          <div class="pt-8 animate-slide-up animation-delay-1500 relative z-20">
            <router-link
              to="/register"
              class="btn-primary text-lg md:text-xl px-12 py-4 transform hover:scale-110 transition-all duration-300 animate-pulse-glow relative z-30"
              @mouseenter="onButtonHover"
            >
              REGISTER TODAY
            </router-link>
          </div>

          <!-- Event Dates -->
          <div class="pt-8 animate-fade-in animation-delay-2000 relative z-20">
            <div class="inline-flex items-center space-x-4 bg-black/30 backdrop-blur-md rounded-full px-8 py-4 border border-white/20 hover:border-cyan-400/40 transition-all duration-300 transform hover:scale-105">
              <div class="flex items-center space-x-2">
                <div class="w-4 h-4 bg-green-500 rounded-full animate-ping"></div>
                <span class="text-white font-semibold">July</span>
                <span class="bg-white text-black rounded-full w-8 h-8 flex items-center justify-center font-bold animate-bounce-subtle">11</span>
              </div>
              <div class="text-white animate-pulse">-</div>
              <div class="flex items-center space-x-2">
                <span class="text-white font-semibold">August</span>
                <span class="bg-purple-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold animate-bounce-subtle animation-delay-500">16</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Decorative characters with CSS -->
        <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
          <div class="flex justify-between items-end max-w-6xl mx-auto">
            <!-- Left decorative element -->
            <div class="hidden lg:block animate-slide-in-left">
              <div class="w-48 h-64 bg-gradient-to-t from-purple-600/20 to-transparent rounded-t-full relative overflow-hidden">
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-full animate-bounce"></div>
                <div class="absolute bottom-12 left-1/4 w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-pulse"></div>
                <div class="absolute bottom-8 right-1/4 w-6 h-6 bg-gradient-to-r from-green-400 to-cyan-500 rounded-full animate-ping"></div>
              </div>
            </div>

            <!-- Right decorative element -->
            <div class="hidden lg:block animate-slide-in-right">
              <div class="w-56 h-72 bg-gradient-to-t from-cyan-600/20 to-transparent rounded-t-full relative overflow-hidden">
                <div class="absolute bottom-0 right-1/2 transform translate-x-1/2 w-14 h-14 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full animate-bounce animation-delay-1000"></div>
                <div class="absolute bottom-16 right-1/4 w-10 h-10 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-pulse animation-delay-500"></div>
                <div class="absolute bottom-6 left-1/4 w-8 h-8 bg-gradient-to-r from-yellow-400 to-pink-500 rounded-full animate-ping animation-delay-1500"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-b from-transparent to-purple-900/20 overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-slide-up">
            Why Join Our <span class="text-gradient typewriter-section">{{ sectionText }}</span>
          </h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto animate-slide-up animation-delay-500">
            Connect with developers worldwide, build innovative blockchain solutions, and compete for amazing prizes.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div
            class="feature-card bg-gradient-to-b from-purple-800/20 to-purple-900/20 backdrop-blur-md rounded-2xl p-8 border border-purple-500/20 hover:border-purple-400/40 transition-all duration-300 transform hover:scale-105 animate-slide-in-left"
            @mouseenter="onCardHover"
          >
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 animate-bounce-subtle">
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
          <div
            class="feature-card bg-gradient-to-b from-cyan-800/20 to-blue-900/20 backdrop-blur-md rounded-2xl p-8 border border-cyan-500/20 hover:border-cyan-400/40 transition-all duration-300 transform hover:scale-105 animate-slide-in-up animation-delay-300"
            @mouseenter="onCardHover"
          >
            <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6 animate-bounce-subtle animation-delay-500">
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
          <div
            class="feature-card bg-gradient-to-b from-green-800/20 to-emerald-900/20 backdrop-blur-md rounded-2xl p-8 border border-green-500/20 hover:border-green-400/40 transition-all duration-300 transform hover:scale-105 animate-slide-in-right animation-delay-600"
            @mouseenter="onCardHover"
          >
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 animate-bounce-subtle animation-delay-1000">
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
    <section class="py-20 overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Event <span class="text-gradient typewriter-timeline">{{ timelineText }}</span>
          </h2>
        </div>

        <div class="max-w-4xl mx-auto">
          <div class="space-y-8">
            <!-- Timeline Item 1 -->
            <div class="flex items-center space-x-8 animate-slide-in-right timeline-item">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full flex items-center justify-center transform hover:scale-110 transition-transform duration-300 animate-pulse-glow">
                <span class="text-black font-bold text-lg">11</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:border-cyan-400/40 transition-all duration-300 transform hover:scale-105">
                <h3 class="text-xl font-bold text-white mb-2">Registration Opens - July 11</h3>
                <p class="text-gray-300">Sign up and form your team. Get access to resources and mentorship.</p>
              </div>
            </div>

            <!-- Timeline Item 2 -->
            <div class="flex items-center space-x-8 animate-slide-in-left timeline-item animation-delay-300">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center transform hover:scale-110 transition-transform duration-300 animate-pulse-glow animation-delay-500">
                <span class="text-white font-bold text-lg">25</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:border-purple-400/40 transition-all duration-300 transform hover:scale-105">
                <h3 class="text-xl font-bold text-white mb-2">Hackathon Begins - July 25</h3>
                <p class="text-gray-300">Start building your innovative blockchain solutions.</p>
              </div>
            </div>

            <!-- Timeline Item 3 -->
            <div class="flex items-center space-x-8 animate-slide-in-right timeline-item animation-delay-600">
              <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center transform hover:scale-110 transition-transform duration-300 animate-pulse-glow animation-delay-1000">
                <span class="text-black font-bold text-lg">16</span>
              </div>
              <div class="flex-1 bg-black/30 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:border-yellow-400/40 transition-all duration-300 transform hover:scale-105">
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
      isTyping: true,
      typewriterSpeed: 150,
      deleteSpeed: 100,
      pauseTime: 2000,
      prizeText: '',
      prizeTexts: ['$5 million in global', '$5M+ prize pool', 'Huge rewards await', 'Win big prizes'],
      prizeIndex: 0,
      sectionText: '',
      sectionTexts: ['Hackathon?', 'Community?', 'Challenge?', 'Event?'],
      sectionIndex: 0,
      timelineText: '',
      timelineTexts: ['Timeline', 'Schedule', 'Calendar', 'Roadmap'],
      timelineIndex: 0
    }
  },
  mounted() {
    this.addInteractiveAnimations()
    this.startParticleAnimation()
    this.startTypewriter()
    setTimeout(() => {
      this.startPrizeTypewriter()
    }, 1000)
    setTimeout(() => {
      this.startSectionTypewriter()
    }, 2000)
    setTimeout(() => {
      this.startTimelineTypewriter()
    }, 3000)
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

    sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms))
    },

    startPrizeTypewriter() {
      this.typePrizeText()
    },

    async typePrizeText() {
      const text = this.prizeTexts[this.prizeIndex]

      // Typing animation
      for (let i = 0; i <= text.length; i++) {
        this.prizeText = text.substring(0, i)
        await this.sleep(100)
      }

      // Pause
      await this.sleep(3000)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.prizeText = text.substring(0, i)
        await this.sleep(50)
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
        await this.sleep(120)
      }

      // Pause
      await this.sleep(4000)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.sectionText = text.substring(0, i)
        await this.sleep(60)
      }

      // Move to next text
      this.sectionIndex = (this.sectionIndex + 1) % this.sectionTexts.length

      // Continue the loop
      this.typeSectionText()
    },

    startTimelineTypewriter() {
      this.typeTimelineText()
    },

    async typeTimelineText() {
      const text = this.timelineTexts[this.timelineIndex]

      // Typing animation
      for (let i = 0; i <= text.length; i++) {
        this.timelineText = text.substring(0, i)
        await this.sleep(140)
      }

      // Pause
      await this.sleep(5000)

      // Deleting animation
      for (let i = text.length; i >= 0; i--) {
        this.timelineText = text.substring(0, i)
        await this.sleep(70)
      }

      // Move to next text
      this.timelineIndex = (this.timelineIndex + 1) % this.timelineTexts.length

      // Continue the loop
      this.typeTimelineText()
    },
    addInteractiveAnimations() {
      // Add mouse follow effect
      document.addEventListener('mousemove', this.handleMouseMove)

      // Add scroll animations
      this.observeElements()
    },

    handleMouseMove(e) {
      const cursor = document.querySelector('.cursor-glow')
      if (!cursor) {
        const glowElement = document.createElement('div')
        glowElement.className = 'cursor-glow fixed pointer-events-none w-8 h-8 bg-gradient-to-r from-cyan-400/30 to-purple-500/30 rounded-full blur-xl z-50 transition-all duration-300'
        document.body.appendChild(glowElement)
      }

      const glow = document.querySelector('.cursor-glow')
      glow.style.left = e.clientX - 16 + 'px'
      glow.style.top = e.clientY - 16 + 'px'
    },

    observeElements() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-visible')
          }
        })
      }, { threshold: 0.1 })

      document.querySelectorAll('.timeline-item, .feature-card').forEach(el => {
        observer.observe(el)
      })
    },

    onButtonHover() {
      // Add ripple effect
      const button = event.currentTarget
      const ripple = document.createElement('span')
      ripple.className = 'absolute inset-0 bg-white/20 rounded-full scale-0 animate-ping'
      button.appendChild(ripple)

      setTimeout(() => {
        ripple.remove()
      }, 600)
    },

    onCardHover() {
      // Add glow effect
      const card = event.currentTarget
      card.classList.add('animate-glow-pulse')

      setTimeout(() => {
        card.classList.remove('animate-glow-pulse')
      }, 1000)
    },

    startParticleAnimation() {
      // Create floating particles
      for (let i = 0; i < 20; i++) {
        setTimeout(() => {
          this.createParticle()
        }, i * 200)
      }
    },

    createParticle() {
      const particle = document.createElement('div')
      particle.className = 'fixed pointer-events-none w-2 h-2 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-full opacity-30 animate-float-up'
      particle.style.left = Math.random() * 100 + 'vw'
      particle.style.top = '100vh'
      particle.style.animationDuration = (Math.random() * 3 + 2) + 's'
      particle.style.animationDelay = Math.random() * 2 + 's'

      document.body.appendChild(particle)

      setTimeout(() => {
        particle.remove()
      }, 5000)
    }
  },

  beforeUnmount() {
    document.removeEventListener('mousemove', this.handleMouseMove)
    const cursor = document.querySelector('.cursor-glow')
    if (cursor) cursor.remove()
  }
}
</script>

<style scoped>
/* Typewriter effect */
.typewriter-text {
  position: relative;
  min-height: 1.2em;
}

.typewriter-text::after {
  content: '|';
  color: #22d3ee;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 2px;
}

.typewriter-prize {
  position: relative;
  min-height: 1.2em;
}

.typewriter-prize::after {
  content: '|';
  color: #facc15;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 2px;
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
  margin-left: 2px;
}

.typewriter-timeline {
  position: relative;
  min-height: 1.2em;
  display: inline-block;
}

.typewriter-timeline::after {
  content: '|';
  color: #22d3ee;
  animation: blink 1s infinite;
  font-weight: bold;
  margin-left: 2px;
}

@keyframes blink {
  0%, 50% { opacity: 1; }
  51%, 100% { opacity: 0; }
}

@keyframes gradient-shift {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

/* Enhanced animations */
@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  33% { transform: translateY(-20px) rotate(5deg); }
  66% { transform: translateY(-10px) rotate(-5deg); }
}

@keyframes blob {
  0%, 100% { transform: translate(0px, 0px) scale(1); }
  33% { transform: translate(30px, -50px) scale(1.1); }
  66% { transform: translate(-20px, 20px) scale(0.9); }
}

@keyframes rainbow {
  0%, 100% { background: linear-gradient(45deg, #f59e0b, #10b981, #06b6d4); }
  25% { background: linear-gradient(45deg, #10b981, #06b6d4, #8b5cf6); }
  50% { background: linear-gradient(45deg, #06b6d4, #8b5cf6, #ec4899); }
  75% { background: linear-gradient(45deg, #8b5cf6, #ec4899, #f59e0b); }
}

@keyframes title-glow {
  0%, 100% {
    text-shadow:
      0 0 20px rgba(6, 182, 212, 0.5),
      0 0 40px rgba(6, 182, 212, 0.3),
      2px 2px 4px rgba(0, 0, 0, 0.8);
  }
  50% {
    text-shadow:
      0 0 40px rgba(139, 92, 246, 0.8),
      0 0 60px rgba(6, 182, 212, 0.6),
      2px 2px 8px rgba(0, 0, 0, 0.9);
  }
}

@keyframes bounce-subtle {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@keyframes pulse-glow {
  0%, 100% { box-shadow: 0 0 20px rgba(6, 182, 212, 0.3); }
  50% { box-shadow: 0 0 40px rgba(6, 182, 212, 0.6), 0 0 60px rgba(139, 92, 246, 0.4); }
}

@keyframes slide-in-left {
  from { transform: translateX(-100px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

@keyframes slide-in-right {
  from { transform: translateX(100px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}

@keyframes slide-in-up {
  from { transform: translateY(50px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

@keyframes slide-up {
  from { transform: translateY(30px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fade-in-up {
  from { transform: translateY(30px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

@keyframes counter {
  from { transform: scale(0.8); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

@keyframes float-up {
  from { transform: translateY(0) rotate(0deg); opacity: 0.3; }
  to { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
}

@keyframes glow-pulse {
  0%, 100% { box-shadow: 0 0 20px rgba(6, 182, 212, 0.3); }
  50% { box-shadow: 0 0 40px rgba(6, 182, 212, 0.8); }
}

/* Animation classes */
.floating-1 { animation: float 6s ease-in-out infinite; }
.floating-2 { animation: float 8s ease-in-out infinite; }
.floating-3 { animation: float 7s ease-in-out infinite; }
.floating-4 { animation: float 9s ease-in-out infinite; }

.animate-blob { animation: blob 7s infinite; }
.animate-rainbow {
  background: linear-gradient(45deg, #f59e0b, #10b981, #06b6d4);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: rainbow 4s ease-in-out infinite;
  filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.8));
}

.text-gradient {
  background: linear-gradient(to right, #facc15, #4ade80, #22d3ee);
  background-size: 200% 200%;
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
  animation: gradient-shift 3s ease-in-out infinite;
  filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.8));
}
.animate-title-glow { animation: title-glow 3s ease-in-out infinite; }
.animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
.animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
.animate-slide-in-left { animation: slide-in-left 0.8s ease-out; }
.animate-slide-in-right { animation: slide-in-right 0.8s ease-out; }
.animate-slide-in-up { animation: slide-in-up 0.8s ease-out; }
.animate-slide-up { animation: slide-up 0.8s ease-out; }
.animate-fade-in { animation: fade-in 1s ease-out; }
.animate-fade-in-up { animation: fade-in-up 1s ease-out; }
.animate-counter { animation: counter 1s ease-out; }
.animate-float-up { animation: float-up 4s linear; }
.animate-glow-pulse { animation: glow-pulse 1s ease-in-out; }

/* Animation delays */
.animation-delay-300 { animation-delay: 0.3s; }
.animation-delay-500 { animation-delay: 0.5s; }
.animation-delay-1000 { animation-delay: 1s; }
.animation-delay-1500 { animation-delay: 1.5s; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }

/* Interactive effects */
.feature-card {
  position: relative;
  overflow: hidden;
}

.feature-card::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.1), transparent);
  transform: rotate(-45deg);
  transition: all 0.6s;
  opacity: 0;
}

.feature-card:hover::before {
  animation: shine 1.5s ease-in-out;
  opacity: 1;
}

@keyframes shine {
  0% { transform: translateX(-100%) translateY(-100%) rotate(-45deg); }
  100% { transform: translateX(100%) translateY(100%) rotate(-45deg); }
}

/* Scroll triggered animations */
.timeline-item {
  opacity: 0;
  transform: translateX(-50px);
  transition: all 0.8s ease-out;
}

.timeline-item.animate-visible {
  opacity: 1;
  transform: translateX(0);
}

.feature-card {
  opacity: 0;
  transform: translateY(50px);
  transition: all 0.8s ease-out;
}

.feature-card.animate-visible {
  opacity: 1;
  transform: translateY(0);
}
</style>
