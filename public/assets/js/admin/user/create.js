$(document).ready(function () {
    //Clases  de error  y valida de inputs de formularios
    let $invalidClass = "is-invalid";
    let $validClass = "is-valid";

    jQuery.validator.addMethod(
        "duplicatedEmail",
        function (value, element) {
            var result;

            $.ajax({
                url: "verify-duplicated-email",

                data: { email: value },
                datatype: "json",
                async: false,
                success: function (data) {
                    result = !JSON.parse(data.isDuplicated);
                },
            });

            return result;
        },
        "Email duplicado"
    );
    //metodo  para validar edad de usuarios
    jQuery.validator.addMethod(
        "mayorDeEdad",
        function (value, element) {
            var fechanacimiento = moment(value, "YYYY-MM-DD");
            if (!fechanacimiento.isValid()) return false;
            var years = moment().diff(fechanacimiento, "years");
            return years > 18;
        },
        "No es mayor de edad"
    );

    //Metodo para vlidar contrseña valida
    $.validator.addMethod(
        "strong_password",
        function (value, element) {
            let password = value;
            if (
                !/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(
                    password
                )
            ) {
                return false;
            }
            return true;
        },
        function (value, element) {
            let password = $(element).val();
            if (!/^(.{8,20}$)/.test(password)) {
                return "La contraseña debe estar entre 8 y 20 caracteres";
            } else if (!/^(?=.*[A-Z])/.test(password)) {
                return "La contraseña debe contener una mayuscula.";
            } else if (!/^(?=.*[a-z])/.test(password)) {
                return "La contraseña debe contener una minuscula.";
            } else if (!/^(?=.*[0-9])/.test(password)) {
                return "La contraseña debe tener un numero.";
            } else if (!/^(?=.*[@#$%&])/.test(password)) {
                return "La contraseña debe tener algun caracter especial @#$%&.";
            }
            return false;
        }
    );

    //Validacion de formulario
    let validator = $("#form-create").validate({
        errorElement: "span",
        errorClass: "form-text form-error text-danger",
        focusInvalid: true,
        ignore: "",
        rules: {
            email: {
                required: true,
                email: true,
                duplicatedEmail: true,
            },
            password: {
                required: true,
                strong_password: true,
            },
            password2: {
                required: true,
                equalTo: "#password",
            },
            name: { required: true, maxlength: 100 },

            cellphone: {
                minlength: 10,
                maxlength: 10,
            },
            cedula: { required: true, maxlength: 11 },
            birthday: { required: true, mayorDeEdad: true },
            country: { required: true },
            state: { required: true },
            city: { required: true },
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
            const data = $("#form-create").serialize();
            $.ajax("/users", {
                data: data,
                method: "post",
                success: function (data, status, xhr) {
                    $("#form-create")[0].reset();
                    validator.resetForm();
                    table.ajax.reload();
                    $("#modal-create").modal("toggle");
                    Swal.fire(data.message);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ocurrio un error",
                    });
                },
            });
        },
        invalidHandler: function (form) {},
    });
});

function getStates(country_id) {
    removeSelectItems("state");
    $.ajax(
        "/states-by-country", // request url
        {
            data: { countryId: country_id },
            success: function (data, status, xhr) {
                data.map((state) => {
                    $("#state").append(
                        "<option value='" +
                            state.id +
                            "'>" +
                            state.name +
                            "</option>"
                    );
                });
            },
        }
    );
}

function getCities(state_id) {
    removeSelectItems("city");
    $.ajax(
        "/cities-by-state", // request url
        {
            data: { stateId: state_id },
            success: function (data, status, xhr) {
                data.map((state) => {
                    $("#city").append(
                        "<option value='" +
                            state.id +
                            "'>" +
                            state.name +
                            "</option>"
                    );
                });
            },
        }
    );
}

function removeSelectItems(selectId) {
    $("#" + selectId).empty();
}
