$(document).ready(function () {
    getProducts();
    getProductCategories();

    //photoUpload();

    $('#productForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            ProductName: {
                validators: {
                    notEmpty: { },
                    stringLength: {
                        min: 3,
                        max: 80
                    }
                }
            },
            ProductType: {
                validators: {
                    notEmpty: { },
                    digits: {
                        min: 1, max: 1
                    }
                }
            },
            ProductPrice: {
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            },
            ProductLoyalty: {
                validators: {
                    notEmpty: { },
                    integer: { },
                    greaterThan: {
                        value: 0
                    }
                }
            },
            ProductDescription: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 45
                    }
                }
            },
            ProductPhoto: {
                validators: {
                    file: {
                        extension: 'jpeg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152   // 2048 * 1024
                    }
                }
            },
            ProductSlots: {
                validators: {
                    notEmpty: { },
                    integer: { },
                    greaterThan: {
                        value: 0
                    }
                }
            }
        }
    })
        .on('success.form.fv', function(e) {
            e.preventDefault();

            if($('#productModalSubmit').text() == "Product bewerken") {
                // update existing product
                var editedProduct = Array();

                editedProduct["producttypeId"] = $('#ProductType').children(':selected').attr('value');
                editedProduct["promotionId"] = prodPromoId;
                editedProduct["name"] = $('#ProductName').val();
                editedProduct["description"] = $('#ProductDescription').val();
                editedProduct["photo"] = $('#ProductPhoto').val();
                editedProduct["price"] = $('#ProductPrice').val();
                editedProduct["slots"] = $('#ProductSlots').val();
                editedProduct["loyaltyPoints"] = $('#ProductLoyalty').val();
                photoUpload(existingProdId);
                updateProduct(editedProduct, resto_id, existingProdId);

                setTimeout(function() {
                    $('#productForm').data('formValidation').resetForm();
                    $("#productModalSubmit").removeClass('disabled');
                    $("#productModalSubmit").prop('disabled', false);
                    $('#newProductModal').hide();
                    $('body').css('opacity', 1);
                    //location.reload(true);
                }, 500);

            } else {
                // create new product
                var _product = {
                    'restaurantId': resto_id,
                    'producttypeId':$('#ProductType').children(':selected').attr('value'),
                    'promotionId':null,
                    'name':$('#ProductName').val(),
                    'description':$('#ProductDescription').val(),
                    'photo':$('#ProductPhoto').val(),
                    'price':$('#ProductPrice').val(),
                    'slots':$('#ProductSlots').val(),
                    'loyaltyPoints':$('#ProductLoyalty').val()
                };

                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": API_URL+"product",
                    "method": "POST",
                    "headers": {
                        "content-type": "application/json"
                    },
                    "processData": false,
                    "data": JSON.stringify(_product)
                }

                // creating new product
                $.ajax(settings).done(function (response) {
                    response = JSON.parse(response.substr(1, response.length-2));

                    if(response.id !== 0) {
                        new_product_id = response.id;
                        relatedProducts = $('#ProductRelatedProducts').val();

                        if(relatedProducts != null) {
                            if(relatedProducts.length != 0) {
                                relatedProducts.split(new_product_id, 1);
                                // setting up related product of newly created product (if any)
                                $.each(relatedProducts, function(index,item) {
                                    relateProducts(new_product_id, item);
                                });
                            }
                        }

                        //photoUpload(new_product_id);

                        $('#productForm').data('formValidation').resetForm();
                        $(submitBtn).removeClass('disabled');
                        $(submitBtn).prop('disabled', false);
                        $('#newProductModal').modal('hide');
                        //photoUpload(new_product_id);

                        $('#addProductPhotoModal').modal('show');
                        productPhotoUpload();

                        /*setTimeout(function() {
                            getProducts();
                        }, 500);*/
                    }
                });
            }
        }).on('err.form.fv', function(e) {
            e.preventDefault();

            setTimeout(function() {
                $(submitBtn).removeClass('disabled');
                $(submitBtn).prop('disabled', false);
            }, 1000);
        });

    $('#ProductRelatedProducts').chosen({
        disable_search_threshold: 3,
        no_results_text: 'Oeps, geen producten gevonden!',
        placeholder_text_multiple: 'Zoek een gerelateerd product',
        search_contains: true,
        width: '100%',
        max_selected_options: 3
    });
});

