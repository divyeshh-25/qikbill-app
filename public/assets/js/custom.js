var commonModal = new bootstrap.Modal($("#commonModal"));
// var commonoffcanvas = new bootstrap.Offcanvas($("#commonoffcanvas"));
var isFormValid = false;

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    cache: false,
    beforeSend: function () {
        $(".loader-wrapper").removeClass("d-none");
    },
    complete: function () {
        $(".loader-wrapper").addClass("d-none");
    },
});

function closeModal() {
    commonModal.hide();
}

function showToastr(type, title, message) {
    var f = document.getElementById("liveToast");
    var a = new bootstrap.Toast(f).show();
    if (type == "success") {
        $("#liveToast")
            .removeClass("bg-danger")
            .removeClass("bg-warning")
            .addClass("bg-success");
    } else if (type == "warning") {
        $("#liveToast").removeClass("bg-danger").addClass("bg-warning");
    } else {
        $("#liveToast")
            .removeClass("bg-success")
            .removeClass("bg-warning")
            .addClass("bg-danger");
    }
    $("#liveToast .toast-body .toast-title").html(title);
    $("#liveToast .toast-body .toast-text").html(message);
}

$(document).on(
    "click",
    'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]',
    function () {
        console.log("Asd");
        var title = $(this).data("title");
        var size = $(this).data("size") == "" ? "md" : $(this).data("size");
        var url = $(this).data("url");
        $("#commonModal .modal-title").html(title);
        $("#commonModal .modal-dialog").addClass("modal-" + size);
        $.ajax({
            url: url,
            success: function (data) {
                $(".loader-wrapper").addClass("d-none");
                $("#commonModal .body").html(data);
                commonModal.show();
            },
            error: function (xhr) {
                $(".loader-wrapper").addClass("d-none");
                showToastr("error", "error", xhr.responseJSON.error);
            },
        });
    }
);

function formatIcon(icon) {
    const level = $(icon.element).data("level");
    const id = $(icon.element).data("id");
    const checkbox = `<span><input type="checkbox" class="me-2" id="${id}" />
            </span>`;
    let spaces = "";
    if (level > 1) {
        for (let i = 0; i < level; i++) {
            spaces += "&nbsp;-";
        }
        return checkbox + spaces + icon.text;
    } else {
        return checkbox + icon.text;
    }
}

function arrayToJson(form) {
    var data = $(form).serializeArray();
    var indexed_array = {};

    $.map(data, function (n, i) {
        indexed_array[n["name"]] = n["value"];
    });

    return indexed_array;
}

$(document).on("submit", "#commonModal form", function (e) {
    e.preventDefault();
    var data = arrayToJson($(this));
    data.ajax = true;
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: data,
        success: function (data) {
            showToastr("success", "Success", data.success);
            commonModal.hide();
            $("#data-table").DataTable().ajax.reload();
        },
        error: function (data) {
            data = data.responseJSON;
            showToastr("error", "Error", data.error);
            $("#data-table").DataTable().ajax.reload();
        },
    });
});

/* <=========== Swal2 Initiator ===========> */
const swalConfirm = (swalOption, confirmedCallback) => {
    Swal.fire({
        title: swalOption.title ?? "Are you sure?",
        text: swalOption.text ?? "You won't be able to revert this!",
        icon: swalOption.icon ?? "warning",
        cancelButtonText: swalOption.cancelButtonText ?? "Cancel",
        showCancelButton: swalOption.showCancelButton ?? true,
        confirmButtonColor: swalOption.confirmButtonColor ?? "#5951ed",
        cancelButtonColor: swalOption.cancelButtonColor ?? "#fa6a55",
        confirmButtonText: swalOption.confirmButtonText ?? "Yes, approve it!",
    }).then((result) => {
        if (result.isConfirmed) {
            confirmedCallback();
        }
    });
};
$("body").on("change", "#checkAllBtn", function () {
    if ($("#checkAllBtn").prop("checked")) {
        $(".checkAll").prop("checked", true);
        if ($(".checkAll").length <= 0) {
            return false;
        }
    } else {
        $(".checkAll").prop("checked", false);
    }
});

