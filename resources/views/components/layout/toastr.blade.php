<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <h4 class="text-white toast-title"></h4>
                <div class="toast-text"></div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@if (session()->has('success'))
    <script>
        showToastr('success', "Success", "{{ session()->get('success') }}")
    </script>
@endif


@if (session()->has('error'))
    <script>
        showToastr('error', "Error", "{{ session()->get('error') }}")
    </script>
@endif
