<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>

  <!-- Tailwind CDN (v3.x) -->
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>

<body class="bg-blue-500 text-gray-800 flex items-center justify-center min-h-screen">

  <!-- Hero Section -->
  <div class="w-full h-auto max-w-md mx-auto bg-white border border-gray-200 rounded-xl shadow-sm p-6 mt-28 mb-28">
    <div class="text-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Sign in</h1>
      <p class="mt-2 text-sm text-gray-600">
        Don't have an account yet? 
        <a class="text-blue-600 hover:underline font-medium" href="/register">
          Sign up here
        </a>
      </p>
    </div>

    <hr class="my-5 border-slate-300">

    <!-- Form -->
    <form wire:submit.prevent="login">
      <div class="grid gap-y-4">
        <!-- Email Form Group -->
        <div>
          <label for="email" class="block text-sm mb-2">Email address</label>
          <input type="email" id="email" wire:model="email" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required />
          @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Password Form Group -->
        <div>
          <div class="flex justify-between items-center">
            <label for="password" class="block text-sm mb-2">Password</label>
          </div>
          <input type="password" id="password" wire:model="password" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required />
          @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Sign in Button -->
        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
          Sign in
        </button>
      </div>
    </form>
    <!-- End Form -->
  </div>

  @livewireScripts
</body>
</html>
