document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("createEvent").addEventListener("submit", function(event) {
            event.preventDefault();
            let form = document.getElementById("newEventForm");
            let formData = new FormData();
            let inputDate = form.elements["date"].value;
            let inputTime = form.elements["time"].value;
            let inputDateTime = new Date(inputDate + ' ' + inputTime);
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
                console.log(response.data);
                if (response.data.success){
                    window.open(`/PartyHub/src/event.php?id=${response.data.id}`, '_self');
                }
                else{
                    alert(response.data.message);
                }
            });
        });
});