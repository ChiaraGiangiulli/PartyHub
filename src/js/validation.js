const validator = new JustValidate('#signup', {
    submitFormAutomatically: true,
});
validator
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

    .addField('#email', [
        {
            rule: 'required',
        },
        {
            rule: 'email'
        }
    ]);


