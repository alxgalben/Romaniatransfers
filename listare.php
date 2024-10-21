<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Listing</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .transfer-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .transfer-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .transfer-status {
            color: red;
            font-weight: bold;
        }
        .transfer-details {
            font-size: 14px;
            line-height: 1.5;
        }
        .flag-icon {
            width: 24px;
            height: 16px;
            margin-right: 10px;
        }
    </style>
</head>
<body class="bg-light">

<!-- Top Navbar -->
<nav class="navbar navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">RomaniaTransfers.eu</a>
        <div class="d-flex align-items-center">
            <span class="me-3">(+4) 0752 220 222</span>
            <div class="dropdown">
                <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> enkosoft company
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Transferuri</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <!-- Date and Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-warning btn-sm" id="prevDateBtn">Prev</button>
        <input type="text" class="form-control w-25 text-center" id="transferDate" value="2024-10-31">
        <button class="btn btn-warning btn-sm" id="nextDateBtn">Next</button>
    </div>

    <!-- Transfer List Table -->
    <div class="card">
        <div class="card-body">
            <div class="row transfer-header">
                <div class="col-md-2">Ora</div>
                <div class="col-md-7">Descriere</div>
                <div class="col-md-3">Plata</div>
            </div>

            <!-- Transfer Row 1 -->
            <div class="row transfer-row">
                <div class="col-md-2">
                    <div>00:23</div>
                </div>
                <div class="col-md-7">
                    <div class="d-flex">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Romania.svg/1200px-Flag_of_Romania.svg.png" class="flag-icon">
                        <div class="transfer-details">
                            <strong class="text-danger">PRIVAT (id: 46523)</strong><br>
                            Nume Client: TEST<br>
                            Status transfer: <span class="text-danger">Anulat</span><br>
                            Nr. Persoane: 1<br>
                            Telefon: 0742<br>
                            Email: sergiu.hriscu@gmail.com<br>
                            De la adresa: Iași, test<br>
                            La adresa: Iași Aeroport (IAS)<br>
                            Clasa auto: PREMIUM<br>
                            Informații suplimentare transfer: test anulez singur
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="transfer-details">
                        Preț: <strong>30.00€</strong><br>
                        Tip plată: plata mai târziu<br>
                        Status plată: <span class="transfer-status">Neplătit</span>
                    </div>
                    <button class="btn btn-warning btn-sm float-end">Transfer</button>
                </div>
            </div>

            <!-- Transfer Row 2 (duplicate for demonstration) -->
            <div class="row transfer-row">
                <div class="col-md-2">
                    <div>00:23</div>
                </div>
                <div class="col-md-7">
                    <div class="d-flex">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Romania.svg/1200px-Flag_of_Romania.svg.png" class="flag-icon">
                        <div class="transfer-details">
                            <strong class="text-danger">PRIVAT (id: 46524)</strong><br>
                            Nume Client: TEST<br>
                            Status transfer: <span class="text-danger">Anulat</span><br>
                            Nr. Persoane: 1<br>
                            Telefon: 0742<br>
                            Email: sergiu.hriscu@gmail.com<br>
                            De la adresa: Iași, test<br>
                            La adresa: Iași Aeroport (IAS)<br>
                            Clasa auto: PREMIUM<br>
                            Informații suplimentare transfer: test anulez singur
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="transfer-details">
                        Preț: <strong>30.00€</strong><br>
                        Tip plată: plata mai târziu<br>
                        Status plată: <span class="transfer-status">Neplătit</span>
                    </div>
                    <button class="btn btn-warning btn-sm float-end">Transfer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Utility function to format a date as YYYY-MM-DD
function formatDate(date) {
    let d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

// Function to update the date in the input field
function changeDate(days) {
    const dateInput = document.getElementById('transferDate');
    const currentDate = new Date(dateInput.value.split('/').reverse().join('-'));
    currentDate.setDate(currentDate.getDate() + days);
    dateInput.value = formatDate(currentDate).split('-').reverse().join('/');
}

// Event listeners for Next and Prev buttons
document.getElementById('prevDateBtn').addEventListener('click', function() {
    changeDate(-1); // Subtract one day
});

document.getElementById('nextDateBtn').addEventListener('click', function() {
    changeDate(1); // Add one day
});

</script>

</body>
</html>
