<!-- tea-supply-monthly-report.blade.php -->

<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden ">
    <div class="flex items-center justify-between d p-4">
        <div class="flex">
            <div class="flex space-x-3">
                <div class="flex space-x-3 items-center">
                    <x-label>Select Month</x-label>
                    <x-input type="month" wire:model="selectedMonth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-auto pl-10 p-2"></x-input>
                </div>
                <div class="flex space-x-3 items-center">
                    <x-label>Select Farmer:</x-label>
                    <select wire:model="selectedFarmer" class="border-b dark:border-gray-700">
                        <option value="">All Farmers</option>
                        @foreach ($farmers as $farmer)
                            <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="flex space-x-3 items-center">
                        <x-button wire:click="getTeaRecords" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Get Tea Records</x-button>
                    </div>

            </div>
        </div>
    </div>


        <div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Farmer ID</th>
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Farmer Name</th>
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Date</th>
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Tea Quantity (Kg)</th>
                </tr>

                </thead>
                <tbody>
                @foreach ($teaSupplyRecords as $record)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $record->farmer_id }}</td>
                        <td class="px-4 py-3">{{ $record->farmer_name }}</td>
                        <td class="px-4 py-3">{{ $record->supply_date }}</td>
                        <td class="px-4 py-3">{{ $record->tea_quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="border-b dark:border-gray-700">
                    <td scope="row"
                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Total:</td>
                    <td class="px-4 py-3 flex items-center justify-end">{{ $totalTeaQuantity }}</td>
                </tr>
                </tfoot>
            </table>
        <div class="py-4 px-3">
            <div class="flex ">
                <div class="flex space-x-4 items-center mb-3">
                    <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                    <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>

        </div>
        </div>
</div>
