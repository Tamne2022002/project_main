function isExist(className) {
    return document.getElementsByClassName(className).length > 0;
}

/* Show notify */
function showNotify(
    text = "Notify text",
    title = "Thông báo",
    status = "success"
) {
    new Notify({
        status: status, // success, warning, error
        title: title,
        text: text,
        effect: "fade",
        speed: 400,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 10,
        distance: 10,
        type: 3,
        position: "right top",
    });
}

/* PreviewImage */
function previewImage(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const output = document.getElementById(previewId);

    if (fileInput && output) {
        fileInput.addEventListener("change", function (event) {
            if (event.target.files.length > 0) {
                const reader = new FileReader();
                reader.onload = function () {
                    output.innerHTML =
                        '<img class="rounded" src="' +
                        reader.result +
                        '" alt="Preview Photo">';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    }
}

/* Action delete */
function actionDelete(event) {
    event.preventDefault();
    if (!isExist("action_delete")) {
        return false;
    }

    let noti = {};
    if (PERMISSION == "false") {
        noti = {
            title: "Bạn không thể thực hiện thao tác này!",
            text: "Vui lòng liên hệ người có thẩm quyền cao hơn!",
            icon: "info",
            showCancelButton: true,
            showConfirmButton: false,
        };
    } else {
        noti = {
            title: "Bạn có chắc không?",
            text: "Bạn sẽ không thể hoàn tác hành động này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Có, hãy xóa nó!",
        };
    }

    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire(noti).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tệp của bạn đã được xóa.",
                            icon: "success",
                        });
                    }
                },
                error: function () {},
            });
        }
    });
}

$(function () {
    if (isExist("action_delete")) {
        $(document).on("click", ".action_delete", actionDelete);
    }
});

/* Select  Roles User */
function initializeSelect2() {
    if (!isExist("select2_option")) return;

    $(".select2_option").select2({
        placeholder: "Chọn vai trò",
    });
}
function SumoSelectImportInvoive() {
    if (isExist("sumoselectimportinvoice")) {
        $(".sumoselectimportinvoice").SumoSelect({
            okCancelInMulti: true,
            placeholder: "Chọn sản phẩm",
            search: true,
        });
        $(".sumoselectimportinvoice").on("change", function () {
            var productId = $(this).val();

            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                data: { productId: productId },

                success: function (response) {
                    $(".list-product-call-by-ajax").empty();
                    $.each(response.products, function (index, product) {
                        var productBlock = `
                            <div class="col-4 product-call-by-ajax" id="${product.id}">
                                <div class="card card-primary card-outline text-sm">
                                <input type="hidden" name="product_id[]" value="${product.id}" class="form-control">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <strong>${product.name}</strong>
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Số lượng nhập</label>
                                            <input type="number" name="quantity[]"  value="" class="form-control quantity-input">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        `;
                        // <div class="form-group">
                        //                     <label for="">Giá nhập / sản phẩm</label>
                        //                     <input type="number" name="import_price[]" value=""  class="form-control format-price import_price">
                        //                 </div>
                        $(".list-product-call-by-ajax").append(productBlock);
                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                },
            });
        });
    }
}

