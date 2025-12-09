<form id="createRoleForm">
    <div class="mb-3">
        <label class="form-label">Role Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Staff">
        <span class="error-span" id="err-name"></span>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <label class="form-label">Status</label>
        <label class="switch">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" id="status" class="check" checked="" name="status">
            <span class="slider round"></span>
        </label>
    </div>
    <span class="error-span" id="err-status"></span>
</form>