<section>

    <h2 style="margin-top:0;color:#ef4444;">
        Hapus Akun
    </h2>

    <p style="color:#9ca3af;margin-bottom:25px;">

        Setelah akun dihapus, seluruh data admin akan dihapus secara permanen.
        Pastikan Anda benar-benar yakin sebelum melanjutkan.

    </p>

    <form
        method="POST"
        action="{{ route('profile.destroy') }}"
        onsubmit="return confirm('Yakin ingin menghapus akun ini?');">

        @csrf
        @method('DELETE')

        <div style="margin-bottom:20px;">

            <label>Masukkan Password</label>

            <input
                type="password"
                name="password"
                required
                style="width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #333;background:#111;color:#fff;">

        </div>

        <button
            type="submit"
            style="background:#dc2626;color:white;padding:10px 22px;border:none;border-radius:8px;cursor:pointer;">

            Hapus Akun

        </button>

    </form>

</section>