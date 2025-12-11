<?php $__env->startPush('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="form-header">
    <h1>Add New Client</h1>
    <div class="progress-container">
        <div class="step-text" id="stepText">
            <span>Step 1: Basic Details</span>
            <span>0% Completed</span>
        </div>
        <div class="progress-track">
            <div class="progress-fill" id="progressFill"></div>
        </div>
    </div>
</div>

<form id="multiForm" action="<?php echo e(route('clients.store')); ?>" method="POST" enctype="multipart/form-data" novalidate>
 <?php echo csrf_field(); ?>    
<div class="form-body">
        
        <!-- <div class="note-box">
            <i class="fas fa-info-circle"></i>
            <span><strong>Tip:</strong> Required fields are validated automatically. Use the "Upload" section to preview documents before submitting.</span>
        </div> -->

        <!-- SECTION 1 -->
        <section class="section active" data-step="1">
            <div class="section-title"><i class="fas fa-user-circle"></i> Basic Client Information</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Full Name*</label>
                    <div class="input-wrapper">
                        <input id="fullName" name="fullName" type="text" required placeholder="e.g. John Doe" />
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Business Name*</label>
                    <div class="input-wrapper">
                        <input id="fullName" name="fullName" type="text" required placeholder="e.g. John Doe Enterprises" />
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Contact Number *</label>
                    <div class="input-wrapper">
                        <input id="contactNumber" name="contactNumber" type="text" inputmode="numeric" pattern="[0-9]{7,15}" required placeholder="e.g. 9876543210" />
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Email ID *</label>
                    <div class="input-wrapper">
                        <input id="email" name="email" type="email" required placeholder="client@example.com" />
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                 <div class="input-group">
                    <label>Identity Card No.</label>
                    <div class="input-wrapper">
                        <input id="altMobile" name="altMobile" type="text" placeholder="Identity Card No." />
                        <i class="fas id-card"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Whatsapp Mobile</label>
                    <div class="input-wrapper">
                        <input id="altMobile" name="altMobile" type="text" placeholder="Whatsapp" />
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>

                <div class="input-group full-width">
                    <label>Address *</label>
                    <div class="input-wrapper">
                        <textarea id="address" name="address" required placeholder="Full street address..."></textarea>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <label>City *</label>
                    <div class="input-wrapper">
                        <input id="city" name="city" type="text" required />
                        <i class="fas fa-city"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>State *</label>
                    <div class="input-wrapper">
                        <select id="state" name="state" required>
                            <option value="">Select State</option>
                            <option>California</option>
                            <option>Texas</option>
                            <option>New York</option>
                        </select>
                        <i class="fas fa-map"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Pincode *</label>
                    <div class="input-wrapper">
                        <input id="pincode" name="pincode" type="text" inputmode="numeric" required />
                        <i class="fas fa-thumbtack"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2 -->
        <section class="section" data-step="2">
            <div class="section-title"><i class="fas fa-briefcase"></i> Client Type & Source</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Client Type *</label>
                    <div class="input-wrapper">
                        <select id="clientType" name="clientType" required>
                            <option value="">Select Type</option>
                            <option value="individual">Individual</option>
                            <option value="business">Business</option>
                        </select>
                        <i class="fas fa-user-tag"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Source *</label>
                    <div class="input-wrapper">
                        <select id="source" name="source" required>
                            <option value="">How did they find us?</option>
                            <option value="direct">Direct</option>
                            <option value="agent">Agent</option>
                            <option value="website">Website</option>
                            <option value="referral">Referral</option>
                        </select>
                        <i class="fas fa-bullhorn"></i>
                    </div>
                </div>

                <div class="input-group" id="agentField" style="display:none">
                    <label>Select Agent</label>
                    <div class="input-wrapper">
                        <select id="agent" name="agent">
                            <option value="">Choose Agent...</option>
                            <option>Agent 001</option>
                            <option>Agent 002</option>
                        </select>
                        <i class="fas fa-user-secret"></i>
                    </div>
                </div>

                <div class="input-group" id="gstField" style="display:none">
                    <label>GST Number</label>
                    <div class="input-wrapper">
                        <input id="gst" name="gst" type="text" placeholder="For Business Clients" />
                        <i class="fas fa-receipt"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3 -->
        <section class="section" data-step="3">
            <div class="section-title"><i class="fas fa-folder-open"></i> Case Details</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Case Category *</label>
                    <div class="input-wrapper">
                        <select id="caseCategory" name="caseCategory" required>
                            <option value="">Select Category</option>
                            <option>Debt Recovery</option>
                            <option>Scam</option>
                            <option>Cheque Bounce</option>
                        </select>
                        <i class="fas fa-filter"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Expected Recovery Amount *</label>
                    <div class="input-wrapper">
                        <input id="amount" name="amount" type="number" min="0" required placeholder="0.00" />
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="input-group full-width">
                    <label>Case Description *</label>
                    <div class="input-wrapper">
                        <textarea id="caseDesc" name="caseDesc" required placeholder="Detailed explanation of the case..."></textarea>
                        <i class="fas fa-align-left"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Preferred Method *</label>
                    <div class="input-wrapper">
                        <select id="method" name="method" required>
                            <option value="">Select Method</option>
                            <option>Legal</option>
                            <option>Soft Recovery</option>
                            <option>Both</option>
                        </select>
                        <i class="fas fa-gavel"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Urgency Level *</label>
                    <div class="input-wrapper">
                        <select id="urgency" name="urgency" required>
                            <option value="">Select Level</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4 -->
        <section class="section" data-step="4">
            <div class="section-title"><i class="fas fa-file-upload"></i> Documents</div>
            <div class="fields-grid">
                <div class="input-group full-width">
                    <label>Upload ID & Address Proof *</label>
                    <div class="file-upload-zone" id="dropZone">
                        <input id="fileInput" name="files" type="file" multiple accept="image/*,.pdf,.doc,.docx" />
                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <p style="font-weight:600; margin:0;">Click to upload or drag and drop</p>
                        <p class="helper-text">SVG, PNG, JPG or PDF (max. 10MB)</p>
                    </div>
                    <div class="upload-preview-list" id="uploadPreview"></div>
                </div>
            </div>
        </section>

        <!-- SECTION 5 -->
        <section class="section" data-step="5">
            <div class="section-title"><i class="fas fa-lock"></i> Internal Use Only</div>
            <div class="fields-grid">
                <div class="input-group">
                    <label>Case Assigned To *</label>
                    <div class="input-wrapper">
                        <select id="assignedTo" name="assignedTo" required>
                            <option value="">Select Staff</option>
                            <option>Team Member A</option>
                            <option>Team Member B</option>
                        </select>
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
                <div class="input-group">
                    <label>Case Stage *</label>
                    <div class="input-wrapper">
                        <select id="caseStage" name="caseStage" required>
                            <option value="">Select Stage</option>
                            <option>New</option>
                            <option>Under Review</option>
                            <option>Approved</option>
                        </select>
                        <i class="fas fa-layer-group"></i>
                    </div>
                </div>
                <div class="input-group full-width">
                    <label>Internal Remarks</label>
                    <div class="input-wrapper">
                        <textarea id="remarks" name="remarks" placeholder="Admin notes..."></textarea>
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
        <strong>Success:</strong> Your action was completed.
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
        stepText.innerHTML = `<span>Step ${current+1}: ${stepTitle}</span> <span>${completed}%</span>`;

        // Buttons
        prevBtn.disabled = current === 0;
        nextBtn.innerHTML = current === total-1 ? 'Submit Case <i class="fas fa-check"></i>' : 'Next <i class="fas fa-arrow-right"></i>';
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
                f.addEventListener('input', () => f.style.borderColor = "");
            }
        });

        if(!isValid) return false;

        // File validation for step 4
        if(sec.dataset.step === '4'){
            const preview = document.getElementById('uploadPreview');
            if(preview.children.length < 1){
                alert('Please upload at least 1 document to proceed.');
                return false;
            }
        }

        return true;
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

    // Conditional Fields
    const source = document.getElementById('source');
    const agentField = document.getElementById('agentField');
    const gstField = document.getElementById('gstField');
    const clientType = document.getElementById('clientType');

    source.addEventListener('change', e => {
        agentField.style.display = e.target.value === 'agent' ? 'block' : 'none';
    });
    clientType.addEventListener('change', e => {
        gstField.style.display = e.target.value === 'business' ? 'block' : 'none';
    });

    // File Upload Logic
    const fileInput = document.getElementById('fileInput');
    const uploadPreview = document.getElementById('uploadPreview');
    const dropZone = document.getElementById('dropZone');

    dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('dragover'); });
    dropZone.addEventListener('dragleave', e => { e.preventDefault(); dropZone.classList.remove('dragover'); });

    fileInput.addEventListener('change', handleFiles);

    function handleFiles(e) {
        const files = Array.from(e.target.files);
        files.forEach(file => {
            const item = document.createElement('div');
            item.className = 'file-item';
            item.innerHTML = `
                <i class="fas fa-file-alt" style="color:var(--primary)"></i>
                <div style="flex:1; overflow:hidden;">
                    <div style="font-weight:500; white-space:nowrap; overflow:hidden; text-overflow:ellipsis">${file.name}</div>
                    <div class="file-progress"><div class="file-progress-bar"></div></div>
                </div>
                <i class="fas fa-times" style="cursor:pointer; color:#ef4444"></i>
            `;
            uploadPreview.appendChild(item);

            const removeBtn = item.querySelector('.fa-times');
            removeBtn.addEventListener('click', () => item.remove());

            // Simulate progress
            const bar = item.querySelector('.file-progress-bar');
            let width = 0;
            const interval = setInterval(() => {
                width += Math.random() * 20;
                if(width >= 100){ width = 100; clearInterval(interval); }
                bar.style.width = width + '%';
            }, 150);
        });
        fileInput.value = '';
    }

    // Save Draft
    document.getElementById('saveDraft').addEventListener('click', () => {
        alert('Draft saved!');
    });

    updateUI();
})();
</script>



<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/pages/admin/newclient.blade.php ENDPATH**/ ?>