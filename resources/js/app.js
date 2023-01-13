import './bootstrap';
import '@hotwired/turbo'

document.addEventListener("turbo:load", function () {
        $('.select2-input').select2();
});
