<x-app-layout>
    <x-slot name="header">
        <div class="flow-root ">
            <p class="float-left text-green-600">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Course') }}
            </h2>
            </p>

            <p class="float-right text-green-800 lg:px-2">
                <a href="{{ route('superadmin.dashboard') }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Back </button>
                </a>
            </p>

            <p class="float-right text-green-800 ">
                <a href="{{ route('superadmin.course.show') }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Show Courses </button>
                </a>
            </p>
        </div>
    </x-slot>

    <form method="post" action="{{ route('superadmin.course.store') }}" class="form-horizontal">
        @csrf
        @method('put')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex-wrap -mx-3 mb-6">
                            @if ($errors->any())
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <label
                                                    class="block uppercase tracking-wide text-red-700 text-xs font-bold mb-2"
                                                    for="name_ar">
                                                    <li>{{ $error }}</li>

                                                </label>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="name_ar">
                                    Arabic Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white"
                                    id="name_ar" name='name_ar' type="text" placeholder="كيف تكون  سعيد" required
                                    value="{{ old('name_ar') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="name_en">
                                    English Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white"
                                    id="name_en" name='name_en' type="text" placeholder="How to be happy" required
                                    value="{{ old('name_en') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="description_ar">
                                    Arabic Description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="description_ar" name="description_ar" rows="3" cols="3" required>{{ old('description_ar') }}
                                </textarea>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="description_en">
                                    English Description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="description_en" name="description_en" rows="3" cols="3" required>{{ old('description_en') }}
                                </textarea>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="field_ar">
                                    Arabic Field
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-8 leading-tight focus:outline-none focus:bg-white"
                                    id="field_ar" name='field_ar' type="text" placeholder="psychology" required
                                    value="{{ old('field_ar') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="field_en">
                                    English Field
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-8 leading-tight focus:outline-none focus:bg-white"
                                    id="field_en" name='field_en' type="text" placeholder="psychology" required
                                    value="{{ old('field_en') }}">
                            </div>
                            {{-- <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="price">
                                    Subscription Price
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-8 leading-tight focus:outline-none focus:bg-white"
                                    id="price" name='price' type="number" placeholder="5000 SYP" required>
                            </div> --}}
                            <div class="md:flex md:items-center">
                                <div class="md:w-2/4"></div>
                                <div class="md:w-2/3">

                                    <button
                                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-10 rounded">
                                        Save
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
