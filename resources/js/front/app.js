import '../app.js';
import intersect from '@alpinejs/intersect'

// Access the global Alpine object
document.addEventListener('alpine:init', () => {
    // Register the plugin
    window.Alpine.plugin(intersect);
});
