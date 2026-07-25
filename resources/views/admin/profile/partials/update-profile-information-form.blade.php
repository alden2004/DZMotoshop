<section>

    <h2 style="margin-top:0;">
        Informasi Profil
    </h2>

    <p style="color:#9ca3af;margin-bottom:25px;">
        Perbarui nama dan alamat email akun administrator.
    </p>

    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        <div style="margin-bottom:18px;">

            <label>Nama</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

            @error('name')
                <div style="color:#ef4444;margin-top:6px;">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div style="margin-bottom:18px;">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

            @error('email')
                <div style="color:#ef4444;margin-top:6px;">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button
            type="submit"
            style="background:#dc2626;color:white;padding:10px 22px;border:none;border-radius:8px;cursor:pointer;">

            Simpan Perubahan

        </button>

        @if(session('status') === 'profile-updated')

            <span style="margin-left:15px;color:#22c55e;">
                ✔ Profil berhasil diperbarui.
            </span>

        @endif

    </form>

</section>