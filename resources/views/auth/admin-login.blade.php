@php($title = 'Admin Login')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Login Admin</h2>

                <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-4">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input class="input input-bordered w-full" name="email" type="email" value="{{ old('email') }}" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Password</span></div>
                        <input class="input input-bordered w-full" name="password" type="password" required />
                    </label>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>

                <div class="flex justify-between items-center mt-3">
                    <a class="link link-primary" href="{{ route('password.request') }}">Lupa password?</a>
                </div>

                @error('email')
                    <div class="alert alert-warning mt-4"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
    </div>
</x-layouts.app>
