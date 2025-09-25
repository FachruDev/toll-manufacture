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

            <!-- Section IX. Technical Made -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">IX. Technical Made</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Technical Made <span class="text-red-500">*</span></label>
                    <select id="technicalMade" class="w-full select select-primary focus:border-none">
                        <option value="">Select Technical Made</option>
                        @foreach($technicalMades as $technicalMade)
                            <option value="{{ $technicalMade->id }}">{{ $technicalMade->title }}</option>
                        @endforeach
                    </select>
                    <p id="errTechnicalMade" class="mt-1 text-sm text-red-600 hidden">Technical made is required</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveTechnicalMade()">Save Section</button>
                </div>
            </div>

            <!-- Section X. Indication -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">X. Indication</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Indication <span class="text-red-500">*</span></label>
                    <textarea id="indication" placeholder="Describe product indication..." class="w-full textarea textarea-primary focus:border-none" rows="4"></textarea>
                    <p id="errIndication" class="mt-1 text-sm text-red-600 hidden">Indication is required</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveIndication()">Save Section</button>
                </div>
            </div>

            <!-- Section XI. Product Category -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">XI. Product Category</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Category <span class="text-red-500">*</span></label>
                    <input id="productCategory" type="text" placeholder="e.g. Pharmaceutical, Cosmetic, etc." class="w-full input input-primary focus:border-none">
                    <p id="errProductCategory" class="mt-1 text-sm text-red-600 hidden">Product category is required</p>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="btn btn-outline btn-primary" onclick="saveProductCategory()">Save Section</button>
                </div>
            </div>

            <!-- Section XII. Desired Format / Product Characteristic -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-primary mb-6">XII. Desired Format / Product Characteristic</h3>
                <div id="desiredFormatsContainer">
                    <!-- Template for new format entry -->
                    <div class="format-entry border border-gray-200 rounded-lg p-4 mb-4" data-index="0">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-md font-medium">Format Entry #1</h4>
                            <button type="button" class="btn btn-sm btn-error" onclick="removeFormatEntry(this)">Remove</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Product Char Group <span class="text-red-500">*</span></label>
                                <select class="format-group w-full select select-primary focus:border-none" onchange="updateDetailsOptions(this)">
                                    <option value="">Select Group</option>
                                    @foreach($productCharGroups as $group)
                                        <option value="{{ $group->id }}" data-details='@json($group->details)' data-title="{{ $group->title }}">{{ $group->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                <input type="text" class="format-notes w-full input input-primary focus:border-none" placeholder="Additional notes">
                            </div>
                        </div>
                        <div class="details-container">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Characteristics</label>
                            <div class="details-list space-y-2">
                                <!-- Details will be populated dynamically -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" class="btn btn-outline btn-secondary" onclick="addFormatEntry()">Add Another Format</button>
                    <button class="btn btn-outline btn-primary" onclick="saveDesiredFormats()">Save Section</button>
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
                // technical made
                if(p.technical_made_id){
                    document.getElementById('technicalMade').value = p.technical_made_id;
                }
                // indication
                if(p.indication){
                    document.getElementById('indication').value = p.indication;
                }
                // product category
                if(p.product_category){
                    document.getElementById('productCategory').value = p.product_category;
                }
                // desired formats
                if(p.desired_formats && Array.isArray(p.desired_formats)){
                    loadDesiredFormats(p.desired_formats);
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

            async function saveTechnicalMade() {
                const v = document.getElementById('technicalMade').value.trim();
                if(!v){ document.getElementById('errTechnicalMade').classList.remove('hidden'); showMsg('Technical made is required'); return; }
                document.getElementById('errTechnicalMade').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'technical_made_id', data: parseInt(v) })
                });
                showMsg(res.ok ? 'Technical made saved successfully!' : 'Save failed', res.ok);
            }

            async function saveIndication() {
                const v = document.getElementById('indication').value.trim();
                if(!v){ document.getElementById('errIndication').classList.remove('hidden'); showMsg('Indication is required'); return; }
                document.getElementById('errIndication').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'indication', data: v })
                });
                showMsg(res.ok ? 'Indication saved successfully!' : 'Save failed', res.ok);
            }

            async function saveProductCategory() {
                const v = document.getElementById('productCategory').value.trim();
                if(!v){ document.getElementById('errProductCategory').classList.remove('hidden'); showMsg('Product category is required'); return; }
                document.getElementById('errProductCategory').classList.add('hidden');
                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'product_category', data: v })
                });
                showMsg(res.ok ? 'Product category saved successfully!' : 'Save failed', res.ok);
            }

            // Desired Formats functions
            let formatEntryCounter = 1;

            function addFormatEntry() {
                const container = document.getElementById('desiredFormatsContainer');
                const template = container.querySelector('.format-entry').cloneNode(true);
                formatEntryCounter++;

                // Update index and title
                template.setAttribute('data-index', formatEntryCounter - 1);
                template.querySelector('h4').textContent = `Format Entry #${formatEntryCounter}`;

                // Clear values
                template.querySelector('.format-group').value = '';
                template.querySelector('.format-notes').value = '';
                template.querySelector('.details-list').innerHTML = '';

                container.appendChild(template);
            }

            function removeFormatEntry(button) {
                const entry = button.closest('.format-entry');
                const container = document.getElementById('desiredFormatsContainer');
                if (container.children.length > 1) {
                    entry.remove();
                    updateEntryTitles();
                } else {
                    showMsg('At least one format entry is required');
                }
            }

            function updateEntryTitles() {
                const entries = document.querySelectorAll('.format-entry');
                entries.forEach((entry, index) => {
                    entry.querySelector('h4').textContent = `Format Entry #${index + 1}`;
                });
                formatEntryCounter = entries.length;
            }

            function updateDetailsOptions(select) {
                const entry = select.closest('.format-entry');
                const detailsContainer = entry.querySelector('.details-list');
                const selectedOption = select.options[select.selectedIndex];
                const details = selectedOption.getAttribute('data-details');

                if (!details) {
                    detailsContainer.innerHTML = '';
                    return;
                }

                const detailsData = JSON.parse(details);
                let html = '';

                detailsData.forEach(detail => {
                    const inputType = detail.input_type || 'text';
                    const isRequired = detail.is_required ? 'required' : '';
                    const requiredMark = detail.is_required ? '<span class="text-red-500">*</span>' : '';
                    
                    let inputHtml = '';
                    let baseClasses = 'detail-value';
                    let outerDivClasses = 'flex items-center space-x-2';

                    if (inputType === 'radio') {
                        const titleParts = detail.field_title.split(':');
                        const groupName = titleParts.length > 1 ? titleParts[0].trim().replace(/\s+/g, '-') : `radio-group-${detail.id}`;
                        const labelText = titleParts.length > 1 ? titleParts.slice(1).join(':').trim() : detail.field_title;

                        inputHtml = `<input type="radio" name="char-radio-${groupName}" value="${labelText}" class="${baseClasses} radio radio-primary" data-detail-id="${detail.id}" ${isRequired}>`;
                        
                        html += `
                            <div class="${outerDivClasses}">
                                <label class="label cursor-pointer space-x-2">
                                    ${inputHtml}
                                    <span class="label-text">${labelText} ${requiredMark}</span> 
                                </label>
                            </div>
                        `;
                    } else if (inputType === 'checkbox') {
                        inputHtml = `<input type="checkbox" class="${baseClasses} checkbox checkbox-primary" data-detail-id="${detail.id}" ${isRequired}>`;
                        html += `
                            <div class="${outerDivClasses}">
                                <label class="label cursor-pointer space-x-2">
                                    ${inputHtml}
                                    <span class="label-text">${detail.field_title} ${requiredMark}</span> 
                                </label>
                            </div>
                        `;
                    } 
                    else {
                        inputHtml = `<input type="${inputType}" class="${baseClasses} flex-1 input input-primary input-sm focus:border-none"
                                   data-detail-id="${detail.id}" placeholder="Enter value" ${isRequired}>`;
                        html += `
                            <div class="${outerDivClasses}">
                                <label class="flex-1 text-sm font-medium">${detail.field_title} ${requiredMark}</label>
                                ${inputHtml}
                            </div>
                        `;
                    }
                });

                detailsContainer.innerHTML = html;
            }

            async function saveDesiredFormats() {
                const entries = document.querySelectorAll('.format-entry');
                const desiredFormats = [];

                for (const entry of entries) {
                    const groupSelect = entry.querySelector('.format-group');
                    const groupId = groupSelect.value;
                    const notes = entry.querySelector('.format-notes').value.trim();

                    if (!groupId) {
                        showMsg('Please select a product char group for all entries');
                        return;
                    }

                    const formatData = {
                        product_char_group_id: parseInt(groupId),
                        notes: notes || null,
                        details: []
                    };

                    const detailInputs = entry.querySelectorAll('.detail-value');
                    detailInputs.forEach(input => {
                        const detailId = input.getAttribute('data-detail-id');
                        const value = input.value.trim();
                        if (value || input.hasAttribute('required')) {
                            formatData.details.push({
                                product_char_detail_id: parseInt(detailId),
                                value: value
                            });
                        }
                    });

                    desiredFormats.push(formatData);
                }

                const res = await fetch(`${base}/tmr/invite/${token}/draft`, {
                    method: 'POST', headers, body: JSON.stringify({ section: 'desired_formats', data: desiredFormats })
                });
                showMsg(res.ok ? 'Desired formats saved successfully!' : 'Save failed', res.ok);
            }

            function loadDesiredFormats(desiredFormats) {
                const container = document.getElementById('desiredFormatsContainer');
                container.innerHTML = ''; // Clear existing entries

                desiredFormats.forEach((format, index) => {
                    const template = createFormatEntryTemplate(index + 1);
                    container.appendChild(template);

                    const entry = container.lastElementChild;
                    const groupSelect = entry.querySelector('.format-group');
                    const notesInput = entry.querySelector('.format-notes');

                    // Set group
                    groupSelect.value = format.product_char_group_id;
                    notesInput.value = format.notes || '';

                    // Trigger details loading
                    updateDetailsOptions(groupSelect);

                    // Set detail values after a short delay to allow DOM update
                    setTimeout(() => {
                        if (format.details && Array.isArray(format.details)) {
                            format.details.forEach(detail => {
                                const input = entry.querySelector(`.detail-value[data-detail-id="${detail.product_char_detail_id}"]`);
                                if (input) {
                                    input.value = detail.value || '';
                                }
                            });
                        }
                    }, 100);
                });

                formatEntryCounter = desiredFormats.length;
            }

            function createFormatEntryTemplate(entryNumber) {
                const template = document.createElement('div');
                template.className = 'format-entry border border-gray-200 rounded-lg p-4 mb-4';
                template.setAttribute('data-index', entryNumber - 1);
                template.innerHTML = `
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-md font-medium">Format Entry #${entryNumber}</h4>
                        <button type="button" class="btn btn-sm btn-error" onclick="removeFormatEntry(this)">Remove</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Char Group <span class="text-red-500">*</span></label>
                            <select class="format-group w-full select select-primary focus:border-none" onchange="updateDetailsOptions(this)">
                                <option value="">Select Group</option>
                                @foreach($productCharGroups as $group)
                                    <option value="{{ $group->id }}" data-details='@json($group->details)' data-title="{{ $group->title }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                            <input type="text" class="format-notes w-full input input-primary focus:border-none" placeholder="Additional notes">
                        </div>
                    </div>
                    <div class="details-container">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Characteristics</label>
                        <div class="details-list space-y-2">
                            <!-- Details will be populated dynamically -->
                        </div>
                    </div>
                `;
                return template;
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
