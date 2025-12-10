<form action="{{ route('admin.customers.store') }}" method="POST" id="addCustomerForm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" required>
        <span class="text-sm text-danger" id="err-name"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email">
        <span class="text-sm text-danger" id="err-email"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="phone">
        <span class="text-sm text-danger" id="err-phone"></span>
    </div>

</form>