function getProductPhoto(product_id) {
    $.ajax({
        method: "GET",
        url: API_URL + 'product/' + product_id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        /*if((msg.length != 0) && (msg.photo != null)) {
            prodUrl = msg.photo.url;
        } else {
            prodUrl = '';
        }*/

        if((msg.length != 0) && (msg.photo != null)) {
            if((msg.photo.url).indexOf('null') != -1) {
                product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="/public/img/default_product.gif"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
            } else {
                product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+msg.photo.url+'"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
            }
        } else {
            product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="/public/img/default_product.gif"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
        }
    }).fail(function (jqXHR, textStatus) {
        console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });
}

function getProducts() {
    $.ajax({
        method: "GET",
        url: API_URL + 'restaurant/product/all/' + resto_id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        //console.log(msg);
        if(msg.length != 0) {
            $('#resto_products').html('');
            product_html = '';

            $.each(msg, function(index,item) {
                if(msg[index].photo != null) {
                    //console.log(msg[index].photo.url);
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg[index].id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+msg[index].photo.url+'"><div class="caption"><h3 id="thumbnail-label">'+msg[index].name+'</h3></div></div></div></a>';
                } else {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg[index].id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="/public/img/default_product.gif"><div class="caption"><h3 id="thumbnail-label">'+msg[index].name+'</h3></div></div></div></a>';
                }


                /*if((msg.length != 0) && (msg.photo != null)) {
                    if((msg.photo.url).indexOf('null') != -1) {
                        product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="/public/img/default_product.gif"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
                    } else {
                        product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+msg.photo.url+'"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
                    }
                } else {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+msg.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="/public/img/default_product.gif"><div class="caption"><h3 id="thumbnail-label">'+msg.name+'</h3></div></div></div></a>';
                }*/

                //getProductPhoto(item.id);
                $('#resto_products').html('<div class="row" id="loaderDiv" style="margin: 80px;"><span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span></div>');
            });



            //setTimeout(function() {
                $('#resto_products').html(product_html);
                $('#resto_products .thumbnail img').matchHeight();
                $('#resto_products .thumbnail').matchHeight();
            //}, 1000);
        } else {
            $('#resto_products').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn  nog geen producten te vinden.<br /><a href="#" data-toggle="modal" data-title="Nieuw product aanmaken" data-target="#newProductModal" data-backdrop="static" id="btn_new_product">Klik hier</a> om een nieuw product aan te maken.</div>');
        }
    }).fail(function (jqXHR, textStatus) {
        console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });
}

