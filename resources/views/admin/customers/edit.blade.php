<form method="POST" id="editCustomerForm">
    @csrf
    @method('PUT')
    <input type="hidden" id="id" name="id" value="{{ $customer->id }}">
    <div class="mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
        <span class="text-sm text-danger" id="err-name"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
        <span class="text-sm text-danger" id="err-email"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
        <span class="text-sm text-danger" id="err-phone"></span>
    </div>
</form>
