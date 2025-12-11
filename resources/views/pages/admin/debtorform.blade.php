@extends('layout.master')

@push('style')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')

<div class="form-header">
    <h1>Add New Debtor</h1>
    <div class="progress-container">
        <div class="step-text" id="stepText">
            <span>Step 1: Client & Personal Info</span>
            <span>0% Completed</span>
        </div>
        <div class="progress-track">
            <div class="progress-fill" id="progressFill"></div>
        </div>
    </div>
</div>

<form id="debtorForm" action="#" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-body">

        <!-- SECTION 1: Client & Debtor Information -->
        <section class="section active" data-step="1">
            <div class="section-title"><i class="fas fa-user-circle"></i> Client & Debtor Information</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Client Name *</label>
                    <div class="input-wrapper custom-select-wrapper">
                        <div class="custom-select-input" onclick="toggleClientDropdown()">
                            <input type="text" id="clientSearchInput" placeholder="Select Client" oninput="filterClientOptions()" readonly />
                            <i class="fas fa-users"></i>
                        </div>
                        <ul class="custom-select-dropdown" id="clientDropdown">
                            <li onclick="selectClient(this)" data-value="1">Manikandan</li>
                            <li onclick="selectClient(this)" data-value="2">Rajesh Kumar</li>
                            <li onclick="selectClient(this)" data-value="4">Suresh</li>
                            <li onclick="selectClient(this)" data-value="5">Karthik</li>
                        </ul>
                        <input type="hidden" id="clientName" name="clientName" required>
                    </div>
                </div>
                <div class="input-group">
                    <label>Debtor Full Name *</label>
                    <div class="input-wrapper">
                        <input id="debtorName" name="debtorName" type="text" required placeholder="Enter full legal name" />
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Contact Number *</label>
                    <div class="input-wrapper">
                        <input id="contactNumber" name="contactNumber" type="tel" required placeholder="9876543210" pattern="[0-9]{10,12}" />
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>WhatsApp Number</label>
                    <div class="input-wrapper">
                        <input id="whatsappNumber" name="whatsappNumber" type="tel" placeholder="9876543210" pattern="[0-9]{10,12}" />
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Identity Card Number *</label>
                    <div class="input-wrapper">
                        <input id="idCardNumber" name="idCardNumber" type="text" required placeholder="Enter your ID number" />
                        <i class="fas fa-id-card"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Occupation *</label>
                    <div class="input-wrapper">
                        <input id="occupation" name="occupation" type="text" required placeholder="Current occupation / job title" />
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Identity Proof *</label>
                    <div class="file-upload-zone mini" id="identityDropZone">
                        <input id="identityProof" name="identityProof" type="file" accept="image/*,application/pdf" required />
                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <p style="font-weight:600; margin:0;">Click to upload</p>
                        <p class="helper-text">Aadhar/PAN/Passport (max. 10MB)</p>
                    </div>
                    <div class="upload-preview-list" id="identityPreview"></div>
                </div>
                <div class="input-group full-width">
                    <label>Address *</label>
                    <div class="input-wrapper">
                        <textarea id="address" name="address" required placeholder="Complete residential address with landmarks"></textarea>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: Loan Details & Documentation -->
        <section class="section" data-step="2">
            <div class="section-title"><i class="fas fa-file-invoice-dollar"></i> Loan Details & Documentation</div>
            <div class="fields-grid">
                <div class="input-group full-width">
                    <label>Loan Type *</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="loanType" id="loanPersonal" value="personal" checked required>
                            <span><i class="fas fa-user"></i> Personal</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="loanType" id="loanBusiness" value="business">
                            <span><i class="fas fa-building"></i> Business</span>
                        </label>
                    </div>
                </div>

                <div class="input-group full-width">
                    <label>Loan Reason *</label>
                    <div class="input-wrapper">
                        <textarea id="loanReason" name="loanReason" required placeholder="Detailed reason for taking loan (medical, business, personal, etc.)"></textarea>
                        <i class="fas fa-align-left"></i>
                    </div>
                </div>

                <div class="input-group">
                    <label>Loan Amount *</label>
                    <div class="input-wrapper">
                        <input id="loanAmount" name="loanAmount" type="number" min="1000" required placeholder="50000" />
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>

                <div class="input-group">
                    <label>Date Taken *</label>
                    <div class="input-wrapper">
                        <input id="dateTaken" name="dateTaken" type="date" required />
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>

                <div class="input-group">
                    <label>Due Date *</label>
                    <div class="input-wrapper">
                        <input id="dueDate" name="dueDate" type="date" required />
                        <i class="fas fa-calendar-times"></i>
                    </div>
                </div>

                <!-- Address proof + Debtor photo, side by side -->
                <div class="input-group full-width file-row">
                    <div class="file-col">
                        <label>Address Proof</label>
                        <div class="file-upload-zone mini" id="addressProofDropZone">
                            <input id="addressProof" name="addressProof" type="file" accept="image/*,application/pdf" />
                            <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <p style="font-weight:600; margin:0;">Click to upload</p>
                            <p class="helper-text">Address proof (max. 10MB)</p>
                        </div>
                        <div class="upload-preview-list" id="addressProofPreview"></div>
                    </div>

                    <div class="file-col">
                        <label>Debtor Photo / Video *</label>
                        <div class="file-upload-zone mini" id="debtorPhotoDropZone">
                            <input id="debtorPhoto" name="debtorPhoto" type="file" accept="image/*,video/*" required />
                            <div class="upload-icon"><i class="fas fa-camera"></i></div>
                            <p style="font-weight:600; margin:0;">Click to upload</p>
                            <p class="helper-text">Photo or Video (max. 10MB)</p>
                        </div>
                        <div class="upload-preview-list" id="debtorPhotoPreview"></div>
                    </div>
                </div>

                <!-- Business proof row below the two files -->
                <div class="input-group full-width" id="businessProofGroup" style="display:none;">
                    <label>Business Proof *</label>
                    <div class="file-upload-zone mini" id="businessDropZone">
                        <input id="businessProof" name="businessProof" type="file" accept="image/*,application/pdf" />
                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <p style="font-weight:600; margin:0;">Click to upload</p>
                        <p class="helper-text">GST/License (max. 10MB)</p>
                    </div>
                    <div class="upload-preview-list" id="businessPreview"></div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: Payment Mode & Schedule -->
        <section class="section" data-step="3">
            <div class="section-title"><i class="fas fa-wallet"></i> Payment Mode & Schedule</div>
            <div class="fields-grid">
                <div class="input-group full-width">
                    <label>Payment Mode *</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="paymentMode" id="payFull" value="full" checked required>
                            <span><i class="fas fa-money-bill-wave"></i> Full Payment</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="paymentMode" id="payInstall" value="installment">
                            <span><i class="fas fa-calendar-alt"></i> Installments</span>
                        </label>
                    </div>
                </div>
                <div class="input-group full-width" id="installmentSection" style="display:none;">
                    <label>Installment Schedule *</label>
                    <div class="installment-container">
                        <div class="installment-header">
                            <small class="text-muted">Click + to add more</small>
                            <button type="button" class="btn btn-ghost btn-sm" onclick="addInstallment()">
                                <i class="fas fa-plus"></i> Add Installment
                            </button>
                        </div>
                        <div id="installmentList" class="installment-list">
                            <!-- Default first row -->
                            <div class="installment-item">
                                <div class="input-wrapper">
                                    <input class="installment-amount" type="number" placeholder="₹5000" min="500" required />
                                    <i class="fas fa-rupee-sign"></i>
                                </div>
                                <div class="input-wrapper">
                                    <input class="installment-date" type="date" required />
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="input-wrapper">
                                    <input class="installment-status" type="text" value="Pending" readonly />
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                                <button type="button" class="btn-remove" onclick="this.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group full-width">
                    <label>Internal Notes</label>
                    <div class="input-wrapper">
                        <textarea id="notes" name="notes" placeholder="Any special instructions, recovery notes, or observations..."></textarea>
                        <i class="fas fa-comment-alt"></i>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Footer Actions -->
    <div class="form-footer">
        <button type="button" class="btn btn-secondary" id="prevBtn" disabled>
            <i class="fas fa-arrow-left"></i> Previous
        </button>
        <div style="display:flex; gap:10px">
            <button type="button" class="btn btn-ghost" id="previewBtn">
                <i class="fas fa-eye"></i> Preview
            </button>
            <button type="button" class="btn btn-primary" id="nextBtn">
                Next <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>

