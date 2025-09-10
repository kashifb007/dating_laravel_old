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
        ]);

        $lines->eachSpread(fn ($group, $key, $text) => LanguageLineCustom::updateOrCreate([
            'group' => $group,
            'key' => $key,
        ], [
            'text' => $text,
        ]));
    }
}
