<fieldset class="admin-fieldset">
    <legend class="admin-fieldset-title">FAQ page header</legend>
    <p class="admin-help mb-3">Questions and answers are edited under <strong>FAQs</strong> in the sidebar. Set the page title and intro here.</p>
    <div>
        <label class="admin-label">Page title</label>
        <input class="admin-input" name="faqs[title]" value="{{ $f('title') }}" required>
    </div>
    <div>
        <label class="admin-label">Intro paragraph</label>
        <textarea class="admin-textarea" name="faqs[intro]" rows="3" required>{{ $f('intro') }}</textarea>
    </div>
</fieldset>
