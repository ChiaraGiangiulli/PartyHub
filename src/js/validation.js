const validator = new JustValidate('#signup');

validator
    .addField('#name', [
        {
            rule: 'required',
        },
        {
            rule: 'maxLength',
            value: 15,
        },
    ])
    .addField('#surname', [
        {
            rule: 'required',
        },
        {
            rule: 'maxLength',
            value: 15,
        },
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
            value: '/z^(?=.*[a-zA-Z])[a-zA-Z0-9._-]{3,}$/'
        }
    ])

    .addField('#pwd', [
        {
            rule: 'required',
        },
        {
            rule: 'minLength',
            value: 8,
        },
    ])

