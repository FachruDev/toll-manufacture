<div>
    @php($title = 'PT Galenium - Toll Manufacturing')
        <x-layouts.app :title="$title">
            <section class="min-h-[70vh] flex items-center justify-center bg-gradient-to-b from-blue-50 to-white">
                <div class="text-center px-6 max-w-2xl">
                    <h1 class="text-3xl md:text-4xl font-bold text-blue-700">Toll Manufacturing Platform</h1>
                    <p class="mt-3 text-gray-600">PT Galenium Pharmasia Laboratories</p>
                    <p class="mt-4 text-gray-500">Kelola kolaborasi manufaktur, assessment teknis, dan perhitungan harga dalam satu aplikasi.</p>

                    <div class="mt-6 flex gap-3 justify-center">
                        <a class="btn btn-primary bg-blue-600 border-blue-600" href="{{ route('customer.login') }}">Login Customer</a>
                        <a class="btn btn-outline border-blue-600 text-blue-700" href="{{ route('admin.login') }}">Login Admin</a>
                    </div>
                </div>
            </section>
        </x-layouts.app>
</div>
