<x-layouts.dashboard>
    <div class="p-4 max-w mx-auto">
        @if(session('success'))
            <x-alert class="mb-4" icon="o-check-circle" title="{{ session('success') }}" />
        @endif

        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Profil</span>
            </x-slot:title>
            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-2 gap-4">
                    <x-input label="Nama" name="name" value="{{ old('name', $user->name) }}" required />
                    <x-input label="Email" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                    <x-input label="Employee ID" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}" />
                    <x-input label="No. Telepon" name="phone" value="{{ old('phone', $user->phone) }}" />
                    <x-select label="Departemen" name="department_id" :options="$departments->map(fn($d)=>['id'=>$d->id,'name'=>$d->name])" :selected="old('department_id', $user->department_id)" placeholder="-" />
                    <div class="md:col-span-2">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Foto Profil</span>
                            </div>
                            <input type="file" name="image" accept="image/*" class="file-input file-input-bordered w-full" />
                        </label>
                        @if($user->image_path)
                            <img src="{{ asset('storage/'.$user->image_path) }}" alt="avatar" class="mt-2 w-20 h-20 rounded-full object-cover" />
                        @endif
                    </div>
                </div>
                <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Simpan</x-button>
            </form>
        </x-card>

        <x-card class="mt-6" shadow>
            <x-slot:title>
                <span class="text-blue-700">Ubah Password</span>
            </x-slot:title>
            <form method="POST" action="{{ route('admin.profile.password') }}" class="grid md:grid-cols-2 gap-4">
                @csrf
                <x-input label="Password Saat Ini" name="current_password" type="password" required />
                <div></div>
                <x-input label="Password Baru" name="password" type="password" required />
                <x-input label="Konfirmasi Password" name="password_confirmation" type="password" required />
                <div class="md:col-span-2">
                    <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Update Password</x-button>
                </div>
            </form>
        </x-card>
    </div>
</x-layouts.dashboard>

