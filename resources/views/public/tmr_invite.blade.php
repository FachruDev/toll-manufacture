<x-layouts.app>
    <body class="bg-gray-50 min-h-screen">
        <div class="max-w mx-auto p-4 py-8">
            <!-- Header -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h1 class="text-2xl font-bold text-primary mb-2">TMR Invitation</h1>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium">Email:</span> <span id="inviteEmail" class="font-mono">{{ $invite->email }}</span>
                    </div>
                    <div class="text-sm">
                        <span class="badge badge-warning">Expires: {{ $invite->expires_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Success/Error Messages -->
            <div id="msg" class="mb-6 hidden">
                <div class="alert" id="msgContent"></div>
            </div>

            <!-- Section I. Information & Contact -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">I. Information & Contact</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Request Date</label>
                        <input type="date" id="reqDate" class="w-full input input-primary focus:border-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Company <span class="text-red-500">*</span></label>
                        <input type="text" id="company" placeholder="Company name" class="w-full input input-primary focus:border-none">
                        <p id="errCompany" class="mt-1 text-sm text-red-600 hidden">Company is required</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" id="address" placeholder="Address" class="w-full input input-primary focus:border-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="text" id="phone" placeholder="e.g. +62..." class="w-full input input-primary focus:border-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact Person</label>
                        <input type="text" id="contactPerson" placeholder="Full name" class="w-full input input-primary focus:border-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                        <input type="email" id="email" value="{{ $invite->email }}" class="w-full input input-primary focus:border-none">
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveContact()">Save Section</button>
                </div>
            </div>

            <!-- Section VII. Product Name (single) -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">VII. Product Name</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Name <span class="text-red-500">*</span></label>
                    <input id="pnInput" type="text" placeholder="Product name" class="w-full input input-primary focus:border-none">
                    <p id="errPn" class="mt-1 text-sm text-red-600 hidden">Product name is required</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveProductName()">Save Section</button>
                </div>
            </div>

            <!-- Section VIII. Actives / Formulation -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">VIII. Actives / Formulation</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Actives / Formulation <span class="text-red-500">*</span></label>
                    <textarea id="formulation" placeholder="Describe actives / formulation..." class="w-full textarea textarea-primary focus:border-none" rows="4"></textarea>
                    <p id="errForm" class="mt-1 text-sm text-red-600 hidden">Actives/Formulation is required</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveFormulation()">Save Section</button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
                    <button class="btn btn-outline btn-neutral" onclick="copyLink()">Copy Link</button>
                    <button class="btn btn-outline btn-primary" onclick="finalizeSubmit()">Final Submit</button>
                </div>
            </div>
        </div>

        <script>
            const token = @json($invite->token);
            const base = `${window.location.origin}`;
            const headers = {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };

            function showMsg(text, ok = false) {
                const el = document.getElementById('msg');
                const content = document.getElementById('msgContent');
                if (!text) {
                    el.classList.add('hidden');
                    return;
                }
                el.classList.remove('hidden');
                content.className = ok ? 'alert alert-success' : 'alert alert-error';
                content.innerHTML = `<span>${text}</span>`;
                setTimeout(() => {
                    el.classList.add('hidden');
                }, 3000);
            }

            function copyLink() {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showMsg('Link copied to clipboard!', true);
                }).catch(() => {
                    showMsg('Failed to copy link');
                });
            }

            async function fetchDraft(){
                const res = await fetch(`${base}/tmr/invite/${token}/draft`);
                if(!res.ok) return;
                const js = await res.json();
                const p = js.payload || {};
                // contact
                if(p.contact){
                    reqDate.value = p.contact.request_date || '';
                    company.value = p.contact.company || '';
                    address.value = p.contact.address || '';
                    phone.value = p.contact.phone_number || '';
                    contactPerson.value = p.contact.contact_person || '';
                    email.value = p.contact.email || document.getElementById('inviteEmail').textContent;
                }
                // product name (single)
                if(p.product_name){
                    document.getElementById('pnInput').value = p.product_name;
                }
                // formulation
                if(p.formulation){
                    formulation.value = p.formulation.actives_formulation || '';
                }
            }

            async function saveContact() {
                const data = {
                    request_date: reqDate.value || null,
                    company: company.value.trim(),
                    address: address.value.trim() || null,
                    phone_number: phone.value.trim() || null,
                    contact_person: contactPerson.value.trim() || null,
                    email: email.value.trim() || null,
                };
                if (!data.company) {
                    document.getElementById('errCompany').classList.remove('hidden');
                    showMsg('Company is required');
                    return;
                }
                document.getElementById('errCompany').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'contact', data })
                });
                showMsg(res.ok ? 'Contact saved successfully!' : 'Save failed', res.ok);
            }

            async function saveProductName() {
                const v = document.getElementById('pnInput').value.trim();
                if(!v){ document.getElementById('errPn').classList.remove('hidden'); showMsg('Product name is required'); return; }
                document.getElementById('errPn').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'product_name', data: v })
                });
                showMsg(res.ok ? 'Product name saved successfully!' : 'Save failed', res.ok);
            }

            async function saveFormulation() {
                const data = { actives_formulation: formulation.value.trim() };
                if (!data.actives_formulation) {
                    document.getElementById('errForm').classList.remove('hidden');
                    showMsg('Actives/Formulation is required');
                    return;
                }
                document.getElementById('errForm').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'formulation', data })
                });
                showMsg(res.ok ? 'Formulation saved successfully!' : 'Save failed', res.ok);
            }

            async function finalizeSubmit() {
                const res = await fetch(`${base}/tmr/invite/${token}/finalize`, { method: 'POST', headers });
                const js = await res.json().catch(() => ({}));
                if (res.ok) {
                    showMsg(`Submitted successfully! TMR Number: ${js.number}`, true);
                    setTimeout(() => { window.location.href = `${base}/tmr/${js.public_uuid}/print`; }, 2000);
                } else {
                    showMsg(js.message || 'Finalize failed');
                }
            }

            // kickoff
            fetchDraft();
        </script>
    </body>
</x-layouts.app>
