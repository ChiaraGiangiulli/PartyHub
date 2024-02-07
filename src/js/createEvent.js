document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("createEvent").addEventListener("click", function() {
        const validateEvent = new JustValidate('#newEventForm');
        
        validateEvent
            .addField(document.querySelector('#name'), [{
                rule: 'required',
                errorMessage: 'Please enter the event name.',
            }])
            .addField(document.querySelector('#address'), [{
                rule: 'required',
                errorMessage: 'Please enter the event address.',
            }])
            .addField(document.querySelector('#number'), [{
                rule: 'required',
                errorMessage: 'Please enter the event number.',
            }])
            .addField(document.querySelector('#city'), [{
                rule: 'required',
                errorMessage: 'Please enter the city.',
            }])
            .addField(document.querySelector('#country'), [{
                rule: 'required',
                errorMessage: 'Please enter the country.',
            }])
            .addField(document.querySelector('#date'), [{
                    rule: 'required',
                    errorMessage: 'Please select a date for the event.',
                },
                {
                    validator: (value) => {
                        const selectedDate = new Date(value);
                        const today = new Date();
                        return selectedDate > today;
                    },
                    errorMessage: 'The date of the event cannot be before the present day.',
                },
            ])
            .addField(document.querySelector('#time'), [{
                rule: 'required',
                errorMessage: 'Please select a time for the event.',
            }]);
        let validated = false;
        validateEvent.onSuccess(() => {
            if(!validated){
                validated = true;
                let form = document.getElementById("newEventForm");
                let formData = new FormData();
                formData.append('name', form.elements["name"].value);
                formData.append('address', form.elements["address"].value);
                formData.append('number', form.elements["number"].value);
                formData.append('city', form.elements["city"].value);
                formData.append('country', form.elements["country"].value);
                formData.append('date', form.elements["date"].value);
                formData.append('time', form.elements["time"].value);
                if (form.elements["image"].files.length > 0) {
                    formData.append('image', form.elements["image"].files[0].name);
                }
                axios.post('../api/newEvent.php', formData).then(response => {
                    if (response.data.success){
                        window.open(`/PartyHub/src/event.php?id=${response.data.id}`, '_self');
                    } else {
                        alert(response.data.message);
                    }
                });
            
            }
        });
    });
});
