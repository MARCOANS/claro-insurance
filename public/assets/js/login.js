$(document).ready(function () {
    //Clases  de error  y valida de inputs de formularios
    let $invalidClass = "is-invalid";
    let $validClass = "is-valid";

    //Validacion de formulario
    let validator = $("#form-login").validate({
        errorElement: "span",
        errorClass: "form-text form-error text-danger",
        focusInvalid: true,
        ignore: "",
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },

        messages: {},

        highlight: function (element) {
            //agregar clase invalida y quitar clase valida
            var $element = $(element);

            $element.closest(".form-group").find(".form-text").remove();

            $element
                .addClass($invalidClass + " d-inline-block")
                .removeClass($validClass);
        },

        success: function (error, element) {
            //agregar clase valida y quitar clase invalida
            var $element = $(element);

            $element
                .removeClass($invalidClass)
                .closest(".form-group")
                .find(".form-text")
                .remove();

            $element.addClass($validClass + " d-inline-block");
        },

        errorPlacement: function (error, element) {
            error.addClass("d-inline-block").insertAfter(element);
        },

        submitHandler: function (form) {
            form.submit();
        },
        invalidHandler: function (form) {},
    });
});
