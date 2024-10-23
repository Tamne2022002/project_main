function isExist(className) {
    return document.getElementsByClassName(className).length > 0;
}

function PeShiner() {
    if (!isExist($(".peShiner"))) {
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();
        $(window).bind("load", function () {
            $(".peShiner").each(function () {
                var api = $(this).peShiner({
                    api: true,
                    paused: true,
                    reverse: true,
                    repeat: 1,
                    color: "fireHL",
                });
                /* Color: monoHL, oceanHL, fireHL */
                api.resume();
            });
        });
    }
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

/* Show error notify */
function showErrorNotify(
    text = "Notify text",
    title = "Thông báo",
    status = "error"
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

function TranslateClick() {
    if (!isExist($(".changeLanguage"))) {
        $(".changeLanguage").click(function (event) {
            var value = $(this).data("value");

            $(".changeLanguage").removeClass("active");
            $(this).addClass("active");
            var text_1 = $(".changeLanguage.active").html();
            $(".lang_current").html(text_1);
            doGoogleLanguageTranslator(value);
            return false;
        });
        $(".box-showlang").hide();
        $(".lang_current").click(function (e) {
            e.stopPropagation();
            $(".box-showlang").slideToggle();
        });
        $(".box-showlang").click(function (e) {
            e.stopPropagation();
        });
        $(document).click(function () {
            $(".box-showlang").slideUp();
        });
    }
}

function setupBackToTop() {
    "use strict";
    var progressPath = document.querySelector(".scrollToTop path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";

    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
    };

    updateProgress();
    $(window).scroll(updateProgress);

    var offset = 150;
    var duration = 550;

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > offset) {
            $(".scrollToTop").addClass("active-progress");
        } else {
            $(".scrollToTop").removeClass("active-progress");
        }
    });

    $(".scrollToTop").on("click", function (event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, duration);
        return false;
    });
}

function SlickPage() {
    if (isExist("slick-slideshow")) {
        $(".slick-slideshow").slick({
            dots: true,
            infinite: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            arrows: false,
            fade: true,
        });
    }
    if (isExist("slick-news-ex")) {
        $(".slick-news-ex").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3500,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            arrows: false,
            fade: false,
        });
    }
    if (isExist("slick-criteria")) {
        $(".slick-criteria").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3500,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            arrows: false,
            fade: false,
        });
    }
    if (isExist("slick-product-outstanding")) {
        $(".slick-product-outstanding").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3500,
            slidesToShow: 5,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            arrows: false,
            fade: false,
        });
    }
    if (isExist("slick-publisher-ex")) {
        $(".slick-publisher-ex").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3500,
            slidesToShow: 8,
            slidesToScroll: 1,
            adaptiveHeight: false,
            autoplay: true,
            arrows: false,
            fade: false,
        });
    }
    if (isExist("slick-other-news-internal")) {
        $(".slick-other-news-internal").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 5000,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            vertical: true,
            verticalSwiping: true,
            autoplay: true,
            infinite: true,
            arrows: false,
        });
    }
    if (isExist("slick-product-image-core")) {
        $(".slick-product-image-core").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slick-product-image-detail",
        });
    }
    if (isExist("slick-product-image-detail")) {
        $(".slick-product-image-detail").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".slick-product-image-core",
            dots: false,
            autoplay: true,
            centerMode: true,
            infinite: true,
            arrows: false,
            centerPadding: "0px",
            focusOnSelect: true,
            autoplaySpeed: 3000,
        });
    }
}

function formatMoney(money) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    })
        .format(money)
        .replace(/\s/g, "");
}

