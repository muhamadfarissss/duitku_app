<x-guest-layout>
    <div class="w-full max-w-sm mx-auto text-center">
        
        <div class="flex flex-col items-center mb-8">
            <div class="w-14 h-14 bg-[#0061cc] rounded-2xl flex items-center justify-center mb-4 shadow-sm">
                <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="5" width="20" height="14" rx="2" />
                    <line x1="2" y1="10" x2="22" y2="10" />
                    <circle cx="18" cy="14" r="1" fill="currentColor"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-[#0061cc] tracking-tight">DuitKu</h1>
            <p class="text-base font-medium text-gray-600 mt-2">Daftar akun baru</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4 text-left">
            @csrf

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="mx-2 text-gray-300 font-light">|</span>
                </div>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                    class="block w-full pl-14 pr-4 py-3.5 bg-[#f5f5f7] border-0 text-gray-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#0061cc] outline-none text-sm transition-all placeholder-gray-400"
                    placeholder="Nama Lengkap">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                    <span class="mx-2 text-gray-300 font-light">|</span>
                </div>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="block w-full pl-14 pr-4 py-3.5 bg-[#f5f5f7] border-0 text-gray-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#0061cc] outline-none text-sm transition-all placeholder-gray-400"
                    placeholder="Email">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="mx-2 text-gray-300 font-light">|</span>
                </div>
                <input type="password" name="password" id="password" required
                    class="block w-full pl-14 pr-12 py-3.5 bg-[#f5f5f7] border-0 text-gray-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#0061cc] outline-none text-sm transition-all placeholder-gray-400"
                    placeholder="Password">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="mx-2 text-gray-300 font-light">|</span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="block w-full pl-14 pr-4 py-3.5 bg-[#f5f5f7] border-0 text-gray-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#0061cc] outline-none text-sm transition-all placeholder-gray-400"
                    placeholder="Konfirmasi Password">
                @error('password_confirmation')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-start mt-4 px-1 cursor-pointer select-none group">
                <div class="relative flex items-center h-5">
                    <input type="checkbox" id="agree" class="peer sr-only" checked required>
                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center peer-checked:border-green-500 peer-checked:bg-green-500 transition-all">
                        <svg class="h-3 w-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <p class="ml-3 text-xs text-gray-500 font-medium leading-tight group-hover:text-gray-700 transition-colors">
                    Dengan mendaftar, anda setuju pada ketentuan, privasi, dan cookie koneksibilitas DuitKu
                </p>
            </label>

            <div class="pt-6 space-y-3">
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-full text-sm font-semibold text-white bg-[#0061cc] hover:bg-[#0052ad] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0061cc] transition-colors shadow-sm">
                    Sign Up
                </button>
                <a href="{{ route('login') }}" class="w-full flex justify-center py-3.5 px-4 border border-[#0061cc] rounded-full text-sm font-semibold text-[#0061cc] bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0061cc] transition-colors">
                    Sign In
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>