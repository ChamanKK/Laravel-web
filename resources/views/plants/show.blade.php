<x-layout title="Plant Details">

    <div class="bg-[#C2DEC1] max-w-3xl mx-auto rounded-xl shadow-lg p-6 mt-10">

        <!-- Plant Name -->
        <h1 class="text-3xl font-bold text-center text-[#295334] mb-4">
            {{ $plant->name }}
        </h1>

        <!-- Plant Details -->
        <div class="space-y-2 text-gray-700 text-lg">
            <p><span class="font-semibold">Category:</span> {{ $plant->category->name ?? 'None' }}</p>
            <p><span class="font-semibold">Date Planted:</span> {{ $plant->date_planted }}</p>
            <p><span class="font-semibold">Watering Frequency:</span> {{ $plant->watering_frequency }}</p>
        </div>

        <!-- Action Buttons for Admins -->
        @can('edit')
        <div class="mt-6 flex justify-center gap-4">
            <a href="/plants/{{ $plant->id }}/edit">
                <button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors duration-150">
                    Edit
                </button>

            </a>

            <form method="POST" action="/plants/{{ $plant->id }}" onsubmit="return confirm('Are you sure you want to delete this plant?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition-colors duration-150">
                    Delete
                </button>
            </form>
        </div>
        @endcan

        <div class="mt-6 p-4 bg-white rounded shadow text-gray-700 flex justify-between">
            <p><span class="font-semibold">Total Maintenance Tasks:</span> {{ $plant->maintenances->count() }}</p>
            <p><span class="font-semibold">Total Journals:</span> {{ $plant->journals->count() }}</p>
            @if($plant->journals->last())
                <p><span class="font-semibold">Latest Height:</span> {{ $plant->journals->last()->height ?? '-' }}</p>
            @endif
        </div>


        <!-- Maintenance Schedule -->
        <h2 class="text-2xl font-bold mt-8 mb-2 text-[#295334]">Maintenance Schedule</h2>
        <table class="w-full text-left border border-[#16312B] rounded mb-4">
            <thead>
                <tr class="bg-[#C2DEC1]">
                    <th class="px-3 py-2 border">Task</th>
                    <th class="px-3 py-2 border">Frequency</th>
                    <th class="px-3 py-2 border">Last Done</th>
                    <th class="px-3 py-2 border">Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plant->maintenances as $task)
                    @php
                        $nextDue = $task->last_done_date ? \Carbon\Carbon::parse($task->last_done_date)->addWeek() : null;
                        $rowClass = '';
                        if ($nextDue) {
                            if ($nextDue->isPast()) {
                                $rowClass = 'bg-red-100';      // overdue
                            } elseif ($nextDue->diffInDays(now()) <= 2) {
                                $rowClass = 'bg-yellow-100';   // due soon
                            } else {
                                $rowClass = 'bg-green-100';    // on schedule
                            }
                        }
                    @endphp
                    <tr class="border {{ $rowClass }}">
                        <td class="px-3 py-2 border">{{ $task->task }}</td>
                        <td class="px-3 py-2 border">{{ $task->frequency }}</td>
                        <td class="px-3 py-2 border">{{ $task->last_done_date }}</td>
                        <td class="px-3 py-2 border">{{ $task->notes }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        @can('edit')
        <div class="flex justify-center mb-6">
            <a href="/plants/{{ $plant->id }}/maintenances/create">
                <button class="bg-[#295334] text-white px-5 py-2 rounded-xl hover:bg-[#24533f] transition-colors duration-150 mt-2">
                    Add Maintenance Task
                </button>
            </a>
        </div>
        @endcan

        <!-- Growth Journals -->
        <h2 class="text-2xl font-bold mt-8 mb-2 text-[#295334]">Growth Journals</h2>
        <table class="w-full text-left border border-[#16312B] rounded mb-4">
            <thead>
                <tr class="bg-[#C2DEC1]">
                    <th class="px-3 py-2 border">Date</th>
                    <th class="px-3 py-2 border">Height</th>
                    <th class="px-3 py-2 border">Health Status</th>
                    <th class="px-3 py-2 border">Notes</th>
                    @can('manage_journals')
                        <th class="px-3 py-2 border">Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($plant->journals as $log)
                    <tr class="border {{ $loop->last ? 'bg-green-50' : '' }}">
                        <td class="px-3 py-2 border">{{ $log->date }}</td>
                        <td class="px-3 py-2 border">{{ $log->height }}</td>
                        <td class="px-3 py-2 border">{{ $log->health_status }}</td>
                        <td class="px-3 py-2 border">{{ $log->notes }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        @can('edit')
        <div class="flex justify-center mb-6">
            <a href="/plants/{{ $plant->id }}/journals/create">
                <button class="bg-[#295334] text-white px-5 py-2 rounded-xl hover:bg-[#24533f] transition-colors duration-150 mt-2">
                    Add Journal Entry
                </button>
            </a>
        </div>
        @endcan

    </div>

</x-layout>
