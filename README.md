
# Convertisseur de Devises 🌍

Ce projet est un convertisseur de devises simple, interactif et responsive. Il permet de convertir une devise en une autre à l'aide des taux de change en temps réel. Il offre une interface utilisateur propre et intuitive.

## Fonctionnalités

- Conversion entre différentes devises.
- Affichage des taux de change actualisés via une API.
- Possibilité de permuter les devises d'entrée et de sortie avec un simple clic.
- Interface responsive, adaptée à différents types d'appareils (bureau, tablette, mobile).

## Technologies utilisées

- **PHP** : pour la gestion des échanges de devises et la communication avec les API.
- **HTML/CSS** : pour la création de l'interface utilisateur.
- **JavaScript** : pour l'interactivité, notamment le bouton de permutation des devises.
- **API de devises** : pour récupérer les taux de change actuels.
- **API des pays** : pour récupérer les informations sur les devises des différents pays.

## Installation

1. Clonez ce repository sur votre ordinateur local :
   ```bash
   git clone git@github.com:Mehdikooli/Convertisseur_De_Devises.git
   ```

2. Accédez au dossier du projet :
   ```bash
   cd Convertisseur_De_Devises
   ```

3. Assurez-vous d'avoir un serveur local comme [XAMPP](https://www.apachefriends.org/index.html) ou [MAMP](https://www.mamp.info/en/) installé, ou d'utiliser un hébergement compatible PHP.

4. Lancez votre serveur local (Apache et PHP doivent être activés).

5. Accédez au projet via votre navigateur à l'adresse suivante :
   ```
   http://localhost/Convertisseur_De_Devises/index.php
   ```

## Utilisation

1. Entrez un montant dans le champ **Montant**.
2. Choisissez la devise de départ (par exemple, USD).
3. Choisissez la devise d'arrivée (par exemple, EUR).
4. Cliquez sur **Convertir** pour afficher le résultat de la conversion.
5. Vous pouvez échanger les devises en cliquant sur le bouton **⇆**.

## API

Le projet utilise deux API externes :

- **API des taux de change** : pour récupérer les taux de change en temps réel. Nous utilisons l'API gratuite de [Open Exchange Rates](https://open.er-api.com/).
- **API des pays** : pour obtenir des informations sur les pays, leurs devises et leurs drapeaux via l'API [Restcountries](https://restcountries.com/).

> **Remarque** : Si vous rencontrez des problèmes liés aux API, vous devrez peut-être vous créer un compte et obtenir votre propre clé API pour `Open Exchange Rates`.

## Personnalisation

1. **Ajouter ou modifier des devises** :
   - Si vous souhaitez ajouter de nouvelles devises ou modifier les existantes, vous pouvez le faire dans le fichier `fetch_data.php`.
   - L'API `restcountries.com` récupère automatiquement les devises associées à chaque pays, donc cette partie devrait être suffisante.

2. **Modifier le style** :
   - Vous pouvez personnaliser l'apparence de l'application en modifiant le fichier `styles.css`.

3. **Ajouter de nouvelles fonctionnalités** :
   - Vous souhaitez étendre les fonctionnalités de conversion ? Améliorer l'interface ? N'hésitez pas à explorer les fichiers PHP, HTML, et JavaScript.

---

## CONSIGNES : 

### The dream 🍹

#### The Mission

Dreaming about going on vacation after the course? Going somewhere far, far away? What if we were thirsty from climbing the table mountain in South-Africa right now, or sunbathing a nice Hawaiian beach and in dire need of a cocktail? One thing is for sure - we'd need to calculate how many Euros that way-too-expensive drink will be 💸

#### Specifications

### 🌱 Must haves
Pick your next travel destination and check the exchange rate: local currency / Euros.
Make a small webpage where you can enter the local rate (use a form), and it'll tell you the price in Euros. A simple calculation will do, no need to get updated rates from external API's.
Use a form that submits to PHP (no JS allowed / no preventDefault)

### 🌼 Nice to haves
Allow the user to choose between different currencies.
Provide a button to switch the from / to valuta types (So Euro -> Dollar becomes Dollar --> Euro)

> Tip: Don’t focus too much on frontend, keep it simple. You can always add more styling and structure in your own time!

## Need some help?

1. Create the HTML you need
    - Which elements does the form need?
2. Figure out what a form submit actually means / does
3. How to get the form data after the submit?
4. Calculate the amount in the desired value
5. Figure out a way to provide this data in the HTML
