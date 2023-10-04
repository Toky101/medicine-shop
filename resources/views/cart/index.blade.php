@extends('layout.main')

@section('content')
  <!-- Banner -->
  <div class="bg-white">
    <div class="mx-auto max-w-2xl shadow-lg px-4 py-16 sm:px-6 sm:py-18 lg:px-4">
      <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
        Shopping Cart
      </h1>

      <form class="mt-12">
        <section aria-labelledby="cart-heading">
          <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

          <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
            @foreach ($user_cart as $item)
              <li class="flex py-6">
                <div class="flex-shrink-0">
                  <img
                  src="{{ asset('storage/' . $item->medicine->m_image) }}"
                    alt="Front side of mint cotton t-shirt with wavey lines pattern."
                    class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                </div>
                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                  <div>
                    <div class="flex justify-between">
                      <h4 class="text-sm">
                        <a href="{{ route('medicine.show', $item->medicine->id) }}"
                          class="font-medium text-gray-700 hover:text-gray-800">{{ $item->medicine->m_name }}</a>
                      </h4>
                      <p class="ml-4 text-sm font-medium text-gray-900">{{ $item->medicine->m_price }}
                      </p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">{{ $item->medicine->manufacturer->mn_name }}
                    </p>
                    <p class="mt-1 text-sm text-gray-500">quantity: <span
                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">{{ $item->c_quantity }}</span>
                    </p>
                  </div>

                  <div class="mt-4 flex flex-1 items-end justify-end">
                    <div class="ml-4">
                      <button type="button"
                        class="text-sm font-medium text-teal-600 hover:text-teal-500">
                        <span>Remove</span>
                      </button>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach

            <!-- More products... -->
          </ul>
        </section>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading" class="mt-10">
          <h2 id="summary-heading" class="sr-only">Order summary</h2>

          <div>
            <dl class="space-y-4">
              <div class="flex items-center justify-between">
                <dt class="text-base font-medium text-gray-900">Subtotal</dt>
                <dd class="ml-4 text-base font-medium text-gray-900">৳{{ $total_price }}</dd>
              </div>
            </dl>
            <p class="mt-1 text-sm text-gray-500">Shipping and taxes will be calculated at checkout.
            </p>
          </div>

          <div class="mt-10">
            <a href="{{ route('checkout.index') }}"
              class="w-full block text-center rounded-md border border-transparent bg-teal-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</a>
          </div>

        </section>
      </form>
    </div>
  </div>
@endsection
