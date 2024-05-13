<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ricevi i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Esegui operazioni sui dati, come la validazione o il salvataggio nel database

    // Ad esempio, qui potresti validare i dati ricevuti
    if (empty($username) || empty($password)) {
        echo "Compila tutti i campi del modulo.";
    } else {
        // Esempio di salvataggio dei dati in un file di testo
        $file = fopen("saved_data.txt", "a");
        fwrite($file, "Username: $username, Password: $password\n");
        fclose($file);
        echo "I dati sono stati salvati correttamente.";
    }
} else {
    // Se l'utente accede direttamente a questo script senza inviare il form, reindirizza a una pagina di errore o alla pagina del form
    header("Location: form.html");
    exit;
}
?>
