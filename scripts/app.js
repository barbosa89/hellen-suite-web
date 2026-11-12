// Application entry as an ES module. The framework lives in scripts/arix/
// and has no side effects on import: only what is called below runs.
import { enhance } from './arix/index.js';

// Opt-in progressive enhancement. Only elements marked with data-arix-get or
// data-arix-post are handled; links and forms without those attributes keep
// their native behavior. Web Components from the framework are optional and
// are registered per component with define(), never automatically.
enhance(document);

const screenshotDialog = document.querySelector('.screenshot-dialog');

if (screenshotDialog && typeof screenshotDialog.showModal === 'function') {
    const image = screenshotDialog.querySelector('.screenshot-dialog-image img');
    const caption = screenshotDialog.querySelector('#screenshot-caption');
    const original = screenshotDialog.querySelector('.screenshot-original');

    document.querySelectorAll('.screenshot-link').forEach((link) => {
        link.addEventListener('click', (event) => {
            if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;

            const thumbnail = link.querySelector('img');
            image.src = link.href;
            image.alt = thumbnail.alt;
            caption.textContent = thumbnail.alt;
            original.href = link.href;
            screenshotDialog.showModal();
            event.preventDefault();
        });
    });

    screenshotDialog.querySelector('.screenshot-close').addEventListener('click', () => screenshotDialog.close());
}
