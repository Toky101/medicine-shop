@extends('admin.layout.a_main')

@section('content')
  <!-- Products -->

  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

      @if (session()->has('success'))
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="sm:flex justify-center sm:items-center">

            <div id="alert-3"
              class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
              role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ml-3 text-sm font-medium">
                {{ session('success') }}

              </div>
              <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
          </div>
      @endif
      <div class="sm:flex sm:items-center">

        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold leading-6 text-gray-900">All orders</h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the orders</p>
        </div>
      </div>
      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col"
                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                      ID</th>
                    <th scope="col"
                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                      Customer</th>
                    <th scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                      Address</th>
                    <th scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total Price
                    </th>
                    <th scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  @foreach ($orders as $order)
                    <tr>
                      <td
                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        {{ $order->id }}</td>
                      <td
                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        {{ $order->user->name }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $order->o_address }} </td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $order->o_total_price }}
                      </td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                        @if ($order->o_status == 'pending')
                          <div
                            class="rounded-md py-1 px-1 text-center text-xs font-medium ring-1 ring-inset text-yellow-700 bg-yellow-50 ring-yellow-600/20">
                            {{ $order->o_status }}
                          </div>
                        @elseif($order->o_status == 'processing')
                          <div
                            class="rounded-md py-1 px-1 text-center text-xs font-medium ring-1 ring-inset text-teal-700 bg-teal-50 ring-teal-600/20">
                            {{ $order->o_status }}
                          </div>
                        @elseif($order->o_status == 'completed')
                          <div
                            class="rounded-md py-1 px-1 text-center text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                            {{ $order->o_status }}
                          </div>
                        @elseif($order->o_status == 'cancelled')
                          <div
                            class="rounded-md py-1 px-1 text-center text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                            {{ $order->o_status }}
                          </div>
                        @endif

                      </td>
                      <td
                        class="flex justify-center relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                        <!-- Modal toggle -->
                        <button data-modal-target="authentication-modal{{ $order->id }}"
                          data-modal-toggle="authentication-modal{{ $order->id }}"
                          class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                          type="button">
                          Update Order Status
                        </button>

                        <!-- Main modal -->
                        <div id="authentication-modal{{ $order->id }}" tabindex="-1"
                          aria-hidden="true"
                          class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                              <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal{{ $order->id }}">
                                <svg class="w-3 h-3" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" fill="none"
                                  viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                              </button>
                              <div class="px-6 py-6 lg:px-8">
                                <h3
                                  class="mb-4 text-xl font-medium text-center text-gray-900 dark:text-white">
                                  Update status</h3>
                                <form class="space-y-6"
                                  action="{{ route('admin.orders.update', $order->id) }}"
                                  method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div>
                                    <select id="status" name="status"
                                      class="block w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                      @foreach ($statuses as $key => $value)
                                        <option value="{{ $key }}"
                                          {{ $order->o_status == $key ? 'selected' : '' }}>
                                          {{ $value }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <button type="submit"
                                    class="w-full text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                    Update</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
