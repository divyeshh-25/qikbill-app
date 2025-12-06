<div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer">
    <div id="toast" class="toast colored-toast text-fixed-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-fixed-white" id="toastHeaderContainer">
            <strong class="me-auto" id="toastHeader">Toast</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage">
            Your,toast message here.
        </div>
    </div>
</div>
<script>
    const showToast = (header, message, type = 'success') => {
        const toastContainer = document.getElementById('toastContainer');
        const toastEl = document.getElementById('toast');
        const toastHeaderContainer = document.getElementById('toastHeaderContainer');
        const toastHeader = document.getElementById('toastHeader');
        const toastMessage = document.getElementById('toastMessage');
        toastHeader.textContent = header;
        toastMessage.textContent = message;
        toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
        switch (type) {
            case 'success':
                toastEl.classList.add('bg-success', 'text-fixed-white');
                toastHeaderContainer.classList.add('bg-success');
                break;
            case 'error':
                toastEl.classList.add('bg-danger', 'text-fixed-white');
                toastHeaderContainer.classList.add('bg-danger');
                break;
            case 'warning':
                toastEl.classList.add('bg-warning', 'text-fixed-white');
                toastHeaderContainer.classList.add('bg-warning');
                break;
            case 'info':
            default:
                toastEl.classList.add('bg-info', 'text-fixed-white');
                toastHeaderContainer.classList.add('bg-info');
                break;
        }
        // Show the toast
        const toast = new bootstrap.Toast(toastEl)
        toast.show()
    }
</script>

@if (session('success'))
    <script>
        showToast('Success', "{{ session('success') }}", 'success');
    </script>
@endif

@if (session('error'))
    <script>
        showToast('Error', "{{ session('error') }}", 'success');
    </script>
@endif

@if (session('warning'))
    <script>
        showToast('Warning', "{{ session('warning') }}", 'success');
    </script>
@endif

@if (session('info'))
    <script>
        showToast('Info', "{{ session('info') }}", 'success');
    </script>
@endif
