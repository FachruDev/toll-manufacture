@php($title = 'Lupa Password')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Lupa Password</h2>
                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf
                    <label class="form-control">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input class="input input-bordered" name="email" type="email" value="{{ old('email') }}" required />
                    </label>
                    <button type="submit" class="btn btn-primary">Kirim Link Reset</button>
                </form>
                @if (session('status'))
                    <div class="alert alert-success mt-4"><span>{{ session('status') }}</span></div>
                @endif
                @error('email')
                    <div class="alert alert-warning mt-4"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
    </div>
</x-layouts.app>
