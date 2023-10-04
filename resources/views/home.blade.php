@extends('layout.main')

@section('content')
  <div class="flex flex-wrap justify-between items-center max-w-screen-xl px-4 py-3 mx-auto">
    <div id="indicators-carousel" class="relative w-full " data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ URL::to('/') }}/images/banner-1.png"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ URL::to('/') }}/images/banner-2.png"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
      </div>

    </div>
  </div>

  <div class="flex flex-wrap justify-between items-center max-w-screen-xl px-4 py-3 mx-auto">
    <div class="bg-slate-50 border-teal-400 border">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">
            {{ $category_medicine_name->name }}</h2>
          <a href="{{ route('category.show', $category_medicine_name->id) }}"
            class="text-teal-500 bg-teal-100 hover:text-white border border-teal-500 hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">
            All Medicines of {{ $category_medicine_name->name }}
          </a>
        </div>

        <div
          class="mt-6 grid grid-cols-2 gap-x-4 gawelcome.blade.phpp-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
          @foreach ($category_medicines as $medicine)
            <div class="group relative mb-6 shadow-md rounded-md	shadow-slate-300">
              <div
                class="h-56 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:h-72 xl:h-80">
                <a href="{{ route('medicine.show', $medicine->id) }}"><img
                    src="{{ asset('storage/' . $medicine->m_image) }}" alt="{{ $medicine->m_name }}"
                    class="h-full w-full object-cover object-center object-scale-down"></a>
              </div>
              <h3 class="mt-4 pl-2 text-sm text-gray-700">
                <a href="{{ route('medicine.show', $medicine->id) }}">
                  {{ $medicine->m_name }}
                </a>

              </h3>
              <p class="mt-1 text-sm pl-2 text-gray-500"> {{ $medicine->manufacturer->mn_name }}</p>
              <div class="flex items-center my-2 justify-between">
                <p class="mt-1 pl-2 text-sm font-medium text-gray-900">৳{{ $medicine->m_price }}</p>
                <form action=" {{ route('cart.store', $medicine->id) }} " method="POST">
                  @csrf
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit"
                    class="text-white bg-teal-500 hover:text-white border border-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">Add
                    to cart</button>
                </form>
              </div>
            </div>
          @endforeach

        </div>

        <div class="mt-8 text-sm md:hidden">
          <a href="#" class="font-medium text-teal-700 hover:text-teal-500">
            Shop the collection
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
