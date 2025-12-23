<x-layout title="Register">
    <div class="min-h-screen flex items-center justify-center">
        {{-- Container --}}
        <div class="flex w-full max-w-5xl bg-white rounded-xl shadow-lg overflow-hidden">
            
            {{-- Left: Form --}}
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-3xl font-bold mb-6 text-[#295334] text-center">Create an Account</h2>

                {{-- Error Messages --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-1 font-semibold">Name</label>
                        <input type="text" name="name"
                               class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                               required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Email</label>
                        <input type="email" name="email"
                               class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                               required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Password</label>
                        <input type="password" name="password"
                               class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                               required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="w-full border border-[#16312B] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2d6a4f]"
                               required>
                    </div>

                    <button type="submit" class="w-full bg-[#16312B] text-white py-2 rounded hover:bg-[#1b4332]">
                        Register
                    </button>
                </form>

                <p class="text-center mt-4 text-sm text-gray-600">
                    Already have an account?
                    <a href="/login" class="text-[#295334] font-semibold hover:underline">Sign In</a>
                </p>
            </div>

            {{-- Right: Image --}}
            <div class="hidden md:block md:w-1/2">
                <img src="{{ asset('images/plantwall.jpg') }}" alt="Side Image"
                     class="w-full h-full object-cover">
            </div>

        </div>
    </div>
</x-layout>
