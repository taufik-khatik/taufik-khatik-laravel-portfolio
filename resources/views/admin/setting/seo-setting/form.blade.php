
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
                <small class="form-text text-muted">Keep this under 60 characters for best results.</small>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="description" class="col-form-label text-md-right col-12 col-md-3">SEO Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="description" name="description" class="form-control" style="height: 100px">{{ $seo->description ?? old('description') }}</textarea>
                <small class="form-text text-muted">Keep this under 160 characters and include keywords for best results.</small>
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
                <small class="form-text text-muted">Keep this under 90 characters for best results.</small>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="og_description" class="col-form-label text-md-right col-12 col-md-3">OG Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="og_description" name="og_description" class="form-control" style="height: 100px">{{ $seo->og_description ?? old('og_description') }}</textarea>
                <small class="form-text text-muted">Keep this under 200 characters for best results.</small>
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
                <small class="form-text text-muted">Keep this under 70 characters for best results.</small>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="twitter_description" class="col-form-label text-md-right col-12 col-md-3">Twitter Description<span class="text-danger">*</span></label>
            <div class="col-12 col-md-7">
                <textarea id="twitter_description" name="twitter_description" class="form-control" style="height: 100px">{{ $seo->twitter_description ?? old('twitter_description') }}</textarea>
                <small class="form-text text-muted">Keep this under 200 characters for best results.</small>
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

        // Function to toggle OG section
        function toggleOgSection() {
            const isChecked = ogToggle.checked;
            ogDiv.style.display = isChecked ? 'block' : 'none';

            // Clear inputs when hiding
            if (!isChecked) {
                const inputs = ogDiv.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.value = '';
                });
            }
        }

        // Function to toggle Twitter section
        function toggleTwitterSection() {
            const isChecked = twitterToggle.checked;
            twitterDiv.style.display = isChecked ? 'block' : 'none';

            // Clear inputs when hiding
            if (!isChecked) {
                const inputs = twitterDiv.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.value = '';
                });
            }
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
    });
</script>
@endpush
