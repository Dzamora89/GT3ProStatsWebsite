$(document).ready(fillTheTable())
function fillTheTable() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("http://localhost/gt3prostats/api/race/getallRace.php", requestOptions)
        .then(response => response.json())
        .then(dataRaces => {
            dataRaces.forEach((dato) =>{
                $('#raceTable').append(`<tr>
                <td>${dato.raceID}</td>
                <td>${dato.track}</td>
                <td>${dato.dateOfRace}</td>
                <td>${dato.country}</td>
                <td >${dato.name}</td>
                </tr>`)
            })})
        .catch(error => console.log('error', error));


}

