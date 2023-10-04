<!doctype html>
<html xmlns:th="http://www.thymeleaf.org">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Health Care Ltd</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="font-serif">

    @include('common.alert')

    <!-- nav bar -->

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{ route('home') }}" class="flex items-center">
          <img src="{{ URL::to('/') }}/images/logo.jpeg" class="h-14 mr-3" alt="Flowbite Logo" />
          <!-- <span -->
          <!--   class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PHCL</span> -->
        </a>
        <div class="w-1/2">
          <label class="relative block">
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <svg class="h-5 w fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input
              class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
              placeholder="Search for medicine/health products" type="text" name="search" />
          </label>
        </div>
        <div class="flex items-center">
          <a href="tel:5541251234"
            class="mr-6 text-sm  text-gray-500 dark:text-white hover:underline">Call
            fororder: 01768765354</a>
          @auth
            <a href="{{ route('admin.dashboard') }}"
              class="text-teal-500 bg-teal-50 hover:text-white border border-teal-500 hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">{{ auth()->user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit"
                class="text-white bg-teal-500 hover:text-white border border-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600"">Logout</button>
            </form>
          @endauth
          @guest
            <a href="{{ route('register') }}"
              class="text-teal-500 bg-teal-100 hover:text-white border border-teal-500 hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">Register</a>
            <a href="{{ route('login') }}"
              class="text-white bg-teal-500 hover:text-white border border-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">Login</a>
          @endguest
        </div>
      </div>
    </nav>

    <nav class="bg-gray-50 dark:bg-gray-700">
      <div class="flex flex-wrap justify-between items-center max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
          <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
            @foreach ($categories as $category)
              <li>
                <a href="{{ route('category.show', $category->id) }}"
                  class="text-gray-900 dark:text-white hover:underline"
                  aria-current="page">{{ $category->name }}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="flex items-center">
          <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
            <li>
              <a href="{{ route('dashboard') }}"
                class="text-gray-900 dark:text-white hover:underline"
                aria-current="page">Dashboard</a>
            </li>
            <li><a href="{{ route('cart.index') }}">
                <button type="button" class="group -m-2 flex items-center p-2"
                  aria-expanded="false">
                  <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                </button>
              </a></li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    @include('layout.footer')

  </body>

</html>