function AllRun() {
    /* Menu Fixed */
    $(window).scroll(function () {
        var cach_top = $(window).scrollTop();
        var height_header = $(".header").height() + $(".menu").height();

        if (cach_top >= height_header) {
            if (
                !$(".menu").hasClass(
                    "fix-menu animate__animated animate__fadeIn"
                )
            ) {
                $(".menu").addClass(
                    "fix-menu animate__animated animate__fadeIn"
                );
            }
        } else {
            $(".menu").removeClass(
                "fix-menu animate__animated animate__fadeIn"
            );
        }
    });
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $(".dropdown-menu", this).stop(true, true).slideDown("slow");
                $(this).toggleClass("open");
            },
            function () {
                $(".dropdown-menu", this).stop(true, true).slideUp("slow");
                $(this).toggleClass("open");
            }
        );
        $(
            ".nav-tabs li:first-child, .tab-content .tab-pane:first-child"
        ).addClass("active");

        $(".nav-tabs a").click(function (e) {
            e.preventDefault();
            $(".nav-tabs li, .tab-content .tab-pane").removeClass("active");
            var id = $(this).attr("href");
            $(this).parent().addClass("active");
            $(id).addClass("active");
            $(this).tab("show");
        });
        $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
            var id = $(e.target).attr("href").substr(1);
            window.location.hash = id;
        });
        var hash = window.location.hash;
        $('#nav-tabs a[href="' + hash + '"]').tab("show");
        $(".dropdown-menu").hide();
    });

    /* Show Contact */
    function ShowHideSocial() {
        $("body").on("click", ".show-btn-wrapper", function (e) {
            $(".show-btn-wrapper").toggleClass("toggle");
        });
    }
    setTimeout(ShowHideSocial, 2000);
    /* FormatMoney */

    /* Ajax product first second */
    $(document).ready(function () {
        $(".flex-categorysecond").on(
            "click",
            ".categorysecond",

            function (event) {
                event.preventDefault();
                var categoryParentId = $(this).data("idf");
                var categoryId = $(this).data("ids");

                $(this)
                    .closest(".wrap-content")
                    .find(".flex-categorysecond .categorysecond")
                    .removeClass("active");
                $(this).addClass("active");

                $.ajax({
                    url: $(this).data("url"),
                    type: "GET",
                    data: { categoryId: categoryId },
                    success: function (response) {
                        $(".paging-product-category-" + categoryParentId).html(
                            ""
                        );

                        var productHtml = `<div class="slick-product-category">`;
                        if (response.products && response.products.length > 0) {
                            response.products.forEach(function (product) {
                                var priceComponent = "";
                                var sale_price = formatMoney(
                                    product.sale_price
                                );
                                var regular_price = formatMoney(
                                    product.regular_price
                                );
                                if (product.sale_price) {
                                    priceComponent = `<div class="price-product">
                                                        <div class="price-new"> ${sale_price}</div>
                                                        <div class="price-old">${regular_price} </div>
                                                        <div class="discount">${product.discount}%</div>
                                                    </div>`;
                                } else if (product.regular_price) {
                                    priceComponent = `<div class="price-product">
                                                        <div class="price-new">${regular_price}</div>
                                                    </div>`;
                                } else {
                                    priceComponent = `<div class="price-product">
                                                        <div class="price-new">Liên hệ</div>
                                                    </div>`;
                                }
                                productHtml += `
                                <div class="product-item product-slick-item" data-id="${
                                    product.id
                                }" data-aos="fade-up" data-aos-duration="1000">
                                <div class="product" data-aos="zoom-in-up">
                                    <div class="box-product text-decoration-none">
                                        <div class="position-relative overflow-hidden  ">
                                            <a class="pic-product" href="/product/${
                                                product.id
                                            }" title="${product.name}">
                                                <div class="pic-product-img scale-img hover_light">
                                                    <img class="w-100" src="${
                                                        product.product_photo_path
                                                            ? product.product_photo_path
                                                            : "/assets/noimage.jpg"
                                                    }"
                                                        alt="${product.name}">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <div class="name-product"><a class="text-split-2" href="/product/${product.id}"title="${product.name}">${product.name}</a></div>
                                            ${priceComponent}
                                                <div class="product-button text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                            });
                            $(
                                ".paging-product-category-" + categoryParentId
                            ).html(productHtml);
                            if (isExist("slick-product-category")) {
                                $(
                                    ".paging-product-category-" +
                                        categoryParentId
                                )
                                    .find(".slick-product-category")
                                    .slick({
                                        dots: false,
                                        infinite: true,
                                        autoplaySpeed: 3500,
                                        slidesToShow: 5,
                                        slidesToScroll: 1,
                                        adaptiveHeight: false,
                                        autoplay: true,
                                        arrows: true,
                                        fade: false,
                                    });
                            }
                        } else {
                            productHtml =
                                '<div class="alert alert-warning w-100 gr-100">' +
                                "<strong>Thông tin đang được cập nhật. Vui lòng kiểm tra lại sau để không bỏ lỡ bất kỳ nội dung mới nào!</strong>" +
                                "</div>";
                            $(
                                ".paging-product-category-" + categoryParentId
                            ).html(productHtml);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    },
                });
            }
        );
        /* Click first */
        $(".flex-categorysecond").each(function () {
            var firstItem = $(this).find(".categorysecond").first();
            firstItem.trigger("click");
            firstItem.addClass("active");
        });
    });
    /* Clear search */
    window.onload = function () {
        if (window.location.search) {
            window.history.replaceState(
                {},
                document.title,
                window.location.pathname + "?search_keyword="
            );
        }
    };

    // $(document).ready(function () {
    //     if ($(".product-from-ajax").length > 0) {
    //         $("body").on("click", ".product-button-cart", function () {
    //             const route = $(this).parents("[data-route]").data("route"),
    //                 id = $(this).parents("[data-id]").data("id");

    //             console.log(route, id);
    //             $.ajax({
    //                 url: route + "/" + id,
    //                 type: "GET",
    //                 success: function (response) {
    //                     location.reload();
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.error(xhr.responseText);
    //                 },
    //             });
    //         });
    //     }
    // });

    // Add to cart Tu
    $("body").on("click", ".add-to-cart", function (event) {
        event.preventDefault();
        const act = $(this).data("act") ? $(this).data("act") : 0,
            direct = $(this).data("direct") ? $(this).data("direct") : 0;
        let route = $(this).data("route");
        var quantity = 0;

        if ($(".qty-pro").length) {
            quantity = $(".qty-pro").val();
            //route = route + quantity;
        }

        var warehouse_qty_obj = document.getElementById("qty");
        var warehouse_qty = parseInt(warehouse_qty_obj.value, 10); // đổi text thành int nguyên

        var in_cart_quantity_obj = document.getElementById("cqty");
        var in_cart_quantity = parseInt(in_cart_quantity_obj.value, 10); // đổi text thành int nguyên
        //var total_qty = quantity + in_cart_quantity;
        var total_qty = 0;

        if(parseInt(quantity, 10) + parseInt(in_cart_quantity, 10) > parseInt(warehouse_qty, 10)) {
            showNotify(
                `Bạn đã thêm quá số lượng tồn kho`,
                "Thông báo",
                "error"
            );
            console.log("Thất bại:", {
                in_cart_quantity: in_cart_quantity,
                warehouse_qty: warehouse_qty,
                quantity: quantity,
                total_qty: parseInt(quantity, 10) + parseInt(in_cart_quantity, 10) ,
            });
        } else {
            route = route + quantity;
            $.ajax({
                url: route,
                type: "GET",
                data: {
                    in_cart_quantity: in_cart_quantity,
                    warehouse_qty: warehouse_qty,
                    quantity: quantity,
                },
                success: function (response) {
                    if (act === "buynow" && direct) {
                        window.location.href = direct;
                    } else {
                        route = route + quantity;
                        location.reload();
                        showNotify("Thêm giỏ hàng thành công!");
                        console.log("Thành công:", {
                            in_cart_quantity: in_cart_quantity,
                            warehouse_qty: warehouse_qty,
                            quantity: quantity,
                            total_qty: parseInt(quantity, 10) + parseInt(in_cart_quantity, 10) ,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                },
            });
        }
    });

    // Quantity detail page 1
    $(".quantity-minus-pro-detail,.quantity-plus-pro-detail,input.qty-pro").on(
        "click change",
        function (event) {
            const _target = event.target;
            const qtyInput = _target.closest('.quantity-pro-detail').querySelector('input.qty-pro');
            const maxQuantity = parseInt(qtyInput.getAttribute('data-max-quantity')) || Infinity;

            switch (_target.classList[0]) {
                case "quantity-minus-pro-detail":
                    if (qtyInput.value > 1) {
                        qtyInput.value = parseInt(qtyInput.value) - 1;
                    } else {
                        qtyInput.value = 1;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                    }
                    break;
                case "quantity-plus-pro-detail":
                    if (qtyInput.value < maxQuantity) {
                        qtyInput.value = parseInt(qtyInput.value) + 1;
                    } else {
                        showNotify(
                            `Bạn đã nhập quá số lượng tồn kho`,
                            "Thông báo",
                            "error"
                        );
                    }
                    break;
                case "qty-pro":
                    if (_target.value < 1) {
                        _target.value = 1;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                    } else if (_target.value > maxQuantity) {
                        _target.value = maxQuantity;
                        showNotify(
                            `Bạn đã nhập quá số lượng tồn kho`,
                            "Thông báo",
                            "error"
                        );
                    }
                    break;
                //default:
                    //showNotify("Không hợp lệ", "Thông báo", "error");
                    //break;
            }
        });

    // Quantity detail page 2
    /*$(".quantity-minus-pro-detail,.quantity-plus-pro-detail,input.qty-pro").on(
        "click change",
        function (event) {
            const _target = event.target;

            switch (_target.classList[0]) {
                case "quantity-minus-pro-detail":
                    if (_target.nextElementSibling.value < 1) {
                        _target.nextElementSibling.value =
                            parseInt(_target.nextElementSibling.value) - 1;
                    } else {
                        _target.nextElementSibling.value = 1;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                        return false;
                    }
                    break;
                case "quantity-plus-pro-detail":
                    _target.previousElementSibling.value =
                        parseInt(_target.previousElementSibling.value) + 1;
                    break;
                case "qty-pro":
                    if (_target.value < 1) {
                        _target.value = 1;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                        return false;
                    }
                    break;
                default:
                    showNotify("Không hợp lệ", "Thông báo", "error");
                     break;
            }
        }
    );*/

    // Quantity with AJAX || cart page
    $("body").on(
        "click change",
        ".counter-procart-minus,.counter-procart-plus,input.quantity-procart",
        function (event) {
            const _target = event.target;
            const route = $(this)
                    .parents(".quantity-counter-procart[data-route]")
                    .data("route"),
                id = $(this).parents(".procart[data-id]").data("id");
            let method = "";
            const qtyInput = _target.closest('.quantity-counter-procart').querySelector('input.quantity-procart');
            const maxQuantity = parseInt(qtyInput.getAttribute('data-max-quantity')) || Infinity;

            switch (_target.classList[0]) {
                case "counter-procart-minus":
                    if (_target.nextElementSibling.value > 1) {
                        _target.nextElementSibling.value =
                            parseInt(_target.nextElementSibling.value) - 1;
                        method = "minus";
                    } else {
                        _target.nextElementSibling.value = 1;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                        return false;
                    }
                    break;
                case "counter-procart-plus":
                    if (_target.previousElementSibling.value >= maxQuantity) {
                        showNotify(
                            `Bạn đã thêm quá số lượng tồn kho`,
                            "Thông báo",
                            "error"
                        );
                    } else {
                        _target.previousElementSibling.value =
                        parseInt(_target.previousElementSibling.value) + 1;
                        method = "plus";
                        break;
                    }

                case "quantity-procart":
                    if (_target.value < 1) {
                        _target.value = 1;
                        method = _target.value;
                        showNotify(
                            "Số lượng không được nhỏ hơn 1",
                            "Thông báo",
                            "error"
                        );
                    } else if (_target.value >= maxQuantity) {
                        _target.value = maxQuantity;
                        showNotify(
                            "Bạn đã nhập quá số lượng tồn kho",
                            "Thông báo",
                            "error"
                        );
                    } else {
                        method = _target.value;
                    }
                    break;
                // default:
                //     showNotify("Không hợp lệ", "Thông báo", "error");
                //     break;
            }
            console.log("route");
            $.ajax({
                url: route + method,
                type: "GET",
                success: function (response) {
                    if (response) {
                        $(".procart[data-id=" + id + "]")
                            .find(".load-price-total")
                            .text(formatMoney(response.update_price));
                        $(".list-procart")
                            .find("#load-total")
                            .text(formatMoney(response.total));
                    }
                },
            });
        }
    );  

    // Delete product from cart
    $("body").on("click", ".del-procart", function (event) {
        event.preventDefault();

        const userConfirmed = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    
        if (!userConfirmed) {
            return;
        }

        const route = $(this).parents(".procart[data-route]").data("route"),
            id = $(this).parents(".procart[data-id]").data("id");

        $.ajax({
            url: route,
            type: "GET",
            success: function (response) {
                if (response) {
                    if ($("body").find(".procart[data-id]").length - 1 === 0) {
                        location.reload();
                    } else {
                        $(".list-procart")
                            .find('.procart[data-id="' + id + '"]')
                            .remove();
                        $(".list-procart")
                            .find("#load-total")
                            .text(formatMoney(response.total));
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });

    $(".show-password").on("click", function () {
        console.log("click");
        var passwordInput = $(this)
            .parents("body")
            .find("input[name=password],input[name=confirm-password],input[name=current_password],input[name=new_password],input[name=new_password_confirm]");
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            $("body").find(".show-password>span").removeClass("fas fa-eye");
            $("body")
                .find(".show-password>span")
                .addClass("fa-solid fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            $("body")
                .find(".show-password>span")
                .removeClass("fa-solid fa-eye-slash");
            $("body").find(".show-password>span").addClass("fas fa-eye");
        }
    });
}

$(document).ready(function () {
    AOS.init({
        once: false,
    });
    // PeShiner();
    TranslateClick();
    setupBackToTop();
    SlickPage();
    AllRun();
});
