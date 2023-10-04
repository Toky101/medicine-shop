@extends('admin.layout.a_main')

@section('content')
  <!-- Products -->

  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

      <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">All medicines</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the medicines</p>
          </div>
          <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.medicines.new') }}"
              class="block rounded-md bg-teal-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Add
              new Medicine</a>
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
                        Medicine Name</th>
                      <th scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        Manufacturer</th>
                      <th scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Categoris
                      </th>
                      <th scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity
                      </th>
                      <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($medicines as $medicine)
                      <tr>
                        <td
                          class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                          {{ $medicine->id }}</td>
                        <td
                          class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                          {{ $medicine->m_name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          {{ $medicine->manufacturer->mn_name }} </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          @if ($medicine->categories->count() === 0)
                            <p>No categories associated with this medicine.</p>
                          @else
                            @foreach ($medicine->categories as $category)
                              <a href="{{ route('category.show', $category->id) }}"
                                class="bg-teal-100 hover:bg-teal-200 text-teal-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-teal-400 border border-teal-400 inline-flex items-center justify-center">{{ $category->name }}</a>
                              @unless ($loop->last)
                              @endunless
                            @endforeach
                          @endif
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          {{ $medicine->m_quantity }}</td>
                        <td
                          class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <a href="{{ route('admin.medicines.edit', $medicine->id) }}"
                            class="text-teal-600 hover:text-teal-900">Edit<span class="sr-only">,
                              Lindsay Walton</span></a>
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
