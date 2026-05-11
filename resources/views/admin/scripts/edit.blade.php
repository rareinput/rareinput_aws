<x-layouts.admin title="Scripts">

    <div class="admin-page-header flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <button @click="collapsed = !collapsed" type="button" style="background:none;border:none;cursor:pointer;padding:0;color:var(--color-text-muted);display:flex;align-items:center;flex-shrink:0;"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
            <h1 class="text-2xl font-bold" style="color: var(--color-heading);">Tracking Scripts</h1>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.scripts.update') }}">
        @csrf
        @method('PUT')

        <div class="grid gap-8" style="grid-template-columns: 1fr 1fr;">

            {{-- Head Scripts --}}
            <div x-data="{
                scripts: {{ json_encode(count($headScripts) ? $headScripts : [['name' => '', 'code' => '']]) }}
            }">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-base font-bold" style="color: var(--color-heading);">&lt;head&gt; Scripts</h2>
                        <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">Injected just before &lt;/head&gt;. Use for Google Analytics, Search Console verification, etc.</p>
                    </div>
                    <button type="button" @click="scripts.push({name: '', code: ''})"
                            class="text-xs font-semibold px-3 py-1.5 rounded"
                            style="color: var(--color-accent-dark); border: 1px solid var(--color-accent-dark); border-radius: var(--radius-btn);">
                        + Add Script
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(script, index) in scripts" :key="index">
                        <div class="p-4 rounded" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card);">
                            <div class="flex items-center justify-between mb-3">
                                <input type="text"
                                       :name="`head_scripts[${index}][name]`"
                                       x-model="script.name"
                                       placeholder="Script name (e.g. Google Analytics)"
                                       class="flex-1 text-sm px-3 py-1.5 rounded border outline-none"
                                       style="border-color: var(--color-border); border-radius: var(--radius-btn); color: var(--color-heading); background: var(--color-brand-50);">
                                <button type="button" @click="scripts.splice(index, 1)"
                                        class="ml-3 text-xs text-red-500 hover:underline shrink-0"
                                        x-show="scripts.length > 1">
                                    Remove
                                </button>
                            </div>
                            <textarea :name="`head_scripts[${index}][code]`"
                                      x-model="script.code"
                                      rows="6"
                                      placeholder="Paste your script tag here..."
                                      class="w-full text-xs px-3 py-2 rounded border outline-none font-mono resize-y"
                                      style="border-color: var(--color-border); border-radius: var(--radius-btn); color: var(--color-heading); background: var(--color-brand-50);"></textarea>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Footer Scripts --}}
            <div x-data="{
                scripts: {{ json_encode(count($footerScripts) ? $footerScripts : [['name' => '', 'code' => '']]) }}
            }">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-base font-bold" style="color: var(--color-heading);">&lt;body&gt; Footer Scripts</h2>
                        <p class="text-xs mt-0.5" style="color: var(--color-text-muted);">Injected just before &lt;/body&gt;. Use for Microsoft Clarity, chat widgets, etc.</p>
                    </div>
                    <button type="button" @click="scripts.push({name: '', code: ''})"
                            class="text-xs font-semibold px-3 py-1.5 rounded"
                            style="color: var(--color-accent-dark); border: 1px solid var(--color-accent-dark); border-radius: var(--radius-btn);">
                        + Add Script
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(script, index) in scripts" :key="index">
                        <div class="p-4 rounded" style="background-color: var(--color-bg); border: 1px solid var(--color-border); border-radius: var(--radius-card);">
                            <div class="flex items-center justify-between mb-3">
                                <input type="text"
                                       :name="`footer_scripts[${index}][name]`"
                                       x-model="script.name"
                                       placeholder="Script name (e.g. Microsoft Clarity)"
                                       class="flex-1 text-sm px-3 py-1.5 rounded border outline-none"
                                       style="border-color: var(--color-border); border-radius: var(--radius-btn); color: var(--color-heading); background: var(--color-brand-50);">
                                <button type="button" @click="scripts.splice(index, 1)"
                                        class="ml-3 text-xs text-red-500 hover:underline shrink-0"
                                        x-show="scripts.length > 1">
                                    Remove
                                </button>
                            </div>
                            <textarea :name="`footer_scripts[${index}][code]`"
                                      x-model="script.code"
                                      rows="6"
                                      placeholder="Paste your script tag here..."
                                      class="w-full text-xs px-3 py-2 rounded border outline-none font-mono resize-y"
                                      style="border-color: var(--color-border); border-radius: var(--radius-btn); color: var(--color-heading); background: var(--color-brand-50);"></textarea>
                        </div>
                    </template>
                </div>
            </div>

        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="btn-primary">Save Scripts</button>
        </div>

    </form>

</x-layouts.admin>
