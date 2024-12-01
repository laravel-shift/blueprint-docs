<div id="js-search-input" class="docsearch-input__wrapper hidden md:block relative">
    <label for="search" class="hidden">Search</label>
    <input id="docsearch-input" name="docsearch" class="docsearch-input transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white focus:border-gray-200 placeholder-gray-500 rounded-lg bg-gray-100 py-2 pr-4 pl-6 block w-full appearance-none leading-normal" type="text" placeholder="search the docs (press &quot;/&quot; to focus)">

    <button class="md:hidden absolute pin-t pin-r h-full font-light text-3xl text-blue-500 hover:text-blue-600 focus:outline-none -mt-px pr-7">&times;</button>
</div>

@push('scripts')
    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <script type="text/javascript">
            document.onkeyup = function (e) {
                if (e.key === '/') {
                    document.getElementById('docsearch-input').focus();
                }
            };

            docsearch({
                apiKey: '{{ $page->docsearchApiKey }}',
                indexName: '{{ $page->docsearchIndexName }}',
                appId: '{{ $page->docsearchAppId }}',
                inputSelector: '#docsearch-input',
                debug: false // Set debug to true if you want to inspect the dropdown
            });
        </script>
    @endif
@endpush
