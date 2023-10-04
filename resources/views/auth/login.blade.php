@extends('layout.main')

@section('content')
  <div
    class="bg-teal-50 flex flex-wrap justify-center items-center max-w-screen-xl px-4 py-16 mx-auto">

    <form action="{{ route('login') }}" method="POST"
      class="bg-sky-100 w-2/5 rounded-md border-2 border-teal-600 p-24 ">
      @csrf
      <div class="relative z-0 w-full mb-6 group">
        <input type="email" name="email" id="floating_email"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none sm:w-full focus:ring-0 focus:border-teal-600 peer"
          placeholder=" " value="{{ old('email') }}" />
        <label for="floating_email"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
          address</label>
        @error('email')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
            {{ $message }}</p>
        @enderror

      </div>
      <div class="relative z-0 w-full mb-6 group">
        <input type="password" name="password" id="floating_password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer"
          placeholder=" " />
        <label for="floating_password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        @error('password')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
            {{ $message }}</p>
        @enderror
      </div>
      <button type="submit"
        class="text-white w-full bg-teal-500 hover:text-white border border-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-600">Login</button>
    </form>

  </div>
@endsection
