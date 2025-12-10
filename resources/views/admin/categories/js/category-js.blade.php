<script>
    $(document).ready(function() {
        $(document).on('click', '#add-category', function() {
            let  url = "{{ route('admin.categories.create') }}";
            if($(this).data('type') == "subcategory"){
                url = "{{ route('admin.categories.create', ['type' => 'subcategory']) }}";
            }
            $.ajax({
                url:url,
                type: "GET",
                success: function(response) {
                    openModal('Add Category', response, 'Save Category');
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '.add-btn', function() {
            let form = $("#addCategoryForm")[0];
            let formData = new FormData(form);
            $.ajax({
                url: "{{ route('admin.categories.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $(".error-span").text('');
                    $('#data-table').DataTable().ajax.reload();
                    closeModal();
                    showToast('Success', response.message, 'success');
                },
                error: function(xhr) {
                    $(".error-span").text('');
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            $(`#err-${field}`).text(errors[field][0]).css('color',
                                'red');
                        }
                    } else {
                        showToast('Error', 'An error occurred while saving the user.',
                            'error');
                    }
                }
            });
        });
        $(document).on('click', '.edit-btn', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.categories.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    openModal('Edit User', response, 'Update User', true);
                    callEvents();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '.update-btn', function() {
            let form = $("#editCategoryForm")[0];
            let formData = new FormData(form);
            let id = $("#id").val();
            let url = "{{ route('admin.categories.update', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $(".error-span").text('');
                    $('#data-table').DataTable().ajax.reload();
                    closeModal();
                    showToast('Success', response.message, 'success');
                },
                error: function(xhr) {
                    $(".error-span").text('');
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            $(`#err-${field}`).text(errors[field][0]).css('color',
                                'red');
                        }
                    } else {
                        showToast('Error', 'An error occurred while saving the user.',
                            'error');
                    }
                }
            });
        });
        $(document).on('click', '.delete-btn', function() {
            let id = $(this).data('id');
            deleteModal('Delete Category', 'Are you sure you want to delete category?');
            $("#delete-modal-btn").attr('data-id', id);
        });
        $(document).on('click', '#delete-modal-btn', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.categories.destroy', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "DELETE",
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#data-table').DataTable().ajax.reload();
                    closeDeleteModal();
                    showToast('Success', response.message, 'success');
                },
                error: function(xhr) {
                    $(".error-span").text('');
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            $(`#err-${field}`).text(errors[field][0]).css('color',
                                'red');
                        }
                    } else {
                        showToast('Error', 'An error occurred while delete.', 'error');
                    }
                }
            });
        });
    });
</script>
