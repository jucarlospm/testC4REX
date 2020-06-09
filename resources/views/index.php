<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C4REX Test - Juan Carlos Peña M.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-4">
        <h1 class="pb-4 text-center">C4REX Test - Juan Carlos Peña M.</h1>

        <h4>How many guests each DJ invited</h4>
        <table class="table p-5">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Guest</th>
            </tr>
            </thead>
            <tbody id="djsGuests">

            </tbody>
        </table>

        <h4>A leader board of the most liked DJ in the world</h4>
        <table class="table p-5">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Likes</th>
            </tr>
            </thead>
            <tbody id="likedDjs">

            </tbody>
        </table>

        <h4>How many people are being picked up from each location</h4>
        <table class="table p-5">
            <thead>
            <tr>
                <th scope="col">Location</th>
                <th scope="col">Guest</th>
            </tr>
            </thead>
            <tbody id="guestsLocation">

            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let api = "http://localhost:8000/api"

            fetch(`${api}/guests`)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    let djsGuests = document.getElementById("djsGuests");

                    if (data.length === 0) {
                        djsGuests.innerHTML += `
                        <tr>
                            <td colspan="2"><h3 class="text-center">No Records</h3></td>
                        </tr>
                        `
                        return;
                    }

                    for (let dat of data) {
                        djsGuests.innerHTML += `
                        <tr>
                            <td>${ dat.name }</td>
                            <td>${ dat.guests }</td>
                        </tr>
                        `
                    }
                })
                .catch(function (err) {
                    console.error(err);
                });

            fetch(`${api}/likedDjs`)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    let likedDjs = document.getElementById("likedDjs");

                    if (data.length === 0) {
                        likedDjs.innerHTML += `
                        <tr>
                            <td colspan="2"><h3 class="text-center">No Records</h3></td>
                        </tr>
                        `
                        return;
                    }

                    for (let dat of data) {
                        likedDjs.innerHTML += `
                        <tr>
                            <td>${ dat.name }</td>
                            <td>${ dat.likes }</td>
                        </tr>
                        `
                    }
                })
                .catch(function (err) {
                    console.error(err);
                });

            fetch(`${api}/guestsLocation`)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    let guestsLocation = document.getElementById("guestsLocation");

                    if (data.length === 0) {
                        guestsLocation.innerHTML += `
                        <tr>
                            <td colspan="2"><h3 class="text-center">No Records</h3></td>
                        </tr>
                        `
                        return;
                    }

                    for (let dat of data) {
                        guestsLocation.innerHTML += `
                        <tr>
                            <td>${ dat.location }</td>
                            <td>${ dat.guests }</td>
                        </tr>
                        `
                    }
                })
                .catch(function (err) {
                    console.error(err);
                });
        });
    </script>
</body>
</html>
