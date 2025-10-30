<?php

namespace Database\Seeders;

use App\Models\LanguageLineCustom;
use Illuminate\Database\Seeder;

class LanguageFrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lines = collect([
            [
                'validation',
                'required',
                ["en" => 'The :attribute field is required.', "en-us" => 'The :attribute field is required.', 'fr-fr' => 'Le champ :attribute est obligatoire.', 'de-de' => 'Das Feld :attribute ist erforderlich.', 'es-es' => 'El campo :attribute es obligatorio.', 'it-it' => 'Il campo :attribute è obbligatorio.', 'nl-nl' => 'Het veld :attribute is verplicht.', 'sv-se' => 'Fältet :attribute är obligatoriskt.', 'pt-pt' => 'O campo :attribute é obrigatório.'],
            ],
            [
                'validation',
                'exists',
                ["en" => 'The :attribute field is required.', "en-us" => 'The :attribute field is required.', 'fr-fr' => 'Le champ :attribute est obligatoire.', 'de-de' => 'Das Feld :attribute ist erforderlich.', 'es-es' => 'El campo :attribute es obligatorio.', 'it-it' => 'Il campo :attribute è obbligatorio.', 'nl-nl' => 'Het veld :attribute is verplicht.', 'sv-se' => 'Fältet :attribute är obligatoriskt.', 'pt-pt' => 'O campo :attribute é obrigatório.'],
            ],
            [
                'validation',
                'unique',
                ["en" => 'The :attribute already exists.', "en-us" => 'The :attribute already exists.', 'fr-fr' => 'Le :attribute existe déjà.', 'de-de' => 'Das :attribute existiert bereits.', 'es-es' => 'El :attribute ya existe.', 'it-it' => 'Il :attribute esiste già.', 'nl-nl' => 'De :attribute bestaat al.', 'sv-se' => 'Fältet :attribute finns redan.', 'pt-pt' => 'O :attribute já existe.'],
            ],
            [
                'ui',
                'login',
                ["en" => 'Log In', "en-us" => 'Log In', 'fr-fr' => 'Se connecter', 'de-de' => 'Anmelden', 'es-es' => 'Iniciar sesión', 'it-it' => 'Accedi', 'nl-nl' => 'Inloggen', 'sv-se' => 'Logga in', 'pt-pt' => 'Entrar'],
            ],
            [
                'ui',
                'interested_in',
                ["en" => 'Who are you interested in?', "en-us" => 'Who are you interested in?', 'fr-fr' => 'Qui vous intéresse ?', 'de-de' => 'Für wen interessieren Sie sich?', 'es-es' => '¿Quién te interesa?', 'it-it' => 'Chi ti interessa?', 'nl-nl' => 'In wie bent u geïnteresseerd?', 'sv-se' => 'Vem är du intresserad av?', 'pt-pt' => 'Em quem você está interessado?'],
            ],
            [
                'ui',
                'between_ages',
                ["en" => 'Between ages:', "en-us" => 'Between ages:', 'fr-fr' => 'Entre les âges :', 'de-de' => 'Zwischen den Altersgruppen:', 'es-es' => 'Entre edades:', 'it-it' => 'Tra le età:', 'nl-nl' => 'Tussen leeftijden:', 'sv-se' => 'Mellan åldrar:', 'pt-pt' => 'Entre idades:'],
            ],
            [
                'ui',
                'and',
                ["en" => 'and', "en-us" => 'and', 'fr-fr' => 'et', 'de-de' => 'und', 'es-es' => 'y', 'it-it' => 'e', 'nl-nl' => 'en', 'sv-se' => 'och', 'pt-pt' => 'e'],
            ],
            [
                'ui',
                'your_town',
                ["en" => 'Your town/city', "en-us" => 'Your town/city', 'fr-fr' => 'Votre ville', 'de-de' => 'Ihre Stadt', 'es-es' => 'Tu ciudad', 'it-it' => 'La tua città', 'nl-nl' => 'Uw stad', 'sv-se' => 'Din stad', 'pt-pt' => 'Sua cidade'],
            ],
            [
                'ui',
                'country',
                ["en" => 'Country', "en-us" => 'Country', 'fr-fr' => 'Pays', 'de-de' => 'Land', 'es-es' => 'País', 'it-it' => 'Paese', 'nl-nl' => 'Land', 'sv-se' => 'Land', 'pt-pt' => 'País'],
            ],
            [
                'ui',
                'login',
                ["en" => 'Log In', "en-us" => 'Log In', 'fr-fr' => 'Se connecter', 'de-de' => 'Anmelden', 'es-es' => 'Iniciar sesión', 'it-it' => 'Accedi', 'nl-nl' => 'Inloggen', 'sv-se' => 'Logga in', 'pt-pt' => 'Entrar'],
            ],
            [
                'ui',
                'clear',
                ["en" => 'Clear', "en-us" => 'Clear', 'fr-fr' => 'Effacer', 'de-de' => 'Löschen', 'es-es' => 'Borrar', 'it-it' => 'Cancella', 'nl-nl' => 'Wissen', 'sv-se' => 'Rensa', 'pt-pt' => 'Limpar'],
            ],
            [
                'ui',
                'continue',
                ["en" => 'Continue', "en-us" => 'Continue', 'fr-fr' => 'Continuer', 'de-de' => 'Fortsetzen', 'es-es' => 'Continuar', 'it-it' => 'Continua', 'nl-nl' => 'Doorgaan', 'sv-se' => 'Fortsätt', 'pt-pt' => 'Continuar'],
            ],
            [
                'orientation',
                'male_straight',
                ["en" => "I’m a man seeking a woman", "en-us" => "I’m a man seeking a woman", 'fr-fr' => "Je suis un homme à la recherche d'une femme", 'de-de' => "Ich bin ein Mann auf der Suche nach einer Frau", 'es-es' => "Soy un hombre que busca una mujer", 'it-it' => "Sono un uomo in cerca di una donna", 'pt-pt' => "Sou um homem à procura de uma mulher"],
            ],
            [
                'orientation',
                'female_straight',
                ["en" => "I’m a woman seeking a man", "en-us" => "I’m a woman seeking a man", 'fr-fr' => "Je suis une femme à la recherche d'un homme", 'de-de' => "Ich bin eine Frau auf der Suche nach einem Mann", 'es-es' => "Soy una mujer que busca un hombre", 'it-it' => "Sono una donna in cerca di un uomo", 'pt-pt' => "Sou uma mulher à procura de um homem"],
            ],
            [
                'orientation',
                'male_gay',
                ["en" => "I’m a man seeking a man", "en-us" => "I’m a man seeking a man", 'fr-fr' => "Je suis un homme à la recherche d'un homme", 'de-de' => "Ich bin ein Mann auf der Suche nach einem Mann", 'es-es' => "Soy un hombre que busca un hombre", 'it-it' => "Sono un uomo in cerca di un uomo", 'pt-pt' => "Sou um homem à procura de um homem"],
            ],
            [
                'orientation',
                'female_gay',
                ["en" => "I’m a woman seeking a woman", "en-us" => "I’m a woman seeking a woman", 'fr-fr' => "Je suis une femme à la recherche d'une femme", 'de-de' => "Ich bin eine Frau auf der Suche nach einer Frau", 'es-es' => "Soy una mujer que busca una mujer", 'it-it' => "Sono una donna in cerca di una donna", 'pt-pt' => "Sou uma mulher à procura de uma mulher"],
            ],
            [
                'orientation',
                'male_bi',
                ["en" => "I’m a man seeking everyone", "en-us" => "I’m a man seeking everyone", 'fr-fr' => "Je suis un homme qui cherche tout le monde", 'de-de' => "Ich bin ein Mann, der jeden sucht", 'es-es' => "Soy un hombre que busca a todos", 'it-it' => "Sono un uomo che cerca tutti", 'pt-pt' => "Sou um homem à procura de todos"],
            ],
            [
                'orientation',
                'female_bi',
                ["en" => "I’m a woman seeking everyone", "en-us" => "I’m a woman seeking everyone", 'fr-fr' => "Je suis une femme qui cherche tout le monde", 'de-de' => "Ich bin eine Frau, die jeden sucht", 'es-es' => "Soy una mujer que busca a todos", 'it-it' => "Sono una donna che cerca tutti", 'pt-pt' => "Sou uma mulher à procura de todos"],
            ],
            [
                'ui',
                'city_name',
                ["en" => "Start typing a city name...", "en-us" => "Start typing a city name...", 'fr-fr' => "Commencez à taper le nom d'une ville...", 'de-de' => "Beginnen Sie mit der Eingabe eines Stadtnamens...", 'es-es' => "Empieza a escribir el nombre de una ciudad...", 'it-it' => "Inizia a digitare il nome di una città...", 'nl-nl' => "Begin met het typen van een stadsnaam...", 'sv-se' => "Börja skriva ett stadsnamn...", 'pt-pt' => "Comece a digitar o nome de uma cidade..."],
            ],
            [
                'ui',
                'enter_city',
                ["en" => "Enter your city", "en-us" => "Enter your city", 'fr-fr' => "Entrez votre ville", 'de-de' => "Geben Sie Ihre Stadt ein", 'es-es' => "Introduce tu ciudad", 'it-it' => "Inserisci la tua città", 'nl-nl' => "Voer uw stad in", 'sv-se' => "Ange din stad", 'pt-pt' => "Digite sua cidade"],
            ],
            [
                'ui',
                'choose_country',
                ["en" => "Choose country...", "en-us" => "Choose country...", 'fr-fr' => "Choisir le pays...", 'de-de' => "Land wählen...", 'es-es' => "Elige país...", 'it-it' => "Scegli il paese...", 'nl-nl' => "Kies land...", 'sv-se' => "Välj land...", 'pt-pt' => "Escolha o país..."],
            ],
            [
                'notification',
                'data_clear',
                ["en" => "Data cleared.", "en-us" => "Data cleared.", 'fr-fr' => "Données effacées.", 'de-de' => "Daten gelöscht.", 'es-es' => "Datos borrados.", 'it-it' => "Dati cancellati.", 'nl-nl' => "Gegevens gewist.", 'sv-se' => "Data rensad.", 'pt-pt' => "Dados apagados."],
            ],
            [
                'ui',
                'distance',
                ["en" => "Distance", "en-us" => "Distance", 'fr-fr' => "Distance", 'de-de' => "Entfernung", 'es-es' => "Distancia", 'it-it' => "Distanza", 'nl-nl' => "Afstand", 'sv-se' => "Avstånd", 'pt-pt' => "Distância"],
            ],
            [
                'ui',
                'like',
                ["en" => "Like", "en-us" => "Like", 'fr-fr' => "J'aime", 'de-de' => "Gefällt mir", 'es-es' => "Me gusta", 'it-it' => "Mi piace", 'nl-nl' => "Leuk vinden", 'sv-se' => "Gilla", 'pt-pt' => "Curtir"],
            ],
            [
                'ui',
                'decline',
                ["en" => "Decline", "en-us" => "Decline", 'fr-fr' => "Décliner", 'de-de' => "Ablehnen", 'es-es' => "Rechazar", 'it-it' => "Rifiuta", 'nl-nl' => "Afwijzen", 'sv-se' => "Avböja", 'pt-pt' => "Recusar"],
            ],
            [
                'ui',
                'message',
                ["en" => "Message", "en-us" => "Message", 'fr-fr' => "Message", 'de-de' => "Nachricht", 'es-es' => "Mensaje", 'it-it' => "Messaggio", 'nl-nl' => "Bericht", 'sv-se' => "Meddelande", 'pt-pt' => "Mensagem"],
            ],
            [
                'ui',
                'age',
                ["en" => "Age", "en-us" => "Age", 'fr-fr' => "Âge", 'de-de' => "Alter", 'es-es' => "Edad", 'it-it' => "Età", 'nl-nl' => "Leeftijd", 'sv-se' => "Ålder", 'pt-pt' => "Idade"],
            ],
            [
                'ui',
                'discover',
                ["en" => "Discover", "en-us" => "Discover", 'fr-fr' => "Découvrir", 'de-de' => "Entdecken", 'es-es' => "Descubrir", 'it-it' => "Scopri", 'nl-nl' => "Ontdekken", 'sv-se' => "Upptäck", 'pt-pt' => "Descobrir"],
            ],
            [
                'ui',
                'search_profiles',
                ["en" => "Search Profiles", "en-us" => "Search Profiles", 'fr-fr' => "Rechercher des profils", 'de-de' => "Profile suchen", 'es-es' => "Buscar perfiles", 'it-it' => "Cerca profili", 'nl-nl' => "Profielen zoeken", 'sv-se' => "Sök profiler", 'pt-pt' => "Procurar perfis"],
            ],
            [
                'ui',
                'search',
                ["en" => "Search", "en-us" => "Search", 'fr-fr' => "Rechercher", 'de-de' => "Suche", 'es-es' => "Buscar", 'it-it' => "Cerca", 'nl-nl' => "Zoeken", 'sv-se' => "Sök", 'pt-pt' => "Procurar"],
            ],
            [
                'ui',
                'dashboard',
                ["en" => "Dashboard", "en-us" => "Dashboard", 'fr-fr' => "Tableau de bord", 'de-de' => "Instrumententafel", 'es-es' => "Tablero", 'it-it' => "Cruscotto", 'nl-nl' => "Dashboard", 'sv-se' => "Instrumentbräda", 'pt-pt' => "Painel de controle"],
            ],
            [
                'ui',
                'filters',
                ["en" => "Filters", "en-us" => "Filters", 'fr-fr' => "Filtres", 'de-de' => "Filter", 'es-es' => "Filtros", 'it-it' => "Filtri", 'nl-nl' => "Filters", 'sv-se' => "Filter", 'pt-pt' => "Filtros"],
            ],
            [
                'ui',
                'email',
                ["en" => "Email", "en-us" => "Email", 'fr-fr' => "Email", 'de-de' => "E-Mail", 'es-es' => "Correo electrónico", 'it-it' => "Email", 'nl-nl' => "E-mail", 'sv-se' => "E-post", 'pt-pt' => "Email"],
            ],
            [
                'ui',
                'password',
                ["en" => "Password", "en-us" => "Password", 'fr-fr' => "Mot de passe", 'de-de' => "Passwort", 'es-es' => "Contraseña", 'it-it' => "Password", 'nl-nl' => "Wachtwoord", 'sv-se' => "Lösenord", 'pt-pt' => "Senha"],
            ],
            [
                'ui',
                'register',
                ["en" => "Register", "en-us" => "Register", 'fr-fr' => "S'inscrire", 'de-de' => "Registrieren", 'es-es' => "Registrarse", 'it-it' => "Registrati", 'nl-nl' => "Registreren", 'sv-se' => "Registrera", 'pt-pt' => "Registar"],
            ],
            [
                'ui',
                'remember_me',
                ["en" => "Remember me", "en-us" => "Remember me", 'fr-fr' => "Se souvenir de moi", 'de-de' => "Erinnere dich an mich", 'es-es' => "Recuérdame", 'it-it' => "Ricordati di me", 'nl-nl' => "Onthoud mij", 'sv-se' => "Kom ihåg mig", 'pt-pt' => "Lembre de mim"],
            ],
            [
                'ui',
                'forgot_password',
                ["en" => "Forgot your password?", "en-us" => "Forgot your password?", 'fr-fr' => "Mot de passe oublié ?", 'de-de' => "Passwort vergessen?", 'es-es' => "¿Olvidaste tu contraseña?", 'it-it' => "Hai dimenticato la password?", 'nl-nl' => "Wachtwoord vergeten?", 'sv-se' => "Glömt ditt lösenord?", 'pt-pt' => "Esqueceu sua senha?"],
            ],
            [
                'ui',
                'email_link',
                ["en" => "Email password reset link", "en-us" => "Email password reset link", 'fr-fr' => "Lien de réinitialisation du mot de passe par email", 'de-de' => "E-Mail-Passwort-Zurücksetzungslink", 'es-es' => "Enlace de restablecimiento de contraseña por correo electrónico", 'it-it' => "Link per reimpostare la password via email", 'nl-nl' => "E-mail wachtwoord reset link", 'sv-se' => "E-postlänk för återställning av lösenord", 'pt-pt' => "Link de redefinição de senha por e-mail"],
            ],
            [
                'ui_text',
                'forgot_text',
                [
                    "en" => "Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.",
                    "en-us" => "Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.",
                    'fr-fr' => "Vous avez oublié votre mot de passe ? Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.",
                    'de-de' => "Haben Sie Ihr Passwort vergessen? Kein Problem. Teilen Sie uns einfach Ihre E-Mail-Adresse mit und wir senden Ihnen einen Link zum Zurücksetzen des Passworts, mit dem Sie ein neues auswählen können.",
                    'es-es' => "¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva.",
                    'it-it' => "Hai dimenticato la password? Nessun problema. Basta farci sapere il tuo indirizzo email e ti invieremo un link per reimpostare la password che ti permetterà di sceglierne una nuova.",
                    'nl-nl' => "Wachtwoord vergeten? Geen probleem. Laat ons gewoon uw e-mailadres weten en we sturen u een link om uw wachtwoord opnieuw in te stellen waarmee u een nieuw wachtwoord kunt kiezen.",
                    'sv-se' => "Glömt ditt lösenord? Inga problem. Låt oss bara veta din e-postadress så skickar vi dig en länk för att återställa ditt lösenord som gör att du kan välja ett nytt.",
                    'pt-pt' => "Esqueceu sua senha? Sem problema. Basta nos informar seu endereço de e-mail e nós lhe enviaremos um link para redefinir sua senha que permitirá que você escolha uma nova."
                ],
            ],
            [
                'ui',
                'profile',
                ["en" => "Profile", "en-us" => "Profile", 'fr-fr' => "Profil", 'de-de' => "Profil", 'es-es' => "Perfil", 'it-it' => "Profilo", 'nl-nl' => "Profiel", 'sv-se' => "Profil", 'pt-pt' => "Perfil"],
            ],
            [
                'ui',
                'account',
                ["en" => "Account", "en-us" => "Account", 'fr-fr' => "Compte", 'de-de' => "Konto", 'es-es' => "Cuenta", 'it-it' => "Account", 'nl-nl' => "Account", 'sv-se' => "Konto", 'pt-pt' => "Conta"],
            ],
            [
                'ui',
                'logout',
                ["en" => "Log Out", "en-us" => "Log Out", 'fr-fr' => "Se déconnecter", 'de-de' => "Abmelden", 'es-es' => "Cerrar sesión", 'it-it' => "Disconnettersi", 'nl-nl' => "Uitloggen", 'sv-se' => "Logga ut", 'pt-pt' => "Sair"],
            ],
            [
                'ui',
                'last_online',
                ["en" => "Last online", "en-us" => "Last online", 'fr-fr' => "Dernière connexion", 'de-de' => "Zuletzt online", 'es-es' => "Último en línea", 'it-it' => "Ultimo online", 'nl-nl' => "Laatst online", 'sv-se' => "Senast online", 'pt-pt' => "Último online"],
            ],
            [
                'ui',
                'iam',
                ["en" => "I am", "en-us" => "I am", 'fr-fr' => "Je suis", 'de-de' => "Ich bin", 'es-es' => "Yo soy", 'it-it' => "Io sono", 'nl-nl' => "Ik ben", 'sv-se' => "Jag är", 'pt-pt' => "Eu sou"],
            ],
            [
                'ui',
                'member_profile',
                ["en" => "Member Profile", "en-us" => "Member Profile", 'fr-fr' => "Profil du membre", 'de-de' => "Mitgliederprofil", 'es-es' => "Perfil del miembro", 'it-it' => "Profilo del membro", 'nl-nl' => "Lidprofiel", 'sv-se' => "Medlemsprofil", 'pt-pt' => "Perfil do membro"],
            ],
            [
                'ui',
                'filters_age',
                ["en" => "From Age :min to :max", "en-us" => "From Age :min to :max", 'fr-fr' => "De :min à :max ans", 'de-de' => "Von :min bis :max Jahre", 'es-es' => "De :min a :max años", 'it-it' => "Dai :min ai :max anni", 'nl-nl' => "Van :min tot :max jaar", 'sv-se' => "Från :min till :max år", 'pt-pt' => "Dos :min aos :max anos"],
            ],
            [
                'ui',
                'filters_miles',
                ["en" => "Within :value miles", "en-us" => "Within :value miles", 'fr-fr' => "Dans un rayon de :value miles", 'de-de' => "Innerhalb von :value Meilen", 'es-es' => "Dentro de :value millas", 'it-it' => "Entro :value miglia", 'nl-nl' => "Binnen :value mijl", 'sv-se' => "Inom :value miles", 'pt-pt' => "Dentro de :value milhas"],
            ],
            [
                'ui',
                'filters_km',
                ["en" => "Within :value km", "en-us" => "Within :value km", 'fr-fr' => "Dans un rayon de :value km", 'de-de' => "Innerhalb von :value km", 'es-es' => "Dentro de :value km", 'it-it' => "Entro :value km", 'nl-nl' => "Binnen :value km", 'sv-se' => "Inom :value km", 'pt-pt' => "Dentro de :value km"],
            ],
            [
                'validation',
                'min.numeric',
                ["en" => 'Height must be at least 130cm', "en-us" => 'Height must be at least 130cm', 'fr-fr' => 'La taille doit être d\'au moins 130 cm', 'de-de' => 'Die Höhe muss mindestens 130 cm betragen', 'es-es' => 'La altura debe ser al menos 130 cm', 'it-it' => 'L\'altezza deve essere di almeno 130 cm', 'nl-nl' => 'De hoogte moet minimaal 130 cm zijn', 'sv-se' => 'Höjden måste vara minst 130 cm', 'pt-pt' => 'A altura deve ser de pelo menos 130 cm'],
            ],
            [
                'validation',
                'max.numeric',
                ["en" => 'Height must be no more than 250cm', "en-us" => 'Height must be no more than 250cm', 'fr-fr' => 'La taille ne doit pas dépasser 250 cm', 'de-de' => 'Die Höhe darf 250 cm nicht überschreiten', 'es-es' => 'La altura no debe superar los 250 cm', 'it-it' => 'L\'altezza non deve superare i 250 cm', 'nl-nl' => 'De hoogte mag niet meer dan 250 cm zijn', 'sv-se' => 'Höjden får inte vara mer än 250 cm', 'pt-pt' => 'A altura não deve ultrapassar os 250 cm'],
            ],
            [
                'ui',
                'save',
                ["en" => "Save", "en-us" => "Save", 'fr-fr' => "Sauvegarder", 'de-de' => "Speichern", 'es-es' => "Guardar", 'it-it' => "Salva", 'nl-nl' => "Opslaan", 'sv-se' => "Spara", 'pt-pt' => "Salvar"],
            ],
            [
                'ui',
                'height',
                ["en" => "Height (cm)", "en-us" => "Height (cm)", 'fr-fr' => "Taille (cm)", 'de-de' => "Höhe (cm)", 'es-es' => "Altura (cm)", 'it-it' => "Altezza (cm)", 'nl-nl' => "Lengte (cm)", 'sv-se' => "Längd (cm)", 'pt-pt' => "Altura (cm)"],
            ],
            [
                'filepond',
                'photos_not_uploaded',
                ["en" => "Images are not uploaded until you click 'Save Images'", "en-us" => "Images are not uploaded until you click 'Save Images'", 'fr-fr' => "Les images ne sont pas téléchargées tant que vous n'avez pas cliqué sur 'Enregistrer les images'", 'de-de' => "Bilder werden erst hochgeladen, wenn Sie auf 'Bilder speichern' klicken", 'es-es' => "Las imágenes no se cargan hasta que haces clic en 'Guardar imágenes'", 'it-it' => "Le immagini non vengono caricate fino a quando non si fa clic su 'Salva immagini'", 'nl-nl' => "Afbeeldingen worden pas geüpload als u op 'Afbeeldingen opslaan' klikt", 'sv-se' => "Bilder laddas inte upp förrän du klickar på 'Spara bilder'", 'pt-pt' => "As imagens não são carregadas até você clicar em 'Salvar Imagens'"],
            ],
            [
                'filepond',
                'save_images',
                ["en" => "Save Images", "en-us" => "Save Images", 'fr-fr' => "Enregistrer les images", 'de-de' => "Bilder speichern", 'es-es' => "Guardar imágenes", 'it-it' => "Salva immagini", 'nl-nl' => "Afbeeldingen opslaan", 'sv-se' => "Spara bilder", 'pt-pt' => "Salvar Imagens"],
            ],
            [
                'filepond',
                'idle',
                [
                    "en" => "Drag & Drop your photos here or click to Browse",
                    "en-us" => "Drag & Drop your photos here or click to Browse",
                    'fr-fr' => "Glissez et déposez vos photos ici ou cliquez pour parcourir",
                    'de-de' => "Ziehen Sie Ihre Fotos hierher oder klicken Sie zum Durchsuchen",
                    'es-es' => "Arrastra y suelta tus fotos aquí o haz clic para buscar",
                    'it-it' => "Trascina e rilascia le tue foto qui o fai clic per sfogliare",
                    'nl-nl' => "Sleep en zet je foto's hier neer of klik om te bladeren",
                    'sv-se' => "Dra och släpp dina foton här eller klicka för att bläddra",
                    'pt-pt' => "Arraste e solte suas fotos aqui ou clique para navegar"
                ]
            ],
            [
                'filepond',
                'file_processing',
                ["en" => "Processing…", "en-us" => "Processing…", 'fr-fr' => "Traitement…", 'de-de' => "Verarbeitung…", 'es-es' => "Procesando…", 'it-it' => "Elaborazione…", 'nl-nl' => "Bezig met verwerken…", 'sv-se' => "Bearbetar…", 'pt-pt' => "Processando…"],
            ],
            [
                'filepond',
                'file_processing_complete',
                ["en" => "Processing complete", "en-us" => "Processing complete", 'fr-fr' => "Traitement terminé", 'de-de' => "Verarbeitung abgeschlossen", 'es-es' => "Procesamiento completo", 'it-it' => "Elaborazione completata", 'nl-nl' => "Verwerking voltooid", 'sv-se' => "Bearbetning klar", 'pt-pt' => "Processamento concluído"],
            ],
            [
                'filepond',
                'max_file_size_exceeded',
                ["en" => "Image is too large", "en-us" => "Image is too large", 'fr-fr' => "L'image est trop grande", 'de-de' => "Bild ist zu groß", 'es-es' => "La imagen es demasiado grande", 'it-it' => "L'immagine è troppo grande", 'nl-nl' => "Afbeelding is te groot", 'sv-se' => "Bild är för stor", 'pt-pt' => "A imagem é muito grande"],
            ],
            [
                'filepond',
                'max_file_size',
                ["en" => "Maximum image size is {filesize}", "en-us" => "Maximum image size is {filesize}", 'fr-fr' => "La taille maximale de l'image est de {filesize}", 'de-de' => "Die maximale Bildgröße beträgt {filesize}", 'es-es' => "El tamaño máximo de la imagen es {filesize}", 'it-it' => "La dimensione massima dell'immagine è {filesize}", 'nl-nl' => "De maximale afbeeldingsgrootte is {filesize}", 'sv-se' => "Maximal bildstorlek är {filesize}", 'pt-pt' => "O tamanho máximo da imagem é {filesize}"],
            ],
        ]);

        $lines->eachSpread(fn ($group, $key, $text) => LanguageLineCustom::updateOrCreate([
            'group' => $group,
            'key' => $key,
        ], [
            'text' => $text,
        ]));
    }
}
