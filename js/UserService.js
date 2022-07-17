var UserService = {
    init: function () {
        var token = localStorage.getItem("token");
        if (token) {
            window.location.replace("index.html");
        }

        

        $('#login-form').validate({
            submitHandler: function (form) {
                var user = Object.fromEntries((new FormData(form)).entries());
                UserService.login(user);
            }
        });

        $('#registerForm').validate({
          rules: {
            firstName: {
                minlength: 2,
                required: true,
                maxlength: 35,
            },
            lastName: {
                minlength: 2,
                required: true,
                maxlength: 35,
            },
            username: {
                minlength: 4,
                required: true,
                maxlength: 20,
            },
            email: {
                required: true,
                email:true,

            },
            password: {
                minlength: 8,
                maxlength: 30,
                required: true,
            }
        },
            submitHandler: function (form) {
                var user = {};
                user.name = $('#registerName').val();
                user.surname = $('#registerSurname').val();
                user.username = $('#registerUsername').val();
                user.password = $('#registerPassword').val();
                user.email = $('#registerEmail').val();
                user.dateOfBirth = $('#registerDateOfBirth').val();
                user.photo = $('#photo').val();
                user.countryID = localStorage.getItem($('#countryMenuButton').text());
                UserService.register(user);
            }
        });

    },
    login: function (user) {
        $.ajax({
            type: "POST",
            url: ' rest/login',
            data: JSON.stringify(user),
            contentType: "application/json",
            dataType: "json",

            success: function (data) {
                localStorage.setItem("token", data.token);
                window.location.replace("homepage.html");

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                toastr.error(XMLHttpRequest.responseJSON.message);
            }
        });
    },

    logout: function () {
        localStorage.clear();
        window.location.replace("index.html");
    },

    register: function (user) {
        $.ajax({
            type: "POST",
            url: ' rest/register',
            data: JSON.stringify(user),
            contentType: "application/json",
            dataType: "json",

            success: function (data) {
                $('#SignUpModal').modal('toggle');
                localStorage.setItem("token", data.token);
                toastr.success('You have been succesfully registered.');
                localStorage.clear();

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                toastr.error(XMLHttpRequest.responseJSON.message);
            }
        });
    },
    getID: function () {
        var result = "";
        $.ajax({
            type: "GET",
            url: ' rest/id',
            async: false,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
            },
            success: function (data) {
                result = data;
            }
        });
        return result;
    },

    

    getUsername: function () {
        if (localStorage.hasOwnProperty('username')) {
            $("#profileUsername").text(localStorage.getItem("username"));
            $.ajax({
                type: "GET",
                url: ' rest/username',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
                },
                success: function (data) {
                    $('#editUsername').val(data);
                }
            });
        }
        else {
            $.ajax({
                type: "GET",
                url: ' rest/username',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
                },
                success: function (data) {
                    $('#profileUsername').text(data);
                    $('#editUsername').val(data);

                }
            });
        }
    },


    getEmail: function () {
        if (localStorage.hasOwnProperty('email')) {
            $("#profileEmail").text(localStorage.getItem("email"));
            $.ajax({
                type: "GET",
                url: ' rest/email',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
                },
                success: function (data) {
                    $('#editEmail').val(data);
                }
            });

        }
        else {
            $.ajax({
                type: "GET",
                url: ' rest/email',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
                },
                success: function (data) {
                    $('#profileEmail').text(data);
                    $('#editEmail').val(data);
                }
            });
        }
    },


}
