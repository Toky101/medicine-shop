@extends('layout.main')

@section('content')
  {{-- Checkout page --}}
  <div class="bg-gray-50">
    <div class="mx-auto max-w-2xl px-2 pb-24 pt-6 sm:px-4 lg:max-w-7xl lg:px-6">
      <h2 class="sr-only">Checkout</h2>

      <form action="{{ route('checkout.store') }}" method="POST"
        class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
        @csrf
        <div>
          <div class="mt-10 border-t border-gray-200 pt-10">
            <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">

              <div class="sm:col-span-2">
                <label for="company" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                  <input type="text" name="name" value="{{ auth()->user()->name }}" disabled
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" />
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1">
                  <input type="text" name="address" id="address"
                    value="{{ auth()->user()->address }}" autocomplete="street-address"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                  @error('address')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                        class="font-medium">Oops!</span>
                      {{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <div class="mt-1">
                  <input type="number" name="phone" id="phone" autocomplete="tel"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                </div>
                @error('phone')
                  <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                      class="font-medium">Oops!</span>
                    {{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>


          <!-- Payment -->
          <div class="mt-10 border-t border-gray-200 pt-10">
            <h2 class="text-lg font-medium text-gray-900">Payment</h2>

            <fieldset class="mt-4">
              <legend class="sr-only">Payment type</legend>
              <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                <div class="flex items-center">
                  <input id="cash" name="payment_method" value="cash" type="radio" checked
                    class="h-4 w-4 border-gray-300 text-teal-600 focus:ring-teal-500">
                  <label for="cash"
                    class="ml-3 block text-sm font-medium text-gray-700">Cash</label>
                </div>
                <div class="flex items-center">
                  <input id="digital_payment" value="digital" name="payment_method" type="radio"
                    class="h-4 w-4 border-gray-300 text-teal-600 focus:ring-teal-500">
                  <label for="digital_payment" class="ml-3 block text-sm font-medium text-gray-700">
                    Digital Payment
                  </label>
                </div>
              </div>
            </fieldset>

          </div>
        </div>

        <!-- Order summary -->
        <div class="mt-10 lg:mt-0">
          <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

          <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
            <h3 class="sr-only">Items in your cart</h3>
            <ul role="list" class="divide-y divide-gray-200">
              @foreach ($user_cart as $item)
                <li class="flex px-4 py-6 sm:px-6">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $item->medicine->m_image) }}"
                      alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                  </div>
                  <div class="ml-6 flex flex-1 flex-col">
                    <div class="flex">
                      <div class="min-w-0 flex-1">
                        <h4 class="text-sm">
                          <a href="{{ route('medicine.show', $item->medicine->id) }}"
                            class="font-medium text-gray-700 hover:text-gray-800">
                            {{ $item->medicine->m_name }}
                          </a>
                        </h4>
                        <p class="mt-1 text-sm text-gray-500">
                          {{ $item->medicine->manufacturer->mn_name }}</p>

                        <input type="hidden" name="medicine_ids[]" value="{{ $item->medicine->id }}">
                      </div>

                      <div class="ml-4 flow-root flex-shrink-0">
                        <button type="button"
                          class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500">
                          <span class="sr-only">Remove</span>
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                              clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>

                    <div class="flex flex-1 items-start pt-1 justify-between">
                      <p class="mt-1 text-sm font-medium text-gray-900">
                        {{ $item->medicine->m_price }}</p>
                      <input type="hidden" name="prices[]" value="{{ $item->medicine->m_price }}">
                      <div class="ml-4">
                        <p class="mt-1 text-sm text-gray-500">Quantity: <span
                            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">{{ $item->c_quantity }}</span>
                        </p>
                        <input type="hidden" name="quantities[]" value="{{ $item->c_quantity }}">
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
              <!-- More products... -->
            </ul>
            <dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
              <div class="flex items-center justify-between">
                <dt class="text-sm">Subtotal</dt>
                <dd class="text-sm font-medium text-gray-900">৳{{ $total_price }}</dd>
              </div>
            </dl>

            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
              <button type="submit"
                class="w-full rounded-md border border-transparent bg-teal-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-gray-50">Confirm
                order</button>
            </div>
          </div>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

      </form>
    </div>
  </div>
@endsection
