<section>

    <h2 style="margin-top:0;">
        Ubah Password
    </h2>

    <p style="color:#9ca3af;margin-bottom:25px;">
        Gunakan password yang kuat untuk menjaga keamanan akun admin.
    </p>

    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        <div style="margin-bottom:18px;">

            <label>Password Lama</label>

            <input
                type="password"
                name="current_password"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

        </div>

        <div style="margin-bottom:18px;">

            <label>Password Baru</label>

            <input
                type="password"
                name="password"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

        </div>

        <div style="margin-bottom:25px;">

            <label>Konfirmasi Password Baru</label>

            <input
                type="password"
                name="password_confirmation"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

        </div>

        <button
            type="submit"
            style="background:#dc2626;color:white;padding:10px 22px;border:none;border-radius:8px;cursor:pointer;">

            Update Password

        </button>

        @if(session('status') === 'password-updated')

            <span style="margin-left:15px;color:#22c55e;">
                ✔ Password berhasil diperbarui.
            </span>

        @endif

    </form>

</section>