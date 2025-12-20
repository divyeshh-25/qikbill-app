 <!-- Order Details -->
 <div class="col-md-12 col-lg-5 col-xl-4 ps-0 theiaStickySidebar">
     <aside class="product-order-list">
         <div class="customer-info">
             <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                 <div class="d-flex align-items-center">
                     <h4 class="mb-0">New Order</h4>
                     <span class="badge badge-purple badge-xs fs-10 fw-medium ms-2">#5655898</span>
                 </div>
                 <a href="#" class="btn btn-sm btn-outline-primary shadow-primary" id="create-customer">Add Customer</a>
             </div>
             <select class="select">
                 <option>Walk in Customer</option>
                 <option>John</option>
                 <option>Smith</option>
                 <option>Ana</option>
                 <option>Elza</option>
             </select>
         </div>
         <div class="product-added block-section">
             <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                 <h5 class="d-flex align-items-center mb-0">Order Details</h5>
                 <div class="badge bg-light text-gray-9 fs-12 fw-semibold py-2 border rounded">Items
                     : <span class="text-teal">3</span></div>
             </div>
             <div class="product-wrap">
                 <div class="empty-cart">
                     <div class="mb-1">
                         <img src="{{ asset('assets/img/icons/empty-cart.svg') }}" alt="img">
                     </div>
                     <p class="fw-bold">No Products Selected</p>
                 </div>
                 <div class="product-list border-0 p-0">
                     <div class="table-responsive">
                         <table class="table table-borderless">
                             <thead>
                                 <tr>
                                     <th class="bg-transparent fw-bold">Product</th>
                                     <th class="bg-transparent fw-bold">QTY</th>
                                     <th class="bg-transparent fw-bold">Price</th>
                                     <th class="bg-transparent fw-bold text-end"></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         <div class="d-flex align-items-center mb-1">
                                             <h6 class="fs-16 fw-medium"><a href="#" class="show-product">Iphone 11S</a>
                                             </h6>
                                             <a href="#" class="ms-2 edit-icon edit-product"><i
                                                     class="ti ti-edit"></i></a>
                                         </div>
                                         Price : $400
                                     </td>
                                     <td>
                                         <div class="qty-item m-0">
                                             <a href="javascript:void(0);"
                                                 class="dec d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                     data-feather="minus-circle" class="feather-14"></i></a>
                                             <input type="text" class="form-control text-center" name="qty" value="4">
                                             <a href="javascript:void(0);"
                                                 class="inc d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                     data-feather="plus-circle" class="feather-14"></i></a>
                                         </div>
                                     </td>
                                     <td class="fw-bold">$400</td>
                                     <td class="text-end">
                                         <a class="btn-icon delete-icon delete-product" href="javascript:void(0);">
                                             <i class="ti ti-trash"></i>
                                         </a>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <div class="d-flex align-items-center mb-1">
                                             <h6 class="fs-16 fw-medium"><a href="#" class="show-product">Samsung Galaxy
                                                     S21</a></h6>
                                             <a href="#" class="ms-2 edit-icon edit-product"><i
                                                     class="ti ti-edit"></i></a>
                                         </div>
                                         Price : $400
                                     </td>
                                     <td>
                                         <div class="qty-item m-0">
                                             <a href="javascript:void(0);"
                                                 class="dec d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                     data-feather="minus-circle" class="feather-14"></i></a>
                                             <input type="text" class="form-control text-center" name="qty" value="1">
                                             <a href="javascript:void(0);"
                                                 class="inc d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                     data-feather="plus-circle" class="feather-14"></i></a>
                                         </div>
                                     </td>
                                     <td class="fw-bold">$400</td>
                                     <td class="text-end">
                                         <a class="btn-icon delete-icon delete-product" href="javascript:void(0);">
                                             <i class="ti ti-trash"></i>
                                         </a>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <div class="d-flex align-items-center mb-1">
                                             <h6 class="fs-16 fw-medium"><a href="#" class="show-product">Red Boot
                                                     Shoes</a>
                                             </h6>
                                             <a href="#" class="ms-2 edit-icon edit-product"><i
                                                     class="ti ti-edit"></i></a>
                                         </div>
                                         Price : $600
                                     </td>
                                     <td>
                                         <div class="qty-item m-0">
                                             <a href="javascript:void(0);"
                                                 class="dec d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                     data-feather="minus-circle" class="feather-14"></i></a>
                                             <input type="text" class="form-control text-center" name="qty" value="3">
                                             <a href="javascript:void(0);"
                                                 class="inc d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                     data-feather="plus-circle" class="feather-14"></i></a>
                                         </div>
                                     </td>
                                     <td class="fw-bold">$600</td>
                                     <td class="text-end">
                                         <a class="btn-icon delete-icon delete-product" href="javascript:void(0);">
                                             <i class="ti ti-trash"></i>
                                         </a>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <div class="d-flex align-items-center mb-1">
                                             <h6 class="fs-16 fw-medium"><a href="#" class="show-product">Bracelet</a>
                                             </h6>
                                             <a href="#" class="ms-2 edit-icon edit-product"><i
                                                     class="ti ti-edit"></i></a>
                                         </div>
                                         Price : $1400
                                     </td>
                                     <td>
                                         <div class="qty-item m-0">
                                             <a href="javascript:void(0);"
                                                 class="dec d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                     data-feather="minus-circle" class="feather-14"></i></a>
                                             <input type="text" class="form-control text-center" name="qty" value="1">
                                             <a href="javascript:void(0);"
                                                 class="inc d-flex justify-content-center align-items-center"
                                                 data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                     data-feather="plus-circle" class="feather-14"></i></a>
                                         </div>
                                     </td>
                                     <td class="fw-bold">$1400</td>
                                     <td class="text-end">
                                         <a class="btn-icon delete-icon delete-product" href="javascript:void(0);">
                                             <i class="ti ti-trash"></i>
                                         </a>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <div class="block-section order-method bg-light m-0">
             <div class="order-total">
                 <div class="table-responsive">
                     <table class="table table-borderless">
                         <tr>
                             <td>Sub Total</td>
                             <td class="text-end">$1250</td>
                         </tr>
                         <tr>
                             <td>Shipping</td>
                             <td class="text-end">$35</td>
                         </tr>
                         <tr>
                             <td>Tax (15%)</td>
                             <td class="text-end">$25</td>
                         </tr>
                         <tr>
                             <td>Discount (5%)</td>
                             <td class="text-danger text-end">-$24</td>
                         </tr>
                         <tr>
                             <td>Grand Total</td>
                             <td class="text-end">$56590</td>
                         </tr>
                     </table>
                 </div>
             </div>
             <div class="row gx-2">
                 <div class="col-sm-4">
                     <a href="javascript:void(0);" id="order-discount"
                         class="btn btn-teal d-flex align-items-center justify-content-center w-100 mb-2">
                         <i class="ti ti-percentage me-2"></i>Discount
                     </a>
                     <a href="javascript:void(0);" id="hold-order"
                         class="btn btn-orange d-flex align-items-center justify-content-center w-100 mb-2">
                         <i class="ti ti-player-pause me-2"></i>Hold</a>

                 </div>
                 <div class="col-sm-4">
                     <a href="javascript:void(0);" id="order-tax"
                         class="btn btn-purple d-flex align-items-center justify-content-center w-100 mb-2">
                         <i class="ti ti-receipt-tax me-2"></i>Tax
                     </a>
                     <a href="javascript:void(0);" id="view-orders"
                         class="btn btn-secondary d-flex align-items-center justify-content-center w-100 mb-2">
                         <i class="ti ti-shopping-cart me-2"></i>View Orders
                     </a>
                 </div>
                 <div class="col-sm-4">
                     <a href="javascript:void(0);" id="shipping-cost"
                         class="btn btn-pink d-flex align-items-center justify-content-center w-100 mb-2"><i
                             class="ti ti-package-import me-2"></i>Shipping</a>
                     <a href="javascript:void(0);" id="reset-order"
                         class="btn btn-indigo d-flex align-items-center justify-content-center w-100 mb-2">
                         <i class="ti ti-reload me-2"></i>Reset
                     </a>
                 </div>
             </div>
         </div>
         <div class="block-section payment-method">
             <h5 class="mb-2">Select Payment</h5>
             <div class="row align-items-center justify-content-center methods g-2 mb-4">
                 <div class="col-sm-6 col-md-4 col-xl d-flex">
                     <a href="javascript:void(0);" class="payment-item flex-fill" data-bs-toggle="modal"
                         data-bs-target="#payment-cash">
                         <img src="{{ asset('assets/img/icons/cash-icon.svg') }}" alt="img">
                         <p class="fw-medium">Cash</p>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-4 col-xl d-flex">
                     <a href="javascript:void(0);" class="payment-item flex-fill" data-bs-toggle="modal"
                         data-bs-target="#payment-card">
                         <img src="{{ asset('assets/img/icons/card.svg') }}" alt="img">
                         <p class="fw-medium">Card</p>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-4 col-xl d-flex">
                     <a href="javascript:void(0);" class="payment-item flex-fill" data-bs-toggle="modal"
                         data-bs-target="#payment-points">
                         <img src="{{ asset('assets/img/icons/points.svg') }}" alt="img">
                         <p class="fw-medium">Points</p>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-4 col-xl d-flex">
                     <a href="javascript:void(0);" class="payment-item flex-fill" data-bs-toggle="modal"
                         data-bs-target="#payment-deposit">
                         <img src="{{ asset('assets/img/icons/deposit.svg') }}" alt="img">
                         <p class="fw-medium">Deposit</p>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-4 col-xl d-flex">
                     <a href="javascript:void(0);" class="payment-item flex-fill" data-bs-toggle="modal"
                         data-bs-target="#payment-cheque">
                         <img src="{{ asset('assets/img/icons/cheque.svg') }}" alt="img">
                         <p class="fw-medium">Cheque</p>
                     </a>
                 </div>
             </div>
             <div class="btn-block m-0">
                 <a class="btn btn-teal w-100" href="javascript:void(0);">
                     Pay : $56590.00
                 </a>
             </div>
         </div>
     </aside>
 </div>
 <!-- /Order Details -->