const refreshTable = () => {
    $("#checkAllBtn").prop("checked", false);
    $("#data-table").DataTable().ajax.reload();
    $(".bulk-update").addClass("d-none");
    $(".bulk-delete").removeClass("d-none");
    $(".select2").each(function () {
        $(this).select2({
            minimumResultsForSearch: 5,
            dropdownParent: $("body"),
            // width: "100%",
            placeholder: $(this).attr("placeholder"),
        });
    });
    $(".bulk-update").addClass("d-none");
    $(".bulk-delete").removeClass("d-none");
};
function generatSlug(ele) {
    let formId = ele.closest("form").attr("id");
    let title = ele.val();
    let slug = generateSlug(title);
    $(`#${formId}`).find("#slug").val(slug);
}
$(document).on("keyup", "#title,#name,.generate-slug", function () {
    generatSlug($(this));
});
$(document).on("focusout", "#title,#name,.generate-slug", function () {
    generatSlug($(this));
});
// Function to generate the slug
function generateSlug(title) {
    return title
        .toLowerCase() // Convert to lowercase
        .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
        .replace(/\s+/g, "-") // Replace spaces with hyphens
        .replace(/-+/g, "-") // Replace multiple hyphens with a single hyphen
        .trim(); // Trim leading/trailing spaces
}

$(document).on("change", "#checkAllBtn", function () {
    let checked = $(this).prop("checked");
    if (checked) {
        $(".checkAll").prop("checked", true);
    } else {
        $(".checkAll").prop("checked", false);
    }
});

$(document).on("change", ".checkAll", function () {
    let checkAll = $(".checkAll");
    let checkedCount = checkAll.filter(":checked").length;
    let totalCheckboxes = checkAll.length;
    $("#checkAllBtn").prop("checked", checkedCount === totalCheckboxes);
});
$(document).on(
    "click",
    'a[data-ajax-canvas="true"], button[data-ajax-canvas="true"], div[data-ajax-canvas="true"]',
    function () {
        var title = $(this).data("title");
        var type = $(this).data("type");
        var url = $(this).data("url");
        var text = type == "add" ? "Save" : "Update";
        $("#commonoffcanvas .offcanvas-title").html(title);
        $("#commonoffcanvas .submit").text(text);
        $("#commonoffcanvas .submit").attr("data-type", type);
        $.ajax({
            url: url,
            success: function (data) {
                $(".loader-wrapper").addClass("d-none");
                $("#commonoffcanvas .offcanvas-body").html(data);
                commonoffcanvas.show();

                $("#commonoffcanvas .select2").each(function () {
                    $(this).select2({
                        minimumResultsForSearch: 5,
                        dropdownParent: $("#commonoffcanvas"),
                        width: "100%",
                        placeholder: $(this).attr("placeholder"),
                    });
                });

                $(".offcanvas-body .summernote").each(function () {
                    $(this).summernote({
                        placeholder: "Type your description here....",
                        tabsize: 4,
                        height: $(this).data("height") ?? 200,
                        container: "body",
                    });
                });
                $("#commonoffcanvas .dropify").dropify();
            },
            error: function (xhr) {
                $(".loader-wrapper").addClass("d-none");
                showToastr("error", "error", xhr.responseJSON.error);
            },
        });
    }
);
// common for store canvace forms
$("body").on("click", "#commonoffcanvas .submit", function (e) {
    e.preventDefault();
    let form = $(this).parents(".commonoffcanvas").find(".offcanvas-body form");
    let url = form.attr("action");
    if (url) {
        if (!form.valid()) {
            e.stopImmediatePropagation();
            return false;
        }
        let formData;
        formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $(".err-class").html(" ");
                closeCanvas();
                refreshTable();
                showToastr("success", "Success", response.message);
            },
            error: function (dataResult) {
                let error = dataResult.responseJSON.errors;
                $(".err-class").html(" ");
                if (dataResult.status == 422) {
                    $.each(error, function (key, value) {
                        $("#err-" + key.replace(".", "")).html(value);
                    });
                }
            },
        });
    }
});

