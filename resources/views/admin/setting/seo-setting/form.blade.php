
<div class="card border shadow-sm mb-4">
    <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">SEO Page Setting</h5>
            <small class="text-muted">Basic SEO page metadata</small>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row mb-4">
            <label for="page_slug" class="col-form-label text-md-right col-12 col-md-3">SEO Page Slug<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="page_slug" type="text" name="page_slug" class="form-control" value="{{ $seo->page_slug ?? old('page_slug') }}">
                <small class="form-text text-muted">Before adding slug, ensure it corresponds to an existing route in web.php. Then Use a clean slug like <code>home</code>, <code>blog</code> or <code>show.blog</code>.</small>
            </div>
        </div>
    </div>
</div>

<div class="card border shadow-sm mb-4">
    <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">General SEO Settings</h5>
            <small class="text-muted">Title, description and keywords for search engines.</small>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row mb-4">
            <label for="title" class="col-form-label text-md-right col-12 col-md-3">SEO Title<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="title" type="text" name="title" class="form-control" value="{{ $seo->title ?? old('title') }}">
                <small class="form-text text-muted">Keep this <code>between 30-60 characters</code> for best results.</small>

            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="description" class="col-form-label text-md-right col-12 col-md-3">SEO Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="description" name="description" class="form-control" style="height: 100px">{{ $seo->description ?? old('description') }}</textarea>
                <small class="form-text text-muted">Keep this <code>between 70-155 characters</code> for best results.</small>

            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="keywords" class="col-form-label text-md-right col-12 col-md-3">SEO Keywords<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="keywords" type="text" name="keywords" class="form-control" value="{{ $seo->keywords ?? old('keywords') }}">
                <small class="form-text text-muted">Keywords will be comma separated.</small>
            </div>
        </div>
    </div>
</div>

<div class="card border shadow-sm mb-4">
    <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Open Graph (OG) Tags Settings</h5>
            <small class="text-muted">Social sharing metadata for Facebook, LinkedIn, WhatsApp and others.</small>
        </div>
        <div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="og_enabled_toggle" name="og_enabled" {{ isset($seo) && $seo->og_enabled ? 'checked' : '' }}>
                <label class="custom-control-label" for="og_enabled_toggle">Enable OG Tags</label>
            </div>
        </div>
    </div>
    <div class="card-body" id="og_enabled_div">
        <div class="form-group row mb-4">
            <label for="og_title" class="col-form-label text-md-right col-12 col-md-3">OG Title<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="og_title" type="text" name="og_title" class="form-control" value="{{ $seo->og_title ?? old('og_title') }}">
                <small class="form-text text-muted">Keep this <code>between 40-90 characters</code> for best results.</small>

            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="og_description" class="col-form-label text-md-right col-12 col-md-3">OG Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="og_description" name="og_description" class="form-control" style="height: 100px">{{ $seo->og_description ?? old('og_description') }}</textarea>
                <small class="form-text text-muted">Keep this <code>between 60-200 characters</code> for best results (first 110 are key).</small>
            </div>

        </div>

        <div class="form-group row mb-0">
            <label for="og_image" class="col-form-label text-md-right col-12 col-md-3">OG Image URL<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="og_image" type="text" name="og_image" class="form-control" value="{{ $seo->og_image ?? old('og_image') }}" placeholder="https://example.com/image.jpg">
                <small class="form-text text-muted">Image dimensions should be <code>1200x630 pixels</code> and size should be <code>less than 300 KB</code> for best results.</small>
            </div>
        </div>
    </div>
</div>

