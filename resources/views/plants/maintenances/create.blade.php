<x-layout title="Add Maintenance Task">

    <div class="max-w-md mx-auto bg-[#C2DEC1] rounded-xl shadow-lg p-6 mt-10">

        <h1 class="text-2xl font-bold text-center text-[#295334] mb-6">
            Add Maintenance Task for {{ $plant->name }}
        </h1>

        <form action="/plants/{{ $plant->id }}/maintenances" method="POST" class="space-y-4">
            @csrf

            <!-- Task -->
            <div>
                <label for="task" class="block text-gray-700 font-semibold mb-1">Task:</label>
                <select id="task" name="task" class="w-full border border-[#16312B] rounded px-3 py-2">
                    <option value="">-- Select Task --</option>
                    <option value="Watering">Watering</option>
                    <option value="Fertilizing">Fertilizing</option>
                    <option value="Pruning">Pruning</option>
                    <option value="Pest Control">Pest Control</option>
                    <option value="Repotting">Repotting</option>
                    <option value="Support/Staking">Support/Staking</option>
                </select>
            </div>

            <!-- Frequency -->
            <div>
                <label for="frequency" class="block text-gray-700 font-semibold mb-1">Frequency:</label>
                <input type="text" id="frequency" name="frequency" placeholder="e.g., Every day, Weekly" 
                       class="w-full border border-[#16312B] rounded px-3 py-2">
            </div>

            <!-- Last Done Date -->
            <div>
                <label for="last_done_date" class="block text-gray-700 font-semibold mb-1">Last Done:</label>
                <input type="date" id="last_done_date" name="last_done_date" 
                       class="w-full border border-[#16312B] rounded px-3 py-2">
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-gray-700 font-semibold mb-1">Notes:</label>
                <textarea id="notes" name="notes" rows="3" class="w-full border border-[#16312B] rounded px-3 py-2"></textarea>
            </div>

            <div class="text-center">
                <button class="bg-[#295334] text-white px-5 py-2 rounded-xl hover:bg-[#24533f] transition-colors duration-150 mt-2">
                    Add Task
                </button>
            </div>
        </form>
    </div>

</x-layout>