const closeCanvas = () => {
    $("#bulk-status").select2();
    commonoffcanvas.hide();
};
// validate forms data client side
// $("body").on('click','#offCanvasBtn', function(e){
//     e.preventDefault();
//     if(!$("#offCanvasBody").find("form").valid()){
//         e.stopImmediatePropagation();
//         return false;
//     }
// });

$(document).on("click", ".submit-form", function (e) {
    e.preventDefault();
    if (!$(this).closest("form").valid()) {
        e.stopImmediatePropagation();
        return false;
    }
});

// actions

/*<================== Bulk Delete  Handler==================>*/
const bulkDeleteHandler = (e) => {
    let url = $(e).attr("data-url");
    let ids = [];
    var cbs = document.querySelectorAll(".checkAll");
    cbs.forEach(function (cb) {
        if (cb.checked) {
            ids.push(cb.value);
        }
    });
    if (ids.length == 0) {
        showToastr("warning", "Warning", "Please select atleast one row");
        return false;
    }
    if (url.length == 0) {
        showToastr(
            "warning",
            "Warning",
            "something went wrong please refresh page and try again!"
        );
        return false;
    }
    swalConfirm(
        {
            title: "Are you sure?",
            text: "You will not be able to revert this!",
            confirmButtonText: "Yes Delete it!",
            cancelButtonText: "Cancel",
        },
        () => {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    ids: ids,
                },
                dataType: "json",
                success: function (response) {
                    refreshTable();
                    showToastr("success", "Success", response.message);
                },
                error: function (response) {
                    showToastr("error", "Error", response.responseJSON.message);
                },
            });
        }
    );
};

/*<================== Bulk Update Handler==================>*/
$(document).on("click", ".bulkStatus", function (e) {
    e.preventDefault();
    let status = $(this).data("status");
    let url = $(this).parents("ul.dropdown-menu").attr("data-url");
    let ids = [];
    var cbs = document.querySelectorAll(".checkAll");
    cbs.forEach(function (cb) {
        if (cb.checked) {
            ids.push(cb.value);
        }
    });
    if (ids.length == 0) {
        showToastr("warning", "Warning", "Please select atleast one option");
        refreshTable();
        return false;
    }

    if (url.length == 0) {
        showToastr(
            "warning",
            "Warning",
            "something went wrong please refresh page and try again!"
        );
        return false;
    }
    $.ajax({
        type: "POST",
        url: url,
        data: {
            ids: ids,
            status: status,
        },
        dataType: "json",
        success: function (response) {
            refreshTable();
            showToastr("success", "Success", response.message);
        },
        error: function (response) {
            showToastr("error", "Error", response.responseJSON.message);
        },
    });
});
// clear datatable filters
const clearFilter = () => {
    const table = $("#data-table");
    table.on("preXhr.dt", function (e, settings, data) {
        $(".datatable-filter").each(function (index, item) {
            if ($(this).attr("name") && $(this).attr("name") != "") {
                let name = $(this).attr("name");
                data[name] = null;
            }
        });
        // data.status = null;
    });
    $(".datatable-filter").val(null).trigger("change");
    table.DataTable().ajax.reload();

    // $("#datatable-filter").val(null).trigger('change');
    $("#clear").addClass("d-none");
};
//  datatable  filter change handler
$(document).ready(function () {
    $(".datatable-filter").on("change", function () {
        const table = $("#data-table");
        table.on("preXhr.dt", function (e, settings, data) {
            $(".datatable-filter").each(function (index, item) {
                if ($(this).attr("name") && $(this).attr("name") != "") {
                    let name = $(this).attr("name");
                    data[name] = $(this).val();
                }
            });
            // data.status = $("#datatable-filter").val();
        });
        table.DataTable().ajax.reload();
        $("#clear").removeClass("d-none");
    });
});

