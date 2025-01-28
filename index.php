<?php 
//  Campo inserimento password dell'utente
$userPassword= readline("Ciao Utente! Inserisci una Password per registrarti: \n deve contenere almeno: \n otto caratteri, \n un numero, \n un carattere MAIUSCOLO, \n un carattere speciale.");

// Inizio funzione controllo lunghezza password

function controlloLunghezza($password) { 
    
    if(strlen($password) < 8 ) {
        
        echo "La Password che hai inserito contiene " . strlen($password) . " caratteri! contenere almeno 8 caratteri \n" ;
        return false;
    };
    
    echo "Ottimo! la tua paswword contiene almeno otto caratteri! \n";
    return true ;
    
};

//Fine funzione controllo lunghezza password.

// Inizio funzione che controlla se contiene almeno un numero.

function controlloNumerico($password) { 
    
    
    for ($i=0; $i < strlen($password) ; $i++) {
        
        if (is_numeric($password[$i])) {
            
            echo "Ottimo! la tua password contiene almeno un numero! \n";
            return true;
            
        } 
    };
    
    echo "La password deve contenere almeno un numero \n";
    return false;
    
};

// Fine funzione che controlla se contiene almeno un numero.

// Inizio funzione che controlla se contiene almeno una maiuscola.
function controlloMaiuscola($password) { 
    
    
    for ($i=0; $i < strlen($password) ; $i++) { 
        
        if (ctype_upper($password[$i])) {
            
            echo"Ottimo! la tua password include almeno una Maiuscola! \n";
            return true;
            
        }; 
        
    };
    
    echo "la password deve contenere almeno una lettera maiuscola. \n";
    return false;
};
// Fine funzione che controlla se contiene almeno una maiuscola.

// Inizio funziona che controlla se contiene almeno un carattere speciale

const SPECIALCHARS = array(
    '!', '"', '#', '$', '%', '&', "'", '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~'
);

function controlloCaratteriSpeciali($password) {
    
    
    for ($i=0; $i < strlen($password) ; $i++) { 
        
        if (in_array($password[$i],SPECIALCHARS)) {
            
            echo "Ottimo! La tua Password contiene almeno un carattere speciale \n";
            return true;
            
        }
        
    }
    
    echo "la passowrd deve contenere almeno un carattere speciale \n";
    return false;
    
};

// Fine funziona che controlla se contiene almeno un carattere speciale

// Funzione finale di controllo generale

function controlloCompleto ($password) {
    
    $check1 =  controlloLunghezza($password); 
    $check2 =  controlloNumerico($password);
    $check3 = controlloMaiuscola($password);
    $check4 =  controlloCaratteriSpeciali($password);
    
    if ($check1 && $check2 && $check3 && $check4) {
        
        echo "Ottimo! Password accettata! \n";
        return true;
        
    } else { 
        
        return false;
    };
};

$check = controlloCompleto($userPassword);

while ($check == false) {
    
    $userPassword = readline("inserisci nuovamente la password:");
    
    $check = controlloCompleto($userPassword); 
}
//Fine Funzione finale di controllo generale
?>
