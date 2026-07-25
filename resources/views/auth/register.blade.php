<x-guest-layout>

<div class="min-h-screen bg-black flex items-center justify-center px-4">


    <div class="w-full max-w-md">

        {{-- Tombol Kembali --}}
        <a
        href="{{ url('/') }}"
        class="inline-flex items-center gap-1 text-gray-400 hover:text-white text-sm mb-4">

            ← Kembali ke Beranda

        </a>


        <div class="bg-[#1b1b1b] rounded-2xl p-8 shadow-xl">


            {{-- Header --}}
            <div class="mb-6">

                <h1 class="text-2xl font-bold text-white">
                    Buat Akun
                    <span class="text-red-600">
                        Baru
                    </span>
                </h1>

                <p class="text-sm text-gray-400 mt-2">
                    Daftar akun untuk pengalaman belanja terbaik
                </p>

            </div>




            <form method="POST" action="{{ route('register') }}">
                @csrf



                {{-- Name --}}
                <div class="mb-4">

                    <x-input-label
                        for="name"
                        value="Nama Lengkap"
                        class="text-white"
                    />

                    <x-text-input

                        id="name"

                        class="
                        mt-2
                        block
                        w-full
                        bg-transparent
                        border-gray-600
                        text-white
                        placeholder-gray-500
                        rounded-md
                        "

                        type="text"

                        name="name"

                        :value="old('name')"

                        placeholder="Masukan Nama Lengkap"

                        required

                        autofocus

                        autocomplete="name"

                    />

                    <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"/>

                </div>




                {{-- Email --}}
                <div class="mb-4">

                    <x-input-label
                        for="email"
                        value="Email"
                        class="text-white"
                    />

                    <x-text-input

                        id="email"

                        class="
                        mt-2
                        block
                        w-full
                        bg-transparent
                        border-gray-600
                        text-white
                        placeholder-gray-500
                        rounded-md
                        "

                        type="email"

                        name="email"

                        :value="old('email')"

                        placeholder="Masukan nama email"

                        required

                        autocomplete="username"

                    />

                    <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"/>

                </div>




                {{-- Password --}}
                <div class="mb-4">

                    <x-input-label
                        for="password"
                        value="Kata Sandi"
                        class="text-white"
                    />

                    <div class="relative">
                        <x-text-input

                            id="password"

                            class="
                            mt-2
                            block
                            w-full
                            bg-transparent
                            border-gray-600
                            text-white
                            placeholder-gray-500
                            rounded-md
                            pr-10
                            "

                            type="password"

                            name="password"

                            placeholder="Masukan kata sandi"

                            required

                            autocomplete="new-password"

                        />

                        <button 
                            type="button" 
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white pt-2 focus:outline-none">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <p class="text-xs text-gray-500 mt-1">
                        Gunakan minimal 8 karakter
                    </p>

                    <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"/>

                </div>




                {{-- Confirm Password --}}
                <div class="mb-5">

                    <x-input-label
                        for="password_confirmation"
                        value="Konfirmasi Kata Sandi"
                        class="text-white"
                    />

                    <div class="relative">
                        <x-text-input

                            id="password_confirmation"

                            class="
                            mt-2
                            block
                            w-full
                            bg-transparent
                            border-gray-600
                            text-white
                            placeholder-gray-500
                            rounded-md
                            pr-10
                            "

                            type="password"

                            name="password_confirmation"

                            placeholder="Masukan konfirmasi kata sandi"

                            required

                            autocomplete="new-password"

                        />

                        <button 
                            type="button" 
                            id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white pt-2 focus:outline-none">
                            <svg id="confirmEyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"/>

                </div>




                {{-- Terms --}}
                <div class="mb-5">

                    <label class="flex items-start">

                        <input
                        type="checkbox"
                        name="terms"
                        class="rounded bg-transparent mt-1">

                        <span class="ml-2 text-gray-400 text-sm">

                        Saya setuju dengan
                        <span class="text-red-500">Syarat &amp; Ketentuan</span>
                        dan
                        <span class="text-red-500">Kebijakan Privasi</span>

                        </span>

                    </label>

                </div>




                {{-- Button --}}

                <button

                class="
                w-full
                bg-red-600
                hover:bg-red-700
                text-white
                font-bold
                py-3
                rounded-md
                "

                >

                Daftar Sekarang

                </button>




                <p class="text-center text-gray-400 text-sm mt-6">

                    Sudah punya akun?

                    <a

                    href="{{ route('login') }}"

                    class="text-red-500">

                    Masuk sekarang

                    </a>


                </p>



            </form>


        </div>

    </div>



</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // SVG Ikon Mata Terbuka & Mata Tertutup (Coret)
        const openEyeSVG = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
        const closedEyeSVG = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 1-4.243-4.243m4.242 4.242L9.88 9.88" />`;

        // 1. Logika untuk kolom Kata Sandi Utama
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePasswordButton.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.innerHTML = (type === 'text') ? closedEyeSVG : openEyeSVG;
        });

        // 2. Logika untuk kolom Konfirmasi Kata Sandi
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const toggleConfirmPasswordButton = document.getElementById('toggleConfirmPassword');
        const confirmEyeIcon = document.getElementById('confirmEyeIcon');

        toggleConfirmPasswordButton.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            confirmEyeIcon.innerHTML = (type === 'text') ? closedEyeSVG : openEyeSVG;
        });
    });
</script>

</x-guest-layout>