// delete handler common

const deleteHandler = (url, children = false) => {
    if (children) {
        showToastr("error", "Error", "Please delete children or products first");
        return;
    }
    swalConfirm(
        {
            title: "Are you sure?",
            text: "You will not be able to revert this!",
            confirmButtonText: "Yes Delete it!",
            cancelButtonText: "Cancel",
        },
        () => {
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (response) {
                    refreshTable();
                    showToastr("success", "Success", response.message);
                },
                error: function (response) {
                    showToastr("error", "Error", response.responseJSON.message);
                },
            });
        }
    );
};
$(document).on(
    "click",
    ".add-category,.edit-category,.add-page,.edit-page",
    function () {
        let title = $(this).data("title");
        let type = $(this).data("type");
        let url = $(this).data("url");
        let text = type == "add" ? "Save" : "Update";
        $("#commonoffcanvas .offcanvas-title").html(title);
        if (text == "Save") {
            $("#commonoffcanvas .submit").addClass("submitCategory");
            $("#commonoffcanvas .updateCategory").addClass("submitCategory");
            $("#commonoffcanvas .submitCategory")
                .removeClass("submit")
                .removeClass("updateCategory")
                .text(text)
                .attr("data-type", type);
        } else {
            $("#commonoffcanvas .submit").addClass("updateCategory");
            $("#commonoffcanvas .submitCategory").addClass("updateCategory");
            $("#commonoffcanvas .updateCategory")
                .removeClass("submitCategory")
                .removeClass("submit")
                .text(text)
                .attr("data-type", type);
        }

        $.ajax({
            url: url,
            success: function (data) {
                $(".loader-wrapper").addClass("d-none");
                $("#commonoffcanvas .offcanvas-body").html(data);
                commonoffcanvas.show();

                $("#commonoffcanvas .select2").each(function () {
                    $(this).select2({
                        minimumResultsForSearch: 5,
                        dropdownParent: $("#commonoffcanvas"),
                        width: "100%",
                        placeholder: $(this).attr("placeholder"),
                    });
                });

                $(".offcanvas-body .summernote").each(function () {
                    $(this).summernote({
                        placeholder: "Type your description here....",
                        tabsize: 4,
                        height: $(this).data("height") ?? 200,
                        container: "body",
                    });
                });
                $("#commonoffcanvas .dropify").dropify();
            },
            error: function (xhr) {
                $(".loader-wrapper").addClass("d-none");
                showToastr("error", "error", xhr.responseJSON.error);
            },
        });
    }
);
$("body").on(
    "click",
    "#commonoffcanvas .submitCategory,.updateCategory",
    function (e) {
        e.preventDefault();
        let form = $(this)
            .parents(".commonoffcanvas")
            .find(
                ".offcanvas-body #addCategoryForm,#editCategoryForm,#addPageForm,#editPageForm"
            );
        let url = form.attr("action");
        if (url) {
            if (!form.valid()) {
                e.stopImmediatePropagation();
                return false;
            }
            let formData;
            formData = new FormData(form[0]);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".err-class").html(" ");
                    closeCanvas();
                    refreshTable();
                    showToastr("success", "Success", response.message);
                },
                error: function (dataResult) {
                    console.log(dataResult);
                    let error = dataResult.responseJSON.errors;
                    $(".err-class").html(" ");
                    if(dataResult.status == 500){
                         showToastr(
                                    "error",
                                    "Error",
                                    dataResult.responseJSON.message
                                );
                    }

                    if (dataResult.status == 422) {
                        $.each(error, function (key, value) {
                            if (key.includes("title")) {
                                showToastr(
                                    "error",
                                    "Error",
                                    "The default language title field is required!!"
                                );
                            } else if (key.includes("content")) {
                                showToastr(
                                    "error",
                                    "Error",
                                    "The default language content field is required!!"
                                );
                            }
                            $("#err-" + key.replace(".", "")).html(value);
                        });
                    }
                },
            });
        }
    }
);

