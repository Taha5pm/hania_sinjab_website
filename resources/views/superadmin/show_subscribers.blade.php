<x-app-layout>
    <x-slot name="header">
        <div class="flow-root ">
            <p class="float-left text-green-600">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show Subscribers') }}
            </h2>
            </p>

            <p class="float-right text-green-800">
                <a href="{{ route('superadmin.subscriber') }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                        type="button">
                        Back </button>
                </a>
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-800 ">
                            <thead class="text-xs text-gray-700 uppercase ">
                                <tr>
                                    <th scope="col" class="py-3 px-6 bg-gray-50 ">
                                        First Name
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Last Name
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Created At
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Status
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subs as $sub)
                                    <tr class="border-b border-gray-200 ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $sub->fname }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $sub->lname }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $sub->email }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $sub->created_at }}
                                        </th>
                                        <th>

                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            <a href="{{ route('superadmin.subscriber.edit', $sub->id) }}">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Edit
                                                </button>
                                            </a>
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            {{-- <a href="{{ route('superadmin.subscriber.edit', $sub->id) }}"> --}}
                                            <button
                                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                Receipts
                                            </button>
                                            {{-- </a> --}}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>