<template>
  <div class="min-h-screen pt-20">
    <!-- Hero Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-8">
          <h1 class="text-5xl md:text-7xl font-bold text-white">
            About <span class="text-gradient">Summer Eclipse</span>
          </h1>
          <p class="text-xl text-gray-300 max-w-4xl mx-auto">
            Summer Eclipse is a global online hackathon that brings together the brightest minds in blockchain technology
            to build innovative solutions on the Solana network.
          </p>
        </div>
      </div>
    </section>

    <!-- Mission Section -->
    <section class="py-20 bg-gradient-to-b from-transparent to-purple-900/10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div>
            <h2 class="text-4xl font-bold text-white mb-6">Our Mission</h2>
            <p class="text-gray-300 text-lg mb-6">
              We believe in empowering developers to create the next generation of decentralized applications.
              Our hackathon provides a platform for innovation, collaboration, and learning.
            </p>
            <p class="text-gray-300 text-lg">
              With $5 million in prizes and seed funding, we're committed to supporting the most promising
              projects and helping them grow into successful businesses.
            </p>
          </div>
          <div class="bg-gradient-to-r from-purple-800/20 to-cyan-800/20 backdrop-blur-md rounded-2xl p-8 border border-white/10">
            <div class="space-y-6">
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full flex items-center justify-center">
                  <span class="text-white font-bold">1</span>
                </div>
                <div>
                  <h3 class="text-white font-semibold">Innovation</h3>
                  <p class="text-gray-400 text-sm">Push the boundaries of blockchain technology</p>
                </div>
              </div>
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                  <span class="text-white font-bold">2</span>
                </div>
                <div>
                  <h3 class="text-white font-semibold">Collaboration</h3>
                  <p class="text-gray-400 text-sm">Connect with developers worldwide</p>
                </div>
              </div>
              <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center">
                  <span class="text-white font-bold">3</span>
                </div>
                <div>
                  <h3 class="text-white font-semibold">Growth</h3>
                  <p class="text-gray-400 text-sm">Support promising projects with funding</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="text-center">
            <div class="text-4xl font-bold text-gradient mb-2">$5M</div>
            <div class="text-white font-semibold">Prize Pool</div>
          </div>
          <div class="text-center">
            <div class="text-4xl font-bold text-gradient mb-2">10K+</div>
            <div class="text-white font-semibold">Participants</div>
          </div>
          <div class="text-center">
            <div class="text-4xl font-bold text-gradient mb-2">50+</div>
            <div class="text-white font-semibold">Countries</div>
          </div>
          <div class="text-center">
            <div class="text-4xl font-bold text-gradient mb-2">30</div>
            <div class="text-white font-semibold">Days</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'AboutView'
}
</script>
