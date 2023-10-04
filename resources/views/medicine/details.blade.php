@extends('layout.main')

@section('content')
  <div class="flex flex-wrap items-center max-w-screen-xl px-4 py-3 mx-auto">
    <div class="relative w-full">
      <div
        class="bg-teal-50 shadow-md shadow-teal-400/50 mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="pl-10 lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
          <!-- Image gallery -->
          <div class="w-4/5 border-teal-500 rounded-lg border">
            <div class="aspect-h-1 aspect-w-1 w-full">
              <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <img src="{{ asset('storage/' . $medicine->m_image) }}" alt="{{ $medicine->m_name }}"
                  class="h-full w-full object-cover object-center object-scale-down sm:rounded-lg">
              </div>
            </div>
          </div>

          <!-- Product info -->
          <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            <div class="flex justify-between content-center">
              <h1 class="text-3xl font-bold tracking-tight my-3 text-gray-900">{{ $medicine->m_name }}
              </h1>
              <p class="text-md text-gray-500">
                @foreach ($medicine->categories as $category)
                  <a href="{{ route('category.show', $category->id) }}"
                    class="bg-teal-100 hover:bg-teal-200 text-teal-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-teal-400 border border-teal-400 inline-flex items-center justify-center">{{ $category->name }}</a>
                  @unless ($loop->last)
                  @endunless
                @endforeach
              </p>
            </div>
            <span
              class="bg-teal-200 text-green-800 text-xs font-medium my-3 px-2.5 py-2 rounded-full dark:bg-green-900 dark:text-green-300">
              {{ $medicine->manufacturer->mn_name }} </span>

            <div class="mt-3">
              <h2 class="sr-only">Product information</h2>
              <p class="text-3xl tracking-tight text-gray-900">৳{{ $medicine->m_price }}</p>
            </div <form class="mt-6">
            <div class="sm:flex-col1 mt-10 flex">
              <form action=" {{ route('cart.store', $medicine->id) }} " method="POST">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="submit"
                  class="text-white bg-teal-500 hover:text-white border border-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">Add
                  to cart</button>
              </form>
            </div>
            </form>

            <section aria-labelledby="details-heading" class="mt-12">
              <h2 id="details-heading" class="sr-only">Additional details</h2>

              <div class="divide-y divide-gray-200 border-t">
                <div>
                  <h3>
                    <!-- Expand/collapse question button -->
                    <button type="button"
                      class="group relative flex w-full items-center justify-between py-6 text-left"
                      aria-controls="disclosure-1" aria-expanded="false">
                      <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                      <span class="text-gray-900 text-sm font-medium">Features</span>
                      <span class="ml-6 flex items-center">
                        <!-- Open: "hidden", Closed: "block" -->
                        <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500"
                          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                          aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <!-- Open: "block", Closed: "hidden" -->
                        <svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500"
                          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                          aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                      </span>
                    </button>
                  </h3>
                  <div class="prose prose-sm pb-6" id="disclosure-1">
                    <p>
                      {{ $medicine->m_description }}
                    </p>
                  </div>
                </div>
                <!-- More sections... -->
              </div>

            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
