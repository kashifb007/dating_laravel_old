<?php

namespace Database\Seeders;

use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use Illuminate\Database\Seeder;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $choices = [
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'secondary school', 'en-us' => 'high school', 'fr-fr' => 'école secondaire', 'de-de' => 'weiterführende Schule', 'es-es' => 'escuela secundaria', 'it-it' => 'scuola secondaria', 'nl-nl' => 'secondaire school', 'sv-se' => 'gymnasium', 'pt-pt' => 'escola secundária'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'some college', 'en-us' => 'some college', 'fr-fr' => 'quelques collèges', 'de-de' => 'einige Hochschulen', 'es-es' => 'alguna universidad', 'it-it' => 'alcuni college', 'nl-nl' => 'sommige hogescholen', 'sv-se' => 'vissa högskolor', 'pt-pt' => 'algum colégio'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => "associate's degree", 'en-us' => "associate's degree", 'fr-fr' => "diplôme d'associé", 'de-de' => 'assoziierter Abschluss', 'es-es' => 'título de asociado', 'it-it' => "laurea triennale", 'nl-nl' => "associate degree", 'sv-se' => 'kandidatexamen', 'pt-pt' => 'licenciatura'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'bachelors degree', 'en-us' => 'bachelors degree', 'fr-fr' => 'licence', 'de-de' => 'Bachelor-Abschluss', 'es-es' => 'título de grado', 'it-it' => "laurea magistrale", 'nl-nl' => 'bachelor diploma', 'sv-se' => 'kandidatexamen', 'pt-pt' => 'licenciatura'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'masters', 'en-us' => 'masters', 'fr-fr' => 'maîtrise', 'de-de' => 'Master', 'es-es' => 'máster', 'it-it' => 'laurea magistrale', 'nl-nl' => 'master', 'sv-se' => 'magisterexamen', 'pt-pt' => 'mestrado'],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'PhD/post doctoral', 'en-us' => 'PhD/post doctoral', 'fr-fr' => 'doctorat/post-doctorat', 'de-de' => 'PhD/Postdoktorand', 'es-es' => 'doctorado/postdoctoral', 'it-it' => 'dottorato di ricerca/post dottorato', 'nl-nl' => 'PhD/postdoctoraal', 'sv-se' => 'PhD/postdoktoral', 'pt-pt' => 'doutoramento/pós-doutoramento'],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'never smoke', 'en-us' => 'never smoke', 'fr-fr' => 'ne jamais fumer', 'de-de' => 'nie rauchen', 'es-es' => 'nunca fumar', 'it-it' => 'non fumare mai', 'nl-nl' => 'nooit roken', 'sv-se' => 'röker aldrig', 'pt-pt' => 'nunca fumo'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'socially smoke', 'en-us' => 'socially smoke', 'fr-fr' => 'fumer socialement', 'de-de' => 'gelegentlich rauchen', 'es-es' => 'fumar socialmente', 'it-it' => 'fumare socialmente', 'nl-nl' => 'sociaal roken', 'sv-se' => 'röker socialt', 'pt-pt' => 'fumo socialmente'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'smoke regularly', 'en-us' => 'smoke regularly', 'fr-fr' => 'fumer régulièrement', 'de-de' => 'regelmäßig rauchen', 'es-es' => 'fumar regularmente', 'it-it' => 'fumare regolarmente', 'nl-nl' => 'regelmatig roken', 'sv-se' => 'röker regelbundet', 'pt-pt' => 'fumo regularmente'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'trying to quit', 'en-us' => 'trying to quit', 'fr-fr' => 'essayer d\'arrêter', 'de-de' => 'versuchen aufzuhören', 'es-es' => 'intentando dejarlo', 'it-it' => 'cercando di smettere', 'nl-nl' => 'proberen te stoppen', 'sv-se' => 'försöker sluta', 'pt-pt' => 'tentando parar'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('has-children')->first()->id,
                'name' => ['en' => 'have children', 'en-us' => 'have kids', 'fr-fr' => 'avoir des enfants', 'de-de' => 'Kinder haben', 'es-es' => 'tener hijos', 'it-it' => 'avere figli', 'nl-nl' => 'kinderen hebben', 'sv-se' => 'har barn', 'pt-pt' => 'ter filhos'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('has-children')->first()->id,
                'name' => ['en' => "don't have children", 'en-us' => "don't have kids", 'fr-fr' => "ne pas avoir d'enfants", 'de-de' => 'keine Kinder haben', 'es-es' => 'no tener hijos', 'it-it' => 'non avere figli', 'nl-nl' => 'geen kinderen hebben', 'sv-se' => 'har inga barn', 'pt-pt' => 'não ter filhos'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-children')->first()->id,
                'name' => ['en' => 'want children', 'en-us' => 'want kids', 'fr-fr' => 'vouloir des enfants', 'de-de' => 'Kinder wollen', 'es-es' => 'querer hijos', 'it-it' => 'volere figli', 'nl-nl' => 'kinderen willen', 'sv-se' => 'vill ha barn', 'pt-pt' => 'querer filhos'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-children')->first()->id,
                'name' => ['en' => "don't want children", 'en-us' => "don't want kids", 'fr-fr' => "ne pas vouloir d'enfants", 'de-de' => 'keine Kinder wollen', 'es-es' => 'no querer hijos', 'it-it' => 'non volere figli', 'nl-nl' => 'geen kinderen willen', 'sv-se' => 'vill inte ha barn', 'pt-pt' => 'não querer filhos'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-children')->first()->id,
                'name' => ['en' => "not sure", 'en-us' => "not sure", 'fr-fr' => 'pas sûr', 'de-de' => 'nicht sicher', 'es-es' => 'no estar seguro', 'it-it' => 'non sicuro', 'nl-nl' => 'niet zeker', 'sv-se' => 'inte säker', 'pt-pt' => 'não tenho a certeza'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "True love", 'en-us' => "True love", 'fr-fr' => "le grand amour", 'de-de' => 'die wahre Liebe', 'es-es' => 'el amor verdadero', 'it-it' => "il vero amore", 'nl-nl' => 'de ware liefde', 'sv-se' => 'den sanna kärleken', 'pt-pt' => 'o verdadeiro amor'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => 'Meet new people', 'en-us' => 'Meet new people', 'fr-fr' => 'rencontrer de nouvelles personnes', 'de-de' => 'neue Leute kennenlernen', 'es-es' => 'conocer gente nueva', 'it-it' => 'incontrare nuove persone', 'nl-nl' => 'nieuwe mensen ontmoeten', 'sv-se' => 'träffa nya människor', 'pt-pt' => 'conhecer novas pessoas'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "I'll let my destiny be my guide", 'en-us' => "I'll let my destiny be my guide", 'fr-fr' => "je laisserai mon destin être mon guide", 'de-de' => 'ich lasse mein Schicksal mein Führer sein', 'es-es' => 'dejaré que mi destino sea mi guía', 'it-it' => 'lascerò che il mio destino sia la mia guida', 'nl-nl' => 'ik laat mijn lot mijn gids zijn', 'sv-se' => 'jag låter mitt öde vara min guide', 'pt-pt' => 'deixarei o meu destino ser o meu guia'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "The thrill of passion", 'en-us' => "The thrill of passion", 'fr-fr' => "le frisson de la passion", 'de-de' => 'der Nervenkitzel der Leidenschaft', 'es-es' => 'la emoción de la pasión', 'it-it' => 'il brivido della passione', 'nl-nl' => 'de sensatie van passie', 'sv-se' => 'spänningen av passion', 'pt-pt' => 'a emoção da paixão'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "white / caucasian", 'en-us' => "white / caucasian", 'fr-fr' => "blanc / caucasien", 'de-de' => "weiß / kaukasisch", 'es-es' => "blanco / caucásico", 'it-it' => "bianco / caucasico", 'nl-nl' => "wit / kaukasisch", 'sv-se' => "vit / kaukasisk", 'pt-pt' => "branco / caucasiano"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "asian", 'en-us' => "asian", 'fr-fr' => "asiatique", 'de-de' => "asiatisch", 'es-es' => "asiático", 'it-it' => "asiatico", 'nl-nl' => "aziatisch", 'sv-se' => "asiatisk", 'pt-pt' => "asiático"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "black / african descent", 'en-us' => "black / african descent", 'fr-fr' => "noir / d'origine africaine", 'de-de' => "schwarz / afrikanischer Abstammung", 'it-it' => "nero / di discendenza africana", 'nl-nl' => "zwart / van Afrikaanse afkomst", 'sv-se' => "svart / afrikansk härkomst", 'pt-pt' => "preto / de ascendência africana"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "mixed race", 'en-us' => 'mixed race', 'fr-fr' => 'métis', 'de-de' => 'gemischtrassig', 'es-es' => 'raza mixta', 'it-it' => 'razza mista', 'nl-nl' => 'mix van rassen', 'sv-se' => 'blandras', 'pt-pt' => 'raça mista'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "mediterranean", 'en-us' => "mediterranean", 'fr-fr' => "méditerranéen", 'de-de' => "mediterran", 'es-es' => "mediterráneo", 'it-it' => "mediterraneo", 'nl-nl' => "mediterraan", 'sv-se' => "medelhavsområdet", 'pt-pt' => "mediterrânico"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "middle Eastern", 'en-us' => "middle Eastern", 'fr-fr' => "moyen-oriental", 'de-de' => "nahöstlich", 'es-es' => "medioriental", 'it-it' => "mediorientale", 'nl-nl' => "midden oosten", 'sv-se' => "mellanöstern", 'pt-pt' => "médio oriente"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "east Indian", 'en-us' => "east Indian", 'fr-fr' => "Indien de l'Est", 'de-de' => "ostindisch", 'es-es' => "indio oriental", 'it-it' => "indiano orientale", 'nl-nl' => "oost-indisch", 'sv-se' => "östindisk", 'pt-pt' => "índia oriental"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "latin-american", 'en-us' => "latin-american", 'fr-fr' => "latino-américain", 'de-de' => "lateinamerikanisch", 'es-es' => "latinoamericano", 'it-it' => "latino-americano", 'nl-nl' => "Latijns-Amerikaans", 'sv-se' => "latinamerikansk", 'pt-pt' => "latino-americano"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "other", 'en-us' => "other", 'fr-fr' => "autre", 'de-de' => "andere", 'es-es' => "otro", 'it-it' => "altro", 'nl-nl' => "overige", 'sv-se' => "annan", 'pt-pt' => "outro"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "British"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Irish"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Indian"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Afghan"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Albanian"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Algerian"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "American"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Andorran"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Angolan"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Antiguan/Barbudian"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Argentinian"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Armenian"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Australian"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Austrian"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Azerbaijanian"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bahaman"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bahraini"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bangladeshi"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Barbadian"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Basotho"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Belarusian"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Belgian"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Belizean"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Beninese"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bhutanese"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bolivian"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bosnian"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Botswanan"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Brazilian"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bruneian"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Bulgarian"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Burkinabe"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Burmese"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Burundian"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Cambodian"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Cameroonian"],
                'sort_order' => 35,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Canadian"],
                'sort_order' => 36,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Cape Verdean"],
                'sort_order' => 37,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Central African"],
                'sort_order' => 38,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Chadian"],
                'sort_order' => 39,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Chilean"],
                'sort_order' => 40,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Chinese"],
                'sort_order' => 41,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Colombian"],
                'sort_order' => 42,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Comorian"],
                'sort_order' => 43,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Congolese (DRC)"],
                'sort_order' => 44,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Congolese (ROC)"],
                'sort_order' => 45,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Costa Rican"],
                'sort_order' => 46,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Croatian"],
                'sort_order' => 47,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Cuban"],
                'sort_order' => 48,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Cypriot"],
                'sort_order' => 49,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Czech"],
                'sort_order' => 50,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Danish"],
                'sort_order' => 51,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Djiboutian"],
                'sort_order' => 52,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Dominican"],
                'sort_order' => 53,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Dominican"],
                'sort_order' => 54,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Dutch"],
                'sort_order' => 55,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "East Timorese"],
                'sort_order' => 56,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ecuadorian"],
                'sort_order' => 57,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Egyptian"],
                'sort_order' => 58,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Emirian"],
                'sort_order' => 59,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Equatorial Guinean"],
                'sort_order' => 60,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Eritrean"],
                'sort_order' => 61,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Estonian"],
                'sort_order' => 62,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ethiopian"],
                'sort_order' => 63,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Fijian"],
                'sort_order' => 64,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Filipino"],
                'sort_order' => 65,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Finnish"],
                'sort_order' => 66,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "French"],
                'sort_order' => 67,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Gabonese"],
                'sort_order' => 68,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Gambian"],
                'sort_order' => 69,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Georgian"],
                'sort_order' => 70,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "German"],
                'sort_order' => 71,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ghanaian"],
                'sort_order' => 72,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Greek"],
                'sort_order' => 73,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Grenadian"],
                'sort_order' => 74,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Guatemalian"],
                'sort_order' => 75,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Guinea-Bissau"],
                'sort_order' => 76,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Guinean"],
                'sort_order' => 77,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Guyanese"],
                'sort_order' => 78,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Haitian"],
                'sort_order' => 79,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Honduran"],
                'sort_order' => 80,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Hong Kong Chinese"],
                'sort_order' => 81,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Hungarian"],
                'sort_order' => 82,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Icelandic"],
                'sort_order' => 83,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Indonesian"],
                'sort_order' => 84,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Iranian"],
                'sort_order' => 85,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Iraqi"],
                'sort_order' => 86,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Israeli"],
                'sort_order' => 87,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Italian"],
                'sort_order' => 88,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ivorian"],
                'sort_order' => 89,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Jamaican"],
                'sort_order' => 90,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Japanese"],
                'sort_order' => 91,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Jordanian"],
                'sort_order' => 92,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Kazakh"],
                'sort_order' => 93,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Kenyan"],
                'sort_order' => 94,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Kiribatian"],
                'sort_order' => 95,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Kuwaiti"],
                'sort_order' => 96,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Kyrgyz"],
                'sort_order' => 97,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Lao"],
                'sort_order' => 98,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Latvian"],
                'sort_order' => 99,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Lebanese"],
                'sort_order' => 100,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Liberian"],
                'sort_order' => 101,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Libyan"],
                'sort_order' => 102,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Liechtensteiner"],
                'sort_order' => 103,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Lithuanian"],
                'sort_order' => 104,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Luxembourger"],
                'sort_order' => 105,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Macanese"],
                'sort_order' => 106,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Macedonian"],
                'sort_order' => 107,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Madagascan"],
                'sort_order' => 108,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Malawian"],
                'sort_order' => 109,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Malaysian"],
                'sort_order' => 110,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Maldivian"],
                'sort_order' => 111,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Malian"],
                'sort_order' => 112,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Maltese"],
                'sort_order' => 113,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Marshallese"],
                'sort_order' => 114,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Mauritanian"],
                'sort_order' => 115,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Mauritian"],
                'sort_order' => 116,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Mexican"],
                'sort_order' => 117,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Micronesian"],
                'sort_order' => 118,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Moldovan"],
                'sort_order' => 119,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Monegasque"],
                'sort_order' => 120,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Mongolian"],
                'sort_order' => 121,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Montenegrin"],
                'sort_order' => 122,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Moroccan"],
                'sort_order' => 123,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Mozambican"],
                'sort_order' => 124,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nambian"],
                'sort_order' => 125,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nauruan"],
                'sort_order' => 126,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nepalese"],
                'sort_order' => 127,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "New-Zealander"],
                'sort_order' => 128,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nicaraguan"],
                'sort_order' => 129,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nigerian"],
                'sort_order' => 130,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Nigerien"],
                'sort_order' => 131,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "North Korean"],
                'sort_order' => 132,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Norwegian"],
                'sort_order' => 133,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Omani"],
                'sort_order' => 134,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Pakistani"],
                'sort_order' => 135,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Palauan"],
                'sort_order' => 136,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Palestinian"],
                'sort_order' => 137,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Panamanian"],
                'sort_order' => 138,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Papua New Guinean"],
                'sort_order' => 139,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Paraguayan"],
                'sort_order' => 140,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Peruvian"],
                'sort_order' => 141,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Polish"],
                'sort_order' => 142,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Portuguese"],
                'sort_order' => 143,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Puerto Rican"],
                'sort_order' => 144,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Qatari"],
                'sort_order' => 145,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Romanian"],
                'sort_order' => 146,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Russian"],
                'sort_order' => 147,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Rwandan"],
                'sort_order' => 148,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Sahrawi"],
                'sort_order' => 149,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Saint Lucian"],
                'sort_order' => 150,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Salvadorian"],
                'sort_order' => 151,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Samoan"],
                'sort_order' => 152,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "San Cristobalian"],
                'sort_order' => 153,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "San Marinese"],
                'sort_order' => 154,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "São Toméan"],
                'sort_order' => 155,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Saudi Arabian"],
                'sort_order' => 156,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Senegalese"],
                'sort_order' => 157,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Serbian"],
                'sort_order' => 158,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Seychellois"],
                'sort_order' => 159,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Sierra Leonean"],
                'sort_order' => 160,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Singaporean"],
                'sort_order' => 161,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Slovakian"],
                'sort_order' => 162,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Slovenian"],
                'sort_order' => 163,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Solomon Islander"],
                'sort_order' => 164,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Somalian"],
                'sort_order' => 165,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "South African"],
                'sort_order' => 166,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "South Korean"],
                'sort_order' => 167,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Spanish"],
                'sort_order' => 168,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Spratly Islander"],
                'sort_order' => 169,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Sri Lankan"],
                'sort_order' => 170,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Sudanese"],
                'sort_order' => 171,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Surinamer"],
                'sort_order' => 172,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Swazi"],
                'sort_order' => 173,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Swedish"],
                'sort_order' => 174,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Swiss"],
                'sort_order' => 175,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Syrian"],
                'sort_order' => 176,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Taiwanian"],
                'sort_order' => 177,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Tajik"],
                'sort_order' => 178,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Tanzanian"],
                'sort_order' => 179,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Thai"],
                'sort_order' => 180,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Togolese"],
                'sort_order' => 181,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Tongan"],
                'sort_order' => 182,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Trinidadian/Tobagonian"],
                'sort_order' => 183,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Tunisian"],
                'sort_order' => 184,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Turkish"],
                'sort_order' => 185,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Turkmen"],
                'sort_order' => 186,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Tuvaluan"],
                'sort_order' => 187,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ugandan"],
                'sort_order' => 188,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Ukrainian"],
                'sort_order' => 189,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Uruguayan"],
                'sort_order' => 190,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Uzbek"],
                'sort_order' => 191,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Vanuatuan"],
                'sort_order' => 192,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Venezuelan"],
                'sort_order' => 193,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Vietnamese"],
                'sort_order' => 194,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Vincentian"],
                'sort_order' => 195,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Yemeni"],
                'sort_order' => 196,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Zambian"],
                'sort_order' => 197,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('nationality')->first()->id,
                'name' => ['en' => "Zimbabwean"],
                'sort_order' => 198,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "administrative/secretarial", 'en-us' => "administrative/secretarial", 'fr-fr' => "administratif/secrétariat", 'de-de' => "Verwaltung/Sekretariat", 'es-es' => "administrativo/secretarial", 'it-it' => "amministrativo/segretario", 'nl-nl' => "administratief/secretarieel", 'sv-se' => "administrativ/sekreterare", 'pt-pt' => "administrativo/secretarial"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "advertising/media", 'en-us' => "advertising/media", 'fr-fr' => "publicité/médias", 'de-de' => "Werbung/Medien", 'es-es' => "publicidad/medios", 'it-it' => "pubblicità/media", 'nl-nl' => "reclame/media", 'sv-se' => "annonsering/media", 'pt-pt' => "publicidade/média"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "architecture/interior design/graphic design", 'en-us' => "architecture/interior design/graphic design", 'fr-fr' => "architecture/design d'intérieur/design graphique", 'de-de' => "Architektur/Innendesign/Grafikdesign", 'es-es' => "arquitectura/diseño de interiores/diseño gráfico", 'it-it' => "architettura/design d'interni/design grafico", 'nl-nl' => "architectuur/interieurontwerp/grafisch ontwerp", 'sv-se' => "arkitektur/inredningsdesign/grafisk design", 'pt-pt' => "arquitetura/design de interiores/design gráfico"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "artistic/creative/performance/music", 'en-us' => "artistic/creative/performance/music", 'fr-fr' => "artistique/créatif/performance/musique", 'de-de' => "künstlerisch/kreativ/Aufführung/Musik", 'es-es' => "artístico/creativo/actuación/música", 'it-it' => "artistico/creativo/performance/musica", 'nl-nl' => "artistiek/creatief/podiumkunsten/muziek", 'sv-se' => "konstnärlig/kreativ/framträdande/musik", 'pt-pt' => "artístico/criativo/performance/música"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "cook/baker", 'en-us' => "cook/baker", 'fr-fr' => "cuisinier/boulanger", 'de-de' => "Koch/Bäcker", 'es-es' => "cocinero/panadero", 'it-it' => "cuoco/panettiere", 'nl-nl' => "kok/bakker", 'sv-se' => "kock/bagare", 'pt-pt' => "cozinheiro/padeiro"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "executive/management", 'en-us' => "executive/management", 'fr-fr' => "cadre/gestion", 'de-de' => "Führung/Management", 'es-es' => "ejecutivo/gerencia", 'it-it' => "dirigente/gestione", 'nl-nl' => "uitvoerend/management", 'sv-se' => "exekutiv/ledning", 'pt-pt' => "executivo/gestão"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "fashion/model/beauty", 'en-us' => "fashion/model/beauty", 'fr-fr' => "mode/modèle/beauté", 'de-de' => "Mode/Model/Schönheit", 'es-es' => "moda/modelo/belleza", 'it-it' => "moda/modello/bellezza", 'nl-nl' => "mode/model/schoonheid", 'sv-se' => "mode/modell/skönhet", 'pt-pt' => "moda/modelo/beleza"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "financial services", 'en-us' => "financial services", 'fr-fr' => "services financiers", 'de-de' => "Finanzdienstleistungen", 'es-es' => "servicios financieros", 'it-it' => "servizi finanziari", 'nl-nl' => "financiële diensten", 'sv-se' => "finansiella tjänster", 'pt-pt' => "serviços financeiros"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "labour/construction", 'en-us' => "labour/construction", 'fr-fr' => "travail/construction", 'de-de' => "Arbeit/Bau", 'es-es' => "trabajo/construcción", 'it-it' => "lavoro/costruzione", 'nl-nl' => "arbeid/bouw", 'sv-se' => "arbete/konstruktion", 'pt-pt' => "trabalho/construção"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "legal", 'en-us' => "legal", 'fr-fr' => "juridique", 'de-de' => "rechtlich", 'es-es' => "legal", 'it-it' => "legale", 'nl-nl' => "juridisch", 'sv-se' => "juridisk", 'pt-pt' => "legal"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "medical/dental/veterinary", 'en-us' => "medical/dental/veterinary", 'fr-fr' => "médical/dentaire/vétérinaire", 'de-de' => "medizinisch/zahnmedizinisch/veterinär", 'es-es' => "médico/dental/veterinario", 'it-it' => "medico/dentale/veterinario", 'nl-nl' => "medisch/tandheelkundig/diergeneeskundig", 'sv-se' => "medicinsk/tandvård/veterinär", 'pt-pt' => "médico/dentário/veterinário"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "political/government/civil service/military", 'en-us' => "political/government/civil service/military", 'fr-fr' => "politique/gouvernement/service civil/militaire", 'de-de' => "politisch/Regierung/öffentlicher Dienst/Militär", 'es-es' => "político/gobierno/servicio civil/militar", 'it-it' => "politico/governo/servizio civile/militare", 'nl-nl' => "politiek/regering/burgerlijke dienst/militair", 'sv-se' => "politisk/regering/offentlig tjänst/militär", 'pt-pt' => "político/governo/serviço civil/militar"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "retail/food services", 'en-us' => "retail/food services", 'fr-fr' => "vente au détail/services alimentaires", 'de-de' => "Einzelhandel/Lebensmittelservice", 'es-es' => "venta minorista/servicios de alimentos", 'it-it' => "vendita al dettaglio/servizi alimentari", 'nl-nl' => "detailhandel/voedingsdiensten", 'sv-se' => "detaljhandel/matservice", 'pt-pt' => "varejo/serviços alimentares"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "retired", 'en-us' => "retired", 'fr-fr' => "retraité", 'de-de' => "im Ruhestand", 'es-es' => "retirado", 'it-it' => "in pensione", 'nl-nl' => "gepensioneerd", 'sv-se' => "pensionerad", 'pt-pt' => "aposentado"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "sales/marketing", 'en-us' => "sales/marketing", 'fr-fr' => "ventes/marketing", 'de-de' => "Vertrieb/Marketing", 'es-es' => "ventas/marketing", 'it-it' => "vendite/marketing", 'nl-nl' => "verkoop/marketing", 'sv-se' => "försäljning/marknadsföring", 'pt-pt' => "vendas/marketing"],
                    'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "self employed", 'en-us' => "self employed", 'fr-fr' => "travailleur indépendant", 'de-de' => "selbstständig", 'es-es' => "autónomo", 'it-it' => "lavoratore autonomo", 'nl-nl' => "zelfstandig ondernemer", 'sv-se' => "egenföretagare", 'pt-pt' => "trabalhador independente"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "student", 'en-us' => "student", 'fr-fr' => "étudiant", 'de-de' => "Student", 'es-es' => "estudiante", 'it-it' => "studente", 'nl-nl' => "student", 'sv-se' => "student", 'pt-pt' => "estudante"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "teacher/professor", 'en-us' => "teacher/professor", 'fr-fr' => "enseignant/professeur", 'de-de' => "Lehrer/Professor", 'es-es' => "maestro/profesor", 'it-it' => "insegnante/professore", 'nl-nl' => "leraar/professor", 'sv-se' => "lärare/professor", 'pt-pt' => "professor/professor"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "technical/computers/engineering", 'en-us' => "technical/computers/engineering", 'fr-fr' => "technique/informatique/ingénierie", 'de-de' => "technisch/Computer/Ingenieurwesen", 'es-es' => "técnico/informática/ingeniería", 'it-it' => "tecnico/informatica/ingegneria", 'nl-nl' => "technisch/computers/engineering", 'sv-se' => "teknisk/datorer/ingenjörsvetenskap", 'pt-pt' => "técnico/computadores/engenharia"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "tradesperson", 'en-us' => "tradesperson", 'fr-fr' => "artisan", 'de-de' => "Handwerker", 'es-es' => "artesano", 'it-it' => "artigiano", 'nl-nl' => "vakman", 'sv-se' => "hantverkare", 'pt-pt' => "artesão"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "travel/hospitality/transportation", 'en-us' => "travel/hospitality/transportation", 'fr-fr' => "voyage/hôtellerie/transport", 'de-de' => "Reise/Gastgewerbe/Transport", 'es-es' => "viajes/hospitalidad/transporte", 'it-it' => "viaggi/ospitalità/trasporti", 'nl-nl' => "reizen/gastvrijheid/vervoer", 'sv-se' => "resor/gästfrihet/transport", 'pt-pt' => "viagens/hospitalidade/transporte"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "other profession", 'en-us' => "other profession", 'fr-fr' => "autre profession", 'de-de' => "andere Beruf", 'es-es' => "otra profesión", 'it-it' => "altra professione", 'nl-nl' => "andere professie", 'sv-se' => "annat yrke", 'pt-pt' => "outra profissão"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Agnostic", 'en-us' => "Agnostic", 'fr-fr' => "Agnostique", 'de-de' => "Agnostiker", 'es-es' => "Agnóstico", 'it-it' => "Agnostico", 'nl-nl' => "Agnostisch", 'sv-se' => "Agnostiker", 'pt-pt' => "Agnóstico"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Atheist", 'en-us' => "Atheist", 'fr-fr' => "Athée", 'de-de' => "Atheist", 'es-es' => "Ateo", 'it-it' => "Ateo", 'nl-nl' => "Atheïst", 'sv-se' => "Ateist", 'pt-pt' => "Ateu"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Buddhist/Taoist", 'en-us' => "Buddhist/Taoist", 'fr-fr' => "Bouddhiste/Taoïste", 'de-de' => "Buddhist/Taoist", 'es-es' => "Budista/Taoísta", 'it-it' => "Buddista/Taoista", 'nl-nl' => "Boehdisme/Taoïsme", 'sv-se' => "Buddhist/Taoist", 'pt-pt' => "Budista/Taoísta"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian", 'en-us' => "Christian", 'fr-fr' => "Chrétien", 'de-de' => "Christlich", 'es-es' => "Cristiano", 'it-it' => "Cristiano", 'nl-nl' => "Christen", 'sv-se' => "Kristen", 'pt-pt' => "Cristão"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian / Catholic", 'en-us' => "Christian / Catholic", 'fr-fr' => "Chrétien / Catholique", 'de-de' => "Christlich / Katholisch", 'es-es' => "Cristiano / Católico", 'it-it' => "Cristiano / Cattolico", 'nl-nl' => "Christen/Katholiek", 'sv-se' => "Kristen/Katolik", 'pt-pt' => "Cristão/Católico"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian / Protestant", 'en-us' => "Christian / Protestant", 'fr-fr' => "Chrétien / Protestant", 'de-de' => "Christlich / Protestant", 'es-es' => "Cristiano / Protestante", 'it-it' => "Cristiano / Protestante", 'nl-nl' => "Christen/Protestants", 'sv-se' => "Kristen/Protestant", 'pt-pt' => "Cristão/Protestante"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Hindu", 'en-us' => "Hindu", 'fr-fr' => "Hindou", 'de-de' => "Hindu", 'es-es' => "Hindú", 'it-it' => "Indù", 'nl-nl' => "Hindoe", 'sv-se' => "Hindu", 'pt-pt' => "Hindu"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Jewish", 'en-us' => "Jewish", 'fr-fr' => "Juif", 'de-de' => "Jüdisch", 'es-es' => "Judío", 'it-it' => "Ebreo", 'nl-nl' => "Joods", 'sv-se' => "Judisk", 'pt-pt' => "Judeu"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Muslim / Islam", 'en-us' => "Muslim / Islam", 'fr-fr' => "Musulman / Islam", 'de-de' => "Muslimisch / Islam", 'es-es' => "Musulmán / Islam", 'it-it' => "Musulmano / Islam", 'nl-nl' => "Moslim/Islam", 'sv-se' => "Muslim/Islam", 'pt-pt' => "Muçulmano/Islão"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Orthodox", 'en-us' => "Orthodox", 'fr-fr' => "Orthodoxe", 'de-de' => "Orthodox", 'es-es' => "Ortodoxo", 'it-it' => "Ortodosso", 'nl-nl' => "Orthodox", 'sv-se' => "Ortodox", 'pt-pt' => "Ortodoxo"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Shinto", 'en-us' => "Shinto", 'fr-fr' => "Shinto", 'de-de' => "Shinto", 'es-es' => "Shinto", 'it-it' => "Shinto", 'nl-nl' => "Shinto", 'sv-se' => "Shinto", 'pt-pt' => "Shinto"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Sikh", 'en-us' => "Sikh", 'fr-fr' => "Sikh", 'de-de' => "Sikh", 'es-es' => "Sij", 'it-it' => "Sikh", 'nl-nl' => "Sikh", 'sv-se' => "Sikh", 'pt-pt' => "Sikh"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Spiritual but not religious", 'en-us' => "Spiritual but not religious", 'fr-fr' => "Spirituel mais pas religieux", 'de-de' => "Spirituell aber nicht religiös", 'es-es' => "Espiritual pero no religioso", 'it-it' => "Spirituale ma non religioso", 'nl-nl' => "Spiritueel maar niet religieus", 'sv-se' => "Spirituell", 'pt-pt' => "Espiritual mas não religioso"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Other", 'en-us' => "Other", 'fr-fr' => "Autre", 'de-de' => "Andere", 'es-es' => "Otro", 'it-it' => "Altro", 'nl-nl' => "Ander", 'sv-se' => "Annan", 'pt-pt' => "Outro"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "English"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Spanish"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "French"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Italian"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "German"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Greek"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Polish"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Portuguese"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Dutch"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Hindi"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Swedish"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Danish"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Afrikaans"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Albanian"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Arabic"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Armenian"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Azeri"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Bable"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Belarusan"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Bengali"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Bosnian"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Bulgarian"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Catalan"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Chinese traditional"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Chinese"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Croatian"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Czech"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Estonian"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Euskera"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Finnish"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Gallero"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Georgian"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Gujarati"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Hebrew"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Hungarian"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Icelandic"],
                'sort_order' => 35,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Indian"],
                'sort_order' => 36,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Indonesian"],
                'sort_order' => 37,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Iranian"],
                'sort_order' => 38,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Japanese"],
                'sort_order' => 39,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Kannada"],
                'sort_order' => 40,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Kazakh"],
                'sort_order' => 41,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Korean"],
                'sort_order' => 42,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Latvian"],
                'sort_order' => 43,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Lithuanian"],
                'sort_order' => 44,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Macedonian"],
                'sort_order' => 45,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Malay"],
                'sort_order' => 46,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Mallorquin"],
                'sort_order' => 47,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Marathi"],
                'sort_order' => 48,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Moldovan"],
                'sort_order' => 49,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Burmese"],
                'sort_order' => 50,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Nepalese"],
                'sort_order' => 51,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Norwegian"],
                'sort_order' => 52,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Pashto"],
                'sort_order' => 53,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Punjabi"],
                'sort_order' => 54,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Romanian"],
                'sort_order' => 55,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Russian"],
                'sort_order' => 56,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Serbian"],
                'sort_order' => 57,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Slovak"],
                'sort_order' => 58,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Slovenian"],
                'sort_order' => 59,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Swahili"],
                'sort_order' => 60,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Tagalog"],
                'sort_order' => 61,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Taiwanese"],
                'sort_order' => 62,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Tajik"],
                'sort_order' => 63,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Tamil"],
                'sort_order' => 64,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Telugu"],
                'sort_order' => 65,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Thai"],
                'sort_order' => 66,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Tongan"],
                'sort_order' => 67,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Turkish"],
                'sort_order' => 68,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Turkmen"],
                'sort_order' => 69,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Ukrainian"],
                'sort_order' => 70,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Urdu"],
                'sort_order' => 71,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Uzbek"],
                'sort_order' => 72,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Valenciano"],
                'sort_order' => 73,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Vietnamese"],
                'sort_order' => 74,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Visayan"],
                'sort_order' => 75,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Esperanto"],
                'sort_order' => 76,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Welsh"],
                'sort_order' => 77,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('languages')->first()->id,
                'name' => ['en' => "Other", 'en-us' => "Other", 'fr-fr' => "Autre", 'de-de' => "Andere", 'es-es' => "Otro", 'it-it' => "Altro", 'nl-nl' => "Ander", 'sv-se' => "Annan", 'pt-pt' => "Outro"],
                'sort_order' => 78,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "dining out", 'en-us' => "dining out", 'fr-fr' => "dîner à l'extérieur", 'de-de' => "auswärts essen", 'es-es' => "cenar fuera", 'it-it' => "cenare fuori", 'nl-nl' => "uit eten", 'sv-se' => "äta ute", 'pt-pt' => "jantar fora"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "travel/sightseeing", 'en-us' => "travel/sightseeing", 'fr-fr' => "voyage/visite touristique", 'de-de' => "Reisen/Besichtigung", 'es-es' => "viajar/turismo", 'it-it' => "viaggiare/visitare", 'nl-nl' => "reizen/bezienswaardigheden", 'sv-se' => "resa/sevärdheter", 'pt-pt' => "viajar/turismo"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "music", 'en-us' => "music", 'fr-fr' => "musique", 'de-de' => "Musik", 'es-es' => "música", 'it-it' => "musica", 'nl-nl' => "muziek", 'sv-se' => "musik", 'pt-pt' => "música"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "the outdoors", 'en-us' => "the outdoors", 'fr-fr' => "le plein air", 'de-de' => "die Natur", 'es-es' => "el aire libre", 'it-it' => "all'aperto", 'nl-nl' => "buiten", 'sv-se' => "utomhus", 'pt-pt' => "ar livre"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "cooking", 'en-us' => "cooking", 'fr-fr' => "cuisine", 'de-de' => "Kochen", 'es-es' => "cocinar", 'it-it' => "cucinare", 'nl-nl' => "koken", 'sv-se' => "matlagning", 'pt-pt' => "cozinhar"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "dancing", 'en-us' => "dancing", 'fr-fr' => "danse", 'de-de' => "Tanzen", 'es-es' => "bailar", 'it-it' => "ballare", 'nl-nl' => "dansen", 'sv-se' => "dansa", 'pt-pt' => "dançar"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "television", 'en-us' => "television", 'fr-fr' => "télévision", 'de-de' => "Fernsehen", 'es-es' => "televisión", 'it-it' => "televisione", 'nl-nl' => "televisie", 'sv-se' => "tv", 'pt-pt' => "televisão"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "museums/exhibits", 'en-us' => "museums/exhibits", 'fr-fr' => "musées/expositions", 'de-de' => "Museen/Ausstellungen", 'es-es' => "museos/exposiciones", 'it-it' => "musei/mostre", 'nl-nl' => "musea/tentoonstellingen", 'sv-se' => "museer/utställningar", 'pt-pt' => "museus/exposições"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "painting/drawing", 'en-us' => "painting/drawing", 'fr-fr' => "peinture/dessin", 'de-de' => "Malen/Zeichnen", 'es-es' => "pintura/dibujo", 'it-it' => "pittura/disegno", 'nl-nl' => "schilderen/tekenen", 'sv-se' => "måla/rita", 'pt-pt' => "pintura/desenho"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "gardening/landscaping", 'en-us' => "gardening/landscaping", 'fr-fr' => "jardinage/aménagement paysager", 'de-de' => "Gartenarbeit/Landschaftsbau", 'es-es' => "jardinería/paisajismo", 'it-it' => "giardinaggio/paesaggistica", 'nl-nl' => "tuinieren/landschapsarchitectuur", 'sv-se' => "trädgårdsarbete/landskap", 'pt-pt' => "jardinagem/paisagismo"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "writing", 'en-us' => "writing", 'fr-fr' => "écriture", 'de-de' => "Schreiben", 'es-es' => "escritura", 'it-it' => "scrittura", 'nl-nl' => "schrijven", 'sv-se' => "skrivande", 'pt-pt' => "escrita"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "playing sports", 'en-us' => "playing sports", 'fr-fr' => "pratiquer des sports", 'de-de' => "Sport treiben", 'es-es' => "practicar deportes", 'it-it' => "praticare sport", 'nl-nl' => "sporten", 'sv-se' => "idrott", 'pt-pt' => "praticar desportos"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "book club/discussion", 'en-us' => "book club/discussion", 'fr-fr' => "club de lecture/discussion", 'de-de' => "Buchclub/Diskussion", 'es-es' => "club de lectura/discusión", 'it-it' => "circolo di lettura/discussione", 'nl-nl' => "boekenclub/discussie", 'sv-se' => "bokklubb/diskussion", 'pt-pt' => "clube de leitura/discussão"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "film", 'en-us' => "film", 'fr-fr' => "cinéma", 'de-de' => "Film", 'es-es' => "cine", 'it-it' => "cinema", 'nl-nl' => "film", 'sv-se' => "film", 'pt-pt' => "cinema"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "computers/internet", 'en-us' => "computers/internet", 'fr-fr' => "ordinateurs/internet", 'de-de' => "Computer/Internet", 'es-es' => "ordenadores/internet", 'it-it' => "computer/internet", 'nl-nl' => "computers/internet", 'sv-se' => "datorer/internet", 'pt-pt' => "computadores/internet"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "cars", 'en-us' => "cars", 'fr-fr' => "voitures", 'de-de' => "Autos", 'es-es' => "coches", 'it-it' => "auto", 'nl-nl' => "auto's", 'sv-se' => "bilar", 'pt-pt' => "carros"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "camping", 'en-us' => "camping", 'fr-fr' => "camping", 'de-de' => "Camping", 'es-es' => "acampar", 'it-it' => "campeggio", 'nl-nl' => "kamperen", 'sv-se' => "camping", 'pt-pt' => "acampar"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "video games", 'en-us' => "video games", 'fr-fr' => "jeux vidéo", 'de-de' => "Videospiele", 'es-es' => "videojuegos", 'it-it' => "videogiochi", 'nl-nl' => "videospellen", 'sv-se' => "videospel", 'pt-pt' => "videojogos"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "photography", 'en-us' => "photography", 'fr-fr' => "photographie", 'de-de' => "Fotografie", 'es-es' => "fotografía", 'it-it' => "fotografia", 'nl-nl' => "fotografie", 'sv-se' => "fotografering", 'pt-pt' => "fotografia"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "singing/playing instrument", 'en-us' => "singing/playing instrument", 'fr-fr' => "chant/jouer d'un instrument", 'de-de' => "Singen/Instrument spielen", 'es-es' => "cantar/tocar un instrumento", 'it-it' => "cantare/suonare uno strumento", 'nl-nl' => "zingen/muziekinstrument bespelen", 'sv-se' => "sjunga/spela instrument", 'pt-pt' => "cantar/tocar um instrumento"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "the arts", 'en-us' => "the arts", 'fr-fr' => "les arts", 'de-de' => "die Künste", 'es-es' => "las artes", 'it-it' => "le arti", 'nl-nl' => "de kunsten", 'sv-se' => "konsterna", 'pt-pt' => "as artes"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "playing cards", 'en-us' => "playing cards", 'fr-fr' => "jouer aux cartes", 'de-de' => "Kartenspielen", 'es-es' => "jugar a las cartas", 'it-it' => "giocare a carte", 'nl-nl' => "kaartspellen", 'sv-se' => "kortspel", 'pt-pt' => "jogar cartas"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "volunteering", 'en-us' => "volunteering", 'fr-fr' => "bénévolat", 'de-de' => "Freiwilligenarbeit", 'es-es' => "trabajo voluntario", 'it-it' => "volontariato", 'nl-nl' => "vrijwilligerswerk", 'sv-se' => "volontärarbete", 'pt-pt' => "trabalho voluntário"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "shopping/antiques", 'en-us' => "shopping/antiques", 'fr-fr' => "shopping/antiquités", 'de-de' => "Einkaufen/Antiquitäten", 'es-es' => "compras/antigüedades", 'it-it' => "shopping/antiquariato", 'nl-nl' => "winkelen/antiek", 'sv-se' => "shopping/antikviteter", 'pt-pt' => "compras/antiguidades"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "do-it-yourself", 'en-us' => "do-it-yourself", 'fr-fr' => "bricolage", 'de-de' => "Do-it-yourself", 'es-es' => "hágalo usted mismo", 'it-it' => "fai da te", 'nl-nl' => "doe-het-zelf", 'sv-se' => "gör det själv", 'pt-pt' => "faça você mesmo"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "fishing/hunting", 'en-us' => "fishing/hunting", 'fr-fr' => "pêche/chasse", 'de-de' => "Angeln/Jagen", 'es-es' => "pesca/caza", 'it-it' => "pesca/caccia", 'nl-nl' => "vissen/jagen", 'sv-se' => "fiske/jakt", 'pt-pt' => "pesca/caça"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "theatre", 'en-us' => "theatre", 'fr-fr' => "théâtre", 'de-de' => "Theater", 'es-es' => "teatro", 'it-it' => "teatro", 'nl-nl' => "Theater", 'sv-se' => "teater", 'pt-pt' => "teatro"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "hiking", 'en-us' => "hiking", 'fr-fr' => "randonnée", 'de-de' => "Wandern", 'es-es' => "senderismo", 'it-it' => "escursionismo", 'nl-nl' => "wandelen", 'sv-se' => "vandra", 'pt-pt' => "caminhada"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "wine tasting", 'en-us' => "wine tasting", 'fr-fr' => "dégustation de vin", 'de-de' => "Weinverkostung", 'es-es' => "cata de vinos", 'it-it' => "degustazione di vini", 'nl-nl' => "wijnproeven", 'sv-se' => "vinprovning", 'pt-pt' => "degustação de vinhos"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "animals", 'en-us' => "animals", 'fr-fr' => "animaux", 'de-de' => "Tiere", 'es-es' => "animales", 'it-it' => "animali", 'nl-nl' => "dieren", 'sv-se' => "djur", 'pt-pt' => "animais"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "decorating", 'en-us' => "decorating", 'fr-fr' => "décoration", 'de-de' => "Dekorieren", 'es-es' => "decoración", 'it-it' => "decorazione", 'nl-nl' => "decoreren", 'sv-se' => "inredning", 'pt-pt' => "decoração"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "board games", 'en-us' => "board games", 'fr-fr' => "jeux de société", 'de-de' => "Brettspiele", 'es-es' => "juegos de mesa", 'it-it' => "giochi da tavolo", 'nl-nl' => "bordspellen", 'sv-se' => "brädspel", 'pt-pt' => "jogos de tabuleiro"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "meeting friends", 'en-us' => "meeting friends", 'fr-fr' => "rencontrer des amis", 'de-de' => "Freunde treffen", 'es-es' => "reunirse con amigos", 'it-it' => "incontrare amici", 'nl-nl' => "vrienden ontmoeten", 'sv-se' => "träffa vänner", 'pt-pt' => "encontrar amigos"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "sewing / knitting", 'en-us' => "sewing / knitting", 'fr-fr' => "couture / tricot", 'de-de' => "Nähen / Stricken", 'es-es' => "costura / tejido", 'it-it' => "cucito / maglia", 'nl-nl' => "naaien/breien", 'sv-se' => "sy/ sticka", 'pt-pt' => "costura/tricô"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "others", 'en-us' => "others", 'fr-fr' => "autres", 'de-de' => "andere", 'es-es' => "otros", 'it-it' => "altri", 'nl-nl' => "anderen", 'sv-se' => "andra", 'pt-pt' => "outros"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "hiking / trekking", 'en-us' => "hiking / trekking", 'fr-fr' => "randonnée / trekking", 'de-de' => "Wandern / Trekking", 'es-es' => "senderismo / trekking", 'it-it' => "escursionismo / trekking", 'nl-nl' => "wandelen/trekking", 'sv-se' => "vandra/trekking", 'pt-pt' => "caminhada/trekking"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "fitness training", 'en-us' => "fitness training", 'fr-fr' => "entraînement de fitness", 'de-de' => "Fitnesstraining", 'es-es' => "entrenamiento físico", 'it-it' => "allenamento fitness", 'nl-nl' => "fitness training", 'sv-se' => "fitnessträning", 'pt-pt' => "treino de fitness"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "american football", 'en-us' => "american football", 'fr-fr' => "football américain", 'de-de' => "American Football", 'es-es' => "fútbol americano", 'it-it' => "football americano", 'nl-nl' => "Amerikaans voetbal", 'sv-se' => "amerikansk fotboll", 'pt-pt' => "futebol americano"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "running", 'en-us' => "running", 'fr-fr' => "course à pied", 'de-de' => "Laufen", 'es-es' => "correr", 'it-it' => "corsa", 'nl-nl' => "hardlopen", 'sv-se' => "löpning", 'pt-pt' => "corrida"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "dancing", 'en-us' => "dancing", 'fr-fr' => "danse", 'de-de' => "Tanzen", 'es-es' => "bailar", 'it-it' => "ballare", 'nl-nl' => "dansen", 'sv-se' => "dansa", 'pt-pt' => "dançar"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "cycling", 'en-us' => "cycling", 'fr-fr' => "cyclisme", 'de-de' => "Radfahren", 'es-es' => "ciclismo", 'it-it' => "ciclismo", 'nl-nl' => "fietsen", 'sv-se' => "cykling", 'pt-pt' => "ciclismo"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "swimming", 'en-us' => "swimming", 'fr-fr' => "natation", 'de-de' => "Schwimmen", 'es-es' => "natación", 'it-it' => "nuoto", 'nl-nl' => "zwemmen", 'sv-se' => "simning", 'pt-pt' => "natação"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "tennis", 'en-us' => "tennis", 'fr-fr' => "tennis", 'de-de' => "Tennis", 'es-es' => "tenis", 'it-it' => "tennis", 'nl-nl' => "tennis", 'sv-se' => "tennis", 'pt-pt' => "tênis"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "rugby", 'en-us' => "rugby", 'fr-fr' => "rugby", 'de-de' => "Rugby", 'es-es' => "rugby", 'it-it' => "rugby", 'nl-nl' => "rugby", 'sv-se' => "rugby", 'pt-pt' => "rúgbi"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "skiing / snowboarding", 'en-us' => "skiing / snowboarding", 'fr-fr' => "ski / snowboard", 'de-de' => "Ski / Snowboard", 'es-es' => "esquí / snowboard", 'it-it' => "sci / snowboard", 'nl-nl' => "skiën/snowboarden", 'sv-se' => "skidåkning/snowboard", 'pt-pt' => "esqui/snowboard"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "boxing / wrestling", 'en-us' => "boxing / wrestling", 'fr-fr' => "boxe / lutte", 'de-de' => "Boxen / Ringen", 'es-es' => "boxeo / lucha", 'it-it' => "pugilato / lotta", 'nl-nl' => "boksen/worstelen", 'sv-se' => "boxning/brottning", 'pt-pt' => "boxe/luta"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "billiards / pool", 'en-us' => "billiards / pool", 'fr-fr' => "billard / pool", 'de-de' => "Billard / Pool", 'es-es' => "billar / piscina", 'it-it' => "biliardo / piscina", 'nl-nl' => "biljart/pool", 'sv-se' => "biljard/pool", 'pt-pt' => "bilhar/pool"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "bowling", 'en-us' => "bowling", 'fr-fr' => "bowling", 'de-de' => "Bowling", 'es-es' => "bolos", 'it-it' => "bowling", 'nl-nl' => "bowlen", 'sv-se' => "bowling", 'pt-pt' => "boliche"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "badminton", 'en-us' => "badminton", 'fr-fr' => "badminton", 'de-de' => "Badminton", 'es-es' => "bádminton", 'it-it' => "badminton", 'nl-nl' => "badminton", 'sv-se' => "badminton", 'pt-pt' => "badminton"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "gym / body building", 'en-us' => "gym / body building", 'fr-fr' => "gym / musculation", 'de-de' => "Fitnessstudio / Bodybuilding", 'es-es' => "gimnasio / culturismo", 'it-it' => "palestra / bodybuilding", 'nl-nl' => "sportschool/bodybuilding", 'sv-se' => "gym/bodybuilding", 'pt-pt' => "academia/musculação"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "golf", 'en-us' => "golf", 'fr-fr' => "golf", 'de-de' => "Golf", 'es-es' => "golf", 'it-it' => "golf", 'nl-nl' => "golf", 'sv-se' => "golf", 'pt-pt' => "golfe"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "basketball", 'en-us' => "basketball", 'fr-fr' => "basket-ball", 'de-de' => "Basketball", 'es-es' => "baloncesto", 'it-it' => "pallacanestro", 'nl-nl' => "basketbal", 'sv-se' => "basket", 'pt-pt' => "basquetebol"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "motorcycling", 'en-us' => "motorcycling", 'fr-fr' => "motocyclisme", 'de-de' => "Motorradfahren", 'es-es' => "motociclismo", 'it-it' => "motociclismo", 'nl-nl' => "motorrijden", 'sv-se' => "motorcykling", 'pt-pt' => "motociclismo"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "yoga / meditation", 'en-us' => "yoga / meditation", 'fr-fr' => "yoga / méditation", 'de-de' => "Yoga / Meditation", 'es-es' => "yoga / meditación", 'it-it' => "yoga / meditazione", 'nl-nl' => "yoga/meditatie", 'sv-se' => "yoga/meditation", 'pt-pt' => "yoga/meditação"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "football", 'en-us' => 'soccer', 'fr-fr' => 'football', 'de-de' => 'fußball', 'es-es' => 'fútbol', 'it-it' => 'calcio', 'nl-nl' => 'voetbal', 'sv-se' => 'fotboll', 'pt-pt' => 'futebol'],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "extreme sports", 'en-us' => "extreme sports", 'fr-fr' => "sports extrêmes", 'de-de' => "Extremsportarten", 'es-es' => "deportes extremos", 'it-it' => "sport estremi", 'nl-nl' => "extreme sporten", 'sv-se' => "extremsporter", 'pt-pt' => "esportes radicais"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "horseback riding", 'en-us' => "horseback riding", 'fr-fr' => "équitation", 'de-de' => "Reiten", 'es-es' => "equitación", 'it-it' => "equitazione", 'nl-nl' => "paardrijden", 'sv-se' => "ridning", 'pt-pt' => "equitacao"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "baseball / softball", 'en-us' => "baseball / softball", 'fr-fr' => "baseball / softball", 'de-de' => "Baseball / Softball", 'es-es' => "béisbol / sóftbol", 'it-it' => "baseball / softball", 'nl-nl' => "honkbal/softbal", 'sv-se' => "baseboll/softboll", 'pt-pt' => "beisebol/softbol"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "motorsport", 'en-us' => "motorsport", 'fr-fr' => "sport automobile", 'de-de' => "Motorsport", 'es-es' => "automovilismo", 'it-it' => "motorsport", 'nl-nl' => "motorsport", 'sv-se' => "motorsport", 'pt-pt' => "motorsport"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "pilates", 'en-us' => "pilates", 'fr-fr' => "pilates", 'de-de' => "Pilates", 'es-es' => "pilates", 'it-it' => "pilates", 'nl-nl' => "pilates", 'sv-se' => "pilates", 'pt-pt' => "pilates"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "martial arts", 'en-us' => "martial arts", 'fr-fr' => "arts martiaux", 'de-de' => "Kampfsportarten", 'es-es' => "artes marciales", 'it-it' => "arti marziali", 'nl-nl' => "vechtsporten", 'sv-se' => "kampsporter", 'pt-pt' => "artes marciais"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "squash", 'en-us' => "squash", 'fr-fr' => "squash", 'de-de' => "Squash", 'es-es' => "squash", 'it-it' => "squash", 'nl-nl' => "squash", 'sv-se' => "squash", 'pt-pt' => "squash"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "other water sports", 'en-us' => "other water sports", 'fr-fr' => "autres sports nautiques", 'de-de' => "andere Wassersportarten", 'es-es' => "otros deportes acuáticos", 'it-it' => "altri sport acquatici", 'nl-nl' => "andere watersporten", 'sv-se' => "andra vattensporter", 'pt-pt' => "outros esportes aquáticos"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "rock climbing", 'en-us' => "rock climbing", 'fr-fr' => "escalade", 'de-de' => "Klettern", 'es-es' => "escalada", 'it-it' => "arrampicata", 'nl-nl' => "rotsklimmen", 'sv-se' => "bergsklättring", 'pt-pt' => "escalada"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "sailing", 'en-us' => "sailing", 'fr-fr' => "voile", 'de-de' => "Segeln", 'es-es' => "navegación", 'it-it' => "vela", 'nl-nl' => "zeilen", 'sv-se' => "segling", 'pt-pt' => "vela"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "track and field", 'en-us' => "track and field", 'fr-fr' => "athlétisme", 'de-de' => "Leichtathletik", 'es-es' => "atletismo", 'it-it' => "atletica", 'nl-nl' => "atletiek", 'sv-se' => "friidrott", 'pt-pt' => "atletismo"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "gymnastics", 'en-us' => "gymnastics", 'fr-fr' => "gymnastique", 'de-de' => "Gymnastik", 'es-es' => "gimnasia", 'it-it' => "ginnastica", 'nl-nl' => "gymnastiek", 'sv-se' => "gymnastik", 'pt-pt' => "ginástica"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "volleyball", 'en-us' => "volleyball", 'fr-fr' => "volley-ball", 'de-de' => "Volleyball", 'es-es' => "voleibol", 'it-it' => "pallavolo", 'nl-nl' => "volleybal", 'sv-se' => "volleyboll", 'pt-pt' => "voleibol"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "handball", 'en-us' => "handball", 'fr-fr' => "handball", 'de-de' => "Handball", 'es-es' => "balonmano", 'it-it' => "pallamano", 'nl-nl' => "handbal", 'sv-se' => "handboll", 'pt-pt' => "handebol"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "table tennis", 'en-us' => "table tennis", 'fr-fr' => "tennis de table", 'de-de' => "Tischtennis", 'es-es' => "tenis de mesa", 'it-it' => "tennistavolo", 'nl-nl' => "tafeltennis", 'sv-se' => "bordtennis", 'pt-pt' => "tênis de mesa"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "inline/roller skating", 'en-us' => "inline/roller skating", 'fr-fr' => "roller en ligne/roller", 'de-de' => "Inline-/Rollschuhlaufen", 'es-es' => "patinaje en línea/roller", 'it-it' => "pattinaggio in linea/roller", 'nl-nl' => "inline/rolschaatsen", 'sv-se' => "inline/rullskridskoåkning", 'pt-pt' => "patinação inline/roller"],
                'sort_order' => 35,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "weights / machines", 'en-us' => "weights / machines", 'fr-fr' => "haltères / machines", 'de-de' => "Gewichte / Maschinen", 'es-es' => "pesas / máquinas", 'it-it' => "pesi / macchine", 'nl-nl' => "gewichten/machines", 'sv-se' => "vikter/maskiner", 'pt-pt' => "pesos/máquinas"],
                'sort_order' => 36,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "others", 'en-us' => "others", 'fr-fr' => "autres", 'de-de' => "andere", 'es-es' => "otros", 'it-it' => "altri", 'nl-nl' => "anderen", 'sv-se' => "andra", 'pt-pt' => "outros"],
                'sort_order' => 37,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "evening with friends", 'en-us' => "evening with friends", 'fr-fr' => "soirée entre amis", 'de-de' => "Abend mit Freunden", 'es-es' => "noche con amigos", 'it-it' => "serata con amici", 'nl-nl' => "avond met vrienden", 'sv-se' => "kväll med vänner", 'pt-pt' => "noite com amigos"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "dining out", 'en-us' => "dining out", 'fr-fr' => "dîner à l'extérieur", 'de-de' => "Essen gehen", 'es-es' => "cenar fuera", 'it-it' => "cenare fuori", 'nl-nl' => "uit eten", 'sv-se' => "äta ute", 'pt-pt' => "jantar fora"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "cinema", 'en-us' => "cinema", 'fr-fr' => "cinéma", 'de-de' => "Kino", 'es-es' => "cine", 'it-it' => "cinema", 'nl-nl' => "bioscoop", 'sv-se' => "bio", 'pt-pt' => "cinema"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "bars/pubs", 'en-us' => "bars/pubs", 'fr-fr' => "bars/pubs", 'de-de' => "Bars/Pubs", 'es-es' => "bares/pubs", 'it-it' => "bar/pub", 'nl-nl' => "bars/cafés", 'sv-se' => "barer/pubar", 'pt-pt' => "bares/pubs"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "music/concerts", 'en-us' => "music/concerts", 'fr-fr' => "musique/concerts", 'de-de' => "Musik/Konzerte", 'es-es' => "música/conciertos", 'it-it' => "musica/concerto", 'nl-nl' => "muziek/concerten", 'sv-se' => "musik/konserter", 'pt-pt' => "música/concerto"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "spending time with my family", 'en-us' => "spending time with my family", 'fr-fr' => "passer du temps avec ma famille", 'de-de' => "Zeit mit meiner Familie verbringen", 'es-es' => "pasar tiempo con mi familia", 'it-it' => "passare del tempo con la mia famiglia", 'nl-nl' => "tijd doorbrengen met mijn familie", 'sv-se' => "tillbringa tid med min familj", 'pt-pt' => "passar tempo com minha família"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "opera", 'en-us' => "opera", 'fr-fr' => "opéra", 'de-de' => "Oper", 'es-es' => "ópera", 'it-it' => "opera", 'nl-nl' => "opera", 'sv-se' => "opera", 'pt-pt' => "ópera"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "reading", 'en-us' => "reading", 'fr-fr' => "lecture", 'de-de' => "Lesen", 'es-es' => "lectura", 'it-it' => "lettura", 'nl-nl' => "lezen", 'sv-se' => "läsa", 'pt-pt' => "leitura"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "nightclubs/dancing", 'en-us' => "nightclubs/dancing", 'fr-fr' => "boîtes de nuit/danse", 'de-de' => "Nachtclubs/Tanzen", 'es-es' => "discotecas/baile", 'it-it' => "discoteche/ballo", 'nl-nl' => "nachtclubs/dansen", 'sv-se' => "nattklubbar/dans", 'pt-pt' => "discotecas/dança"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "sporting events", 'en-us' => "sporting events", 'fr-fr' => "événements sportifs", 'de-de' => "Sportveranstaltungen", 'es-es' => "eventos deportivos", 'it-it' => "eventi sportivi", 'nl-nl' => "sportevenementen", 'sv-se' => "sportevenemang", 'pt-pt' => "eventos esportivos"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "dance shows", 'en-us' => "dance shows", 'fr-fr' => "spectacles de danse", 'de-de' => "Tanzshows", 'es-es' => "espectáculos de baile", 'it-it' => "spettacoli di danza", 'nl-nl' => "dansshows", 'sv-se' => "dansshower", 'pt-pt' => "shows de dança"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "singles parties", 'en-us' => "singles parties", 'fr-fr' => "soirées pour célibataires", 'de-de' => "Single-Partys", 'es-es' => "fiestas para solteros", 'it-it' => "feste per single", 'nl-nl' => "feestjes voor singles", 'sv-se' => "singelpartyn", 'pt-pt' => "festas para solteiros"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "others", 'en-us' => "others", 'fr-fr' => "autres", 'de-de' => "andere", 'es-es' => "otros", 'it-it' => "altri", 'nl-nl' => "anderen", 'sv-se' => "andra", 'pt-pt' => "outros"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "comedy", 'en-us' => "comedy", 'fr-fr' => "comédie", 'de-de' => "Komödie", 'es-es' => "comedia", 'it-it' => "commedia", 'nl-nl' => "komedie", 'sv-se' => "komedi", 'pt-pt' => "comédia"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "action", 'en-us' => "action", 'fr-fr' => "action", 'de-de' => "Action", 'es-es' => "acción", 'it-it' => "azione", 'nl-nl' => "actie", 'sv-se' => "action", 'pt-pt' => "ação"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "adventure", 'en-us' => "adventure", 'fr-fr' => "aventure", 'de-de' => "Abenteuer", 'es-es' => "aventura", 'it-it' => "avventura", 'nl-nl' => "avontuur", 'sv-se' => "äventyr", 'pt-pt' => "aventura"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "drama", 'en-us' => "drama", 'fr-fr' => "drame", 'de-de' => "Drama", 'es-es' => "drama", 'it-it' => "dramma", 'nl-nl' => "drama", 'sv-se' => "drama", 'pt-pt' => "drama"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "romantic comedy", 'en-us' => "romantic comedy", 'fr-fr' => "comédie romantique", 'de-de' => "romantische Komödie", 'es-es' => "comedia romántica", 'it-it' => "commedia romantica", 'nl-nl' => "romantische komedie", 'sv-se' => "romantisk komedi", 'pt-pt' => "comédia romântica"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "documentaries", 'en-us' => "documentaries", 'fr-fr' => "documentaires", 'de-de' => "Dokumentarfilme", 'es-es' => "documentales", 'it-it' => "documentari", 'nl-nl' => "documentaires", 'sv-se' => "dokumentärer", 'pt-pt' => "documentários"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "horror", 'en-us' => "horror", 'fr-fr' => "horreur", 'de-de' => "Horror", 'es-es' => "terror", 'it-it' => "horror", 'nl-nl' => "horror", 'sv-se' => "skräck", 'pt-pt' => "horror"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "science fiction", 'en-us' => "science fiction", 'fr-fr' => "science-fiction", 'de-de' => "Science-Fiction", 'es-es' => "ciencia ficción", 'it-it' => "fantascienza", 'nl-nl' => "sciencefiction", 'sv-se' => "science fiction", 'pt-pt' => "ficção científica"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "fantasy", 'en-us' => "fantasy", 'fr-fr' => "fantastique", 'de-de' => "Fantasy", 'es-es' => "fantasía", 'it-it' => "fantasia", 'nl-nl' => "fantasie", 'sv-se' => "fantasy", 'pt-pt' => "fantasia"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "historical", 'en-us' => "historical", 'fr-fr' => "historique", 'de-de' => "Historisch", 'es-es' => "histórico", 'it-it' => "storico", 'nl-nl' => "historisch", 'sv-se' => "historisk", 'pt-pt' => "histórico"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "animated films", 'en-us' => "animated films", 'fr-fr' => "films d'animation", 'de-de' => "Animationsfilme", 'es-es' => "películas de animación", 'it-it' => "film d'animazione", 'nl-nl' => "animatiefilms", 'sv-se' => "animerade filmer", 'pt-pt' => "filmes de animação"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "musicals", 'en-us' => "musicals", 'fr-fr' => "comédies musicales", 'de-de' => "Musicals", 'es-es' => "musicales", 'it-it' => "musical", 'nl-nl' => "musicals", 'sv-se' => "musikaler", 'pt-pt' => "musicais"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "police drama", 'en-us' => "police drama", 'fr-fr' => "drame policier", 'de-de' => "Krimi", 'es-es' => "drama policial", 'it-it' => "dramma poliziesco", 'nl-nl' => "politieserie", 'sv-se' => "polisdrama", 'pt-pt' => "drama policial"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "independent cinema", 'en-us' => "independent cinema", 'fr-fr' => "cinéma indépendant", 'de-de' => "Independent-Filme", 'es-es' => "cine independiente", 'it-it' => "cinema indipendente", 'nl-nl' => "independent cinema", 'sv-se' => "independent film", 'pt-pt' => "cinema independente"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "cartoons", 'en-us' => "cartoons", 'fr-fr' => "dessins animés", 'de-de' => "Cartoons", 'es-es' => "dibujos animados", 'it-it' => "cartoni animati", 'nl-nl' => "cartoons", 'sv-se' => "tecknade filmer", 'pt-pt' => "desenhos animados"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "erotic", 'en-us' => "erotic", 'fr-fr' => "érotique", 'de-de' => "Erotik", 'es-es' => "erótico", 'it-it' => "erotico", 'nl-nl' => "erotisch", 'sv-se' => "erotisk", 'pt-pt' => "erótico"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "western", 'en-us' => "western", 'fr-fr' => "western", 'de-de' => "Western", 'es-es' => "western", 'it-it' => "western", 'nl-nl' => "western", 'sv-se' => "western", 'pt-pt' => "western"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "short films", 'en-us' => "short films", 'fr-fr' => "courts métrages", 'de-de' => "Kurzfilme", 'es-es' => "cortometrajes", 'it-it' => "cortometraggi", 'nl-nl' => "korte films", 'sv-se' => "kortfilmer", 'pt-pt' => "curtas-metragens"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "manga", 'en-us' => "manga", 'fr-fr' => "manga", 'de-de' => "Manga", 'es-es' => "manga", 'it-it' => "manga", 'nl-nl' => "manga", 'sv-se' => "manga", 'pt-pt' => "mangá"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "others", 'en-us' => "others", 'fr-fr' => "autres", 'de-de' => "andere", 'es-es' => "otros", 'it-it' => "altri", 'nl-nl' => "anderen", 'sv-se' => "andra", 'pt-pt' => "outros"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "pop-rock", 'en-us' => "pop-rock", 'fr-fr' => "pop-rock", 'de-de' => "Pop-Rock", 'es-es' => "pop-rock", 'it-it' => "pop-rock", 'nl-nl' => "pop-rock", 'sv-se' => "pop-rock", 'pt-pt' => "pop-rock"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "R'n'B", 'en-us' => "R'n'B", 'fr-fr' => "R'n'B", 'de-de' => "R'n'B", 'es-es' => "R'n'B", 'it-it' => "R'n'B", 'nl-nl' => "R'n'B", 'sv-se' => "R'n'B", 'pt-pt' => "R'n'B"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "variety", 'en-us' => "variety", 'fr-fr' => "variété", 'de-de' => "Varieté", 'es-es' => "variedad", 'it-it' => "varietà", 'nl-nl' => "variety", 'sv-se' => "variety", 'pt-pt' => "variedade"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "dance and DJ", 'en-us' => "dance and DJ", 'fr-fr' => "dance et DJ", 'de-de' => "Dance und DJ", 'es-es' => "dance y DJ", 'it-it' => "dance e DJ", 'nl-nl' => "dance en DJ", 'sv-se' => "dance och DJ", 'pt-pt' => "dance e DJ"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "soul", 'en-us' => "soul", 'fr-fr' => "soul", 'de-de' => "Soul", 'es-es' => "soul", 'it-it' => "soul", 'nl-nl' => "soul", 'sv-se' => "soul", 'pt-pt' => "soul"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "rock", 'en-us' => "rock", 'fr-fr' => "rock", 'de-de' => "Rock", 'es-es' => "rock", 'it-it' => "rock", 'nl-nl' => "rock", 'sv-se' => "rock", 'pt-pt' => "rock"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "classical/opera", 'en-us' => "classical/opera", 'fr-fr' => "classique/opéra", 'de-de' => "Klassik/Oper", 'es-es' => "clásica/ópera", 'it-it' => "classica/opera", 'nl-nl' => "klassiek/opera", 'sv-se' => "klassisk/opera", 'pt-pt' => "clássica/ópera"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "blues", 'en-us' => "blues", 'fr-fr' => "blues", 'de-de' => "Blues", 'es-es' => "blues", 'it-it' => "blues", 'nl-nl' => "blues", 'sv-se' => "blues", 'pt-pt' => "blues"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "jazz", 'en-us' => "jazz", 'fr-fr' => "jazz", 'de-de' => "Jazz", 'es-es' => "jazz", 'it-it' => "jazz", 'nl-nl' => "jazz", 'sv-se' => "jazz", 'pt-pt' => "jazz"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "country", 'en-us' => "country", 'fr-fr' => "country", 'de-de' => "Country", 'es-es' => "country", 'it-it' => "country", 'nl-nl' => "country", 'sv-se' => "country", 'pt-pt' => "country"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "soundtracks", 'en-us' => "soundtracks", 'fr-fr' => "bandes originales", 'de-de' => "Soundtracks", 'es-es' => "bandas sonoras", 'it-it' => "colonne sonore", 'nl-nl' => "soundtracks", 'sv-se' => "soundtracks", 'pt-pt' => "bandas sonoras"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "hard rock", 'en-us' => "hard rock", 'fr-fr' => "hard rock", 'de-de' => "Hard Rock", 'es-es' => "hard rock", 'it-it' => "hard rock", 'nl-nl' => "hardrock", 'sv-se' => "hardrock", 'pt-pt' => "hard rock"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "rap", 'en-us' => "rap", 'fr-fr' => "rap", 'de-de' => "Rap", 'es-es' => "rap", 'it-it' => "rap", 'nl-nl' => "rap", 'sv-se' => "rap", 'pt-pt' => "rap"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "electronic-techno", 'en-us' => "electronic-techno", 'fr-fr' => "électronique-techno", 'de-de' => "Elektronisch-Techno", 'es-es' => "electrónica-techno", 'it-it' => "elettronica-techno", 'nl-nl' => "electronic-techno", 'sv-se' => "elektronisk-techno", 'pt-pt' => "electrônico-techno"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "disco", 'en-us' => "disco", 'fr-fr' => "disco", 'de-de' => "Disco", 'es-es' => "disco", 'it-it' => "disco", 'nl-nl' => "disco", 'sv-se' => "disco", 'pt-pt' => "disco"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "reggae", 'en-us' => "reggae", 'fr-fr' => "reggae", 'de-de' => "Reggae", 'es-es' => "reggae", 'it-it' => "reggae", 'nl-nl' => "reggae", 'sv-se' => "reggae", 'pt-pt' => "reggae"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "traditional music", 'en-us' => "traditional music", 'fr-fr' => "musique traditionnelle", 'de-de' => "Traditionelle Musik", 'es-es' => "música tradicional", 'it-it' => "musica tradizionale", 'nl-nl' => "traditionele muziek", 'sv-se' => "traditionell musik", 'pt-pt' => "música tradicional"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "world music", 'en-us' => "world music", 'fr-fr' => "musique du monde", 'de-de' => "Weltmusik", 'es-es' => "música del mundo", 'it-it' => "musica del mondo", 'nl-nl' => "wereldmuziek", 'sv-se' => "världsmusik", 'pt-pt' => "música do mundo"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "mood/relaxation", 'en-us' => "mood/relaxation", 'fr-fr' => "ambiance/détente", 'de-de' => "Stimmung/Entspannung", 'es-es' => "ambiente/relajación", 'it-it' => "atmosfera/rilassamento", 'nl-nl' => "stemming/ontspanning", 'sv-se' => "stämning/avkoppling", 'pt-pt' => "ambiente/relaxamento"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "latino", 'en-us' => "latino", 'fr-fr' => "latino", 'de-de' => "Latino", 'es-es' => "latino", 'it-it' => "latino", 'nl-nl' => "latino", 'sv-se' => "latino", 'pt-pt' => "latino"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "funk", 'en-us' => "funk", 'fr-fr' => "funk", 'de-de' => "Funk", 'es-es' => "funk", 'it-it' => "funk", 'nl-nl' => "funk", 'sv-se' => "funk", 'pt-pt' => "funk"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "trip-hop", 'en-us' => "trip-hop", 'fr-fr' => "trip-hop", 'de-de' => "Trip-Hop", 'es-es' => "trip-hop", 'it-it' => "trip-hop", 'nl-nl' => "trip-hop", 'sv-se' => "trip-hop", 'pt-pt' => "trip-hop"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "gospel", 'en-us' => "gospel", 'fr-fr' => "gospel", 'de-de' => "Gospel", 'es-es' => "gospel", 'it-it' => "gospel", 'nl-nl' => "gospel", 'sv-se' => "gospel", 'pt-pt' => "gospel"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "others", 'en-us' => "others", 'fr-fr' => "autres", 'de-de' => "andere", 'es-es' => "otros", 'it-it' => "altri", 'nl-nl' => "anderen", 'sv-se' => "andra", 'pt-pt' => "outros"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "very important", 'en-us' => "very important", 'fr-fr' => "très important", 'de-de' => "sehr wichtig", 'es-es' => "muy importante", 'it-it' => "molto importante", 'nl-nl' => "zeer belangrijk", 'sv-se' => "mycket viktigt", 'pt-pt' => "muito importante"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "important", 'en-us' => "important", 'fr-fr' => "important", 'de-de' => "wichtig", 'es-es' => "importante", 'it-it' => "importante", 'nl-nl' => "belangrijk", 'sv-se' => "viktigt", 'pt-pt' => "importante"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "not necessary", 'en-us' => "not necessary", 'fr-fr' => "pas nécessaire", 'de-de' => "nicht notwendig", 'es-es' => "no es necesario", 'it-it' => "non è necessario", 'nl-nl' => "niet nodig", 'sv-se' => "inte nödvändigt", 'pt-pt' => "não é necessário"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "this is not/no longer for me", 'en-us' => "this is not/no longer for me", 'fr-fr' => "ce n'est pas/plus pour moi", 'de-de' => "das ist nicht/nicht mehr für mich", 'es-es' => "esto no/no es para mí", 'it-it' => "questo non/non è più per me", 'nl-nl' => "dit is niet/niet meer voor mij", 'sv-se' => "detta är inte/inte längre för mig", 'pt-pt' => "isto não/não é para mim"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "alone", 'en-us' => "alone", 'fr-fr' => "seul(e)", 'de-de' => "alleine", 'es-es' => "solo/a", 'it-it' => "da solo/a", 'nl-nl' => "alleen", 'sv-se' => "ensam", 'pt-pt' => "sozinho/a"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with children", 'en-us' => "with kids", 'fr-fr' => "avec des enfants", 'de-de' => "mit Kindern", 'es-es' => "con niños", 'it-it' => "con i bambini", 'nl-nl' => "met kinderen", 'sv-se' => "med barn", 'pt-pt' => "com crianças"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with my children part of the time", 'en-us' => "with my kids part of the time", 'fr-fr' => "avec mes enfants une partie du temps", 'de-de' => "teilweise mit meinen Kindern", 'es-es' => "con mis hijos parte del tiempo", 'it-it' => "con i miei figli parte del tempo", 'nl-nl' => "deels met mijn kinderen", 'sv-se' => "delvis med mina barn", 'pt-pt' => "com os meus filhos parte do tempo"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with roommate(s)", 'en-us' => "with roommate(s)", 'fr-fr' => "avec colocataire(s)", 'de-de' => "mit Mitbewohner(n)", 'es-es' => "con compañero(s) de piso", 'it-it' => "con coinquilino(i)", 'nl-nl' => "met huisgenoot(sen)", 'sv-se' => "med rumskamrat(er)", 'pt-pt' => "com colega(s) de quarto"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with my parents", 'en-us' => "with my parents", 'fr-fr' => "avec mes parents", 'de-de' => "bei meinen Eltern", 'es-es' => "con mis padres", 'it-it' => "con i miei genitori", 'nl-nl' => "met mijn ouders", 'sv-se' => "med mina föräldrar", 'pt-pt' => "com os meus pais"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "i eat everything", 'en-us' => "i eat everything", 'fr-fr' => "je mange de tout", 'de-de' => "ich esse alles", 'es-es' => "como de todo", 'it-it' => "mangio di tutto", 'nl-nl' => "ik eet alles", 'sv-se' => "jag äter allt", 'pt-pt' => "eu como de tudo"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "keep it healty", 'en-us' => "keep it healty", 'fr-fr' => "manger sainement", 'de-de' => "gesund ernähren", 'es-es' => "llevar una dieta sana", 'it-it' => "mangiare sano", 'nl-nl' => "gezond eten", 'sv-se' => "äta hälsosamt", 'pt-pt' => "comer de forma saudável"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "a careful diet", 'en-us' => "a careful diet", 'fr-fr' => "une alimentation soignée", 'de-de' => "bewusste Ernährung", 'es-es' => "una dieta cuidadosa", 'it-it' => "una dieta attenta", 'nl-nl' => "een zorgvuldige voeding", 'sv-se' => "en noggrann diet", 'pt-pt' => "uma dieta cuidadosa"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "vegetarian", 'en-us' => "vegetarian", 'fr-fr' => "végétarien(ne)", 'de-de' => "vegetarisch", 'es-es' => "vegetariano/a", 'it-it' => "vegetariano/a", 'nl-nl' => "vegetarisch", 'sv-se' => "vegetarian", 'pt-pt' => "vegetariano/a"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "halal", 'en-us' => "halal", 'fr-fr' => "halal", 'de-de' => "halal", 'es-es' => "halal", 'it-it' => "halal", 'nl-nl' => "halal", 'sv-se' => "halal", 'pt-pt' => "halal"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "kosher", 'en-us' => "kosher", 'fr-fr' => "casher", 'de-de' => "koscher", 'es-es' => "kosher", 'it-it' => "kosher", 'nl-nl' => "kosjer", 'sv-se' => "kosher", 'pt-pt' => "casher"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "other", 'en-us' => "other", 'fr-fr' => "autre", 'de-de' => "andere", 'es-es' => "otro", 'it-it' => "altro", 'nl-nl' => "anders", 'sv-se' => "annan", 'pt-pt' => "outro"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "dogs", 'en-us' => "dogs", 'fr-fr' => "chiens", 'de-de' => "Hunde", 'es-es' => "perros", 'it-it' => "cani", 'nl-nl' => "honden", 'sv-se' => "hundar", 'pt-pt' => "cães"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "cats", 'en-us' => "cats", 'fr-fr' => "chats", 'de-de' => "Katzen", 'es-es' => "gatos", 'it-it' => "gatti", 'nl-nl' => "katten", 'sv-se' => "katter", 'pt-pt' => "gatos"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "fish", 'en-us' => "fish", 'fr-fr' => "poissons", 'de-de' => "Fische", 'es-es' => "peces", 'it-it' => "pesci", 'nl-nl' => "vissen", 'sv-se' => "fiskar", 'pt-pt' => "peixes"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "horses", 'en-us' => "horses", 'fr-fr' => "chevaux", 'de-de' => "Pferde", 'es-es' => "caballos", 'it-it' => "cavalli", 'nl-nl' => "paarden", 'sv-se' => "hästar", 'pt-pt' => "cavalos"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "rabbits", 'en-us' => "rabbits", 'fr-fr' => "lapins", 'de-de' => "Kaninchen", 'es-es' => "conejos", 'it-it' => "conigli", 'nl-nl' => "konijnen", 'sv-se' => "kaniner", 'pt-pt' => "coelhos"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "gerbils / ginea pigs / etc.", 'en-us' => "gerbils / ginea pigs / etc.", 'fr-fr' => "gerbilles / cochons d'Inde / etc.", 'de-de' => "Wüstenrennmäuse / Meerschweinchen / etc.", 'es-es' => "jerbos / cobayas / etc.", 'it-it' => "gerbilli / cavie / ecc.", 'nl-nl' => "gerbils / cavia's / etc.", 'sv-se' => "gerbiler / marsvin / etc.", 'pt-pt' => "gerbils / porquinhos-da-índia / etc."],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "birds", 'en-us' => "birds", 'fr-fr' => "oiseaux", 'de-de' => "Vögel", 'es-es' => "pájaros", 'it-it' => "uccelli", 'nl-nl' => "vogels", 'sv-se' => "fåglar", 'pt-pt' => "pássaros"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "exotic animals", 'en-us' => "exotic animals", 'fr-fr' => "animaux exotiques", 'de-de' => "exotische Tiere", 'es-es' => "animales exóticos", 'it-it' => "animali esotici", 'nl-nl' => "exotische dieren", 'sv-se' => "exotiska djur", 'pt-pt' => "animais exóticos"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "I don't have animals", 'en-us' => "I don't have animals", 'fr-fr' => "je n'ai pas d'animaux", 'de-de' => "ich habe keine Tiere", 'es-es' => "no tengo animales", 'it-it' => "non ho animali", 'nl-nl' => "ik heb geen dieren", 'sv-se' => "jag har inga djur", 'pt-pt' => "não tenho animais"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "other animals", 'en-us' => "other animals", 'fr-fr' => "autres animaux", 'de-de' => "andere Tiere", 'es-es' => "otros animales", 'it-it' => "altri animali", 'nl-nl' => "andere dieren", 'sv-se' => "andra djur", 'pt-pt' => "outros animais"],
                'sort_order' => 9,
            ],
        ];

        foreach ($choices as $choice) {
            ProfileChoice::create($choice);
        }
    }
}
