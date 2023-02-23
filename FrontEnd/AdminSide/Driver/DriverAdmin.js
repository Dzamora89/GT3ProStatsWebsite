$(document).ready(fillTheTable())
function fillTheTable() {

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("http://localhost/gt3prostats/api/driver/getalldriver.php", requestOptions)
        .then(response => response.json())
        .then(data => data.forEach( (dato) => {
            $('#driverTable').append(`<tr>
                <td>${dato.driverID}</td>
                <td>${dato.firstName}</td>
                <td>${dato.lastName}</td>
                <td>${dato.driverELO}</td>
                </tr>`)


        }  ))
        .catch(error => console.log('error', error));


}