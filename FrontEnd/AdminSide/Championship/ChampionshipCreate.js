function createChampionship(){

    let championshipName = $('#championshipName').val()
    let championshipCountry = $('#championshipCountry').val()
    let championshipSeason = $('#championshipSeason').val()
    let championshipWebsite = $('#championshipWebsite').val()
    let championshipFacebook = $('#championshipFacebook').val()
    let championshipTwitter = $('#championshipTwitter').val()
    let championshipYouTube = $('#championshipYouTube').val()


    var raw = `{\r\n    \"championshipName\" : \"${championshipName}\",
    \r\n    \"championshipCountry\" : \"${championshipCountry}\",
    \r\n    \"championshipSeason\" : \"${championshipSeason}\",
    \r\n    \"championshipWebsite\" : \"${championshipWebsite}\",
    \r\n    \"championshipFacebook\" : \"${championshipFacebook}\",
    \r\n    \"championshipTwitter\" : \"${championshipTwitter}\",
    \r\n    \"championshipYouTube\" : \"${championshipYouTube}\"}`;




    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "text/plain");
    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };






    let result = fetch("http://localhost/gt3prostats/api/championship/Createchampionship.php", requestOptions)
        .then(response => response.text())
        .then(result => {
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Championship Created
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
                Championship Not Created
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        });

}