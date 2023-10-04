@extends('layout.main')

@section('content')
  <!-- Banner -->

  <div class="flex flex-wrap justify-between items-center max-w-screen-xl px-4 py-3 mx-auto">
    <div class="bg-slate-50 border-teal-400 border">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
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
