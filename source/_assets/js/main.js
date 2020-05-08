window.docsearch = require('docsearch.js');

import hljs from 'highlight.js/lib/highlight';

hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('shell', require('highlight.js/lib/languages/shell'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});
