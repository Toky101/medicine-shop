@extends('layout.main')

@section('content')
  <!-- Banner -->

  <div
    class="flex bg-white mt-4 flex-wrap justify-between items-center max-w-screen-xl px-4 py-3 mx-auto">
    <div id="indicators-carousel" class="relative w-full " data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="space-y-16 py-16 xl:space-y-20">
        <!-- Recent activity table -->
        <div>
          <div class="mt-6 overflow-hidden border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <table class="w-full text-left">
                  <thead class="sr-only">
                    <tr>
                      <th>Amount</th>
                      <th class="hidden sm:table-cell">Client</th>
                      <th>More details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-sm leading-6 text-gray-900">
                      <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                        <time datetime="2023-03-22">All orders</time>
                        <div
                          class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                        </div>
                        <div
                          class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                        </div>
                      </th>
                    </tr>
                    @foreach ($user_orders as $item)
                      <tr>
                        <td class="relative py-5 pr-6">
                          <div class="flex gap-x-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                              fill="currentColor" class="w-5 h-5">
                              <path fill-rule="evenodd"
                                d="M13.2 2.24a.75.75 0 00.04 1.06l2.1 1.95H6.75a.75.75 0 000 1.5h8.59l-2.1 1.95a.75.75 0 101.02 1.1l3.5-3.25a.75.75 0 000-1.1l-3.5-3.25a.75.75 0 00-1.06.04zm-6.4 8a.75.75 0 00-1.06-.04l-3.5 3.25a.75.75 0 000 1.1l3.5 3.25a.75.75 0 101.02-1.1l-2.1-1.95h8.59a.75.75 0 000-1.5H4.66l2.1-1.95a.75.75 0 00.04-1.06z"
                                clip-rule="evenodd" />
                            </svg>
                            <div class="flex-auto">
                              <div class="flex items-start gap-x-3">
                                <div class="text-sm font-medium leading-6 text-gray-900">
                                  ৳{{ $item->o_total_price }} BDT
                                </div>
                                @if ($item->o_status == 'pending')
                                  <div
                                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-yellow-700 bg-yellow-50 ring-yellow-600/20">
                                    {{ $item->o_status }}
                                  </div>
                                @elseif($item->o_status == 'processing')
                                  <div
                                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-blue-700 bg-blue-50 ring-blue-600/20">
                                    {{ $item->o_status }}
                                  </div>
                                @elseif($item->o_status == 'completed')
                                  <div
                                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                    {{ $item->o_status }}
                                  </div>
                                @elseif($item->o_status == 'cancelled')
                                  <div
                                    class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                    {{ $item->o_status }}
                                  </div>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                          <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                        </td>
                        <td class="hidden py-5 pr-6 sm:table-cell">
                          <div class="text-sm leading-6 text-gray-900">{{ $item->user->name }}</div>
                        </td>
                        <td class="py-5 text-right">
                          <div class="flex justify-end">
                            <a href="#"
                              class="text-sm font-medium leading-6 text-teal-600 hover:text-teal-500">Order
                              details</a>
                          </div>
                          <div class="mt-1 text-xs leading-5 text-gray-500">Order ID <span
                              class="text-gray-900">#{{ $item->id }}</span></div>
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
