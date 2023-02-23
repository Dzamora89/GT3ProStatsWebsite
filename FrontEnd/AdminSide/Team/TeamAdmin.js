//Todo: Jquery Events
var requestOptions = {
    method: 'GET',
    redirect: 'follow'
};

fetch("http://localhost/gt3prostats/api/team/getallteam.php", requestOptions)
    .then(response => response.json())
    .then(data => data.forEach((dato) => {
        $('#TeamTable').append(`<tr>
                <td>${dato.teamID}</td>
                <td>${dato.teamName}</td>
                <td>${dato.teamCountry}</td>
                <td>${dato.teamWebsite}</td>
                </tr>`)
    }))
    .catch(error => console.log('error', error));

