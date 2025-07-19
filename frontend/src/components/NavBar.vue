<template>
  <nav class="fixed top-0 left-0 right-0 z-50 bg-black/20 backdrop-blur-md border-b border-white/10 transition-all duration-300" :class="{ 'bg-black/40': scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="flex items-center fade-in-up">
          <router-link to="/" class="flex items-center space-x-2 group">
            <div class="w-8 h-8 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-lg flex items-center justify-center transition-transform duration-300 group-hover:scale-110 rotate-animation">
              <span class="text-white font-bold text-lg">S</span>
            </div>
            <span class="text-white font-bold text-xl transition-colors group-hover:text-cyan-400">SOLANA</span>
          </router-link>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-8">
            <router-link to="/" class="nav-link fade-in-up stagger-1">
              Project voting
            </router-link>
            <router-link to="/about" class="nav-link fade-in-up stagger-2">
              Resources
            </router-link>
            <router-link to="/events" class="nav-link fade-in-up stagger-3">
              Events
            </router-link>
            <a href="#" class="nav-link fade-in-up stagger-4">
              Find a team
            </a>
            <a href="#" class="nav-link fade-in-up stagger-5">
              Ideas
            </a>
            <a href="#" class="nav-link fade-in-up stagger-6">
              FAQs
            </a>
          </div>
        </div>

        <!-- Register Button -->
        <div class="hidden md:block fade-in-up stagger-6">
          <router-link to="/register" class="btn-primary pulse-ring-container relative">
            <span class="relative z-10">REGISTER TODAY</span>
          </router-link>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden fade-in-up stagger-6">
          <button
            @click="toggleMobileMenu"
            class="text-white hover:text-cyan-400 focus:outline-none focus:text-cyan-400 transition-transform duration-300"
            :class="{ 'rotate-90': mobileMenuOpen }"
          >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <transition
      enter-active-class="transition ease-out duration-300"
      enter-from-class="opacity-0 transform -translate-y-2"
      enter-to-class="opacity-100 transform translate-y-0"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="opacity-100 transform translate-y-0"
      leave-to-class="opacity-0 transform -translate-y-2"
    >
      <div v-if="mobileMenuOpen" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-black/30 backdrop-blur-md">
          <router-link to="/" class="mobile-nav-link">
            Project voting
          </router-link>
          <router-link to="/about" class="mobile-nav-link">
            Resources
          </router-link>
          <router-link to="/events" class="mobile-nav-link">
            Events
          </router-link>
          <a href="#" class="mobile-nav-link">
            Find a team
          </a>
          <a href="#" class="mobile-nav-link">
            Ideas
          </a>
          <a href="#" class="mobile-nav-link">
            FAQs
          </a>
          <router-link to="/register" class="btn-primary block mt-4">
            REGISTER TODAY
          </router-link>
        </div>
      </div>
    </transition>
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  data() {
    return {
      mobileMenuOpen: false,
      scrolled: false
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll)
  },
  methods: {
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen
    },
    handleScroll() {
      this.scrolled = window.scrollY > 50
    }
  }
}
</script>

<style scoped>
.nav-link {
  color: white;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 500;
  transition: all 0.3s ease;
  position: relative;
}

.nav-link:hover {
  color: #22d3ee;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: 0;
  left: 50%;
  background: linear-gradient(to right, #22c55e, #06b6d4);
  transition: all 0.3s ease;
  transform: translateX(-50%);
}

.nav-link:hover::after {
  width: 100%;
}

.mobile-nav-link {
  color: white;
  display: block;
  padding: 0.5rem 0.75rem;
  font-size: 1rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.mobile-nav-link:hover {
  color: #22d3ee;
}

.pulse-ring-container::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  border: 2px solid rgba(34, 197, 94, 0.6);
  border-radius: 9999px;
  transform: translate(-50%, -50%);
  animation: pulse-ring 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
}
</style>
