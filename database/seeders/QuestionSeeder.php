<?php

namespace Database\Seeders;

use App\Enums\QuestionTypeEnum;
use App\Models\ProfileCategory;
use App\Models\ProfileQuestion;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['en' => 'My description', 'en-us' => 'My description', 'fr-fr' => 'Ma description', 'de-de' => 'Meine Beschreibung', 'es-es' => 'Mi descripción', 'it-it' => 'La mia descrizione', 'nl-nl' => 'Mijn beschrijving', 'sv-se' => 'Min beskrivning', 'pt-pt' => 'A minha descrição'],
            ['en' => 'My answers', 'en-us' => 'My answers', 'fr-fr' => 'Mes réponses', 'de-de' => 'Meine Antworten', 'es-es' => 'Mis respuestas', 'it-it' => 'Le mie risposte', 'nl-nl' => 'Mijn antwoorden', 'sv-se' => 'Mina svar', 'pt-pt' => 'As minhas respostas'],
            ['en' => 'I am', 'en-us' => 'I am', 'fr-fr' => 'Je suis', 'de-de' => 'Ich bin', 'es-es' => 'Yo soy', 'it-it' => 'Io sono', 'nl-nl' => 'Ik ben', 'sv-se' => 'Jag är', 'pt-pt' => 'Eu sou'],
            ['en' => 'I am looking for', 'en-us' => 'I am looking for', 'fr-fr' => 'Je cherche', 'de-de' => 'Ich suche', 'es-es' => 'Estoy buscando', 'it-it' => 'Sto cercando', 'nl-nl' => 'Ik ben op zoek naar', 'sv-se' => 'Jag letar efter', 'pt-pt' => 'Estou à procura de'],
        ];

        $sortOrder = 0;

        foreach ($categories as $category) {
            ProfileCategory::create([
                'name' => $category,
                'slug' => $category['en'],
                'sort_order' => $sortOrder++,
            ]);
        }

        $sortOrder = 0;

        $subCategories = [
            ['en' => 'Main information', 'en-us' => 'Main information', 'fr-fr' => 'Informations principales', 'de-de' => 'Hauptinformation', 'es-es' => 'Información principal', 'it-it' => 'Informazioni principali', 'nl-nl' => 'Hoofdinformatie', 'sv-se' => 'Grundläggande information', 'pt-pt' => 'Informação principal'],
            ['en' => 'About me', 'en-us' => 'About me', 'fr-fr' => 'À propos de moi', 'de-de' => 'Über mich', 'es-es' => 'Sobre mí', 'it-it' => 'Su di me', 'nl-nl' => 'Over mij', 'sv-se' => 'Om mig', 'pt-pt' => 'Sobre mim'],
            ['en' => 'Home life', 'en-us' => 'Home life', 'fr-fr' => 'Vie à la maison', 'de-de' => 'Zuhause', 'es-es' => 'Vida en casa', 'it-it' => 'Vita domestica', 'nl-nl' => 'Thuisleven', 'sv-se' => 'Hemliv', 'pt-pt' => 'Vida em casa'],
            ['en' => 'My hobbies', 'en-us' => 'My hobbies', 'fr-fr' => 'Mes passe-temps', 'de-de' => 'Meine Hobbys', 'es-es' => 'Mis pasatiempos', 'it-it' => 'I miei hobby', 'nl-nl' => 'Mijn hobby\'s', 'sv-se' => 'Mina hobbyer', 'pt-pt' => 'Meus passatempos'],
        ];

        foreach ($subCategories as $category) {
            ProfileCategory::create([
                'name' => $category,
                'slug' => $category['en'],
                'parent_id' => ProfileCategory::whereSlug('i-am')->first()->id,
                'sort_order' => $sortOrder++,
            ]);
        }

        $questions = [
            [
                'name' => ['en' => 'My description', 'en-us' => 'My description', 'fr-fr' => 'Ma description', 'de-de' => 'Meine Beschreibung', 'es-es' => 'Mi descripción', 'it-it' => 'La mia descrizione', 'nl-nl' => 'Mijn beschrijving', 'sv-se' => 'Min beskrivning', 'pt-pt' => 'A minha descrição'],
                'profile_category_id' => ProfileCategory::whereSlug('my-description')->first()->id,
                'slug' => 'my-description',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 0,
                'show_question' => false,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'If I had an extra hour per day...', 'en-us' => 'If I had an extra hour per day...', 'fr-fr' => 'Si j\'avais une heure de plus par jour...', 'de-de' => 'Wenn ich einen zusätzlichen Stunde pro Tag hätte...', 'es-es' => 'Si tuviera una hora extra al día...', 'it-it' => 'Se avessi un\'ora in più al giorno...', 'nl-nl' => 'Als ik een extra uur per dag had...', 'sv-se' => 'Om jag hade en extra timme per dag...', 'pt-pt' => 'Se eu tivesse uma hora extra por dia...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'If I had an extra hour per day',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My dream holiday is...', 'en-us' => 'My dream holiday is...', 'fr-fr' => 'Mes vacances de rêve sont...', 'de-de' => 'Mein Traumurlaub ist...', 'es-es' => 'Mis vacaciones soñadas son...', 'it-it' => 'Le mie vacanze da sogno sono...', 'nl-nl' => 'Mijn droomvakantie is...', 'sv-se' => 'Min drömsemester är...', 'pt-pt' => 'As minhas férias de sonho são...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My dream holiday is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The things I always carry with me are...', 'en-us' => 'The things I always carry with me are...', 'fr-fr' => 'Les choses que je porte toujours avec moi sont...', 'de-de' => 'Die Dinge, die ich immer bei mir trage, sind...', 'es-es' => 'Las cosas que siempre llevo conmigo son...', 'it-it' => 'Le cose che porto sempre con me sono...', 'nl-nl' => 'De dingen die ik altijd bij me draag zijn...', 'sv-se' => 'De saker jag alltid bär med mig är...', 'pt-pt' => 'As coisas que eu sempre carrego comigo são...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The things I always carry with me are',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The show or book that would make me cancel my dinner plans is...', 'en-us' => 'The show or book that would make me cancel my dinner plans is...', 'fr-fr' => 'L\'émission ou le livre qui me ferait annuler mes projets de dîner est...', 'de-de' => 'Die Show oder das Buch, das mich dazu bringen würde, meine Abendessenpläne abzusagen, ist...', 'es-es' => 'El programa o libro que me haría cancelar mis planes de cena es...', 'it-it' => 'Lo spettacolo o il libro che mi farebbe cancellare i miei piani per la cena è...', 'nl-nl' => 'De show of het boek dat me zou doen afzien van mijn dinerplannen is...', 'sv-se' => 'Showen eller boken som skulle få mig att avboka mina middagsplaner är...', 'pt-pt' => 'O programa ou livro que me faria cancelar os meus planos de jantar é...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The show or book that would make me cancel my dinner plans is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My work is...', 'en-us' => 'My work is...', 'fr-fr' => 'Mon travail est...', 'de-de' => 'Meine Arbeit ist...', 'es-es' => 'Mi trabajo es...', 'it-it' => 'Il mio lavoro è...', 'nl-nl' => 'Mijn werk is...', 'sv-se' => 'Mitt arbete är...', 'pt-pt' => 'O meu trabalho é...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My work is',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My superpower...', 'en-us' => 'My superpower...', 'fr-fr' => 'Mon super pouvoir...', 'de-de' => 'Meine Superkraft...', 'es-es' => 'Mi superpoder...', 'it-it' => 'Il mio superpotere...', 'nl-nl' => 'Mijn superkracht...', 'sv-se' => 'Min superkraft...', 'pt-pt' => 'O meu superpoder...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'My superpower',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 5,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The worst thing I heard someone say about my love life...', 'en-us' => 'The worst thing I heard someone say about my love life...', 'fr-fr' => 'La pire chose que j\'ai entendue quelqu\'un dire sur ma vie amoureuse...', 'de-de' => 'Das Schlimmste, was ich gehört habe, dass jemand über mein Liebesleben gesagt hat...', 'es-es' => 'Lo peor que he oído que alguien diga sobre mi vida amorosa...', 'it-it' => 'La cosa peggiore che ho sentito dire a qualcuno sulla mia vita amorosa...', 'nl-nl' => 'Het ergste wat ik iemand over mijn liefdesleven heb horen zeggen is...', 'sv-se' => 'Det värsta jag har hört någon säga om mitt kärleksliv är...', 'pt-pt' => 'A pior coisa que ouvi alguém dizer sobre a minha vida amorosa...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The worst thing I heard someone say about my love life',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 6,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Three things that make a relationship great...', 'en-us' => 'Three things that make a relationship great...', 'fr-fr' => 'Trois choses qui rendent une relation géniale...', 'de-de' => 'Drei Dinge, die eine Beziehung großartig machen...', 'es-es' => 'Tres cosas que hacen que una relación sea genial...', 'it-it' => 'Tre cose che rendono una relazione fantastica...', 'nl-nl' => 'Drie dingen die een relatie geweldig maken...', 'sv-se' => 'Tre saker som gör en relation fantastisk...', 'pt-pt' => 'Três coisas que tornam um relacionamento ótimo...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'Three things that make a relationship great',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 7,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Favorite quality in a person...', 'en-us' => 'Favorite quality in a person...', 'fr-fr' => 'Qualité préférée chez une personne...', 'de-de' => 'Lieblingsqualität bei einer Person...', 'es-es' => 'Cualidad favorita en una persona...', 'it-it' => 'Qualità preferita in una persona...', 'nl-nl' => 'Favoriete eigenschap in een persoon...', 'sv-se' => 'Favoritkvalitet hos en person...', 'pt-pt' => 'Qualidade favorita numa pessoa...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'Favorite quality in a person',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 8,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'The way to my heart is through...', 'en-us' => 'The way to my heart is through...', 'fr-fr' => 'Le chemin vers mon cœur passe par...', 'de-de' => 'Der Weg zu meinem Herzen führt über...', 'es-es' => 'El camino a mi corazón es a través de...', 'it-it' => 'La strada per il mio cuore è attraverso...', 'nl-nl' => 'De weg naar mijn hart is via...', 'sv-se' => 'Vägen till mitt hjärta går genom...', 'pt-pt' => 'O caminho para o meu coração é através de...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'The way to my heart is through',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 9,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I’ll stay up late for...', 'en-us' => 'I’ll stay up late for...', 'fr-fr' => 'Je veillerai tard pour...', 'de-de' => 'Ich bleibe lange auf für...', 'es-es' => 'Me quedaré despierto hasta tarde por...', 'it-it' => 'Rimarrò sveglio fino a tardi per...', 'nl-nl' => 'Ik blijf laat op voor...', 'sv-se' => 'Jag stannar uppe sent för...', 'pt-pt' => 'Ficarei acordado até tarde por...'],
                'profile_category_id' => ProfileCategory::whereSlug('my-answers')->first()->id,
                'slug' => 'I’ll stay up late for',
                'type' => QuestionTypeEnum::TEXT->value,
                'sort_order' => 10,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Ethnicity', 'en-us' => 'Ethnicity', 'fr-fr' => 'Ethnicité', 'de-de' => 'Ethnizität', 'es-es' => 'Etnicidad', 'it-it' => 'Etnia', 'nl-nl' => 'Etniciteit', 'sv-se' => 'Etnicitet', 'pt-pt' => 'Etnia'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Ethnicity',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Nationality', 'en-us' => 'Nationality', 'fr-fr' => 'Nationalité', 'de-de' => 'Nationalität', 'es-es' => 'Nacionalidad', 'it-it' => 'Nazionalità', 'nl-nl' => 'Nationaliteit', 'sv-se' => 'Nationalitet', 'pt-pt' => 'Nacionalidade'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Nationality',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Occupation', 'en-us' => 'Occupation', 'fr-fr' => 'Profession', 'de-de' => 'Beruf', 'es-es' => 'Ocupación', 'it-it' => 'Occupazione', 'nl-nl' => 'Beroep', 'sv-se' => 'Yrke', 'pt-pt' => 'Ocupação'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Occupation',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Religion', 'en-us' => 'Religion', 'fr-fr' => 'Religion', 'de-de' => 'Religion', 'es-es' => 'Religión', 'it-it' => 'Religione', 'nl-nl' => 'Religie', 'sv-se' => 'Religion', 'pt-pt' => 'Religião'],
                'profile_category_id' => ProfileCategory::whereSlug('about-me')->first()->id,
                'slug' => 'Religion',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I think marriage is...', 'en-us' => 'I think marriage is...', 'fr-fr' => 'Je pense que le mariage est...', 'de-de' => 'Ich denke, dass die Ehe...', 'es-es' => 'Creo que el matrimonio es...', 'it-it' => 'Penso che il matrimonio sia...', 'nl-nl' => 'Ik denk dat het huwelijk is...', 'sv-se' => 'Jag tycker att äktenskap är...', 'pt-pt' => 'Eu acho que o casamento é...'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'I think marriage is',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Languages', 'en-us' => 'Languages', 'fr-fr' => 'Langues', 'de-de' => 'Sprachen', 'es-es' => 'Idiomas', 'it-it' => 'Lingue', 'nl-nl' => 'Talen', 'sv-se' => 'Språk', 'pt-pt' => 'Línguas'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'Languages',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'I live...', 'en-us' => 'I live...', 'fr-fr' => 'Je vis...', 'de-de' => 'Ich lebe...', 'es-es' => 'Vivo...', 'it-it' => 'Vivo...', 'nl-nl' => 'Ik woon...', 'sv-se' => 'Jag bor...', 'pt-pt' => 'Eu vivo...'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'I live',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Diet', 'en-us' => 'Diet', 'fr-fr' => 'Régime alimentaire', 'de-de' => 'Ernährung', 'es-es' => 'Dieta', 'it-it' => 'Dieta', 'nl-nl' => 'Dieet', 'sv-se' => 'Kost', 'pt-pt' => 'Dieta'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'Diet',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My pets', 'en-us' => 'My pets', 'fr-fr' => 'Mes animaux de compagnie', 'de-de' => 'Meine Haustiere', 'es-es' => 'Mis mascotas', 'it-it' => 'I miei animali domestici', 'nl-nl' => 'Mijn huisdieren', 'sv-se' => 'Mina husdjur', 'pt-pt' => 'Os meus animais de estimação'],
                'profile_category_id' => ProfileCategory::whereSlug('home-life')->first()->id,
                'slug' => 'My pets',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Interests', 'en-us' => 'Interests', 'fr-fr' => 'Intérêts', 'de-de' => 'Interessen', 'es-es' => 'Intereses', 'it-it' => 'Interessi', 'nl-nl' => 'Interesses', 'sv-se' => 'Intressen', 'pt-pt' => 'Interesses'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Interests',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Sports', 'en-us' => 'Sports', 'fr-fr' => 'Sports', 'de-de' => 'Sportarten', 'es-es' => 'Deportes', 'it-it' => 'Sport', 'nl-nl' => 'Sporten', 'sv-se' => 'Sporter', 'pt-pt' => 'Desportos'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Sports',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 1,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Entertainment', 'en-us' => 'Entertainment', 'fr-fr' => 'Divertissement', 'de-de' => 'Unterhaltung', 'es-es' => 'Entretenimiento', 'it-it' => 'Intrattenimento', 'nl-nl' => 'Entertainment', 'sv-se' => 'Underhållning', 'pt-pt' => 'Entretenimento'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'Entertainment',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 2,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My favourite films', 'en-us' => 'My favourite films', 'fr-fr' => 'Mes films préférés', 'de-de' => 'Meine Lieblingsfilme', 'es-es' => 'Mis películas favoritas', 'it-it' => 'I miei film preferiti', 'nl-nl' => 'Mijn favoriete films', 'sv-se' => 'Mina favoritfilmer', 'pt-pt' => 'Os meus filmes favoritos'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'My favourite films',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 3,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'My taste in music', 'en-us' => 'My taste in music', 'fr-fr' => 'Mes goûts musicaux', 'de-de' => 'Mein Musikgeschmack', 'es-es' => 'Mi gusto musical', 'it-it' => 'Il mio gusto musicale', 'nl-nl' => 'Mijn muzieksmaak', 'sv-se' => 'Min musiksmak', 'pt-pt' => 'O meu gosto musical'],
                'profile_category_id' => ProfileCategory::whereSlug('my-hobbies')->first()->id,
                'slug' => 'My taste in music',
                'type' => QuestionTypeEnum::MULTI_CHOICE->value,
                'sort_order' => 4,
                'show_question' => true,
                'is_required' => false,
            ],
            [
                'name' => ['en' => 'Age', 'en-us' => 'Age', 'fr-fr' => 'Âge', 'de-de' => 'Alter', 'es-es' => 'Edad', 'it-it' => 'Età', 'nl-nl' => 'Leeftijd', 'sv-se' => 'Ålder', 'pt-pt' => 'Idade'],//range of age looking for
                'profile_category_id' => ProfileCategory::whereSlug('i-am-looking-for')->first()->id,
                'slug' => 'Age',
                'type' => QuestionTypeEnum::RANGE->value,
                'sort_order' => 0,
                'show_question' => true,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Height', 'en-us' => 'Height', 'fr-fr' => 'Taille', 'de-de' => 'Größe', 'es-es' => 'Altura', 'it-it' => 'Altezza', 'nl-nl' => 'Lengte', 'sv-se' => 'Längd', 'pt-pt' => 'Altura'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Height',
                'type' => QuestionTypeEnum::NUMERIC->value,
                'sort_order' => 0,
                'show_question' => false,
                'is_required' => true,
                'min_value' => 140,
                'max_value' => 200,
            ],
            [
                'name' => ['en' => 'Education', 'en-us' => 'Education', 'fr-fr' => 'Éducation', 'de-de' => 'Bildung', 'es-es' => 'Educación', 'it-it' => 'Istruzione', 'nl-nl' => 'Opleiding', 'sv-se' => 'Utbildning', 'pt-pt' => 'Educação'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Education',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 1,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Smoke', 'en-us' => 'Smoke', 'fr-fr' => 'Fumer', 'de-de' => 'Rauchen', 'es-es' => 'Fumar', 'it-it' => 'Fumare', 'nl-nl' => 'Roken', 'sv-se' => 'Röka', 'pt-pt' => 'Fumar'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Smoke',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 2,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Has children', 'en-us' => 'Has kids', 'fr-fr' => 'A des enfants', 'de-de' => 'Hat Kinder', 'es-es' => 'Tiene hijos', 'it-it' => 'Ha figli', 'nl-nl' => 'Heeft kinderen', 'sv-se' => 'Har barn', 'pt-pt' => 'Tem filhos'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Has children',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 3,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Want children', 'en-us' => 'Want kids', 'fr-fr' => 'Veut des enfants', 'de-de' => 'Will Kinder', 'es-es' => 'Quiere hijos', 'it-it' => 'Vuole figli', 'nl-nl' => 'Wil kinderen', 'sv-se' => 'Vill ha barn', 'pt-pt' => 'Quer filhos'],
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Want children',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 4,
                'show_question' => false,
                'is_required' => true,
            ],
            [
                'name' => ['en' => 'Looking for', 'en-us' => 'Looking for', 'fr-fr' => 'Cherche', 'de-de' => 'Suche', 'es-es' => 'Buscando', 'it-it' => 'Sto cercando', 'nl-nl' => 'Op zoek naar', 'sv-se' => 'Letar efter', 'pt-pt' => 'À procura de'],// true love, meet new people etc.
                'profile_category_id' => ProfileCategory::whereSlug('main-information')->first()->id,
                'slug' => 'Looking for',
                'type' => QuestionTypeEnum::SINGLE_CHOICE->value,
                'sort_order' => 5,
                'show_question' => false,
                'is_required' => true,
            ],
        ];

        foreach ($questions as $question) {
            ProfileQuestion::create($question);
        }

    }
}
