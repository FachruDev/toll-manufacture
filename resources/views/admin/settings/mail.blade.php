<x-layouts.dashboard>

    <div class="p-4 max-w mx-auto">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Settings</li>
                <li>Mail</li>
            </ul>
        </div>

        @if(session('success'))
            <div class="toast toast-top toast-end z-50">
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="toast toast-top toast-end z-50">
                <div class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-6">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6 text-primary">Konfigurasi SMTP</h2>
                <form method="POST" action="{{ route('admin.settings.mail.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mailer</label>
                            <input class="w-full input input-primary focus:border-none" name="mailer" value="{{ old('mailer', $setting->mailer) }}" readonly />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Host</label>
                            <input class="w-full input input-primary focus:border-none" name="host" value="{{ old('host', $setting->host) }}" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Port</label>
                            <input class="w-full input input-primary focus:border-none" name="port" type="number" value="{{ old('port', $setting->port) }}" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Encryption</label>
                            <select name="encryption" class="w-full select select-primary focus:border-none">
                                <option value="">None</option>
                                <option value="tls" {{ old('encryption', $setting->encryption) === 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ old('encryption', $setting->encryption) === 'ssl' ? 'selected' : '' }}>SSL</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username (email)</label>
                            <input class="w-full input input-primary focus:border-none" name="username" value="{{ old('username', $setting->username) }}" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password/App Password</label>
                            <input class="w-full input input-primary focus:border-none" name="password" type="password" placeholder="Leave blank to keep" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">From Address</label>
                            <input class="w-full input input-primary focus:border-none" name="from_address" value="{{ old('from_address', $setting->from_address) }}" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">From Name</label>
                            <input class="w-full input input-primary focus:border-none" name="from_name" value="{{ old('from_name', $setting->from_name) }}" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Timeout (seconds)</label>
                            <input class="w-full input input-primary focus:border-none" name="timeout" type="number" value="{{ old('timeout', $setting->timeout) }}" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="flex items-center cursor-pointer">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox" name="active" value="1" class="toggle toggle-primary mr-3" {{ old('active', $setting->active ?? true) ? 'checked' : '' }} />
                            <span class="text-sm font-medium text-gray-700">Aktifkan konfigurasi ini</span>
                        </label>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                    </div>

                    <div class="alert mt-6">
                        <span>
                            <ul class="list-disc ml-5 text-sm">
                                <li>Gmail: gunakan App Password (2FA harus aktif). Host: smtp.gmail.com, Port: 587, Encryption: TLS.</li>
                                <li>Domain Perusahaan: gunakan host/port/encryption dari penyedia email Anda.</li>
                            </ul>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6 text-blue-700">Kirim Test Email</h2>
                <form method="POST" action="{{ route('admin.settings.mail.test') }}" class="flex items-end gap-3">
                    @csrf
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kirim ke</label>
                        <input class="w-full input input-primary focus:border-none" name="to" type="email" value="{{ old('to', auth()->user()->email) }}" required />
                    </div>
                    <button type="submit" class="btn btn-outline btn-primary">Kirim</button>
                </form>
            </div>
        </div>

    </div>


</x-layouts.dashboard>
