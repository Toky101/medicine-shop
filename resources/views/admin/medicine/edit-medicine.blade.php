@extends('admin.layout.a_main')

@section('content')
  <!-- Edit -->

  <div class="p-4 sm:ml-64">
    <div
      class="p-4 border-2 border-gray-200 bg-teal-50 border-dashed rounded-lg dark:border-gray-700 mt-14">

      <form action="{{ route('admin.medicines.update', $medicine->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-12">
          <div
            class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
            <div>
              <h2 class="text-base font-semibold leading-7 text-gray-900">Medicine Name</h2>
              <p class="mt-1 text-sm leading-6 text-gray-600">Medicine Information</p>
            </div>

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
              <div class="sm:col-span-4">
                <label for="website"
                  class="block text-sm font-medium leading-6 text-gray-900">Medicine
                  Name</label>
                <div class="mt-2">
                  <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-teal-600 sm:max-w-md">
                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"></span>
                    <input type="text" value="{{ $medicine->m_name }}" name="m_name"
                      id="website"
                      class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                      placeholder="Venus V90 Safety Face Mask Grey Color Mask">
                    @error('m_name')
                      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                          class="font-medium">Oops!</span>
                        {{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="col-span-full">
                <label for="about"
                  class="block text-sm font-medium leading-6 text-gray-900">Medicine
                  Description</label>
                <div class="mt-2">
                  <textarea id="about" name="m_description" rows="3"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6">{{ $medicine->m_description }}</textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the
                  medicine</p>
              </div>

              <div class="col-span-full">
                <label for="photo"
                  class="block text-sm font-medium leading-6 text-gray-900">Medicine
                  Photo</label>
                <div class="mt-2 flex items-center gap-x-3">
                  <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                      clip-rule="evenodd" />
                  </svg>
                  <input
                    class="block w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" name="image" type="file">
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="first-name"
                  class="block text-sm font-medium leading-6 text-gray-900">Medicine
                  Price</label>
                <div class="mt-2">
                  <input type="number" name="m_price" value="{{ $medicine->m_price }}"
                    id="first-name" autocomplete="given-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name"
                  class="block text-sm font-medium leading-6 text-gray-900">Quantity
                </label>
                <div class="mt-2">
                  <input type="number" name="m_quantity" value="{{ $medicine->m_quantity }}"
                    id="m_quantity" autocomplete="family-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="manufacturer"
                  class="block text-sm font-medium leading-6 text-gray-900">Select
                  Manufacturer</label>
                <div class="mt-2">
                  <select id="manufacturer" name="manufacturer_id" autocomplete="country-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="{{ $medicine->manufacturer->id }}">
                      {{ $medicine->manufacturer->mn_name }}</option>
                    @foreach ($manufacturers as $item)
                      @if ($item->id == $medicine->manufacturer->id)
                        <option value="{{ $item->id }}" selected>{{ $item->mn_name }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->mn_name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="sm:col-span-3 ">
                <label for="category"
                  class="my-css  block text-sm font-medium leading-6 text-gray-900">Select
                  Categories</label>
                <div class="mt-2">
                  <select id="category" name="categories[]" multiple="multiple"
                    autocomplete="categories"
                    class="country block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    @foreach ($categories as $item)
                      @if ($medicine->categories->contains($item->id))
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

            </div>
          </div>

          <div
            class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
            <div>
              <h2 class="text-base font-semibold leading-7 text-gray-900">Status</h2>
              <p class="mt-1 text-sm leading-6 text-gray-600">Medicine status</p>
            </div>

            <div class="max-w-2xl space-y-10 md:col-span-2">
              <fieldset>
                <div class="sm:col-span-3">
                  <label for="m_status"
                    class="block text-sm font-medium leading-6 text-gray-900">Select Status</label>
                  <div class="mt-2">
                    <select id="m_status" name="m_status" autocomplete="country-name"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      @if ($medicine->m_status == 0)
                        <option value="0" selected>Draft</option>
                        <option value="1">Published</option>
                      @else
                        <option value="0">Draft</option>
                        <option value="1" selected>Published</option>
                      @endif
                    </select>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button"
            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit"
            class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
