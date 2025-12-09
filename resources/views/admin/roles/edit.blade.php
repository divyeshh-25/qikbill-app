<form id="editRoleForm">
    @method('PATCH')
    <input type="hidden" id="id" value="{{ $role->id }}">
    <div class="mb-3">
        <label class="form-label">Role Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}">
        <span class="error-span" id="err-name"></span>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <label class="form-label">Status</label>
        <label class="switch">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" id="status" class="check" {{ $role->getRawOriginal('status') ? 'checked' : '' }} name="status">
            <span class="slider round"></span>
        </label>
    </div>
    <span class="error-span" id="err-status"></span>
</form>