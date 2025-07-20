<template>
  <nav class="fixed top-0 left-0 right-0 z-50 bg-black/20 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="flex items-center">
          <router-link to="/" class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-lg">S</span>
            </div>
            <span class="text-white font-bold text-xl">SOLANA</span>
          </router-link>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-8">
            <router-link to="/" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              Project voting
            </router-link>
            <router-link to="/about" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              Resources
            </router-link>
            <router-link to="/events" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              Events
            </router-link>
            <a href="#" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              Find a team
            </a>
            <a href="#" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              Ideas
            </a>
            <a href="#" class="text-white hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">
              FAQs
            </a>
          </div>
        </div>

        <!-- Register Button -->
        <div class="hidden md:block">
          <router-link to="/register" class="btn-primary">
            REGISTER TODAY
          </router-link>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="text-white hover:text-cyan-400 focus:outline-none focus:text-cyan-400"
          >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div v-if="mobileMenuOpen" class="md:hidden">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-black/30 backdrop-blur-md">
        <router-link to="/" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          Project voting
        </router-link>
        <router-link to="/about" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          Resources
        </router-link>
        <router-link to="/events" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          Events
        </router-link>
        <a href="#" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          Find a team
        </a>
        <a href="#" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          Ideas
        </a>
        <a href="#" class="text-white hover:text-cyan-400 block px-3 py-2 text-base font-medium">
          FAQs
        </a>
        <router-link to="/register" class="btn-primary block mt-4">
          REGISTER TODAY
        </router-link>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  data() {
    return {
      mobileMenuOpen: false
    }
  }
}
</script>
