<?php
// Récupérer toutes les devises et leurs taux de conversion depuis une API
$exchangeApiUrl = "https://open.er-api.com/v6/latest/USD"; // URL de l'API des taux de change
$exchangeRates = json_decode(file_get_contents($exchangeApiUrl), true); // Convertir la réponse JSON en tableau PHP

// Récupérer les données des pays depuis une autre API
$countryApiUrl = "https://restcountries.com/v3.1/all"; // URL de l'API des pays
$countryData = json_decode(file_get_contents($countryApiUrl), true); // Convertir la réponse JSON en tableau PHP

// Tableau pour stocker les informations des devises
$currencies = [];

// Parcours des données des pays pour extraire les informations des devises
foreach ($countryData as $country) {
    if (isset($country['currencies'])) {
        foreach ($country['currencies'] as $code => $details) {
            // Enregistrement des devises avec leur nom et leur drapeau
            $currencies[$code] = [
                'name' => $details['name'] ?? $code, // Utilise le code de la devise si le nom est absent
                'flag' => $country['flags']['png'] ?? '' // Ajoute l'URL du drapeau si disponible
            ];
        }
    }
}
