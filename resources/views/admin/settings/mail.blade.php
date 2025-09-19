@php($title = 'Email SMTP Settings')
<x-layouts.app :title="$title">
    <div class="p-4 max-w-3xl mx-auto">
        <x-breadcrumbs :items="[['label'=>'Admin','url'=>route('admin.dashboard')],['label'=>'Settings'],['label'=>'Mail']]" />

        @if(session('success'))
            <x-alert class="mb-4" icon="o-check-circle" title="{{ session('success') }}" />
        @endif

        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Konfigurasi SMTP</span>
            </x-slot:title>
            <form method="POST" action="{{ route('admin.settings.mail.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-4">
                    <x-input label="Mailer" name="mailer" value="{{ old('mailer', $setting->mailer) }}" readonly />
                    <x-input label="Host" name="host" value="{{ old('host', $setting->host) }}" required />
                    <x-input label="Port" name="port" type="number" value="{{ old('port', $setting->port) }}" required />
                    <x-select label="Encryption" name="encryption" :options="[['id'=>'tls','name'=>'TLS'],['id'=>'ssl','name'=>'SSL']]" :selected="old('encryption', $setting->encryption)" placeholder="None" />
                    <x-input label="Username (email)" name="username" value="{{ old('username', $setting->username) }}" />
                    <x-input label="Password/App Password" name="password" type="password" placeholder="Leave blank to keep" />
                    <x-input label="From Address" name="from_address" value="{{ old('from_address', $setting->from_address) }}" required />
                    <x-input label="From Name" name="from_name" value="{{ old('from_name', $setting->from_name) }}" required />
                    <x-input label="Timeout (seconds)" name="timeout" type="number" value="{{ old('timeout', $setting->timeout) }}" />
                </div>

                <div class="form-control">
                    <label class="label cursor-pointer justify-start gap-3">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" value="1" class="toggle toggle-primary" {{ old('active', $setting->active ?? true) ? 'checked' : '' }} />
                        <span class="label-text">Aktifkan konfigurasi ini</span>
                    </div>
                </div>

                <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Simpan</x-button>

                <x-alert class="mt-4" icon="o-information-circle" title="Catatan">
                    <ul class="list-disc ml-5 text-sm">
                        <li>Gmail: gunakan App Password (2FA harus aktif). Host: smtp.gmail.com, Port: 587, Encryption: TLS.</li>
                        <li>Domain Perusahaan: gunakan host/port/encryption dari penyedia email Anda.</li>
                    </ul>
                </x-alert>
            </form>
        </x-card>

        <x-card class="mt-6" shadow>
            <x-slot:title>
                <span class="text-blue-700">Kirim Test Email</span>
            </x-slot:title>
            <form method="POST" action="{{ route('admin.settings.mail.test') }}" class="flex items-end gap-3">
                @csrf
                <x-input label="Kirim ke" name="to" type="email" value="{{ old('to', auth()->user()->email) }}" class="w-full" required />
                <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Kirim</x-button>
            </form>
        </x-card>
    </div>
</x-layouts.app>
