//Todo: JQuery Events

var requestOptions = {
    method: 'GET',
    redirect: 'follow'
};


fetch("http://localhost/gt3prostats/api/Car/getallCar.php", requestOptions)
    .then(response => response.json())
    .then(data => data.forEach( (dato) => {
        let select = document.getElementById('deleteSelect')
        let option = document.createElement("option")
        option.value = dato.carID
        option.text = `#${dato.carNumber} --> ${dato.carManufacturer} --> ${dato.teamName} `
        select.add(option);
    }  ))
    .catch(error => console.log('error', error));





$('#deleteSelect').change( () => {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    let url = `http://localhost/gt3prostats/api/Car/getCarByID.php?carID=${document.getElementById("deleteSelect").value}`

    fetch(url, requestOptions)
        .then(response => response.text())
        .then(result => {
            let jsonResult = JSON.parse(result)
            let div = document.getElementById('showCar')
            div.innerHTML = `
            <form class="d-flex flex-wrap justify-content-center w-100 gap-3">
            <div class="input-group mb-3 ">
                <span class="input-group-text w-25">Manufacturer</span>
                <input disabled id="carManufacturer" type="text" class="form-control" placeholder="Manufacturer" aria-label="Manufacturer" aria-describedby="Manufacturer" value="${jsonResult.carManufacturer}">
            </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="number">Number</span>
                <input disabled id="carNumber" type="text" class="form-control"  aria-label="Number" aria-describedby="Number" value="${jsonResult.carNumber}">
        </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="Class">class</span>
                <input disabled id="className" type="text" class="form-control"  aria-label="Class" aria-describedby="Class" value="${jsonResult.carClass}">
        </div>
        <select disabled id="teamName" class="form-select w-50" aria-label="Team Select">
           

        </select>
        </form>
        <button class="btn bg-danger align-items w-50 m-auto mt-5" onclick="deleteCar()"> Delete Car </button>
    </div>
        </form>
    
    `;
            let team = jsonResult.teamID

            fetch("http://localhost/gt3prostats/api/Team/getAllTeam.php", requestOptions)
                .then(response => response.json())
                .then(data => data.forEach( (dato) => {
                    if (dato.teamID === team){
                        $('#teamName').append(`<option value="${dato.teamID}" selected>${dato.teamName}</option>`)
                    }else {
                        $('#teamName').append(`<option value="${dato.teamID}">${dato.teamName}</option>`)
                    }

                }  ))
                .catch(error => console.log('error', error));

        })
        .catch(error => console.log('error', error));
})



function deleteCar() {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "text/plain");


    let carID = document.getElementById("deleteSelect").value


    var raw = `{\r\n    \"carID\" : \"${carID}\"
    \r\n}`;

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    fetch("http://localhost/gt3prostats/api/car/DeleteCar.php", requestOptions)
        .then(response => response.text())
        .then(result => {
            console.log(result)
            let alert = document.createElement("div")
            alert.innerHTML =
                `<div class="alert alert-success alert-dismissible fade show w-50 m-auto mt-3" role="alert">
                Car Deleted
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
                Car NOT DELETED
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;

            document.getElementById('principal').appendChild(alert)
        });

}