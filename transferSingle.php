<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card-header {
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 1rem;
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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    Transfer - <span class="text-danger">PRIVAT</span>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="transferDate" class="form-label">Data</label>
                                <input type="text" class="form-control" id="transferDate" value="31.10.2024">
                            </div>
                            <div class="col-md-6">
                                <label for="transferTime" class="form-label">Ora</label>
                                <input type="text" class="form-control" id="transferTime" value="00:23">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="startStop" class="form-label">Start - Stop</label>
                                <select id="startStop" class="form-select">
                                    <option value="premium">PREMIUM | EUR 30.00 / transfer</option>
                                    <option value="standard">STANDARD | EUR 20.00 / transfer</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="pickupAddress" class="form-label">Adresa preluare</label>
                                <input type="text" class="form-control" id="pickupAddress" value="Iași, test">
                            </div>
                            <div class="col-md-6">
                                <label for="destinationAddress" class="form-label">Adresa destinație</label>
                                <input type="text" class="form-control" id="destinationAddress" value="Iași Aeroport (IAS)">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price" class="form-label">Preț</label>
                                <input type="text" class="form-control" id="price" value="30.00">
                            </div>
                            <div class="col-md-6">
                                <label for="numberOfPeople" class="form-label">Numar persoane</label>
                                <input type="number" class="form-control" id="numberOfPeople" value="1">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="flightNumber" class="form-label">Numar zbor</label>
                                <input type="text" class="form-control" id="flightNumber" placeholder="Optional">
                            </div>
                            <div class="col-md-6">
                                <label for="flightTime" class="form-label">Ora zbor</label>
                                <input type="text" class="form-control" id="flightTime" value="00:23">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="flightDate" class="form-label">Data zbor</label>
                                <input type="text" class="form-control" id="flightDate" value="31.10.2024">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="additionalInfo" class="form-label">Informații suplimentare</label>
                                <textarea id="additionalInfo" class="form-control" rows="3">test anulez singur</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-warning">Salvează</button>
                            <button type="button" class="btn btn-secondary">Înapoi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Client</div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="clientName" class="form-label">Nume/Prenume</label>
                            <input type="text" class="form-control" id="clientName" value="Test">
                        </div>
                        <div class="mb-3">
                            <label for="clientEmail" class="form-label">Adresa Email</label>
                            <input type="email" class="form-control" id="clientEmail" value="sergiu.hriscu@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="clientPhone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="clientPhone" value="0742">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-warning">Salvează</button>
                            <button type="button" class="btn btn-secondary">Înapoi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
