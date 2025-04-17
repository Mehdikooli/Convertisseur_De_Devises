<?php
// Inclusion du fichier fetch_data.php pour récupérer les données des devises et pays
require 'fetch_data.php';

// Récupère le montant entré, ou une valeur vide si non défini
$amount = $_POST['amount'] ?? '';

// Récupère la devise d'origine, ou 'USD' par défaut
$fromCurrency = $_POST['from_currency'] ?? 'USD';

// Récupère la devise de destination, ou 'EUR' par défaut
$toCurrency = $_POST['to_currency'] ?? 'EUR';

// Variable pour stocker le résultat de la conversion
$result = '';

// Vérifie si la méthode de la requête est POST (soumission du formulaire)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si l'utilisateur a cliqué sur le bouton swap
    if (isset($_POST['swap'])) {
        // Inverse les devises
        $temp = $fromCurrency;
        $fromCurrency = $toCurrency;
        $toCurrency = $temp;
    }

    // Vérifie si le montant est valide (numérique)
    if (is_numeric($amount)) {
        // Calcule le taux de conversion entre les devises
        $rate = $exchangeRates['rates'][$toCurrency] / $exchangeRates['rates'][$fromCurrency];

        // Calcule le résultat de la conversion
        $result = $amount * $rate;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur de Devises - La Référence</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container animate__animated animate__fadeIn">
        <h1>
            <span>Convertisseur de Devises</span>
        </h1>
        <div class="emoji-container">
            <span class="emoji">🌍</span>
        </div>

        <!-- Formulaire de conversion -->
        <form method="post" class="animate__animated animate__fadeInUp">
            <!-- Champ pour entrer le montant à convertir -->
            <input type="number" name="amount" placeholder="Montant" required value="<?= htmlspecialchars($amount) ?>"
                class="animate__animated animate__fadeIn">

            <div class="select-group animate__animated animate__fadeIn">
                <!-- Sélecteur pour la devise d'origine -->
                <select name="from_currency" class="currency-select">
                    <?php
                    // Trier les devises par leur nom complet
                    uasort($currencies, function ($a, $b) {
                        return strcmp($a['name'], $b['name']);
                    });
                    foreach ($currencies as $code => $info): ?>
                        <option value="<?= $code ?>" <?= $fromCurrency == $code ? 'selected' : '' ?>>
                            <?= $info['name'] ?> (<?= $code ?>)
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Bouton pour échanger les devises -->
                <button type="button" class="swap-button animate__animated animate__pulse">⇆</button>

                <!-- Sélecteur pour la devise de destination -->
                <select name="to_currency" class="currency-select">
                    <?php foreach ($currencies as $code => $info): ?>
                        <option value="<?= $code ?>" <?= $toCurrency == $code ? 'selected' : '' ?>>
                            <?= $info['name'] ?> (<?= $code ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Bouton pour soumettre le formulaire et effectuer la conversion -->
            <button type="submit" class="animate__animated animate__fadeInUp">Convertir</button>
        </form>

        <!-- Affichage du résultat de la conversion -->
        <?php if ($result !== ''): ?>
            <p class="result animate__animated animate__fadeIn animate__delay-1s">Montant converti :
                <strong><?= number_format($result, 2) ?></strong> <?= htmlspecialchars($toCurrency) ?>
            </p>
        <?php endif; ?>
    </div>

    <script>
        // Ajouter un événement au clic du bouton swap
        document.querySelector('.swap-button').addEventListener('click', function () {
            // Ajouter une animation au bouton
            this.classList.add('animate__animated', 'animate__rotateIn');

            // Sélectionner les deux éléments <select> pour les devises
            const fromCurrencySelect = document.querySelector('select[name="from_currency"]');
            const toCurrencySelect = document.querySelector('select[name="to_currency"]');

            // Échanger les valeurs des deux selects
            const temp = fromCurrencySelect.value;
            fromCurrencySelect.value = toCurrencySelect.value;
            toCurrencySelect.value = temp;

            // Soumettre le formulaire automatiquement après l'échange
            document.querySelector('form').submit();
        });
    </script>
</body>

</html>