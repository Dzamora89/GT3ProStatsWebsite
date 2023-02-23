$( document ).ready(getSelect() )
function getSelect() {

    const requestOptions1 = {
        method: 'GET',
        redirect: 'follow'
    };


    fetch("http://localhost/gt3prostats/api/championship/getallchampionship.php", requestOptions1)
        .then(response => response.json())
        .then(data => data.forEach((dato) => {
            let select = document.getElementById('championshipSelect')
            let option = document.createElement("option")
            option.value = dato.championshipID
            option.text = `${dato.name} , ${dato.season} `
            select.add(option);
        }))
        .catch(error => console.log('error', error));

}


function createRace(){

    let track = $('#track').val()
    let dateOfRace = $('#dateOfRace').val()
    let country = $('#country').val()
    let championshipID = $('#championshipSelect').val()



    var raw = `{\r\n    \"track\" : \"${track}\",
    \r\n    \"dateOfRace\" : \"${dateOfRace}\",
    \r\n    \"country\" : \"${country}\",
    \r\n    \"championshipID\" : \"${championshipID}\"}`;




    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "text/plain");
    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };






    let result = fetch("http://localhost/gt3prostats/api/race/Createrace.php", requestOptions)
        .then(response => response.text())
        .then(result => {
            console.log(result)
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Race Created
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
                Race Not Created
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        });

}