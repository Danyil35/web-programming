$(document).ready(function () {
    $("#formJQuery").validate({
        errorClass: "invalid-feedback",
        errorElement: "div",
        highlight: function (element){
            $(element).removeClass("is-valid");
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element){
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            question: {
                required: true,
                minlength: 50
            },
            type: {
                required: true
            },
            role: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Введіть ваше ім'я",
                minlength: "Ім'я має бути не менше 2 символів"
            },
            email: {
                required: "Введіть вашу пошту",
                email: "Введіть дійсну пошту"
            },
            question: {
                required: "Введіть ваше запитання",
                minlength: "Запитання має бути не менше 50 символів"
            },
            type: {
                required: "Оберіть тип запитання"
            },
            role: {
                required: "Оберіть вашу роль"
            }
        }
    });
});
