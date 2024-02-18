<!-- resources/views/livewire/payslip-generator.blade.php -->

<div>
    <x-input type="month" wire:model="selectedMonth" />

    <x-button wire:click="generatePayslips">Generate Payslips</x-button>

    @if ($records->count())
        <h2>Payslips for {{ $selectedMonth }}</h2>
        <table>
            <thead>
            <tr>
                <th>Farmer ID</th>
                <th>Farmer Name</th>
                <th>Total Pay</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($records as $farmer)
                <tr>
                    <td>{{ $farmer->farmer_id }}</td>
                    <td>{{ $farmer->farmer_name }}</td>
                    <!-- Calculate and display total pay for each farmer -->
                    <td>{{ $farmer->calculateTotalPay($selectedMonth) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No farmers found.</p>
    @endif
</div>