</form>

<!-- AWS SUCCESS NOTIFICATION -->
<div id="awsSuccess" class="aws-alert d-none">
    <div class="aws-alert-icon">✔</div>
    <div class="aws-alert-text">
        <strong>Success:</strong> Debtor saved successfully!
    </div>
</div>

<!-- Preview Modal -->
<div class="modal-overlay" id="previewModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2><i class="fas fa-file-alt"></i> Debtor Information Summary</h2>
            <button type="button" class="modal-close" onclick="closePreviewModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="preview-grid">
                <div class="preview-main">
                    <!-- Client Info -->
                    <div class="preview-section">
                        <h5><i class="fas fa-user-circle"></i> Client & Debtor Information</h5>
                        <dl class="preview-list">
                            <dt>Client Name</dt>
                            <dd id="previewClientName">No data</dd>
                            <dt>Debtor Name</dt>
                            <dd id="previewDebtorName">No data</dd>
                            <dt>Contact</dt>
                            <dd id="previewContact">No data</dd>
                            <dt>WhatsApp</dt>
                            <dd id="previewWhatsapp">No data</dd>
                            <dt>Identity Card Number</dt>
                            <dd id="previewIdCard">No data</dd>
                            <dt>Occupation</dt>
                            <dd id="previewOccupation">No data</dd>
                            <dt>Address</dt>
                            <dd id="previewAddress">No data</dd>
                        </dl>
                    </div>
                    <!-- Loan Info -->
                    <div class="preview-section">
                        <h5><i class="fas fa-dollar-sign"></i> Loan Details & Documentation</h5>
                        <dl class="preview-list">
                            <dt>Loan Amount</dt>
                            <dd id="previewLoanAmount">No data</dd>
                            <dt>Loan Type</dt>
                            <dd><span class="badge badge-primary" id="previewLoanType">No data</span></dd>
                            <dt>Date Taken</dt>
                            <dd id="previewDateTaken">No data</dd>
                            <dt>Due Date</dt>
                            <dd id="previewDueDate">No data</dd>
                            <dt>Loan Reason</dt>
                            <dd id="previewLoanReason">No data</dd>
                            <dt>Documents</dt>
                            <dd>
                                <ul class="file-list-preview" id="previewDocuments">
                                    <li>No documents uploaded</li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                    <!-- Payment & Notes -->
                    <div class="preview-section">
                        <h5><i class="fas fa-wallet"></i> Payment & Notes</h5>
                        <dl class="preview-list">
                            <dt>Payment Mode</dt>
                            <dd><span class="badge badge-info" id="previewPaymentMode">No data</span></dd>
                        </dl>
                        <div id="previewInstallments">
                            <div class="empty-value">No installment schedule</div>
                        </div>
                        <dl class="preview-list">
                            <dt>Internal Notes</dt>
                            <dd><div class="internal-notes" id="previewInternalNotes">No notes provided</div></dd>
                        </dl>
                    </div>
                </div>
                <div class="preview-sidebar">
                    <span class="photo-label"><i class="fas fa-user-circle"></i> Debtor Photo</span>
                    <img id="previewDebtorPhoto" src="https://placehold.co/280x280?text=No+Photo" class="debtor-photo">
                    <div class="action-buttons">
                        <button type="button" class="btn btn-secondary w-100" onclick="printPreview()">
                            <i class="fas fa-print"></i> Print Details
                        </button>
                        <button type="button" class="btn btn-primary w-100" onclick="downloadAsPDF()">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
