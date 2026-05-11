<div class="space-y-6">
    <div>
        <h3 class="text-base font-bold" style="color: var(--color-heading);">Color Scheme</h3>
        <p class="text-sm mt-1" style="color: var(--color-text-muted);">Customize the look of this landing page. Changes apply to the public page immediately on save.</p>
    </div>

    @php
    $colors = $content['colors'];
    $fields = [
        'background'      => ['label' => 'Background Color',      'hint' => 'Main page background'],
        'accent'          => ['label' => 'Accent Color',           'hint' => 'Buttons, highlights, icons, pills'],
        'accent_text'     => ['label' => 'Accent Text Color',      'hint' => 'Text on top of accent (e.g. button labels)'],
        'heading_text'    => ['label' => 'Heading Text Color',     'hint' => 'H1, H2, H3 headings'],
        'body_text'       => ['label' => 'Body Text Color',        'hint' => 'Paragraphs and descriptions'],
        'card_background' => ['label' => 'Card Background Color',  'hint' => 'Service cards, testimonial cards'],
        'card_border'     => ['label' => 'Card Border Color',      'hint' => 'Card outlines and dividers'],
    ];
    @endphp

    <div class="grid grid-cols-2 gap-5">
        @foreach($fields as $key => $field)
        <div class="p-4 rounded border" style="border-color: var(--color-border);">
            <label class="block text-sm font-medium mb-1" style="color: var(--color-heading);">{{ $field['label'] }}</label>
            <p class="text-xs mb-3" style="color: var(--color-text-muted);">{{ $field['hint'] }}</p>
            <div class="flex items-center gap-3">
                <input type="color"
                       id="color-picker-ss-{{ $key }}"
                       value="{{ preg_match('/^#[0-9a-fA-F]{6}$/', $colors[$key]) ? $colors[$key] : '#7c3aed' }}"
                       class="h-10 w-14 cursor-pointer rounded border p-0.5"
                       style="border-color: var(--color-border);"
                       oninput="document.getElementById('color-text-ss-{{ $key }}').value = this.value">
                <input type="text"
                       id="color-text-ss-{{ $key }}"
                       name="content[colors][{{ $key }}]"
                       value="{{ old('content.colors.' . $key, $colors[$key]) }}"
                       placeholder="e.g. #7c3aed or rgba(124,58,237,0.1)"
                       class="flex-1 px-3 py-2 text-sm border rounded outline-none font-mono"
                       style="border-color: var(--color-border); border-radius: var(--radius-btn);"
                       oninput="if(/^#[0-9a-fA-F]{6}$/.test(this.value)) document.getElementById('color-picker-ss-{{ $key }}').value = this.value">
            </div>
            <p class="text-xs mt-2" style="color: var(--color-text-muted);">Use hex (#rrggbb) or rgba() for transparency.</p>
        </div>
        @endforeach
    </div>

    {{-- Live preview swatch --}}
    <div class="p-4 rounded border" style="border-color: var(--color-border);">
        <p class="text-xs font-semibold mb-3" style="color: var(--color-text-muted); text-transform: uppercase; letter-spacing: 0.08em;">Preview</p>
        <div class="rounded p-5 flex items-center gap-4 flex-wrap" id="ss-preview-bg" style="background: {{ $colors['background'] }}; border: 1px solid {{ $colors['card_border'] }};">
            <div class="rounded p-3 flex-1 min-w-32" id="ss-preview-card" style="background: {{ $colors['card_background'] }}; border: 1px solid {{ $colors['card_border'] }};">
                <p class="text-sm font-bold mb-1" id="ss-preview-heading" style="color: {{ $colors['heading_text'] }};">Heading Text</p>
                <p class="text-xs" id="ss-preview-body" style="color: {{ $colors['body_text'] }};">Body / description text goes here.</p>
            </div>
            <button type="button" class="px-4 py-2 rounded text-sm font-bold" id="ss-preview-btn"
                    style="background: {{ $colors['accent'] }}; color: {{ $colors['accent_text'] }};">
                CTA Button
            </button>
        </div>
    </div>
</div>

<script>
(function() {
    var map = {
        'background':      'ss-preview-bg',
        'accent':          'ss-preview-btn',
        'accent_text':     'ss-preview-btn',
        'heading_text':    'ss-preview-heading',
        'body_text':       'ss-preview-body',
        'card_background': 'ss-preview-card',
        'card_border':     null,
    };
    var props = {
        'background':      'background',
        'accent':          'background',
        'accent_text':     'color',
        'heading_text':    'color',
        'body_text':       'color',
        'card_background': 'background',
        'card_border':     null,
    };
    @foreach(array_keys($fields) as $key)
    document.getElementById('color-text-ss-{{ $key }}').addEventListener('input', function() {
        var val = this.value;
        var targetId = map['{{ $key }}'];
        var prop = props['{{ $key }}'];
        if (targetId && prop) {
            document.getElementById(targetId).style[prop] = val;
        }
        @if($key === 'card_border')
        document.getElementById('ss-preview-card').style.borderColor = val;
        document.getElementById('ss-preview-bg').style.borderColor = val;
        @endif
    });
    @endforeach
})();
</script>