function SumoSelectFilterProduct() {
    if (isExist("sumoselectfilterproduct")) {
        $(".sumoselectfilterproduct").SumoSelect({
            okCancelInMulti: false,
            placeholder: "Chọn sản phẩm",
            search: false,
        });
        $(".sumoselectfilterproduct").on("change", function () {
            var categoryId = $(this).val();

            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                data: { categoryId: categoryId },
                success: function (response) {
                    $(".filter-product-call-by-ajax").empty();
                    if (response.products.length > 0) {
                        $.each(response.products, function (index, product) {
                            var productBlock = `
                                <tr>
                                    <td class="text-capitalize">${
                                        product.name
                                    }</td>
                                    <td>
                                        <img class="adm-product-img"
                                            src="${
                                                product.product_photo_path
                                                    ? product.product_photo_path
                                                    : "/assets/noimage.jpg"
                                            }"
                                            alt="">
                                    </td>
                                    <td class="text-capitalize">${
                                        product.category
                                            ? product.category.name
                                            : "Không tìm thấy danh mục"
                                    }</td>
                                    <td>
                                        <a href="product/edit/${
                                            product.id
                                        }" class="btn btn-default">Sửa</a>
                                        <a href="" data-url="product/delete/${
                                            product.id
                                        }" class="btn btn-danger action_delete">Xóa</a>
                                    </td>
                                </tr>`;
                            $(".filter-product-call-by-ajax").append(
                                productBlock
                            );
                        });
                    } else {
                        $(".filter-product-call-by-ajax").append(
                            '<tr><td colspan="4">Không tìm thấy kết quả!</td></tr>'
                        );
                    }
                    $(".col-md-12.pagination").attr("hidden", "true");
                },
                error: function (xhr, status, error) {
                    console.log(error);
                    $(".filter-product-call-by-ajax")
                        .empty()
                        .append(
                            '<tr><td colspan="4">Đã xảy ra lỗi khi tải dữ liệu!</td></tr>'
                        );
                },
            });
        });
    }
}
function SumoSelectFilterProductWarehouse() {
    if (isExist("sumoselectfilterproductwarehouse")) {
        $(".sumoselectfilterproductwarehouse").SumoSelect({
            okCancelInMulti: false,
            placeholder: "Chọn sản phẩm",
            search: false,
        });
        $(".sumoselectfilterproductwarehouse").on("change", function () {
            var categoryId = $(this).val();

            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                data: { categoryId: categoryId },
                success: function (response) {
                    $(".filter-product-warehouse-call-by-ajax").empty();
                    if (response.products.length > 0) {
                        $.each(response.products, function (index, product) {
                            var productBlock = `
                                <tr class="row">
                                    <td class="text-capitalize col-md-5">${
                                        product.name
                                    }</td>
                                    <td class="col-md-2">
                                        <img class="adm-product-img"
                                            src="${
                                                product.product_photo_path
                                                    ? product.product_photo_path
                                                    : "/assets/noimage.jpg"
                                            }"
                                            alt="">
                                    </td>
                                    <td class="text-capitalize col-md-4">${
                                        product.category
                                            ? product.category.name
                                            : "Không tìm thấy danh mục"
                                    }</td>
                                    <td class="text-capitalize col-md-1">${
                                        product.quantity
                                            ? product.quantity
                                            : "Không tìm thấy số lượng"
                                    }</td>
                                     
                                </tr>`;
                            $(".filter-product-warehouse-call-by-ajax").append(
                                productBlock
                            );
                        });
                    } else {
                        $(".filter-product-warehouse-call-by-ajax").append(
                            '<tr><td colspan="4">Không tìm thấy kết quả!</td></tr>'
                        );
                    }
                    $(".col-md-12.pagination").attr("hidden", "true");
                },
                error: function (xhr, status, error) {
                    console.log(error);
                    $(".filter-product-call-by-ajax")
                        .empty()
                        .append(
                            '<tr><td colspan="4">Đã xảy ra lỗi khi tải dữ liệu!</td></tr>'
                        );
                },
            });
        });
    }
}
function CheckRole() {
    /* Role */
    $(".checkbox_parent").on("click", function () {
        $(this)
            .parents(".checkbox-role")
            .find(".checkbox_children")
            .prop("checked", $(this).prop("checked"));
    });
    $(".checkbox_all").on("click", function () {
        $(this)
            .parents()
            .find(".checkbox_parent,.checkbox_children")
            .prop("checked", $(this).prop("checked"));
    });
}
function JsAdmin() {
    if (isExist("summernote")) {
        $(".summernote").summernote();
    }
    $(".show-password").on("click", function () {
        var passwordInput = $(this)
            .parents("body")
            .find("input[name=password]");
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            $(this).find("span").removeClass("fas fa-eye");
            $(this).find("span").addClass("fa-solid fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            $(this).find("span").removeClass("fa-solid fa-eye-slash");
            $(this).find("span").addClass("fas fa-eye");
        }
    });
}

