<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Enums\QuestionTypeEnum;
use App\Enums\RoleEnum;
use App\Models\Image;
use App\Models\Profile;
use App\Models\ProfileChoice;
use App\Models\ProfileQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DummyProfileSeeder extends Seeder
{
    private array $femaleUsers = [];
    private array $maleUsers = [];
    private array $locations = [
        [
            'city' => 'Stevenage',
            'lat' => 51.90375843086422,
            'lon' => -0.1875166495581234,
        ],
        [
            'city' => 'Liverpool',
            'lat' => 53.41054787496579,
            'lon' => -2.999281043978018
        ],
        [
            'city' => 'Leeds',
            'lat' => 53.798793047080736,
            'lon' => -1.5450124096928106
        ],
        [
            'city' => 'Harrogate',
            'lat' => 53.991869061684525,
            'lon' => -1.5452251971829414
        ],
        [
            'city' => 'London',
            'lat' => 51.50980724121141,
            'lon' => -0.1160613721182063
        ],
        [
            'city' => 'Manchester',
            'lat' => 53.48092943032973,
            'lon' => -2.247667101685042
        ],
        [
            'city' => 'Birmingham',
            'lat' => 52.48476655948276,
            'lon' => -1.875346594077659
        ],
        [
            'city' => 'Wolverhampton',
            'lat' => 52.586767167394,
            'lon' => -2.135183763622839
        ],
        [
            'city' => 'Leicester',
            'lat' => 52.63700453437074,
            'lon' => -1.1506803481117172
        ],
        [
            'city' => 'Blackburn',
            'lat' => 53.74767663718259,
            'lon' => -2.4872079226580355
        ],
    ];

    /**
     * Insert 100 female and 100 male dummy profiles into the application.
     */
    public function run(): void
    {
//                $femaleNames = [
//                    'Alice', 'Emma', 'Olivia', 'Sophia', 'Isabella', 'Mia', 'Charlotte', 'Amelia', 'Harper', 'Evelyn',
//                    'Ava', 'Abigail', 'Emily', 'Elizabeth', 'Sofia', 'Avery', 'Ella', 'Scarlett', 'Grace', 'Chloe',
//                    'Victoria', 'Riley', 'Aria', 'Lily', 'Aubrey', 'Zoey', 'Penelope', 'Lillian', 'Addison', 'Layla',
//                    'Natalie', 'Camila', 'Hannah', 'Brooklyn', 'Zoe', 'Nora', 'Leah', 'Savannah', 'Audrey', 'Claire',
//                    'Eleanor', 'Skylar', 'Ellie', 'Samantha', 'Stella', 'Paisley', 'Violet', 'Mila', 'Allison', 'Alexa',
//                    'Anna', 'Sarah', 'Madelyn', 'Ariana', 'Aaliyah', 'Gabriella', 'Hailey', 'Autumn', 'Kaylee', 'Ruby',
//                    'Serenity', 'Eva', 'Naomi', 'Piper', 'Lydia', 'Melanie', 'Brianna', 'Maya', 'Taylor', 'Katherine',
//                    'Madison', 'Morgan', 'Kimberly', 'Hazel', 'Jessica', 'Gianna', 'Rebecca', 'Andrea', 'Faith', 'Mary',
//                    'Isabelle', 'Josephine', 'Delilah', 'Nevaeh', 'Brooke', 'Paige', 'Sadie', 'Quinn', 'Phoebe', 'Sophie',
//                    'Caroline', 'Natalia', 'Kylie', 'Nicole', 'Trinity', 'Molly', 'Valeria', 'Daisy', 'Amy', 'Melody'
//                ];
//
//                $maleNames = [
//                    'Charlie', 'Noah', 'Oliver', 'Elijah', 'James', 'William', 'Benjamin', 'Lucas', 'Henry', 'Alexander',
//                    'Mason', 'Michael', 'Ethan', 'Daniel', 'Jacob', 'Logan', 'Jackson', 'Aiden', 'Samuel', 'Sebastian',
//                    'Matthew', 'David', 'Joseph', 'Carter', 'Owen', 'Wyatt', 'John', 'Jack', 'Luke', 'Jayden',
//                    'Dylan', 'Grayson', 'Levi', 'Isaac', 'Gabriel', 'Julian', 'Mateo', 'Anthony', 'Jaxon', 'Lincoln',
//                    'Joshua', 'Christopher', 'Andrew', 'Theodore', 'Caleb', 'Ryan', 'Asher', 'Nathan', 'Thomas', 'Leo',
//                    'Isaiah', 'Charles', 'Josiah', 'Hudson', 'Christian', 'Hunter', 'Connor', 'Eli', 'Ezra', 'Aaron',
//                    'Landon', 'Adrian', 'Jonathan', 'Nolan', 'Jeremiah', 'Easton', 'Elias', 'Colton', 'Cameron', 'Carson',
//                    'Robert', 'Angel', 'Maverick', 'Nicholas', 'Dominic', 'Jace', 'Brayden', 'Austin', 'Ian', 'Adam',
//                    'Evan', 'Jose', 'Ezekiel', 'Tyler', 'Miles', 'Zachary', 'Axel', 'Chase', 'Parker', 'Kayden',
//                    'Blake', 'Jason', 'Jordan', 'Declan', 'Eric', 'Wesley', 'Silas', 'Timothy', 'Brody', 'Cooper'
//                ];

        if (!App::runningUnitTests()) {
            $femaleNames = [
                'Alice', 'Emma', 'Olivia', 'Sophia', 'Isabella', 'Mia', 'Charlotte', 'Amelia', 'Harper', 'Evelyn',
                'Ava', 'Abigail', 'Emily', 'Elizabeth', 'Sofia', 'Avery', 'Ella', 'Scarlett', 'Grace', 'Chloe',
                'Victoria', 'Riley', 'Aria', 'Lily', 'Aubrey', 'Zoey', 'Penelope', 'Lillian', 'Addison', 'Layla',
                'Natalie', 'Camila', 'Hannah', 'Brooklyn', 'Zoe', 'Nora', 'Leah', 'Savannah', 'Audrey', 'Claire',
                'Eleanor', 'Skylar', 'Ellie', 'Samantha', 'Stella', 'Paisley', 'Violet', 'Mila', 'Allison', 'Alexa',
            ];

            $maleNames = [
                'Charlie', 'Noah', 'Oliver', 'Elijah', 'James', 'William', 'Benjamin', 'Lucas', 'Henry', 'Alexander',
                'Mason', 'Michael', 'Ethan', 'Daniel', 'Jacob', 'Logan', 'Jackson', 'Aiden', 'Samuel', 'Sebastian',
                'Matthew', 'David', 'Joseph', 'Carter', 'Owen', 'Wyatt', 'John', 'Jack', 'Luke', 'Jayden',
                'Dylan', 'Grayson', 'Levi', 'Isaac', 'Gabriel', 'Julian', 'Mateo', 'Anthony', 'Jaxon', 'Lincoln',
                'Joshua', 'Christopher', 'Andrew', 'Theodore', 'Caleb', 'Ryan', 'Asher', 'Nathan', 'Thomas', 'Leo',
            ];
        } else {
            $femaleNames = [
                'Alice', 'Emma',
            ];

            $maleNames = [
                'Charlie', 'Noah',
            ];
        }

        $this->insertData($femaleNames, GenderEnum::FEMALE->value);
        $this->insertData($maleNames, GenderEnum::MALE->value);

        $femaleProfiles = [
            "Marketing manager by day, coffee snob by necessity. I'm looking for a kind, curious man with quick wit, good manners, and the initiative to book a table once in a while. Not into arrogance, rudeness to waiters, or ghosting. Dream holidays include sushi-fuelled nights in Japan, pasta pilgrimages across Italy, and chasing the Northern Lights in Iceland. Hobbies: muddy hikes, pub quizzes, experimental cooking, and film nights with far too much popcorn. Occupation-wise, I craft campaigns and obsess over taglines; off the clock I perfect roast potatoes and playlists.",
            "Primary school teacher with a chaotic sticker collection and a calm head. I want a patient, playful gent who keeps his promises, laughs easily, and texts in full sentences; gym-mirror addicts, chronic smokers, and one-word texters can keep scrolling. My wander list: island hopping in Greece, azulejo spotting in Portugal, and maple-drenched brunches in Canada. Hobbies include parkruns, baking enthusiastic cakes, karaoke that only frightens the neighbours, and loitering in cosy bookshops. By day I wrangle tiny humans; by night I plan picnics with military precision.",
            "UX designer who speaks fluent emoji and can parallel park on the first try when the stars align. I value men who communicate clearly, show up when they say they will, and are genuinely kind; I don't do drama, habitual lateness, or honesty with an asterisk. Future holidays look like road-tripping through New Zealand, fjord gazing in Norway, and getting lost in Morocco's markets. My hobbies range from bouldering blisters and yoga wobbling to board games, street photography, and experimental brunching. By day I turn chaos into simple apps; by evening I'm the undefeated queen of flat-pack furniture.",
            "Physiotherapist with an endless stash of cereal bars. I’m after a kind, steady man who can laugh at himself and actually follows through; not a fan of arrogance, flakiness, or anyone rude to waiters. My wish list: tango in Argentina, ramen in Japan, and lakes in Slovenia. Hobbies include Sunday hikes, Pilates that turns into stretching, charity shop treasure hunts, and attempting sourdough like it’s a science experiment. By day I fix backs and cheer on small victories; by night I rate hot chocolates like a Michelin inspector.",
            "Full-stack developer who names her houseplants and ships tidy code. I’m looking for a thoughtful, communicative guy with a playful streak; serial bench press braggarts, chronic smokers, and ghosters need not apply. Dream trips: kimchi quests in South Korea, hiking to Machu Picchu in Peru, and sauna hopping in Finland. I unwind with bouldering, indie gigs, board games that take too long, and photography walks. Occupation-wise, I turn coffee into features and bugs into lessons, usually.",
            "Architect with a backpack sketchbook and a soft spot for wonky buildings. I like men who are curious, reliable, and gentle with people and pets; I don’t vibe with mansplaining, messiness that qualifies as modern art, or constant lateness. Holidays I’m plotting: temples and Nile views in Egypt, colour and cuisine in Mexico, and alpine trains across Switzerland. My hobbies: urban sketching, trail runs, pottery nights, and optimising playlists for road trips. By day I draw lines that become places; off the clock I’m a champion of cosy brunches.",
        ];

        $maleProfiles = [
            "Adventure travel photographer who treats carry-on space like Tetris. Off-hours: rock climbing, chasing sunrises, street-food treasure hunts, and getting lost on purpose (I always find the best coffee that way). I'm here for a serious relationship with someone who laughs easily and can tolerate my 5am alarms.",
            "Paramedic with calm hands and a chaotic sock drawer. Hobbies: cold-water dips, trail running, and learning to fix bikes that I probably broke. I'm here to build something long term, ideally with a co-adventurer who appreciates emergency snack protocol.",
            "Software engineer who ships code by day and falls off surfboards on weekends; progress is a feature. I like bouldering, ramen quests, and spontaneous city breaks where the itinerary is just vibes. I'm here to meet someone playful and see it grow into the real thing.",
            "Chef in a busy kitchen; I saute, I season, I name my sourdough starters. Hobbies: wild camping, salsa dancing that borders on cardio, and inventing picnic menus. I'm on here for a serious relationship — perk: breakfasts in bed are part of the roadmap.",
            "Airline pilot who still claps for nice landings on other people's flights. When grounded I mountain bike, volunteer with rescue dogs, and plan road trips with too many scenic detours. I'm looking for a committed relationship, turbulence included, snacks provided.",
            "Marine biologist who talks to fish (they're great listeners). I dive, paddleboard, and take terrible-but-earnest wildlife sketches; also big on stargazing from beaches. I'm here for a long term relationship with someone curious, kind, and okay with sand everywhere.",
        ];

        $this->createAnswers($this->femaleUsers, $femaleProfiles);
        $this->createAnswers($this->maleUsers, $maleProfiles);

        $questions = [];

        $questions[] = ProfileQuestion::whereSlug(Str::slug("If I had an extra hour per day"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("My dream holiday is"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("The things I always carry with me are"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("The show or book that would make me cancel my dinner plans is"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("My work is"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("My superpower"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("The worst thing I heard someone say about my love life"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("Three things that make a relationship great"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("Favorite quality in a person"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("The way to my heart is through"))->first();
        $questions[] = ProfileQuestion::whereSlug(Str::slug("I’ll stay up late for"))->first();

        $femaleAnswers = [
            "I’d use it to finally master sourdough, call my mum back promptly, and stretch like a responsible adult.",
            "A slow-food road trip through Italy with detours for gelato and seaside sunsets.",
            "Lip balm, emergency snacks, and a phone that’s always at 12% battery but full of optimism.",
            "A brand-new season of The Bear or a twisty mystery novel that keeps saying 'just one more chapter'.",
            "UX designer by day, translator of “huh?” into “oh wow” by wireframe.",
            "Remembering everyone’s coffee order and finding lost things that were “right there a second ago.”",
            "“Her love life is like British summer—surprisingly sunny, but bring a jacket just in case.”",
            "Kindness, curiosity, and shared snacks (the sacred triangle).",
            "Consistency with a sense of humour that arrives on time.",
            "Through a well-seasoned pan, great conversation, and texts that don’t ghost after 8pm.",
            "I’ll stay up late for meteor showers, airport sunrises, “one more episode” that becomes three, and those 2am chats where the pizza goes cold but the ideas don’t."
        ];

        $maleAnswers = [
            "I’d spend it finally fixing the squeaky cupboard, learning one guitar riff properly, and phoning my mum without being reminded.",
            "A slow campervan loop of New Zealand—mountains by day, stargazing and roadside pies by night.",
            "Keys, wallet, headphones, reusable bottle, and a phone charger that mysteriously only works at 37 degrees.",
            "A new Taskmaster series or a page-turner that swears every chapter is the 'last one'—looking at you, Jack Reacher.",
            "I’m a civil engineer: I build things that don’t fall over and make spreadsheets that definitely won’t.",
            "Packing a car boot with Tetris-level efficiency (and finding the best queue at any festival).",
            "‘His love life is like British rail—mostly delayed, sometimes cancelled, but he remains oddly optimistic.’",
            "Honest chats, shared adventures, and laughing at the same terrible puns.",
            "Curiosity (with kindness close behind).",
            "Through a perfectly brewed cup of coffee, thoughtful little gestures, and roast potatoes with proper crunch.",
            "Meteor showers, away matches in silly time zones, and those 1am conversations where the tea goes cold but the ideas don’t.",
        ];

        $this->generateText($this->femaleUsers, $questions, $femaleAnswers);
        $this->generateText($this->maleUsers, $questions, $maleAnswers);
    }

    private function insertData(array $names, int $sex): void
    {
        $gender = $sex === GenderEnum::FEMALE->value ? 'female' : 'male';

        foreach ($names as $index => $name) {
            try {
                DB::beginTransaction();

                $user = User::factory()->create([
                    'first_name' => $name,
                    'password' => bcrypt('password123'),
                ]);
                $user->addRole(RoleEnum::CUSTOMER->value);

                $location = $this->locations[array_rand($this->locations)];

                Profile::factory()->create([
                    'user_id' => $user->id,
                    'sex' => $sex,
                    'latitude' => $location['lat'],
                    'longitude' => $location['lon'],
                    'city' => $location['city'],
                    'location' => $location['city'],
                ]);

                if (!App::runningUnitTests()) {
                    $image = Image::create([
                        'user_id' => $user->id,
                        'is_approved' => true,
                    ]);

                    $image2 = Image::create([
                        'user_id' => $user->id,
                        'sort_order' => 1,
                        'is_approved' => true,
                    ]);

                    $path = $sex === GenderEnum::FEMALE->value ? 'women_pics' : 'men_pics';

                    $pathToFile1 = public_path("sample_images/$path/$index.jpg");

                    $rand = random_int(0, 99);
                    $pathToFile2 = public_path("sample_images/$path/$rand.jpg");

                    $image
                        ->addMedia($pathToFile1)
                        ->preservingOriginal()
                        ->toMediaCollection('profile_images');

                    $image2
                        ->addMedia($pathToFile2)
                        ->preservingOriginal()
                        ->toMediaCollection('profile_images');
                }

                DB::commit();

                if ($sex === GenderEnum::FEMALE->value) {
                    $this->femaleUsers[] = $user->id;
                } else {
                    $this->maleUsers[] = $user->id;
                }
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("Error creating $gender seeded profile for $name: " . $e->getMessage());
            }
        }
    }

    private function createAnswers(array $userIds, array $descriptions): void
    {
        foreach ($userIds as $userId) {
            $question = ProfileQuestion::whereSlug('my-description')->first();

            $profileAnswer = [
                'user_id' => $userId,
                'answer' => $descriptions[array_rand($descriptions)],
            ];

            $question->profileAnswers()->create($profileAnswer);

            $question = ProfileQuestion::whereSlug('height')->first();
            $question->profileAnswers()->create([
                'user_id' => $userId,
                'answer' => random_int(150, 200),
            ]);

            $questions = ProfileQuestion::whereType(QuestionTypeEnum::SINGLE_CHOICE->value)->get();

            foreach ($questions as $question) {
                $choice = ProfileChoice::where('profile_question_id', $question->id)
                    ->inRandomOrder()
                    ->first();

                $choice->profileAnswers()->create([
                    'user_id' => $userId,
                ]);
            }

            $questions = ProfileQuestion::whereType(QuestionTypeEnum::MULTI_CHOICE->value)->get();

            foreach ($questions as $question) {
                $choices = ProfileChoice::where('profile_question_id', $question->id)
                    ->inRandomOrder()
                    ->select('id')
                    ->pluck('id')
                    ->toArray();

                $maxCount = count($choices);
                $randomCount = random_int(1, min(3, $maxCount));

                for ($x = 0; $x < $randomCount; $x++) {
                    $choice = ProfileChoice::find($choices[$x]);

                    $choice->profileAnswers()->create([
                        'user_id' => $userId,
                    ]);
                }
            }

            //age the user is looking for
            $question = ProfileQuestion::whereSlug('age')->first();

            $minAge = random_int(18, 30);

            $question->profileAnswers()->create([
                'user_id' => $userId,
                'answer' => $minAge . ',' . random_int($minAge + 5, $minAge + 10),
            ]);
        }
    }

    private function generateText(array $users, array $questions, array $answers): void
    {
        foreach ($users as $userId) {

            $maxAnswers = random_int(1, 11); //how many answers to choose
            $chosenAnswers = [];

            do {
                $chosen = random_int(1, 11); //pick a random answer
                if (!in_array(($chosen - 1), $chosenAnswers)) {
                    $chosenAnswers[] = $chosen - 1; // Adjust for zero-based index
                }
            } while (count($chosenAnswers) < $maxAnswers);

            foreach ($chosenAnswers as $chosenAnswer) {
                $questions[$chosenAnswer]->profileAnswers()->create([
                    'user_id' => $userId,
                    'answer' => $answers[$chosenAnswer],
                ]);
            }
        }
    }
}
