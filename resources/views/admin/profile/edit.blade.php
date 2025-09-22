<x-layouts.dashboard>
    <div class="p-4 max-w-4xl mx-auto">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Profil</h2>
                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 gap-4">
                        <label class="form-control">
                            <div class="label"><span class="label-text">Nama</span></div>
                            <input class="input input-bordered" name="name" value="{{ old('name', $user->name) }}" required />
                        </label>

                        <label class="form-control">
                            <div class="label"><span class="label-text">Email</span></div>
                            <input class="input input-bordered" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                        </label>

                        <label class="form-control">
                            <div class="label"><span class="label-text">Employee ID</span></div>
                            <input class="input input-bordered" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}" />
                        </label>

                        <label class="form-control">
                            <div class="label"><span class="label-text">No. Telepon</span></div>
                            <input class="input input-bordered" name="phone" value="{{ old('phone', $user->phone) }}" />
                        </label>

                        <label class="form-control md:col-span-2">
                            <div class="label"><span class="label-text">Departemen</span></div>
                            <select name="department_id" class="select select-bordered w-full">
                                <option value="">-</option>
                                @foreach($departments as $d)
                                    <option value="{{ $d->id }}" {{ (string)old('department_id', (string)($user->department_id ?? '')) === (string)$d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <div class="md:col-span-2">
                            <label class="form-control w-full">
                                <div class="label"><span class="label-text">Foto Profil</span></div>
                                <input type="file" name="image" accept="image/*" class="file-input file-input-bordered w-full" />
                            </label>
                            @if($user->image_path)
                                <img src="{{ asset('storage/'.$user->image_path) }}" alt="avatar" class="mt-2 w-20 h-20 rounded-full object-cover" />
                            @endif
                        </div>
                    </div>

                    <div class="card-actions justify-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-base-100 shadow mt-6">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Ubah Password</h2>
                <form method="POST" action="{{ route('admin.profile.password') }}" class="grid md:grid-cols-2 gap-4">
                    @csrf
                    <label class="form-control md:col-span-2">
                        <div class="label"><span class="label-text">Password Saat Ini</span></div>
                        <input class="input input-bordered" name="current_password" type="password" required />
                    </label>

                    <label class="form-control">
                        <div class="label"><span class="label-text">Password Baru</span></div>
                        <input class="input input-bordered" name="password" type="password" required />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text">Konfirmasi Password</span></div>
                        <input class="input input-bordered" name="password_confirmation" type="password" required />
                    </label>
                    <div class="md:col-span-2">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
