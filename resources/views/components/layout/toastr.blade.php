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
