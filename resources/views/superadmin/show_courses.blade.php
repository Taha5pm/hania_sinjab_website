<x-app-layout>
    <x-slot name="header">
        <div class="flow-root ">
            <p class="float-left text-green-600">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show Courses') }}
            </h2>
            </p>

            <p class="float-right text-green-800">
                <a href="{{ route('superadmin.course') }}">
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
            <form action="{{ route('superadmin.course.search') }}" class="form-horizontal" method="get">
                <div class="input-group no-border" id="portfolio-filter">
                    <input type="text" name="search" placeholder="Search ... ">
                    <button type="submit" class="btn align-item-right">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-800 ">
                            <thead class="text-xs text-gray-700 uppercase ">
                                <tr>
                                    <th scope="col" class="py-3 px-6 bg-gray-50 ">
                                        Arabic Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 bg-gray-50 ">
                                        English Name
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Arabic Description
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        English Description
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Arabic Field
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        English Field
                                    </th>
                                    {{-- <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Subscription Price
                                    </th> --}}
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr class="border-b border-gray-200 ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->name_ar }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->name_en }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->description_ar }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->description_en }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->field_ar }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->field_en }}
                                        </th>
                                        {{-- <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $course->price }} SYP
                                        </th> --}}
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            <a href="{{ route('superadmin.video', $course->id) }}">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Manage Videos
                                                </button>
                                            </a>

                                            <a href="{{ route('superadmin.course.edit', $course->id) }}">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Edit
                                                </button>
                                            </a>
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            <a href="{{ route('superadmin.course.delete', $course->id) }}">
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
                            {!! $courses->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
