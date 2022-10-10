<x-app-layout>
    <x-slot name="header">
        <div class="flow-root ">
            <p class="float-left text-green-600">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Video') }}
            </h2>
            </p>

            <p class="float-right text-green-800 lg:px-2">
                <a href="{{ route('superadmin.course.show') }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Back </button>
                </a>
            </p>

            <p class="float-right text-green-800 ">
                <a href="{{ route('superadmin.video.show', $course->value('id')) }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Show Videos </button>
                </a>
            </p>
        </div>
    </x-slot>

    <form method="post" action="{{ route('superadmin.video.store', $course->value('id')) }}"
        enctype="multipart/form-data" class="form-horizontal">
        @csrf
        @method('put')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="course_name">
                                    Course Name
                                </label>
                                <input readonly
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white"
                                    id="course_name" type="text"
                                    value="{{ $course->value('name_en') }} || {{ $course->value('name_ar') }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="description_ar">
                                    Arabic Description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="description_ar" name="description_ar" rows="3" cols="3" required></textarea>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="description_en">
                                    English Description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="description_en" name="description_en" rows="3" cols="3" required></textarea>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="description">
                                    Upload Video
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-5 leading-tight focus:outline-none focus:bg-white"
                                    type='file' name='video' id='video' required>
                            </div>

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
    @section('scripts')
        <script>
            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="video"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }

                }
            })
        </script>
    @endsection
</x-app-layout>
