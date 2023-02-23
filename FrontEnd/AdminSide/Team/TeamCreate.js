function createTeam() {

    let teamName = $('#teamNameInput').val()
    let teamOwner = $('#teamOwnerInput').val()
    let teamCountry = $('#teamCountryInput').val()
    let teamWebsite = $('#teamWebsiteInput').val()
    let teamTwitter = $('#teamTwitterInput').val()
    let carBrand = $('#teamCarBrandInput').val()

    var raw = `{\r\n    \"teamName\" : \"${teamName}\",
    \r\n    \"teamOwner\" : \"${teamOwner}\",
    \r\n    \"teamCountry\" : \"${teamCountry}\",
    \r\n    \"teamTwitter\" : \"${teamTwitter}\",
    \r\n    \"teamWebsite\" : \"${teamWebsite}\",
    \r\n    \"teamCarBrand\" : \"${carBrand}\"\r\n}`;

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "text/plain");
    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };
    let result = fetch("http://localhost/gt3prostats/api/team/CreateTeam.php", requestOptions)
        .then(response => response.text())
        .then(result => {
            console.log(result)
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Team Created
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        })
        .catch(error => {
            console.log('error', error)
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-danger alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Team Not Created
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        });

}