function getProductCategories() {
    // get all the categories
    $.ajax({
        method: "GET",
        "url": API_URL+"manage/producttype/all/",
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {

        //var categoryList = $('#ProductType');

        // first empty the dropdown menu and populate with default value@
        prodCategoryIds = [];
        prodCategories = [];
        //categoryList.empty();
        //categoryList.append('<option value=""></option>');

        $.each(msg, function(index,item) {
            prodCategoryIds.push(item.id);
            prodCategories.push(item.name);
            //categoryList.append('<option value="'+item.id+'">'+item.name+'</option>');
        });
    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

function setProductCategories() {
    $('#ProductType').empty();
    $('#ProductType').append('<option value=""></option>');

    $.each(prodCategoryIds, function(index,item) {
        $('#ProductType').append('<option value="'+prodCategoryIds[index]+'">'+prodCategories[index]+'</option>');
    });
    console.log('set');
}

function updatedProductPhotoUpload() {
    'use strict';

    $('#updatedProductPhotoUpload').fileupload({
        url: API_URL+'photo/product/'+existingProdId,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) { });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);

            if(progress == 100) {
                $('#ProductPhoto').parent().parent().removeClass('hidden');
                $('#ProductPhoto').val('Foto al toegevoegd');
                setTimeout(function() {
                    getProducts();
                }, 1000);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function productPhotoUpload() {
    'use strict';

    $('#newProductPhotoUpload').fileupload({
        url: API_URL+'photo/product/'+new_product_id,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) { });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);

            if(progress == 100) {
                $('#addProductPhotoModal').modal('hide');
                setTimeout(function() {
                    location.reload();
                }, 500);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function deleteProduct(prodId) {
    $.ajax({
        method: "GET",
        url: API_URL + 'product/delete/' + prodId,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        return true;
    }).fail(function (jqXHR, textStatus) {
        console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });
}

function updateProduct(values, restoId, prodId) {
    console.log(values);
    console.log(restoId);
    console.log(prodId);

    var transferData = {
        "id": prodId,
        "restaurantId": restoId,
        "producttypeId": values["producttypeId"],
        "promotionId": values["promotionId"],
        "name": values["name"],
        "description": values["description"],
        "photo": values["photo"],
        "price": values["price"],
        "slots": values["slots"],
        "loyaltyPoints": values["loyaltyPoints"]
    };

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"product",
        "method": "PUT",
        "headers": {
            "content-type": "application/json",
            "hash": "bade6027da78136bdd57a3c574d7afb4af1395d9"
        },
        cache: false,
        "processData": false,
        "data": JSON.stringify(transferData)
    }

    $.ajax(settings).done(function (response) {
        //console.log();
    });
}

function relateProducts(newProdId, relatedProd) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"product/related/"+newProdId+"/"+relatedProd,
        "method": "post",
        "headers": {
            "content-type": "application/json"
        },
        "processData": false
    }

    // creating new product link
    $.ajax(settings).done(function (response) {
        //console.log(response);
    });
}

$('#ProductRelatedProducts').on('chosen:maxselected', function(evt, params) { $('#ProductRelatedProductsError').addClass('label label-danger'); });

var product_html = '', prodUrl = '';
var resto_id = 5, counter = 0, new_product_id = 0, existingProdId = 0;
var prodPromoId = 0;
//const API_URL = 'http://localhost/RestaurantAtHomeAPI/';
const API_URL = 'http://playground.restaurantathome.be/api/';
var productTypes, submitBtn = '', temp = '';
var relatedProducts = Array(), prodCategories = Array(), prodCategoryIds = Array();

function get_data(method, type, id) {
    $.ajax({
        method: method,
        url: API_URL + type + '/' + id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        console.log(msg);
        return msg;
    }).fail(function (jqXHR, textStatus) {
        console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });
}

$('#newProductModal').off().on('show.bs.modal', function(e) {
    setProductCategories();
    // get all the categories
    /*$.ajax({
        method: "GET",
        "url": API_URL+"manage/producttype/all/",
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        var categoryList = $('#ProductType');

        // first empty the dropdown menu and populate with default value@
        categoryList.empty();
        categoryList.append('<option value=""></option>');

        $.each(msg, function(index,item) {
            categoryList.append('<option value="'+item.id+'">'+item.name+'</option>');
        });
        alert('ok');
    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });*/

    var button = $(e.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    var product_id = button.data('id');
    existingProdId = button.data('id');

    var modal = $(this);
    modal.find('.modal-title').text(title);
    submitBtn = modal.find('[type="submit"]');

    //modal.find('.modal-body input').val(title);



    // modal for updating an existing product
    if(product_id != undefined) {
        var product = '';
        submitBtn.text('Product bewerken');
        $('#ProductDelete').show();
        updatedProductPhotoUpload();

        // getting product info
        $.ajax({
            method: "GET",
            url: API_URL  + 'product/' + product_id,
            dataType: "jsonp",
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (msg) {
            product = msg;
            //console.log(product);
            $('#ProductName').val(product.name);
            $('#ProductType').val(product.producttypeId);
            $('#ProductPrice').val(product.price);
            $('#ProductLoyalty').val(product.loyaltyPoints);
            $('#ProductDescription').val(product.description);
            if(product.photo != null) {
                if((product.photo.url.indexOf('null') != -1)) {
                    $('#ProductPhoto').parent().parent().addClass('hidden');
                } else {
                    $('#ProductPhoto').parent().parent().removeClass('hidden');
                    $('#ProductPhoto').val('Foto al toegevoegd');
                }
            } else {
                $('#ProductPhoto').parent().parent().addClass('hidden');
            }

            $('#ProductSlots').val(product.slots);
            prodPromoId = product.promotionId;
        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

        // getting all the products, to show the related ones
        $.ajax({
            method: "GET",
            url: API_URL  + 'restaurant/product/all/' + resto_id,
            dataType: "jsonp",
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (msg) {
            product = msg;
            //console.log(product);

            var select_to_add = $('#ProductRelatedProducts');

            select_to_add.empty();
            select_to_add.append('<option value=""></option>');

            $.each(msg, function(index, item) {
                select_to_add.append($('<option></option>').val(item.id).html(item.name));
            });

            // getting info about existing product links
            $.ajax({
                method: "GET",
                url: API_URL  + 'product/related/' + product_id,
                dataType: "jsonp",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                }
            }).done(function (msg) {
                product = msg;

                /*var select_to_add = $('#ProductRelatedProducts');

                select_to_add.empty();
                select_to_add.append('<option value=""></option>');*/

                var relatedProducts = Array();

                $.each(msg, function(index, item) {
                    relatedProducts.push(item.id);
                    //$('#ProductRelatedProducts').val(item.id);
                    $('#ProductRelatedProducts').val(relatedProducts);
                    //select_to_add.append($('<option></option>').val(item.id).html(item.name));
                });

                $('#ProductRelatedProducts').trigger('chosen:updated');
            }).fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });

            select_to_add.trigger('chosen:updated');
        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

    // modal for creating a new product
    } else {
        submitBtn.text('Product aanmaken');
        $('#ProductDelete').hide();
        $('#PhotoBtn').hide();
        $('#ProductPhoto').parent().parent().addClass('hidden');

        $.ajax({
            method: "GET",
            url: API_URL  + 'restaurant/product/all/' + resto_id,
            dataType: "jsonp",
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (msg) {
            product = msg;
            //console.log(product);

            var select_to_add = $('#ProductRelatedProducts');

            select_to_add.empty();
            select_to_add.append('<option value=""></option>');

            $.each(msg, function(index, item) {
                select_to_add.append($('<option></option>').val(item.id).html(item.name));
            });

            select_to_add.trigger('chosen:updated');
        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

        $('#ProductName').val('');
        $('#ProductType').val('');
        $('#ProductPrice').val('');
        $('#ProductLoyalty').val('');
        $('#ProductDescription').val('');
        $('#ProductPhoto').val('');
        $('#ProductSlots').val('');

        var newProduct = {
            "restaurantId": resto_id,
            "producttypeId": $('#ProductType').val(),
            "name": $('#ProductName').val(),
            "description": $('#ProductDescription').val(),
            "loyaltyPoints": $('#ProductLoyalty').val(),
            "photo": $('#ProductPhoto').val(),
            "price": $('#ProductPrice').val(),
            "slots": $('#ProductSlots').val()
        };

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"product",
            "method": "POST",
            "headers": {
                "content-type": "application/json"
            },
            "processData": false,
            "data": JSON.stringify(newProduct)
        }

        //console.log(JSON.stringify(newProduct));

        /*$.ajax(settings).done(function (response) {
            console.log(response);
        });*/

        $('#ProductDelete').removeClass('hidden');
    }

    $(submitBtn).off().on('click', function(evt) {
        evt.preventDefault();
        $('body').css('opacity', 0.5);
        $(this).addClass('disabled');
        $(this).prop('disabled', true);
        console.log($('#ProductRelatedProducts').val());
        $('#productForm').submit();
    });

    $('#ProductDelete').off().on('click', function(evt) {
        evt.preventDefault();
        var button = $(e.relatedTarget); // Button that triggered the modal
        var product_id = button.data('id');

        //console.log(product_id);

        swal({
            title: "Bent u zeker dat u dit product wil verwijderen?",
            text: "Let op: dit is onomkeerbaar!",
            cancelButtonText: "Annuleren",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function(){
            setTimeout(function(){
                deleteProduct(product_id);
                swal("Product werd verwijderd!");


                setTimeout(function(){
                    location.reload(true);
                }, 1000);


            }, 500);
        });
    });

    $('#ProductPhotoDelete').off().on('click', function(evt) {
        evt.preventDefault();

        swal({
            title: "Bent u zeker dat u de foto van dit product wil verwijderen?",
            text: "Let op: dit is onomkeerbaar!",
            cancelButtonText: "Annuleren",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true
        },
        function(){
            setTimeout(function(){
                var editedProduct = Array();

                editedProduct["producttypeId"] = $('#ProductType').children(':selected').attr('value');
                editedProduct["promotionId"] = prodPromoId;
                editedProduct["name"] = $('#ProductName').val();
                editedProduct["description"] = $('#ProductDescription').val();
                editedProduct["photo"] = 'null';
                editedProduct["price"] = $('#ProductPrice').val();
                editedProduct["slots"] = $('#ProductSlots').val();
                editedProduct["loyaltyPoints"] = $('#ProductLoyalty').val();
                updateProduct(editedProduct, resto_id, existingProdId);
                $('#ProductPhoto').parent().parent().addClass('hidden');
            }, 500);

            setTimeout(function(){
                getProducts();
            }, 1000);
        });
    });

    /*$('#ProductRelatedProducts').on('change', function (e) {
        console.log($(this).val());
    });*/
});

$('#newProductModal').on('hide.bs.modal', function() {
    $('#productForm').data('formValidation').resetForm();
    $('#productModalSubmit').removeClass('disabled');
    $('#productModalSubmit').prop('disabled', false);
    $('body').css('opacity', 1);
});

$('#productSearch').on('keyup', function() {
    searchProducts($(this).val());
});

$('#productCategorieSearch').on('change', function(evt) {
    evt.preventDefault();

    if($(this).val().length != 0) {
        if($('#productSearch').val().length != 0) {
            searchCombined($('#productSearch').val(), $(this).val());
        } else {
            console.log('searchProductsCategory('+$(this).val()+');');
            searchProductsCategory($(this).val());
        }
    } else {
        if($('#productSearch').val().length != 0) {
            searchProducts($('#productSearch').val());
        } else {
            getProducts();
        }
    }
});

function searchProducts(searchTerm) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"dashboard/products/"+resto_id+"/0/12/1001=" + searchTerm,
        "method": "GET",
        "headers": {
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    // creating new product
    $.ajax(settings).done(function (response) {
        response = JSON.parse(response.substr(1, response.length-2));

        product_html = '';

        $('#resto_products').html('');

        if(response.products.length != 0) {
            $('#no_products_msg').addClass('hidden');
            $.each(response.products, function(index,item) {
                if(item.photo != null) {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+API_URL.substr(0, API_URL.length-4)+'api/files/'+item.photo+'"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                } else {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="http://lorempixel.com/600/480/food/"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                }
            });

            $('#resto_products').html(product_html);
            $('#resto_products .thumbnail img').matchHeight();
        } else {
            if(searchTerm.length != 0) {
                $('#resto_products').html('<div class="alert alert-info text-center hidden" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen producten gevonden met de naam "<span id="searchTermDisplay"></span>".<br /><a href="#" data-toggle="modal" data-title="Nieuw product aanmaken" data-target="#newProductModal" data-backdrop="static" id="btn_new_product">Klik hier</a> om een nieuw product aan te maken.</div>');
                $('#no_products_msg').removeClass('hidden');
                $('#searchTermDisplay').html('<strong>'+searchTerm+'</strong>');
            } else {
                getProducts();
            }
        }
    });
}

function searchProductsCategory(searchTerm) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"dashboard/products/"+resto_id+"/0/12/1005=" + searchTerm,
        "method": "GET",
        "headers": {
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).done(function (response) {
        response = JSON.parse(response.substr(1, response.length-2));

        console.log(response);
        product_html = '';

        $('#resto_products').html('');

        if(response.products.length != 0) {
            $('#no_products_msg').addClass('hidden');
            $.each(response.products, function(index,item) {
                if(item.photo != null) {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+API_URL.substr(0, API_URL.length-4)+'api/files/'+item.photo+'"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                } else {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="http://lorempixel.com/600/480/food/"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                }
            });

            $('#resto_products').html(product_html);
            $('#resto_products .thumbnail img').matchHeight();
        } else {
            if(searchTerm.length != 0) {
                $('#resto_products').html('<div class="alert alert-info text-center hidden" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen producten gevonden van deze categorie.<br /><a href="#" data-toggle="modal" data-title="Nieuw product aanmaken" data-target="#newProductModal" data-backdrop="static" id="btn_new_product">Klik hier</a> om een nieuw product aan te maken.</div>');
                $('#no_products_msg').removeClass('hidden');
            } else {
                getProducts();
            }
        }
    });
}

function searchCombined(searchProd, searchCat) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"dashboard/products/"+resto_id+"/0/12/1001="+searchProd+"&1005=" + searchCat,
        "method": "GET",
        "headers": {
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).done(function (response) {
        response = JSON.parse(response.substr(1, response.length-2));

        //console.log(response);
        product_html = '';

        $('#resto_products').html('');

        if(response.products.length != 0) {
            $('#no_products_msg').addClass('hidden');
            $.each(response.products, function(index,item) {
                if(item.photo != null) {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+API_URL.substr(0, API_URL.length-4)+'api/files/'+item.photo+'"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                } else {
                    product_html += '<a href="#" data-toggle="modal" data-title="Product bewerken" data-target="#newProductModal" data-backdrop="static" data-id="'+item.id+'" class="edit_product"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="http://lorempixel.com/600/480/food/"><div class="caption"><h3 id="thumbnail-label">'+item.name+'</h3></div></div></div></a>';
                }
            });

            $('#resto_products').html(product_html);
            $('#resto_products .thumbnail img').matchHeight();
        } else {
            if((searchProd.length != 0) || (searchCat.length != 0)) {
                $('#resto_products').html('<div class="alert alert-info text-center hidden" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen producten gevonden van deze categorie, of met deze benaming.<br /><a href="#" data-toggle="modal" data-title="Nieuw product aanmaken" data-target="#newProductModal" data-backdrop="static" id="btn_new_product">Klik hier</a> om een nieuw product aan te maken.</div>');
                $('#no_products_msg').removeClass('hidden');
            } else {
                getProducts();
            }
        }
    });
}

$('#productModalSubmit').on('click', function(evt) {
    evt.preventDefault();

    console.log($(this).val());
});