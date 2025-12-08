<form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" id="editCustomerForm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
    </div>

    <div class="text-end mt-4">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </div>
</form>