<div class="card border shadow-sm mb-4">
    <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Twitter Cards Settings</h5>
            <small class="text-muted">Metadata for Twitter link previews.</small>
        </div>
        <div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="twitter_enabled_toggle" name="twitter_enabled" {{ isset($seo) && $seo->twitter_enabled ? 'checked' : '' }}>
                <label class="custom-control-label" for="twitter_enabled_toggle">Enable Twitter Cards</label>
            </div>
        </div>
    </div>
    <div class="card-body" id="twitter_enabled_div">
        <div class="form-group row mb-4">
            <label for="twitter_title" class="col-form-label text-md-right col-12 col-md-3">Twitter Title<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="twitter_title" type="text" name="twitter_title" class="form-control" value="{{ $seo->twitter_title ?? old('twitter_title') }}">
                <small class="form-text text-muted">Keep this <code>between 35-70 characters</code> for best results.</small>

            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="twitter_description" class="col-form-label text-md-right col-12 col-md-3">Twitter Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="twitter_description" name="twitter_description" class="form-control" style="height: 100px">{{ $seo->twitter_description ?? old('twitter_description') }}</textarea>
                <small class="form-text text-muted">Keep this <code>between 50-200 characters</code> for best results.</small>
            </div>

        </div>

        <div class="form-group row mb-0">
            <label for="twitter_image" class="col-form-label text-md-right col-12 col-md-3">Twitter Image URL<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="twitter_image" type="text" name="twitter_image" class="form-control" value="{{ $seo->twitter_image ?? old('twitter_image') }}" placeholder="https://example.com/image.jpg">
                <small class="form-text text-muted">Image dimensions should be <code>1200x675 pixels</code> and size should be <code>less than 300 KB</code> for best results.</small>
            </div>
        </div>
    </div>
</div>

<div class="card border shadow-sm mb-4" id="advanced_seo_div">
    <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Advanced SEO Settings</h5>
            <small class="text-muted">Canonical and robots meta settings.</small>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row mb-4">
            <label for="canonical_url" class="col-form-label text-md-right col-12 col-md-3">Canonical URL</label>
            <div class="col-12 col-md-7">
                <input id="canonical_url" type="text" name="canonical_url" class="form-control" value="{{ $seo->canonical_url ?? old('canonical_url') }}">
                <small class="form-text text-muted">Set the canonical page URL for avoiding duplicate content issues.</small>
            </div>
        </div>

        <div class="form-group row mb-0">
            <label for="robots" class="col-form-label text-md-right col-12 col-md-3">Robots<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <input id="robots" type="text" name="robots" class="form-control" value="{{ $seo->robots ?? old('robots') }}" placeholder="e.g. index,follow">
                <small class="form-text text-muted">Use comma-separated values to only include <code>index/noindex,follow/nofollow</code>.</small>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12 col-md-8 offset-md-3">
        <button type="submit" class="btn btn-primary btn-lg me-2">
            <i class="fas fa-save"></i> Save Settings
        </button>
        <button type="button" id="preview-btn" class="btn btn-info btn-lg">
            <i class="fas fa-eye"></i> Preview & Validate SEO Settings
        </button>
    </div>
</div>

