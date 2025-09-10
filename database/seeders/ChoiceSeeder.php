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
                'name' => ['en' => 'high school'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'some college'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'associates degree'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'bachelors degree'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'masters'],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('education')->first()->id,
                'name' => ['en' => 'PhD/post doctoral'],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'never smoke'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'socially smoke'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'smoke regularly'],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('smoke')->first()->id,
                'name' => ['en' => 'trying to quit'],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('has-kids')->first()->id,
                'name' => ['en' => 'have kids'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('has-kids')->first()->id,
                'name' => ['en' => "don't have kids"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-kids')->first()->id,
                'name' => ['en' => 'want kids'],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-kids')->first()->id,
                'name' => ['en' => "don't want kids"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('want-kids')->first()->id,
                'name' => ['en' => "not sure"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "True love"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => 'Meet new people'],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "I'll let my destiny be my guide"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('looking-for')->first()->id,
                'name' => ['en' => "The thrill of passion"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "white / caucasian"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "asian"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "black / african descent"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "mixed race"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "mediterranean"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "middle Eastern"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "east Indian"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "latin-american"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('ethnicity')->first()->id,
                'name' => ['en' => "other"],
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
                'name' => ['en' => "administrative/secretarial"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "advertising/media"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "architecture/interior design/graphic design"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "artistic/creative/performance/music"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "cook/baker"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "executive/management"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "fashion/model/beauty"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "financial services"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "labour/construction"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "legal"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "medical/dental/veterinary"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "political/government/civil service/military"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "retail/food services"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "retired"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "sales/marketing"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "self employed"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "student"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "teacher/professor"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "technical/computers/engineering"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "tradesperson"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "travel/hospitality/transportation"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('occupation')->first()->id,
                'name' => ['en' => "other profession"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Agnostic"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Atheist"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Buddhist/Taoist"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian / Catholic"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Christian / Protestant"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Hindu"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Jewish"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Muslim / Islam"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Orthodox"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Shinto"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Sikh"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Spiritual but not religious"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('religion')->first()->id,
                'name' => ['en' => "Other"],
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
                'name' => ['en' => "Other"],
                'sort_order' => 78,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "dining out"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "travel/sightseeing"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "music"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "the outdoors"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "cooking"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "dancing"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "television"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "museums/exhibits"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "painting/drawing"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "gardening/landscaping"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "writing"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "playing sports"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "book club/discussion"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "film"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "computers/internet"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "cars"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "camping"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "video games"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "photography"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "singing/playing instrument"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "the arts"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "playing cards"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "volunteering"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "shopping/antiques"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "do-it-yourself"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "fishing/hunting"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "theatre"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "hiking"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "wine tasting"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "animals"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "decorating"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "board games"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "meeting friends"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "sewing / knitting"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('interests')->first()->id,
                'name' => ['en' => "others"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "hiking / trekking"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "fitness training"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "american football"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "running"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "dancing"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "cycling"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "swimming"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "tennis"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "rugby"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "skiing / snowboarding"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "boxing / wrestling"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "billiards / pool"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "bowling"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "badminton"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "gym / body building"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "golf"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "basketball"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "motorcycling"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "yoga / meditation"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "football"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "extreme sports"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "horseback riding"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "baseball / softball"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "motorsport"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "pilates"],
                'sort_order' => 24,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "martial arts"],
                'sort_order' => 25,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "squash"],
                'sort_order' => 26,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "other water sports"],
                'sort_order' => 27,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "rock climbing"],
                'sort_order' => 28,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "sailing"],
                'sort_order' => 29,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "track and field"],
                'sort_order' => 30,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "gymnastics"],
                'sort_order' => 31,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "volleyball"],
                'sort_order' => 32,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "handball"],
                'sort_order' => 33,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "table tennis"],
                'sort_order' => 34,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "inline/roller skating"],
                'sort_order' => 35,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "weights / machines"],
                'sort_order' => 36,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('sports')->first()->id,
                'name' => ['en' => "others"],
                'sort_order' => 37,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "evening with friends"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "dining out"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "cinema"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "bars/pubs"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "music/concerts"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "spending time with my family"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "opera"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "reading"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "nightclubs/dancing"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "sporting events"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "dance shows"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "singles parties"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('entertainment')->first()->id,
                'name' => ['en' => "others"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "comedy"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "action"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "adventure"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "drama"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "romantic comedy"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "documentaries"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "horror"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "science fiction"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "fantasy"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "historical"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "animated films"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "musicals"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "police drama"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "independent cinema"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "cartoons"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "erotic"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "western"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "short films"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "manga"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-favourite-films')->first()->id,
                'name' => ['en' => "others"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "pop-rock"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "R'n'B"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "variety"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "dance and DJ"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "soul"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "rock"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "classical/opera"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "blues"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "jazz"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "country"],
                'sort_order' => 9,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "soundtracks"],
                'sort_order' => 10,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "hard rock"],
                'sort_order' => 11,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "rap"],
                'sort_order' => 12,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "electronic-techno"],
                'sort_order' => 13,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "disco"],
                'sort_order' => 14,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "reggae"],
                'sort_order' => 15,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "traditional music"],
                'sort_order' => 16,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "world music"],
                'sort_order' => 17,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "mood/relaxation"],
                'sort_order' => 18,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "latino"],
                'sort_order' => 19,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "funk"],
                'sort_order' => 20,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "trip-hop"],
                'sort_order' => 21,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "gospel"],
                'sort_order' => 22,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-taste-in-music')->first()->id,
                'name' => ['en' => "others"],
                'sort_order' => 23,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "very important"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "important"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "not necessary"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-think-marriage-is')->first()->id,
                'name' => ['en' => "this is not/no longer for me"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "alone"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with kids"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with my children part of the time"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with roommate(s)"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('i-live')->first()->id,
                'name' => ['en' => "with my parents"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "i eat everything"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "keep it healty"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "a careful diet"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "vegetarian"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "halal"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "kosher"],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('diet')->first()->id,
                'name' => ['en' => "other"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "dogs"],
                'sort_order' => 0,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "cats"],
                'sort_order' => 1,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "fish"],
                'sort_order' => 2,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "horses"],
                'sort_order' => 3,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "rabbits"],
                'sort_order' => 4,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "gerbils / ginea pigs / etc."],
                'sort_order' => 5,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "birds"],
                'sort_order' => 6,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "exotic animals"],
                'sort_order' => 7,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "I don't have animals"],
                'sort_order' => 8,
            ],
            [
                'profile_question_id' => ProfileQuestion::whereSlug('my-pets')->first()->id,
                'name' => ['en' => "other animals"],
                'sort_order' => 9,
            ],
        ];

        foreach ($choices as $choice) {
            ProfileChoice::create($choice);
        }
    }
}
