<x-app-layout>
    <x-slot name="header">
        <div class="flow-root ">
            <p class="float-left text-green-600">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $user->value('fname') }} Receipts
            </h2>
            </p>

            <p class="float-right text-green-800 lg:px-2">
                <a href="{{ route('superadmin.subscriber.show') }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Back </button>
                </a>
            </p>

            <p class="float-right text-green-800 ">
                <a href="{{ route('superadmin.subscriber.receipt.make_receipt', $user->value('id')) }}">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded"
                        type="button">
                        Make Subscribtion </button>
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
                                        Course English Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 bg-gray-50 ">
                                        Course Arabic Name
                                    </th>
                                    {{-- <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Amount Paid
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Amount Left
                                    </th> --}}
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Created At
                                    </th>
                                    <th scope="col" class="py-3 px-6  bg-gray-50 ">
                                        Expire At
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receipts as $receipt)
                                    <tr class="border-b border-gray-200 ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $courses->where('id', '=', $receipt->course_id)->value('name_en') }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $courses->where('id', '=', $receipt->course_id)->value('name_ar') }}
                                        </th>
                                        {{-- <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $receipt->amount_paid }} SYP
                                        </th>
                                        @if ($receipt->amount_left > 0)
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-yellow-400 ">
                                                {{ $receipt->amount_left }} SYP
                                            </th>
                                        @else
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-green-400 ">
                                                {{ $receipt->amount_left }} SYP
                                            </th>
                                        @endif --}}

                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            20{{ $receipt->created_at->format('y-m-d') }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                            {{ $receipt->expire_date }}

                                        </th>

                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            <a href="{{ route('superadmin.subscriber.receipt.edit', $receipt->id) }}">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold  py-2 px-6 rounded">
                                                    Edit
                                                </button>
                                            </a>
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50  ">
                                            <a href="{{ route('superadmin.subscriber.receipt.delete', $receipt->id) }}">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