function calculate() {
    $("body").on(
        "change keyup",
        "input.import_price, input.quantity-input",
        function () {
            let _total = 0;

            $("body")
                .find(".product-call-by-ajax")
                .each(function () {
                    const currentPrice = $(this)
                        .find("input.import_price")
                        .val()
                        ? parseInt($(this).find("input.import_price").val())
                        : 0;
                    const quantity = $(this)
                        .find('input[name="quantity[]"]')
                        .val()
                        ? parseInt(
                              $(this).find('input[name="quantity[]"]').val()
                          )
                        : 0;

                    let tempTotal = 0;
                    tempTotal += currentPrice * quantity;

                    _total += tempTotal;
                    $('input[name="total_price"]').val(_total);
                });
        }
    );
}
function onSearch() {
    const route_og = $("input#search_route").val(),
        keyword = $('input[name="search_keyword"]').val();
    window.location.href = route_og + "?search_keyword=" + keyword;
}
window.onload = function () {
    if ($('input[name="search_keyword"]').length) {
        $('input[name="search_keyword"]').on("keypress", function (e) {
            if (e.which == 13) {
                onSearch();
                return false;
            }
        });
    }
};
if ($(".regular_price").length && $(".sale_price").length) {
    $(".sale_price").on("change keyup", function (event) {
        const regular_price = parseInt($(".regular_price").val()),
            sale_price = parseInt($(this).val());
        let discount = 0;

        if (regular_price === 0) {
            $(this).val(0);
            $(".regular_price").focus();
            showNotify("Vui lòng nhập giá bán!", "Thông báo", "error");
        } else if (regular_price > sale_price) {
            discount = Math.floor(
                ((regular_price - $(this).val()) / regular_price) * 100
            );
        } else {
            discount = 0;
            $(this).val(0);
            showNotify(
                "Vui lòng nhập giá mới nhỏ hơn giá bán!",
                "Thông báo",
                "error"
            );
        }

        $(".discount").val(discount);
    });
}


function formatMoney(money) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    })
        .format(money)
        .replace(/\s/g, "");
}

function daysInMonth(month, year) {
    const daysInMonths = [
        31,
        year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0) ? 29 : 28,
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];
    return daysInMonths[month - 1];
}

function getDayInMonth(month, year) {
    let arrDateTime = [];
    const dateTime = daysInMonth(month, year);

    for (let i = 0; i < dateTime; i++) {
        arrDateTime.push("" + (i + 1));
    }

    return arrDateTime;
}
function chartJS() {
    const ctx = document.getElementById("chart-js");
    const date = new Date();

    let arrDateTime = getDayInMonth(date.getMonth() + 1, date.getYear());

    const chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: arrDateTime,
            datasets: [
                {
                    label: `Tổng doanh thu trong tháng ${date.getMonth() + 1}/${
                        date.getYear() + 1900
                    }`,
                    data: profitBaseOnDate,
                    borderColor: "#ffb1c1",
                    backgroundColor: "#ffb1c180",
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                },
            },
        },
    });

    if ($("#btn-filter").length) {
        $("#btn-filter").on("click", function () {
            const month = parseInt(
                $(this).parents("#filter").find("select#month").val()
                    ? $(this).parents("#filter").find("select#month").val()
                    : 0
            );
            const year = parseInt(
                $(this).parents("#filter").find("select#year").val()
            );

            if (!year)
                return showNotify("Vui lòng chọn năm!", "Thống báo", "error");

            $.ajax({
                url: `/admin/dashboard/${month}&${year}`,
                type: "GET",
                success: function (data) {
                    $("#statistic-number").text(formatMoney(data.total));

                    if (month && year) {
                        $("#statistic-title").text(
                            `Doanh thu tháng ${month}/${year}`
                        );
                        chart.data.labels = getDayInMonth(month, year);
                        chart.data.datasets[0].label = `Tổng doanh thu trong tháng ${month}/${year}`;
                    } else {
                        $("#statistic-title").text(`Doanh thu năm ${year}`);
                        chart.data.labels = [
                            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,
                        ];
                        chart.data.datasets[0].label = `Tổng doanh thu trong năm ${year}`;
                    }
                    chart.data.datasets[0].data = data.profit;
                    chart.update();
                },
            });
        });
    }
}
$(document).ready(function () {
    calculate();
    JsAdmin();
    CheckRole();
    initializeSelect2();
    SumoSelectImportInvoive();
    SumoSelectFilterProduct();
    SumoSelectFilterProductWarehouse();
    previewImage("file-zone", "photoUpload-preview"); // Cho Favicon
    previewImage("file-zone2", "photoUpload-preview2"); // Cho Logo
    if ($("#chart-js").length) {
        chartJS();
    }
});
