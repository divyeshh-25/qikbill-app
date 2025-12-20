<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-dialog-centered" id="modal-size">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header">
                        <div class="page-title">
                            <h4 id="modal-title">Add Modal</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="modal-submit-btn">Save Modal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content p-5 px-3 text-center">
                    <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2">
                        <i class="ti ti-trash fs-24 text-danger"></i>
                    </span>
                    <h4 class="fs-20 fw-bold mb-2 mt-1" id="delete-modal-header">
                        Delete Model
                    </h4>
                    <p class="mb-0 fs-16" id="delete-modal-title">
                        Are you sure you want to delete model?
                    </p>
                    <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                        <input type="hidden" id="delete-url" value="">
                        <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="delete-modal-btn" data-id=""
                            class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->

<script>
    const openModal = (title, bodyContent, btnTitle = 'Save', isEdit = false, size="") => {
        document.getElementById('modal-title').innerHTML = title;
        document.getElementById('modal-body').innerHTML = bodyContent;
        document.getElementById('modal-body').innerHTML = bodyContent;
        let modalSize = document.getElementById('modal-size');
        modalSize.classList.forEach(className => {
            if (className !== 'modal-dialog' && className !== 'modal-dialog-centered') {
                modalSize.classList.remove(className);
            }
        });
        if(size){
            document.getElementById('modal-size').classList.add(size);
        }
        const modalBtn = document.getElementById('modal-submit-btn');
        modalBtn.textContent = btnTitle;
        modalBtn.classList.remove('add-btn', 'update-btn');
        modalBtn.classList.add(isEdit ? 'update-btn' : 'add-btn');
        const modal = new bootstrap.Modal(document.getElementById('modal'));
        modal.show();
    }
    const closeModal = () => {
        const modalEl = document.getElementById('modal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        const modalBtn = document.getElementById('modal-submit-btn');
        modalBtn.classList.remove('add-btn', 'update-btn');
        modal.hide();
    }
    const deleteModal = (header = "Delete Model", title = "Are you sure you want to delete model?") => {
        document.getElementById('delete-modal-header').innerHTML = header;
        document.getElementById('delete-modal-title').innerHTML = title;
        const modal = new bootstrap.Modal(document.getElementById('delete-modal'));
        modal.show();
    }
    const closeDeleteModal = () => {
        const modalEl = document.getElementById('delete-modal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();
    }
</script>
