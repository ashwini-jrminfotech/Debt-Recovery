

<?php $__env->startPush('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="form-header">
    <h1>Add New Agent</h1>
    <div class="progress-container">
        <div class="step-text" id="stepText">
            <span>Step 1: Agent Details</span>
            <span>0% Completed</span>
        </div>
        <div class="progress-track">
            <div class="progress-fill" id="progressFill"></div>
        </div>
    </div>
</div>

<form id="multiForm" action="<?php echo e(route('agents.store')); ?>" method="POST" enctype="multipart/form-data" novalidate>
    <?php echo csrf_field(); ?>
    <div class="form-body">

        <!-- SECTION 1: Agent Details -->
        <section class="section active" data-step="1">
            <div class="section-title"><i class="fas fa-user-tie"></i> Agent Details</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Agent ID *</label>
                    <div class="input-wrapper">
                        <input id="agentId" name="agentId" type="text" required placeholder="e.g. AGT001" />
                        <i class="fas fa-hashtag"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Agent Full Name *</label>
                    <div class="input-wrapper">
                        <input id="agentName" name="agentName" type="text" required placeholder="e.g. John Doe" />
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Identity Card Number *</label>
                    <div class="input-wrapper">
                        <input id="agentIdCard" name="agentIdCard" type="text" required placeholder="Aadhar / PAN / Passport No." />
                        <i class="fas fa-id-card"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Contact Number *</label>
                    <div class="input-wrapper">
                        <input id="agentPhone" name="agentPhone" type="text" inputmode="numeric" pattern="[0-9]{10,12}" required placeholder="e.g. 9876543210" />
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>WhatsApp Number</label>
                    <div class="input-wrapper">
                        <input id="agentWhatsapp" name="agentWhatsapp" type="text" inputmode="numeric" pattern="[0-9]{10,12}" placeholder="e.g. 9876543210" />
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <div class="input-wrapper">
                        <input id="agentEmail" name="agentEmail" type="email" placeholder="agent@example.com" />
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="input-group full-width">
                    <label>Address</label>
                    <div class="input-wrapper">
                        <textarea id="agentAddress" name="agentAddress" placeholder="Complete address with city and pincode..."></textarea>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: Bank Details -->
        <section class="section" data-step="2">
            <div class="section-title"><i class="fas fa-university"></i> Bank Account Details</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Account Holder Name *</label>
                    <div class="input-wrapper">
                        <input id="accountHolderName" name="accountHolderName" type="text" required placeholder="As per bank records" />
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Bank Name *</label>
                    <div class="input-wrapper">
                        <input id="bankName" name="bankName" type="text" required placeholder="e.g. State Bank of India" />
                        <i class="fas fa-landmark"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Account Number *</label>
                    <div class="input-wrapper">
                        <input id="accountNumber" name="accountNumber" type="text" required placeholder="Enter bank account number" />
                        <i class="fas fa-credit-card"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Confirm Account Number *</label>
                    <div class="input-wrapper">
                        <input id="confirmAccountNumber" name="confirmAccountNumber" type="text" required placeholder="Re-enter account number" />
                        <i class="fas fa-credit-card"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>IFSC Code *</label>
                    <div class="input-wrapper">
                        <input id="ifscCode" name="ifscCode" type="text" required placeholder="e.g. SBIN0001234" />
                        <i class="fas fa-barcode"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Branch Name *</label>
                    <div class="input-wrapper">
                        <input id="branchName" name="branchName" type="text" required placeholder="Branch / City" />
                        <i class="fas fa-map-pin"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>UPI ID (Optional)</label>
                    <div class="input-wrapper">
                        <input id="upiId" name="upiId" type="text" placeholder="e.g. example@upi" />
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Account Type *</label>
                    <div class="input-wrapper">
                        <select id="accountType" name="accountType" required>
                            <option value="">Select Account Type</option>
                            <option value="savings">Savings Account</option>
                            <option value="current">Current Account</option>
                        </select>
                        <i class="fas fa-wallet"></i>
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
            <button type="button" class="btn btn-ghost" id="saveDraft">
                <i class="fas fa-save"></i> Save Draft
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
        <strong>Success:</strong> Agent has been added successfully.
    </div>
</div>

<?php $__env->startPush('custom-scripts'); ?>
<script>
    function showAwsSuccess(message) {
        const box = document.getElementById('awsSuccess');
        box.querySelector('.aws-alert-text').innerHTML =
            "<strong>Success:</strong> " + message;

        box.classList.remove('d-none');

        setTimeout(() => {
            box.classList.add('d-none');
        }, 3500);
    }

    (function(){
        const sections = Array.from(document.querySelectorAll('.section'));
        const total = sections.length;
        let current = 0;

        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const progressFill = document.getElementById('progressFill');
        const stepText = document.getElementById('stepText');
        const form = document.getElementById('multiForm');

        function updateUI() {
            sections.forEach((s, i) => s.classList.toggle('active', i === current));

            // Progress bar
            progressFill.style.width = ((current) / (total - 1)) * 100 + '%';

            // Step text
            const stepTitle = sections[current].querySelector('.section-title').innerText;
            const completed = Math.round(((current + 1) / total) * 100);
            stepText.innerHTML = `<span>Step ${current+1}: ${stepTitle}</span> <span>${completed}% Completed</span>`;

            // Buttons
            prevBtn.disabled = current === 0;
            nextBtn.innerHTML = current === total-1 ? 'Submit Agent <i class="fas fa-check"></i>' : 'Next <i class="fas fa-arrow-right"></i>';
        }

        function validateSection(idx) {
            const sec = sections[idx];
            const requiredFields = Array.from(sec.querySelectorAll('[required]'));
            let isValid = true;

            requiredFields.forEach(f => {
                if(f.type === 'file') return;
                if(!f.checkValidity()){
                    f.reportValidity();
                    isValid = false;
                    f.style.borderColor = "#ef4444";
                    f.addEventListener('input', () => f.style.borderColor = "", { once: true });
                }
            });

            // Account number confirmation validation (Step 2)
            if(sec.dataset.step === '2' && isValid) {
                const accNum = document.getElementById('accountNumber').value;
                const confirmAccNum = document.getElementById('confirmAccountNumber').value;
                if(accNum !== confirmAccNum) {
                    const confirmField = document.getElementById('confirmAccountNumber');
                    confirmField.style.borderColor = "#ef4444";
                    alert('Account numbers do not match. Please verify.');
                    isValid = false;
                }
            }

            return isValid;
        }

        nextBtn.addEventListener('click', () => {
            if(current < total-1){
                if(!validateSection(current)) return;
                current++;
                updateUI();
                window.scrollTo({top: 0, behavior: 'smooth'});
            } else {
                if(!validateSection(current)) return;
                nextBtn.disabled = true;
                nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                setTimeout(() => {
                    // Submit via AJAX or form.submit()
                    form.submit();
                }, 1000);
            }
        });

        prevBtn.addEventListener('click', () => {
            if(current > 0){
                current--;
                updateUI();
                window.scrollTo({top: 0, behavior: 'smooth'});
            }
        });

        // Save Draft
        document.getElementById('saveDraft').addEventListener('click', () => {
            // Collect all form data
            const formData = new FormData(form);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
            
            // Save to localStorage
            localStorage.setItem('agentDraft', JSON.stringify(data));
            showAwsSuccess('Draft saved successfully!');
        });

        // Load Draft on page load
        function loadDraft() {
            const draft = localStorage.getItem('agentDraft');
            if(draft) {
                const data = JSON.parse(draft);
                Object.keys(data).forEach(key => {
                    const field = document.querySelector(`[name="${key}"]`);
                    if(field) {
                        field.value = data[key];
                    }
                });
            }
        }

        // Clear draft after successful submission
        form.addEventListener('submit', () => {
            localStorage.removeItem('agentDraft');
        });

        // Initialize
        loadDraft();
        updateUI();
    })();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/pages/admin/agentForm.blade.php ENDPATH**/ ?>