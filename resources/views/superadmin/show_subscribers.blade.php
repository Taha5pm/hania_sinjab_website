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
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('superadmin.subscriber.search') }}" class="form-horizontal" method="get">
                <div class="input-group no-border" id="portfolio-filter">
                    <input type="text" name="search" placeholder="Search ... ">
                    <button type="submit" class="btn align-item-right">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
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
                                    @php
                                        $result = $sub_sub
                                            ->where('user_id', '=', $sub->id)
                                            ->where('expire_date', '>', '20' . today()->format('y-m-d'))
                                            ->value('expire_date');

                                    @endphp
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
                                        @if ($result != null)
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-green-400 ">
                                                Subscribed
                                            </th>
                                        @else
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-yellow-200 ">
                                                Not Subscribed Yet
                                            </th>
                                        @endif
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

                                            <a href="{{ route('superadmin.subscriber.receipt', $sub->id) }}">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Subscribtions
                                                </button>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('superadmin.subscriber.delete', $sub->id) }}">
                                                <button
                                                    class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Delete
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <div>
                            {!! $subs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
