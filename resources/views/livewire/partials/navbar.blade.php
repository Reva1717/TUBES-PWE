<header class="flex z-50 sticky top-0 flex-wrap md:justify-start md:flex-nowrap w-full bg-white text-sm py-3 md:py-0 dark:bg-gray-800 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
      <div class="relative md:flex md:items-center md:justify-between">
        <div class="flex items-center justify-between">
          <a class="flex-none text-5xl font-extrabold text-blue-600 tracking-tight font-[Baron]" href="/" aria-label="Brand">RENUSA</a>
          <div class="md:hidden">
            <button type="button" class="hs-collapse-toggle flex justify-center items-center w-9 h-9 text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
              <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
              </svg>
              <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
              </svg>
            </button>
          </div>
        </div>
  
        <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
          <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500">
            <div class="flex flex-col gap-x-0 mt-5 divide-y divide-dashed divide-gray-200 md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid dark:divide-gray-700">
  
              <a class="font-medium {{ request()->is('/') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }} py-3 md:py-6 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/" aria-current="page">Home</a>
  
              <a class="font-medium {{ request()->is('categories*') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }} py-3 md:py-6 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('categories') }}">
                Categories
              </a>
              
              <a class="font-medium {{ request()->is('brands*') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }} py-3 md:py-6 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('brands') }}">
                Brands
              </a>
  
              <a class="font-medium {{ request()->is('products*') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }} py-3 md:py-6 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/products">
                Products
              </a>
  
              <a class="font-medium flex items-center text-gray-500 hover:text-gray-400 py-3 md:py-6 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/cart">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <span class="mr-1">Cart</span> <livewire:cart-count />
              </a>
  
              <a class="font-medium flex items-center text-gray-500 hover:text-gray-400 py-3 md:py-6 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('my.orders') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5V6a3 3 0 0 1 3-3h8.25a3 3 0 0 1 3 3v1.5M3 7.5h14.25M3 7.5v9.75A2.25 2.25 0 0 0 5.25 19.5h9.75A2.25 2.25 0 0 0 17.25 17.25V7.5M3 7.5l3.75 3.75M17.25 7.5l-3.75 3.75" />
                </svg>
                <span class="mr-1">My Orders</span>
              </a>
  
              <div class="pt-3 md:pt-0">
                @auth
                  <form method="POST" action="{{ route('logout') }}" class="flex items-center gap-4 mb-2">
                    @csrf
                    <button type="submit" class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                      <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        <path d="M3 12a9 9 0 1 1 18 0 9 9 0 0 1-18 0z" />
                      </svg>
                      Logout
                    </button>
                    <span class="flex flex-col items-center">
                      <!-- Modern avatar icon -->
                      <svg class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="4" fill="#e0e7ff"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 20c0-2.5 3.5-4.5 8-4.5s8 2 8 4.5" fill="#c7d2fe"/>
                        <circle cx="12" cy="8" r="4" stroke="#3b82f6" stroke-width="1.5"/>
                        <path stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M4 20c0-2.5 3.5-4.5 8-4.5s8 2 8 4.5"/>
                      </svg>
                      <span class="font-semibold text-gray-700 mt-1">{{ auth()->user()->name }}</span>
                    </span>
                  </form>
                @else
                  <a class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/login">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                      <circle cx="12" cy="7" r="4" />
                    </svg>
                    Log in
                  </a>
                @endauth
              </div>
  
              {{-- <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4">
                <button type="button" class="flex items-center w-full text-gray-500 hover:text-gray-400 font-medium dark:text-gray-400 dark:hover:text-gray-500">
                  User Name
              <svg class="ms-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
              </svg>
              </button>
  
              <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 bg-white md:shadow-md rounded-lg p-2 dark:bg-gray-800 md:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full md:border before:-top-5 before:start-0 before:w-full before:h-5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                  My Orders
                </a>
  
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                  My Account
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                  Logout
                </a>
              </div>
            </div> --}}
  
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>