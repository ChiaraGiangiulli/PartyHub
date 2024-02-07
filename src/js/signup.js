document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("signupButton").addEventListener("click", function() {
        const validateSignup = new JustValidate('#signup');
        validateSignup
            .addField('#name', [
                {
                    rule: 'required',
                },
                {
                    rule: 'minLength',
                    value: 2,
                },
                {
                    rule: 'maxLength',
                    value: 15,
                },
                {
                    errorMessage: 'Names must contain only alphabetic letters',
                    rule: 'customRegexp',
                    value: '[a-zA-Z]+$'
                }
            ])
            .addField('#surname', [
                {
                    rule: 'required',
                },
                {
                    rule: 'minLength',
                    value: 2,
                },
                {
                    rule: 'maxLength',
                    value: 15,
                },
                {
                    errorMessage: 'Names must contain only alphabetic letters',
                    rule: 'customRegexp',
                    value: '[a-zA-Z]+$'
                }
            ])
            .addField('#username', [
                {
                    rule: 'required',
                },
                {
                    rule: 'maxLength',
                    value: 15,
                },
                {
                    errorMessage: 'Invalid username. It must be at least 3 characters long, include at least one letter, and may contain alphanumeric or special characters',
                    rule: 'customRegexp',
                    value: '(?=.*[a-zA-Z])[a-zA-Z0-9._-]{3,}$'
                }
            ])
        
            .addField('#pwd', [
                {
                    rule: 'required',
                },
                {
                    rule: 'password'
                }
            ])
        
            .addField('#rpwd', [
                {
                    rule: 'required',
                },
                {
                    validator: (value, fields) => {
                    if (
                        fields['#pwd'] &&
                        fields['#pwd'].elem
                    ) {
                        const repeatPasswordValue =
                        fields['#pwd'].elem.value;
            
                        return value === repeatPasswordValue;
                    }
            
                    return true;
                    },
                    errorMessage: 'Passwords should be the same',
                },
                ])
            
                .addField('#dob', [
                    {
                        rule: 'required',
                    },
                    {
                        validator: (value) => {
                            const selectedDate = new Date(value);
                            const today = new Date();
                            return selectedDate < today;
                        },
                        errorMessage: 'The date of birth cannot be later than today',
                    },
                ])
        
                .addField('#email', [
                    {
                        rule: 'required',
                    },
                    {
                        rule: 'email'
                    }
                ]);
        let validated = false;
        validateSignup.onSuccess(() => {
            if(!validated){
                validated = true;
                let form = document.getElementById("signup");
                let formData = new FormData();
                formData.append('name', form.elements["name"].value);
                formData.append('surname', form.elements["surname"].value);
                formData.append('username', form.elements["username"].value);
                formData.append('email', form.elements["email"].value);
                formData.append('password', form.elements["pwd"].value);
                formData.append('dateofbirth', form.elements["dob"].value);
                if (form.elements["image"].files.length > 0) {
                    formData.append('image', form.elements["image"].files[0]);
                }
                axios.post('./api/signup.php', formData).then(response => {
                    if (response.data.success){
                        window.open('./view/succesfullSignup.php','_self')
                    } else {
                        alert(response.data.message);
                    }
                });
            
            }
        });
    });
});