(function(){
    const sections = Array.from(document.querySelectorAll('.section'));
    const total = sections.length;
    let current = 0;

    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const previewBtn = document.getElementById('previewBtn');
    const progressFill = document.getElementById('progressFill');
    const stepText = document.getElementById('stepText');
    const form = document.getElementById('debtorForm');

    const stepTitles = [
        'Client & Personal Info',
        'Loan Details & Docs',
        'Payment Mode & Schedule'
    ];

    // Custom progress mapping per visible step
    // index 0 -> step 1, index 1 -> step 2, index 2 -> step 3
    const progressByStep = [0, 30, 65];

    function getPercentForStep(stepIndex) {
        if (progressByStep[stepIndex] !== undefined) {
            return progressByStep[stepIndex];
        }
        // fallback linear if mismatch
        if (total <= 1) return 0;
        return Math.round((stepIndex / (total - 1)) * 100);
    }

    function updateUI(forcedPercent) {
        sections.forEach((s, i) => s.classList.toggle('active', i === current));

        const percent = (typeof forcedPercent === 'number')
            ? forcedPercent
            : getPercentForStep(current);

        // Progress bar
        progressFill.style.width = percent + '%';

        // Step text
        stepText.innerHTML =
            `<span>Step ${current + 1}: ${stepTitles[current]}</span>` +
            `<span>${percent}% Completed</span>`;

        // Buttons
        prevBtn.disabled = current === 0;
        
        if (current === total - 1) {
            nextBtn.innerHTML = '<i class="fas fa-save"></i> Save Debtor';
            previewBtn.style.display = 'inline-flex';
        } else {
            nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right"></i>';
            previewBtn.style.display = 'none';
        }
    }

    function validateSection(idx) {
        const sec = sections[idx];
        const requiredFields = Array.from(sec.querySelectorAll('[required]'));
        let isValid = true;

        requiredFields.forEach(f => {
            // Skip hidden fields or fields in hidden groups
            if (f.offsetParent === null && f.type !== 'hidden' && !f.id.includes('clientName')) return;
            
            // Special handling for client dropdown hidden input
            if (f.id === 'clientName') {
                if (!f.value) {
                    const wrapper = document.querySelector('.custom-select-input');
                    if (wrapper) wrapper.classList.add('is-invalid');
                    isValid = false;
                }
                return;
            }

            // Skip file inputs that are in hidden sections
            if (f.type === 'file') {
                const parent = f.closest('.input-group');
                if (parent && parent.style.display === 'none') return;
                
                if (f.hasAttribute('required') && (!f.files || !f.files[0])) {
                    const zone = f.closest('.file-upload-zone');
                    if (zone) zone.classList.add('is-invalid');
                    isValid = false;
                }
                return;
            }

            if (!f.checkValidity()) {
                f.reportValidity();
                isValid = false;
                f.classList.add('is-invalid');
                f.addEventListener('input', () => f.classList.remove('is-invalid'), { once: true });
            }
        });

        // Validate installments if in installment mode and on step 3
        if (sec.dataset.step === '3') {
            const paymentMode = document.querySelector('input[name="paymentMode"]:checked');
            if (paymentMode && paymentMode.value === 'installment') {
                const installments = document.querySelectorAll('.installment-item');
                installments.forEach(item => {
                    const amount = item.querySelector('.installment-amount');
                    const date = item.querySelector('.installment-date');
                    if (amount && (!amount.value || parseFloat(amount.value) < 500)) {
                        amount.classList.add('is-invalid');
                        isValid = false;
                    }
                    if (date && !date.value) {
                        date.classList.add('is-invalid');
                        isValid = false;
                    }
                });
            }
        }

        return isValid;
    }

    function validateAllSections() {
        for (let i = 0; i < total; i++) {
            if (!validateSection(i)) {
                current = i;
                updateUI();
                return false;
            }
        }
        return true;
    }

    nextBtn.addEventListener('click', () => {
        if (current < total - 1) {
            if (!validateSection(current)) return;
            current++;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            // Final submit from last step
            if (!validateAllSections()) return;

            // show 100% completed
            updateUI(100);

            nextBtn.disabled = true;
            nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            setTimeout(() => {
                showAwsSuccess('Debtor saved successfully!');
                form.reset();
                resetForm();
                nextBtn.disabled = false;
                current = 0;
                updateUI(); // back to 0% for new form
            }, 1500);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (current > 0) {
            current--;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    previewBtn.addEventListener('click', () => {
        if (validateAllSections()) {
            showPreview();
        }
    });

    // Client dropdown functions
    window.toggleClientDropdown = function() {
        const dropdown = document.getElementById("clientDropdown");
        const input = document.getElementById("clientSearchInput");
        if (!dropdown || !input) return;
        dropdown.classList.toggle("show");
        if (dropdown.classList.contains("show")) {
            input.removeAttribute("readonly");
            input.focus();
        } else {
            input.setAttribute("readonly", true);
        }
    };

    window.filterClientOptions = function() {
        const input = document.getElementById("clientSearchInput");
        if (!input) return;
        const value = input.value.toLowerCase();
        document.querySelectorAll("#clientDropdown li").forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(value) ? "block" : "none";
        });
    };

    window.selectClient = function(el) {
        if (!el) return;
        const input = document.getElementById("clientSearchInput");
        const hidden = document.getElementById("clientName");
        const dropdown = document.getElementById("clientDropdown");
        const wrapper = document.querySelector('.custom-select-input');
        
        if (!input || !hidden || !dropdown) return;

        input.value = el.textContent;
        hidden.value = el.getAttribute("data-value") || '';
        dropdown.classList.remove("show");
        input.setAttribute("readonly", true);
        
        if (wrapper) wrapper.classList.remove('is-invalid');
    };

    // Close client dropdown when clicking outside
    document.addEventListener("click", function(e) {
        if (!e.target.closest(".custom-select-wrapper")) {
            const dropdown = document.getElementById("clientDropdown");
            const input = document.getElementById("clientSearchInput");
            if (dropdown) dropdown.classList.remove("show");
            if (input) input.setAttribute("readonly", true);
        }
    });

    // Add installment row
    window.addInstallment = function() {
        const instList = document.getElementById('installmentList');
        if (!instList) return;
        const div = document.createElement('div');
        div.className = 'installment-item';
        div.innerHTML = `
            <div class="input-wrapper">
                <input class="installment-amount" type="number" placeholder="₹5000" min="500" required />
                <i class="fas fa-rupee-sign"></i>
            </div>
            <div class="input-wrapper">
                <input class="installment-date" type="date" required />
                <i class="fas fa-calendar"></i>
            </div>
            <div class="input-wrapper">
                <input class="installment-status" type="text" value="Pending" readonly />
                <i class="fas fa-hourglass-half"></i>
            </div>
            <button type="button" class="btn-remove" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        instList.appendChild(div);
    };

    // Loan type toggle
    document.querySelectorAll('input[name="loanType"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const businessGroup = document.getElementById('businessProofGroup');
            if (businessGroup) {
                businessGroup.style.display = this.value === 'business' ? 'block' : 'none';
                const businessInput = document.getElementById('businessProof');
                if (this.value === 'business') {
                    businessInput.setAttribute('required', 'required');
                } else {
                    businessInput.removeAttribute('required');
                }
            }
        });
    });

    // Payment mode toggle
    document.querySelectorAll('input[name="paymentMode"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const section = document.getElementById('installmentSection');
            if (section) {
                section.style.display = this.value === 'installment' ? 'block' : 'none';
            }
        });
    });

    // File upload handling
    function setupFileUpload(inputId, previewId, dropZoneId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const dropZone = document.getElementById(dropZoneId);

        if (!input || !preview) return;

        if (dropZone) {
            dropZone.addEventListener('dragover', e => { 
                e.preventDefault(); 
                dropZone.classList.add('dragover'); 
            });
            dropZone.addEventListener('dragleave', e => { 
                e.preventDefault(); 
                dropZone.classList.remove('dragover'); 
            });
            dropZone.addEventListener('drop', e => {
                e.preventDefault();
                dropZone.classList.remove('dragover');
                if (e.dataTransfer.files.length) {
                    input.files = e.dataTransfer.files;
                    handleFileDisplay(input, preview);
                }
            });
        }

        input.addEventListener('change', () => {
            handleFileDisplay(input, preview);
            const zone = input.closest('.file-upload-zone');
            if (zone) zone.classList.remove('is-invalid');
        });
    }

    function handleFileDisplay(input, preview) {
        preview.innerHTML = '';
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const item = document.createElement('div');
            item.className = 'file-item';
            item.innerHTML = `
                <i class="fas fa-file-alt" style="color:var(--primary)"></i>
                <div style="flex:1; overflow:hidden;">
                    <div style="font-weight:500; white-space:nowrap; overflow:hidden; text-overflow:ellipsis">${file.name}</div>
                    <div class="file-progress"><div class="file-progress-bar" style="width:100%"></div></div>
                </div>
                <i class="fas fa-times" style="cursor:pointer; color:#ef4444" onclick="clearFileInput('${input.id}', '${preview.id}')"></i>
            `;
            preview.appendChild(item);
        }
    }

    window.clearFileInput = function(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        if (input) input.value = '';
        if (preview) preview.innerHTML = '';
    };

    // Setup all file uploads
    setupFileUpload('identityProof', 'identityPreview', 'identityDropZone');
    setupFileUpload('businessProof', 'businessPreview', 'businessDropZone');
    setupFileUpload('addressProof', 'addressProofPreview', 'addressProofDropZone');
    setupFileUpload('debtorPhoto', 'debtorPhotoPreview', 'debtorPhotoDropZone');

    // Reset form helper
    function resetForm() {
        document.querySelectorAll('.upload-preview-list').forEach(p => p.innerHTML = '');
        document.getElementById('businessProofGroup').style.display = 'none';
        document.getElementById('installmentSection').style.display = 'none';
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }

    // Success notification
    window.showAwsSuccess = function(message) {
        const box = document.getElementById('awsSuccess');
        box.querySelector('.aws-alert-text').innerHTML = "<strong>Success:</strong> " + message;
        box.classList.remove('d-none');
        setTimeout(() => {
            box.classList.add('d-none');
        }, 3500);
    };

    // Preview functions
    window.showPreview = function() {
        const formatDate = s => s ? new Date(s).toLocaleDateString('en-IN', {
            day: '2-digit', month: 'long', year: 'numeric'
        }) : '—';
        const formatCurrency = a => a ? '₹' + parseFloat(a).toLocaleString('en-IN') : '₹0';

        const getVal = id => {
            const el = document.getElementById(id);
            return el ? el.value : '';
        };

        // Client & debtor info
        document.getElementById('previewClientName').textContent = getVal('clientSearchInput') || 'No data';
        document.getElementById('previewDebtorName').textContent = getVal('debtorName') || 'No data';
        document.getElementById('previewContact').innerHTML = `<i class="fas fa-phone"></i> ${getVal('contactNumber') || 'No data'}`;
        document.getElementById('previewWhatsapp').innerHTML = `<i class="fab fa-whatsapp"></i> ${getVal('whatsappNumber') || 'No data'}`;
        document.getElementById('previewIdCard').textContent = getVal('idCardNumber') || 'No data';
        document.getElementById('previewOccupation').textContent = getVal('occupation') || 'No data';
        document.getElementById('previewAddress').innerHTML = getVal('address') ? getVal('address').replace(/\n/g, '<br>') : 'No data';

        // Loan details
        document.getElementById('previewLoanAmount').textContent = formatCurrency(getVal('loanAmount'));
        const loanType = document.querySelector('input[name="loanType"]:checked')?.value;
        document.getElementById('previewLoanType').textContent = ({ personal: 'Personal Loan', business: 'Business Loan' }[loanType] || 'Not specified');
        document.getElementById('previewDateTaken').textContent = formatDate(getVal('dateTaken'));
        document.getElementById('previewDueDate').textContent = formatDate(getVal('dueDate'));
        document.getElementById('previewLoanReason').textContent = getVal('loanReason') || 'No data';

        const paymentMode = document.querySelector('input[name="paymentMode"]:checked')?.value;
        document.getElementById('previewPaymentMode').textContent = ({ full: 'Full Payment', installment: 'Installments' }[paymentMode] || 'Not specified');

        // Documents list
        const docContainer = document.getElementById('previewDocuments');
        docContainer.innerHTML = '';
        const files = [
            { id: 'identityProof', name: 'Identity Proof' },
            { id: 'businessProof', name: 'Business Proof' },
            { id: 'addressProof', name: 'Address Proof' },
            { id: 'debtorPhoto', name: 'Debtor Photo/Video' }
        ];

        let hasFile = false;
        files.forEach(f => {
            const input = document.getElementById(f.id);
            if (input && input.files[0]) {
                hasFile = true;
                const file = input.files[0];
                const li = document.createElement('li');
                li.innerHTML = `<i class="fas fa-file"></i> ${file.name}`;
                docContainer.appendChild(li);
            }
        });
        if (!hasFile) {
            docContainer.innerHTML = '<li>No documents uploaded</li>';
        }

        // Installment preview
        const instContainer = document.getElementById('previewInstallments');
        instContainer.innerHTML = '';
        if (paymentMode === 'installment') {
            const items = document.querySelectorAll('.installment-item');
            if (!items.length) {
                instContainer.innerHTML = '<div class="empty-value">No installment schedule</div>';
            } else {
                items.forEach((item, i) => {
                    const amountVal = item.querySelector('.installment-amount')?.value || '0';
                    const dateVal = item.querySelector('.installment-date')?.value || '';
                    const statusVal = item.querySelector('.installment-status')?.value || 'Pending';

                    const block = document.createElement('div');
                    block.className = 'installment-preview-block';
                    block.innerHTML = `
                        <div class="inst-line">
                            <span>Installment ${i + 1}</span>
                            <span class="inst-amount">${formatCurrency(amountVal)}</span>
                        </div>
                        <div class="inst-meta">
                            <span>Date: ${formatDate(dateVal)}</span>
                            <span>Status: ${statusVal}</span>
                        </div>
                    `;
                    instContainer.appendChild(block);
                });
            }
        } else {
            instContainer.innerHTML = '<div class="empty-value">Full Payment – No installments</div>';
        }

        // Debtor photo preview
        const photoInput = document.getElementById('debtorPhoto');
        const previewImg = document.getElementById('previewDebtorPhoto');
        if (photoInput && photoInput.files[0] && previewImg) {
            const reader = new FileReader();
            reader.onload = e => (previewImg.src = e.target.result);
            reader.readAsDataURL(photoInput.files[0]);
        } else if (previewImg) {
            previewImg.src = 'https://placehold.co/280x280?text=No+Photo';
        }

        // Internal notes
        const notesVal = getVal('notes');
        const notesContainer = document.getElementById('previewInternalNotes');
        if (notesContainer) {
            notesContainer.innerHTML = notesVal && notesVal.trim() ? notesVal.replace(/\n/g, '<br>') : 'No notes provided';
        }

        // Show modal
        document.getElementById('previewModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    };

    window.closePreviewModal = function() {
        document.getElementById('previewModal').classList.remove('show');
        document.body.style.overflow = '';
    };

    window.printPreview = function() {
        window.print();
    };

    window.downloadAsPDF = function() {
        const btn = document.querySelector('.preview-sidebar .btn-primary');
        if (!btn) return;
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
        btn.disabled = true;

        const content = document.querySelector('.modal-body').cloneNode(true);
        const temp = document.createElement('div');
        temp.style.position = 'fixed';
        temp.style.left = '-9999px';
        temp.style.width = '210mm';
        temp.style.padding = '15mm';
        temp.style.background = 'white';
        temp.appendChild(content);
        document.body.appendChild(temp);

        html2canvas(temp, { scale: 2, useCORS: true }).then(canvas => {
            document.body.removeChild(temp);
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
            const width = pdf.internal.pageSize.getWidth();
            pdf.addImage(imgData, 'PNG', 10, 10, width - 20, 0);
            const name = (document.getElementById('debtorName').value || 'debtor').replace(/\s+/g, '-');
            pdf.save(`${name}-debtor-info.pdf`);
            btn.innerHTML = orig;
            btn.disabled = false;
        }).catch(() => {
            btn.innerHTML = orig;
            btn.disabled = false;
            alert('PDF generation failed');
        });
    };

    // Close modal on overlay click
    document.getElementById('previewModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closePreviewModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePreviewModal();
        }
    });

    // Initialize UI
    updateUI();
})();
</script>
@endpush