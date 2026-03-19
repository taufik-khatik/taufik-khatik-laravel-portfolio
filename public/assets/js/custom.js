/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// Global File Input Label Handler
document.addEventListener('DOMContentLoaded', function () {

    // For ALL .custom-file-input elements
    document.querySelectorAll('.custom-file-input').forEach(function (input) {

        input.addEventListener('change', function () {

            let fileName = this.files.length
                ? this.files[0].name
                : 'Choose file';

            let label = this.nextElementSibling;

            if (label && label.classList.contains('custom-file-label')) {
                label.textContent = fileName;
            }

        });

    });

});
