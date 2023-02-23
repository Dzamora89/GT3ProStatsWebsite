$( document ).ready(getSelect() )

function getSelect() {
    $('#showRace').hide()
    $('#updateSelect2').hide()
    const requestOptions1 = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch("http://localhost/gt3prostats/api/championship/getallchampionship.php", requestOptions1)
        .then(response => response.json())
        .then(data => data.forEach((dato) => {
            let select = document.getElementById('updateSelect')
            let option = document.createElement("option")
            option.value = dato.championshipID
            option.text = `${dato.name} , ${dato.season} `
            select.add(option);
        }))
        .catch(error => console.log('error', error));

}

$('#updateSelect').change(() => {
    $('#updateSelect2').show()
    $('#updateSelect2').empty()
    const requestOptions1 = {
        method: 'GET',
        redirect: 'follow'
    };

    let url = `http://localhost/gt3prostats/api/race/getraceofchampionshipid.php?championshipID=${document.getElementById("updateSelect").value}`

    fetch(url, requestOptions1)
        .then(response => response.json())
        .then(data => data.forEach((dato) => {
            let select = document.getElementById('updateSelect2')
            let option = document.createElement("option")
            if($('#updateSelect').val() == dato.championshipID){
                option.value = dato.raceID
                option.text = `${dato.track} , ${dato.country} `
                select.add(option);
            }

        }))
        .catch(error => console.log('error', error));

})

$('#updateSelect2').change(() => {
    const requestOptions2 = {
        method: 'GET',
        redirect: 'follow'
    };

    let url = `http://localhost/gt3prostats/api/Race/getRaceByID.php?raceID=${$('#updateSelect2').val()}`
    $('#showRace').show();
    fetch(url, requestOptions2)
        .then(response => response.json())
        .then(jsonResult => {
            $('#showRace').html(`<form class="d-flex flex-wrap justify-content-center w-100 gap-3">
        <div class="input-group mb-3 w-25">
            <span class="input-group-text" >Track Name</span>
            <input value="${jsonResult.track}" id="track" type="text" class="form-control" placeholder="Circuit" aria-label="circuit" aria-describedby="circuit">
        </div>

        <div class="input-group mb-3 w-25">
            <span class="input-group-text" >Country</span>
            <input value="${jsonResult.country}" id="country" type="text" class="form-control" placeholder="Country" aria-label="Country" aria-describedby="Country">
        </div>

        <div class="input-group mb-3 w-25">
            <span class="input-group-text" >Race date</span>
            <input value="${jsonResult.dateOfRace}" id="dateOfRace" type="date" class="form-control"   aria-label="Race date" aria-describedby="Race-date">
        </div>
    </form>
    <button class="btn bg-success align-items w-50 m-auto mt-5" onclick="updateRace()">Update a Race</button>`)
        }).catch(error => console.log('error', error));

})

function updateRace() {

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "text/plain");


    let raceID = $('#updateSelect2').val()
    let track = $('#track').val()
    let dateOfRace = $('#dateOfRace').val()
    let country = $('#country').val()
    let championshipID = $('#updateSelect').val()


    var raw = `{\r\n    \"raceID\" : \"${raceID}\",
    \r\n    \"track\" : \"${track}\",
    \r\n    \"dateOfRace\" : \"${dateOfRace}\",
    \r\n    \"country\" : \"${country}\",
    \r\n    \"championshipID\" : \"${championshipID}\"}`;

    var requestOptions3 = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    fetch("http://localhost/gt3prostats/api/Race/UpdateRace.php", requestOptions3)
        .then(response => response.text())
        .then(result => {
            console.log(result)
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Race Updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        })
        .catch(error => {
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-danger alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Race NOT UPDATED
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        });
    $('#showRace').hide()
    getSelect()
}