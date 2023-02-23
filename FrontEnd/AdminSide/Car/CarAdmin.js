var requestOptions = {
    method: 'GET',
    redirect: 'follow'
};

//Todo:Jquery
fetch("http://localhost/gt3prostats/api/Car/getAllCar.php", requestOptions)
    .then(response => response.json())
    .then(data =>
        data.forEach( (dato) => {
                let table = document.getElementById('CarTable')
                let row = document.createElement('tr')
                let cell1 = document.createElement('td')
                let cell2 = document.createElement('td')
                let cell3 = document.createElement('td')
                let cell4 = document.createElement('td')


                cell1.innerHTML = dato.carID
                cell2.innerHTML = dato.carManufacturer
                cell3.innerHTML = dato.carNumber
                cell4.innerHTML = dato.teamName


                row.appendChild(cell1)
                row.appendChild(cell2)
                row.appendChild(cell3)
                row.appendChild(cell4)

                table.appendChild(row)


        } ))
    .catch(error => console.log('error', error));

