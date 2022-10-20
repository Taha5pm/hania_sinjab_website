<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Performance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-graph :data="$chart_data" />
                    <div class="mb-6"></div>
                    <small class="font-semibold text-xl text-gray-400 leading-tight">
                        Table Representation
                    </small>
                    <x-table :columns="['Date (y-m)', 'Visitors']">
                        @forelse ($visitors as $day)
                            <x-table-row :row="[$day->year . '-' . $day->month, $day->total]" />
                        @empty
                            <x-table-row :row="['-', 'No data available']" />
                        @endforelse
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
