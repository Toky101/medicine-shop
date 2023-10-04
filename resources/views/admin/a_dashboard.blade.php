@extends('admin.layout.a_main')

@section('content')
    <!-- Banner -->

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div
                    class="flex flex-col relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                    <dt class="flex justify-center">
                        <div class="pr-4">
                            <span
                                class="bg-teal-100 text-teal-800 text-lg font-medium inline-flex items-center p-3 rounded dark:bg-gray-700 dark:text-teal-400 border border-teal-400">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 truncate">
                                Total Orders
                            </p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">
                                {{ $totalOrders }}
                            </p>
                        </div>
                    </dt>
                    <dd class="ml-16 flex justify-center items-center pb-6 sm:pb-7">
                        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                            <div class="text-sm text-center">
                                <a href="#" class="font-medium text-teal-600 hover:text-teal-500">View all<span
                                        class="sr-only"> Total Orders</span></a>
                            </div>
                        </div>
                    </dd>
                </div>
                <!-- <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800"> -->
                <!--     <p class="text-2xl text-gray-400 dark:text-gray-500"> -->
                <!--         <a href="#" -->
                <!--             class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> -->
                <!--             Total Orders -->
                <!--             <span -->
                <!--                 class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"> -->
                <!--                 {{ $totalOrders }}</span> -->
                <!--         </a> -->

                <!--     </p> -->
                <!-- </div> -->
                <div
                    class="flex flex-col relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                    <dt class="flex justify-center">
                        <div class="pr-4">
                            <span
                                class="bg-teal-100 text-teal-800 text-lg font-medium inline-flex items-center p-3 rounded dark:bg-gray-700 dark:text-teal-400 border border-teal-400">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 truncate">
                                Total Medicines
                            </p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">
                                {{ $totalMedicines }}
                            </p>
                        </div>
                    </dt>
                    <dd class="ml-16 flex justify-center items-center pb-6 sm:pb-7">
                        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                            <div class="text-sm text-center">
                                <a href="#" class="font-medium text-teal-600 hover:text-teal-500">View all<span
                                        class="sr-only"> Total Orders</span></a>
                            </div>
                        </div>
                    </dd>
                </div>
                <div
                    class="flex flex-col relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                    <dt class="flex justify-center">
                        <div class="pr-4">
                            <span
                                class="bg-teal-100 text-teal-800 text-lg font-medium inline-flex items-center p-3 rounded dark:bg-gray-700 dark:text-teal-400 border border-teal-400">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 truncate">
                                Total Users
                            </p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </dt>
                    <dd class="ml-16 flex justify-center items-center pb-6 sm:pb-7">
                        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                            <div class="text-sm text-center">
                                <a href="#" class="font-medium text-teal-600 hover:text-teal-500">View all<span
                                        class="sr-only"> Total Orders</span></a>
                            </div>
                        </div>
                    </dd>
                </div>
            </div>
        </div>
    </div>
@endsection
