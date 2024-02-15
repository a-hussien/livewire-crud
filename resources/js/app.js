import "./bootstrap";

import Swal from "sweetalert2";

// Listening for Livewire events
window.addEventListener("toast", (e) => {
    let data = e.detail[0];
    Swal.fire(data);
});