<!-- Preview Section -->
<div id="preview-section" style="display: none;">
    <div class="row mb-3">
        <div class="col-12">
            <div class="btn-group" role="group" aria-label="Preview tabs">
                <button type="button" class="btn btn-outline-secondary active" id="preview-tab-seo">SEO</button>
                <button type="button" class="btn btn-outline-secondary" id="preview-tab-og">OG</button>
                <button type="button" class="btn btn-outline-secondary" id="preview-tab-twitter">Twitter</button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- SEO Preview Panel -->
        <div class="col-12 mb-4 preview-panel" data-preview="seo">
            <div class="card border shadow-sm">
                <div class="card-header bg-info text-white">
                    <h6 class="card-title mb-0"><i class="fab fa-google"></i> Search Engine Preview</h6>
                </div>
                <div class="card-body">
                    <div id="seo-preview">
                        <!-- SEO preview content will be inserted here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- OG Preview Panel -->
        <div class="col-12 mb-4 preview-panel d-none" data-preview="og">
            <div class="card border shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0"><i class="fab fa-facebook"></i> Open Graph Preview</h6>
                    <div class="btn-group btn-group-sm" role="group" aria-label="OG networks">
                        <button type="button" class="btn btn-outline-light active og-network-btn" data-network="facebook" id="og-network-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" class="btn btn-outline-light og-network-btn" data-network="whatsapp" id="og-network-whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button type="button" class="btn btn-outline-light og-network-btn" data-network="x" id="og-network-x">
                            <i class="fab fa-x-twitter">X</i>
                        </button>
                        <button type="button" class="btn btn-outline-light og-network-btn" data-network="linkedin" id="og-network-linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="og-preview" class="d-flex justify-content-center">
                        <!-- OG preview content will be inserted here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Twitter Preview Panel -->
        <div class="col-12 mb-4 preview-panel d-none" data-preview="twitter">
            <div class="card border shadow-sm">
                <div class="card-header bg-info text-white">
                    <h6 class="card-title mb-0"><i class="fab fa-twitter"></i> Twitter Card Preview</h6>
                </div>
                <div class="card-body">
                    <div id="twitter-preview">
                        <!-- Twitter preview content will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set initial toggle states based on existing data
        const ogEnabled = {{ isset($seo) && $seo->og_enabled ? 'true' : 'false' }};
        const twitterEnabled = {{ isset($seo) && $seo->twitter_enabled ? 'true' : 'false' }};

        const ogToggle = document.getElementById('og_enabled_toggle');
        const ogDiv = document.getElementById('og_enabled_div');
        const twitterToggle = document.getElementById('twitter_enabled_toggle');
        const twitterDiv = document.getElementById('twitter_enabled_div');

        // Preview functionality
        const previewBtn = document.getElementById('preview-btn');
        const previewSection = document.getElementById('preview-section');
        const previewTabSeo = document.getElementById('preview-tab-seo');
        const previewTabOg = document.getElementById('preview-tab-og');
        const previewTabTwitter = document.getElementById('preview-tab-twitter');
        const previewPanels = document.querySelectorAll('.preview-panel');
        const ogNetworkButtons = document.querySelectorAll('.og-network-btn');
        let activeOgNetwork = 'facebook';

        // Function to toggle OG section
        function toggleOgSection() {
            const isChecked = ogToggle.checked;
            ogDiv.style.display = isChecked ? 'block' : 'none';
            previewTabOg.style.display = isChecked ? 'inline-block' : 'none';

            // // Clear inputs when hiding
            // if (!isChecked) {
            //     const inputs = ogDiv.querySelectorAll('input, textarea');
            //     inputs.forEach(input => {
            //         input.value = '';
            //     });
            // }
        }

        // Function to toggle Twitter section
        function toggleTwitterSection() {
            const isChecked = twitterToggle.checked;
            twitterDiv.style.display = isChecked ? 'block' : 'none';
            previewTabTwitter.style.display = isChecked ? 'inline-block' : 'none';

            // // Clear inputs when hiding
            // if (!isChecked) {
            //     const inputs = twitterDiv.querySelectorAll('input, textarea');
            //     inputs.forEach(input => {
            //         input.value = '';
            //     });
            // }
        }

        // Set initial states
        ogToggle.checked = ogEnabled;
        twitterToggle.checked = twitterEnabled;

        // Apply initial visibility
        toggleOgSection();
        toggleTwitterSection();

        // Add event listeners
        ogToggle.addEventListener('change', toggleOgSection);
        twitterToggle.addEventListener('change', toggleTwitterSection);

        // Character limits with min and max
        const limits = {
            title: { min: 30, max: 60 },
            description: { min: 70, max: 155 },
            og_title: { min: 40, max: 90 },
            og_description: { min: 60, max: 200 },
            twitter_title: { min: 35, max: 70 },
            twitter_description: { min: 50, max: 200 }
        };

        // Function to validate field
        function validateField(fieldId, limit) {
            const field = document.getElementById(fieldId);
            if (!field) return true;
            const value = field.value;
            const length = value.length;
            const small = field.parentNode.querySelector('.form-text');
            const min = limit.min;
            const max = limit.max;

            // Remove existing validation classes
            field.classList.remove('is-valid', 'is-invalid');

            if (length >= min && length <= max) {
                field.classList.add('is-valid');
                if (small) {
                    small.innerHTML = `<span class="text-success">${length}/${max} characters (Good!)</span>`;
                }
                return true;
            } else {
                field.classList.add('is-invalid');
                if (length > max) {
                    const over = length - max;
                    if (small) {
                        small.innerHTML = `<span class="text-danger">${length}/${max} characters (${over} over limit)</span>`;
                    }
                } else {
                    const under = min - length;
                    if (small) {
                        small.innerHTML = `<span class="text-danger">${length}/${max} characters (${under} under minimum)</span>`;
                    }
                }
                return false;
            }
        }

        // Function to activate preview panel
        function showPreviewPanel(type) {
            previewPanels.forEach(panel => {
                panel.classList.toggle('d-none', panel.dataset.preview !== type);
            });
            previewTabSeo.classList.toggle('active', type === 'seo');
            previewTabOg.classList.toggle('active', type === 'og');
            previewTabTwitter.classList.toggle('active', type === 'twitter');
        }

        // Function to generate SEO preview
        function generateSEOPreview() {
            const title = document.getElementById('title').value || 'Your Page Title';
            const description = document.getElementById('description').value || 'Your page description will appear here...';
            const url = window.location.origin + '/' + (document.getElementById('page_slug').value || 'your-page');

            return `
                <div class="seo-preview">
                    <div class="seo-title" style="color: #1a0dab; font-size: 18px; font-weight: 400; line-height: 1.3; margin-bottom: 4px; text-decoration: none;">
                        ${title.length > 60 ? title.substring(0, 60) + '...' : title}
                    </div>
                    <div class="seo-url" style="color: #006621; font-size: 14px; line-height: 1.4; margin-bottom: 2px;">
                        ${url}
                    </div>
                    <div class="seo-description" style="color: #545454; font-size: 14px; line-height: 1.4;">
                        ${description.length > 155 ? description.substring(0, 155) + '...' : description}
                    </div>

                </div>
            `;
        }

        // Function to generate OG preview
        function generateOGPreview(network = 'facebook') {
            const title = document.getElementById('og_title').value || 'Your Open Graph Title';
            const description = document.getElementById('og_description').value || 'Your open graph description will appear here...';
            const image = document.getElementById('og_image').value;
            const url = window.location.origin + '/' + (document.getElementById('page_slug').value || 'your-page');
            const smallDescription = description.length > 110 ? description.substring(0, 110) + '...' : description;

            const imageBlock = image
                ? `<img src="${image}" alt="OG Image" style="width: 100%; height: 200px; object-fit: cover;">`
                : `<div style="width: 100%; height: 200px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999;">No Image</div>`;

            let networkHeader = '<div style="display: flex; align-items: center; gap: 8px; font-weight: 700; color: #1877F2;"><i class="fab fa-facebook-f"></i> Facebook</div>';
            let cardBg = '#fff';
            let titleColor = '#111';
            let descriptionColor = '#555';
            let urlColor = '#006621';
            let headerBg = '#f7f7f7';

            if (network === 'whatsapp') {
                networkHeader = '<div style="display: flex; align-items: center; gap: 8px; font-weight: 700; color: #25D366;"><i class="fab fa-whatsapp"></i> WhatsApp</div>';
                cardBg = '#f8fff4';
                descriptionColor = '#2f4f2f';
                urlColor = '#25D366';
            } else if (network === 'x') {
                networkHeader = '<div style="display: flex; align-items: center; gap: 8px; font-weight: 700; color: #1DA1F2;"><i class="fab fa-x-twitter"></i> X</div>';
                cardBg = '#15202b';
                titleColor = '#fff';
                descriptionColor = '#8899a6';
                urlColor = '#8899a6';
                headerBg = '#1b2836';
            } else if (network === 'linkedin') {
                networkHeader = '<div style="display: flex; align-items: center; gap: 8px; font-weight: 700; color: #0A66C2;"><i class="fab fa-linkedin-in"></i> LinkedIn</div>';
                cardBg = '#eef3fb';
                descriptionColor = '#172b4d';
                urlColor = '#0A66C2';
            }

            return `
                <div class="og-preview" style="border: 1px solid #ddd; border-radius: 12px; overflow: hidden; max-width: 520px; background: ${cardBg};">
                    <div style="padding: 14px; background: ${headerBg};">${networkHeader}</div>
                    ${imageBlock}
                    <div style="padding: 14px;">
                        <div style="font-weight: 700; font-size: 16px; color: ${titleColor}; margin-bottom: 6px;">
                            ${title.length > 90 ? title.substring(0, 90) + '...' : title}
                        </div>
                        <div style="font-size: 14px; color: ${descriptionColor}; line-height: 1.5; margin-bottom: 8px;">
                            ${smallDescription}
                        </div>
                        <div style="font-size: 13px; color: ${urlColor};">
                            ${url}
                        </div>
                    </div>
                </div>
            `;
        }

        // Function to generate Twitter preview
        function generateTwitterPreview() {
            const title = document.getElementById('twitter_title').value || 'Your Twitter Card Title';
            const description = document.getElementById('twitter_description').value || 'Your twitter card description will appear here...';
            const image = document.getElementById('twitter_image').value;

            return `
                <div class="twitter-preview" style="border: 1px solid #ddd; border-radius: 12px; overflow: hidden; max-width: 500px; background: #fff;">
                    <div style="padding: 12px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <div style="flex: 1;">
                                <div style="font-weight: 700; font-size: 15px; color: #14171a; line-height: 1.3; margin-bottom: 4px;">
                                    ${title.length > 70 ? title.substring(0, 70) + '...' : title}
                                </div>
                                <div style="font-size: 13px; color: #657786; line-height: 1.4;">
                                    ${description.length > 200 ? description.substring(0, 200) + '...' : description}
                                </div>
                            </div>
                            ${image ? `<img src="${image}" alt="Twitter Image" style="width: 80px; height: 80px; border-radius: 12px; object-fit: cover;">` :
                                     `<div style="width: 80px; height: 80px; border-radius: 12px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999; font-size: 10px;">No Image</div>`}
                        </div>
                    </div>
                </div>
            `;
        }

        // Preview button click handler
        previewBtn.addEventListener('click', function() {
            // Validate all fields
            validateField('title', limits.title);
            validateField('description', limits.description);
            validateField('og_title', limits.og_title);
            validateField('og_description', limits.og_description);
            validateField('twitter_title', limits.twitter_title);
            validateField('twitter_description', limits.twitter_description);

            // Generate previews
            document.getElementById('seo-preview').innerHTML = generateSEOPreview();
            document.getElementById('og-preview').innerHTML = generateOGPreview(activeOgNetwork);
            document.getElementById('twitter-preview').innerHTML = generateTwitterPreview();

            // Show preview section and default to SEO preview
            previewSection.style.display = 'block';
            showPreviewPanel('seo');

            // Scroll to preview section
            setTimeout(() => {
                previewSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);

            // Change button text temporarily
            const originalText = previewBtn.innerHTML;
            previewBtn.innerHTML = '<i class="fas fa-check"></i> Preview Updated!';
            previewBtn.classList.remove('btn-info');
            previewBtn.classList.add('btn-success');

            setTimeout(() => {
                previewBtn.innerHTML = originalText;
                previewBtn.classList.remove('btn-success');
                previewBtn.classList.add('btn-info');
            }, 2000);
        });

        previewTabSeo.addEventListener('click', function() {
            document.getElementById('seo-preview').innerHTML = generateSEOPreview();
            showPreviewPanel('seo');
        });

        previewTabOg.addEventListener('click', function() {
            document.getElementById('og-preview').innerHTML = generateOGPreview(activeOgNetwork);
            showPreviewPanel('og');
        });

        previewTabTwitter.addEventListener('click', function() {
            document.getElementById('twitter-preview').innerHTML = generateTwitterPreview();
            showPreviewPanel('twitter');
        });

        ogNetworkButtons.forEach(button => {
            button.addEventListener('click', function() {
                ogNetworkButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                activeOgNetwork = this.dataset.network;
                document.getElementById('og-preview').innerHTML = generateOGPreview(activeOgNetwork);
            });
        });

        // Real-time validation on input
        Object.keys(limits).forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', () => {
                    validateField(fieldId, limits[fieldId]);
                });
            }
        });
    });
</script>
@endpush
