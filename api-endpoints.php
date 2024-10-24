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