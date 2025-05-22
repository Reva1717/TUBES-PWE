<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>

<body class="bg-blue-500 text-gray-800 flex items-center justify-center min-h-screen">

  <!-- Hero Section -->
  <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
      <main class="w-full max-w-md mx-auto p-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
          <div class="p-4 sm:p-7">
            <div class="text-center">
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
              <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Already have an account?
                <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/login">
                  Sign in here
                </a>
              </p>
            </div>
            <hr class="my-5 border-slate-300">

            <!-- Form -->
            <form wire:submit.prevent="register">
              <div class="grid gap-y-4">
                <!-- Form Group: Name -->
                <div>
                  <label for="name" class="block text-sm mb-2 dark:text-white">Name</label>
                  <input type="text" id="name" wire:model="name" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required>
                </div>

                <!-- Form Group: Email -->
                <div>
                  <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                  <input type="email" id="email" wire:model="email" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required>
                </div>

                <!-- Form Group: Password -->
                <div>
                  <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                  <input type="password" id="password" wire:model="password" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required>
                </div>

                <!-- Form Group: Confirm Password -->
                <div>
                  <label for="password_confirmation" class="block text-sm mb-2 dark:text-white">Confirm Password</label>
                  <input type="password" id="password_confirmation" wire:model="password_confirmation" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                  Sign up
                </button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </main>
    </div>
  </div>

  @livewireScripts
</body>
</html>
