<x-layouts.dashboard>

    <div class="p-4 max-w-3xl mx-auto">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Settings</li>
                <li>Mail</li>
            </ul>
        </div>

        @if(session('success'))
            <div class="toast toast-top toast-end">
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Konfigurasi SMTP</h2>
                <form method="POST" action="{{ route('admin.settings.mail.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid md:grid-cols-2 gap-4">
                        <label class="form-control">
                            <div class="label"><span class="label-text">Mailer</span></div>
                            <input class="input input-bordered" name="mailer" value="{{ old('mailer', $setting->mailer) }}" readonly />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Host</span></div>
                            <input class="input input-bordered" name="host" value="{{ old('host', $setting->host) }}" required />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Port</span></div>
                            <input class="input input-bordered" name="port" type="number" value="{{ old('port', $setting->port) }}" required />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Encryption</span></div>
                            <select name="encryption" class="select select-bordered">
                                <option value="">None</option>
                                <option value="tls" {{ old('encryption', $setting->encryption) === 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ old('encryption', $setting->encryption) === 'ssl' ? 'selected' : '' }}>SSL</option>
                            </select>
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Username (email)</span></div>
                            <input class="input input-bordered" name="username" value="{{ old('username', $setting->username) }}" />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Password/App Password</span></div>
                            <input class="input input-bordered" name="password" type="password" placeholder="Leave blank to keep" />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">From Address</span></div>
                            <input class="input input-bordered" name="from_address" value="{{ old('from_address', $setting->from_address) }}" required />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">From Name</span></div>
                            <input class="input input-bordered" name="from_name" value="{{ old('from_name', $setting->from_name) }}" required />
                        </label>
                        <label class="form-control">
                            <div class="label"><span class="label-text">Timeout (seconds)</span></div>
                            <input class="input input-bordered" name="timeout" type="number" value="{{ old('timeout', $setting->timeout) }}" />
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-3">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox" name="active" value="1" class="toggle toggle-primary" {{ old('active', $setting->active ?? true) ? 'checked' : '' }} />
                            <span class="label-text">Aktifkan konfigurasi ini</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                    <div class="alert mt-4">
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

        <div class="card bg-base-100 shadow mt-6">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Kirim Test Email</h2>
                <form method="POST" action="{{ route('admin.settings.mail.test') }}" class="flex items-end gap-3">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Kirim ke</span></div>
                        <input class="input input-bordered" name="to" type="email" value="{{ old('to', auth()->user()->email) }}" required />
                    </label>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>

    </div>


</x-layouts.dashboard>
