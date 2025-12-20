<x-layout.pos>
    <!-- Main Wrapper -->
    <div class="main-wrapper pos-three">

        <x-layout.pos-header />

        <div class="page-wrapper pos-pg-wrapper ms-0">
            <div class="content pos-design p-0">

                <div class="row align-items-start pos-wrapper">

                    @include('admin.POS.modules.products', ['products' => $products, 'categories' => $categories])

                    @include('admin.POS.modules.order')

                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    @include('admin.POS.modals.calculator')

    <!-- Common POS Modal -->
    <div class="modal fade modal-default pos-modal" id="POSModal" aria-labelledby="hold-order">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="POSModalHeader">
                    <h5 class="modal-title" id="POSModalTitle">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="POSModalBody">

                </div>
                <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap" id="POSModalFooter">
                    <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Common POS Modal -->

    @push('scripts')
    <script>
        function updateTime() {
            const now = new Date();
            document.getElementById('live-time').textContent =
                now.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                });
        }
        updateTime();
        setInterval(updateTime, 1000);
        $(document).ready(function() {
            $(document).on('click', '#view-all-categories', function() {
                $("#all").click();
            })
        })
        const openPOSModal = (title, content, showHeader = true, showFooter = true) => {
            document.getElementById('POSModalTitle').innerHTML = title;
            document.getElementById('POSModalBody').innerHTML = content;
            document.getElementById('POSModalBody').classList.remove('p-0');
            if (!showHeader) {
                document.getElementById('POSModalHeader').classList.add('d-none');
            } else {
                document.getElementById('POSModalHeader').classList.remove('d-none');
            }
            if (!showFooter) {
                document.getElementById('POSModalFooter').classList.add('d-none');
            } else {
                document.getElementById('POSModalFooter').classList.remove('d-none');
            }
            const modal = new bootstrap.Modal(document.getElementById('POSModal'));
            modal.show();
        }
        const closePOSModal = () => {
            document.getElementById('POSModalTitle').innerHTML = "";
            document.getElementById('POSModalBody').innerHTML = "";
            const modal = new bootstrap.Modal(document.getElementById('POSModal'));
            modal.hide();
        }
        $(document).on('click', '#calculator', function() {
            $("#calculatorModal").modal('toggle');
        });
        $(document).on('click', '#cash-register', function() {
            $.ajax({
                url: "{{ route('admin.pos.cash-register') }}",
                type: "POST",
                success: function(response) {
                    openPOSModal('Cash Register Details', response);
                    callEvents();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#print-receipt', function() {
            $.ajax({
                url: "{{ route('admin.pos.print-receipt') }}",
                type: "POST",
                success: function(response) {
                    $("#POSModal").addClass("print-receipt");
                    openPOSModal('', response, false, false);
                    callEvents();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#today-sale', function() {
            $.ajax({
                url: "{{ route('admin.pos.today-sale') }}",
                type: "POST",
                success: function(response) {
                    openPOSModal("Today's Sale", response);
                    callEvents();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#order-discount', function() {
            $.ajax({
                url: "{{ route('admin.pos.order-discount') }}",
                type: "GET",
                success: function(response) {
                    openModal('Discount', response, 'Submit');
                    $(".select2").select2();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#order-tax', function() {
            $.ajax({
                url: "{{ route('admin.pos.order-tax') }}",
                type: "GET",
                success: function(response) {
                    openModal('Order Tax', response, 'Submit');
                    $(".select2").select2();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#shipping-cost', function() {
            $.ajax({
                url: "{{ route('admin.pos.shipping-cost') }}",
                type: "GET",
                success: function(response) {
                    openModal('Shipping Cost', response, 'Submit');
                    $(".select2").select2();
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#hold-order', function() {
            $.ajax({
                url: "{{ route('admin.pos.hold-order') }}",
                type: "GET",
                success: function(response) {
                    openModal('Hold order', response, 'Submit');
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#create-customer', function() {
            $.ajax({
                url: "{{ route('admin.pos.create-customer') }}",
                type: "GET",
                success: function(response) {
                    openModal('Create Customer', response, 'Submit', false, "modal-lg");
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#reset-order', function() {
            $.ajax({
                url: "{{ route('admin.pos.reset-order') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('', response, false, false);
                    $("#POSModalBody").addClass('p-0');
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#view-orders', function() {
            $.ajax({
                url: "{{ route('admin.pos.view-orders') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('Orders', response, true, false);
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '.show-product', function() {
            $.ajax({
                url: "{{ route('admin.pos.show-product') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('Products', response, true, false);
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '.edit-product', function() {
            $.ajax({
                url: "{{ route('admin.pos.edit-product') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('Edit Product', response, true, false);
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '.delete-product', function() {
            $.ajax({
                url: "{{ route('admin.pos.delete-product') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('', response, false, false);
                    $("#POSModalBody").addClass('p-0');
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on('click', '#recent-transaction', function() {
            $.ajax({
                url: "{{ route('admin.pos.recent-transaction') }}",
                type: "GET",
                success: function(response) {
                    openPOSModal('Recent Transactions', response, true, false);
                },
                error: function(xhr) {
                    showToast('Error', 'Failed to load the form.', 'error');
                }
            });
        });
        $(document).on("click", ".product-info", function() {
            $(this).toggleClass("active");
            if ($(".product-info.active").length > 0) {
                // If "active", hide .empty-cart and show .product-list
                $('.product-wrap .empty-cart').hide();
                $('.product-wrap .product-list').show();
            } else {
                // If not "active", reverse the behavior
                $('.product-wrap .empty-cart').css('display', 'flex');
                $('.product-wrap .product-list').css('display', 'none');
            }
        });
        $(document).on("click", ".product-info", function() {
            
        });
    </script>
    @endpush
</x-layout.pos>