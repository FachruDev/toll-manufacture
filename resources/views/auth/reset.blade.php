@php($title = 'Reset Password')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Reset Password</h2>
                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label class="form-control">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input class="input input-bordered" name="email" type="email" value="{{ old('email', $email) }}" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Password Baru</span></div>
                        <input class="input input-bordered" name="password" type="password" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Konfirmasi Password</span></div>
                        <input class="input input-bordered" name="password_confirmation" type="password" required />
                    </label>
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
                @if ($errors->any())
                    <div class="alert alert-warning mt-4"><span>{{ implode(', ', $errors->all()) }}</span></div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
