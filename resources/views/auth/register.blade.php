@php($title = 'Register Customer')
<x-layouts.app :title="$title">
    <div class="max-w-lg mx-auto mt-8">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Buat Akun Customer</h2>
                <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                    @csrf
                    <label class="form-control">
                        <div class="label"><span class="label-text">Nama</span></div>
                        <input class="input input-bordered" name="name" value="{{ old('name') }}" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input class="input input-bordered" type="email" name="email" value="{{ old('email') }}" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Perusahaan</span></div>
                        <input class="input input-bordered" name="company" value="{{ old('company') }}" />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Telepon</span></div>
                        <input class="input input-bordered" name="phone" value="{{ old('phone') }}" />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Password</span></div>
                        <input class="input input-bordered" type="password" name="password" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Konfirmasi Password</span></div>
                        <input class="input input-bordered" type="password" name="password_confirmation" required />
                    </label>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <a class="link link-primary" href="{{ route('login') }}">Sudah punya akun?</a>
                    </div>
                </form>

                @if ($errors->any())
                    <div class="alert alert-warning mt-4"><span>Terjadi kesalahan: {{ implode(', ', $errors->all()) }}</span></div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
