function encrypt_decrypt($action, $string) {
    // ...
}

function transferuriCorporateLogin($email, $password) {
    global $mysqli;
    
    $encrypted_password = encrypt_decrypt('encrypt', $password);
    $stmt = $mysqli->prepare("SELECT id, name FROM tra_users_corporates WHERE email = ? AND password = ? AND active = 1");
    $stmt->bind_param("ss", $email, $encrypted_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // return id și name
    } else {
        return false;
    }
}

function transferuriCorporateListTransfers($idCorporate, $date = null) {
    global $mysqli;
    $query = "SELECT * FROM rt_transferuri WHERE idCorporate = ?";
    
    if ($date) {
        $query .= " AND data_preluare = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("is", $idCorporate, $date);
    } else {
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $idCorporate);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $transfers = [];

    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            if (in_array($key, ['preluare', 'destinatie', 'preluare_lat', 'preluare_long', 'destinatie_lat', 'destinatie_long', 'nr_zbor', 'nume', 'telefon', 'email', 'info'])) {
                $row[$key] = encrypt_decrypt('decrypt', $value);
            }
        }
        $transfers[] = $row;
    }

    return json_encode($transfers);
}

function transferuriCorporateAddTransfer($idCorporate, $transferData) {
    global $mysqli;

    foreach ($transferData as $key => $value) {
        if (in_array($key, ['preluare', 'destinatie', 'preluare_lat', 'preluare_long', 'destinatie_lat', 'destinatie_long', 'nr_zbor', 'nume', 'telefon', 'email', 'info'])) {
            $transferData[$key] = encrypt_decrypt('encrypt', $value);
        }
    }

    $stmt = $mysqli->prepare("INSERT INTO rt_transferuri (idCorporate, preluare, destinatie, preluare_lat, preluare_long, destinatie_lat, destinatie_long, nr_zbor, nume, telefon, email, info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssssss", $idCorporate, $transferData['preluare'], $transferData['destinatie'], $transferData['preluare_lat'], $transferData['preluare_long'], $transferData['destinatie_lat'], $transferData['destinatie_long'], $transferData['nr_zbor'], $transferData['nume'], $transferData['telefon'], $transferData['email'], $transferData['info']);
    
    return $stmt->execute();
}

function transferuriCorporateEditTransfer($idTransfer, $transferData) {
    global $mysqli;

    foreach ($transferData as $key => $value) {
        if (in_array($key, ['preluare', 'destinatie', 'preluare_lat', 'preluare_long', 'destinatie_lat', 'destinatie_long', 'nr_zbor', 'nume', 'telefon', 'email', 'info'])) {
            $transferData[$key] = encrypt_decrypt('encrypt', $value);
        }
    }

    $stmt = $mysqli->prepare("UPDATE rt_transferuri SET preluare = ?, destinatie = ?, preluare_lat = ?, preluare_long = ?, destinatie_lat = ?, destinatie_long = ?, nr_zbor = ?, nume = ?, telefon = ?, email = ?, info = ? WHERE id = ?");
    $stmt->bind_param("sssssssssssi", $transferData['preluare'], $transferData['destinatie'], $transferData['preluare_lat'], $transferData['preluare_long'], $transferData['destinatie_lat'], $transferData['destinatie_long'], $transferData['nr_zbor'], $transferData['nume'], $transferData['telefon'], $transferData['email'], $transferData['info'], $idTransfer);
    
    return $stmt->execute();
}

function transferuriCorporateGetTransfer($idCorporate, $idTransfer) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM rt_transferuri WHERE idCorporate = ? AND id = ?");
    $stmt->bind_param("ii", $idCorporate, $idTransfer);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        foreach ($row as $key => $value) {
            if (in_array($key, ['preluare', 'destinatie', 'preluare_lat', 'preluare_long', 'destinatie_lat', 'destinatie_long', 'nr_zbor', 'nume', 'telefon', 'email', 'info'])) {
                $row[$key] = encrypt_decrypt('decrypt', $value);
            }
        }
        return json_encode($row);
    } else {
        return false;
    }
}

function transferuriCorporateSearchTransfers($idCorporate, $filters) {
    global $mysqli;
    $query = "SELECT * FROM rt_transferuri WHERE idCorporate = ?";
    $params = [$idCorporate];
    $types = "i";

    foreach ($filters as $key => $value) {
        if (in_array($key, ['preluare', 'destinatie', 'email', 'telefon', 'nume'])) {
            $value = encrypt_decrypt('encrypt', $value);
        }
        $query .= " AND $key = ?";
        $params[] = $value;
        $types .= "s";
    }

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();

    $transfers = [];
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            if (in_array($key, ['preluare', 'destinatie', 'preluare_lat', 'preluare_long', 'destinatie_lat', 'destinatie_long', 'nr_zbor', 'nume', 'telefon', 'email', 'info'])) {
                $row[$key] = encrypt_decrypt('decrypt', $value);
            }
        }
        $transfers[] = $row;
    }

    return json_encode($transfers);
}

function transferuriCorporateCalendarCount($idCorporate, $date = null) {
    global $mysqli;
    $query = "SELECT COUNT(CASE WHEN type = 'shared' THEN 1 END) as shared_count, COUNT(CASE WHEN type = 'private' THEN 1 END) as private_count FROM rt_transferuri WHERE idCorporate = ?";

    if ($date) {
        $query .= " AND data_preluare = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("is", $idCorporate, $date);
    } else {
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $idCorporate);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    return json_encode($result->fetch_assoc());
}