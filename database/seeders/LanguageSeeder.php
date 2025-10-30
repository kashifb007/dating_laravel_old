<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'English - Great Britain', 'code' => 'en', 'locale' => 'en', 'is_active' => true, 'is_default' => true],
            ['name' => 'English - United States', 'code' => 'en', 'locale' => 'en-us', 'is_active' => true],
            ['name' => 'English - Southern Africa', 'code' => 'en', 'locale' => 'en-za'],
            ['name' => 'English - New Zealand', 'code' => 'en', 'locale' => 'en-nz'],
            ['name' => 'English - Australia', 'code' => 'en', 'locale' => 'en-au'],
            ['name' => 'English - Canada', 'code' => 'en', 'locale' => 'en-ca'],
            ['name' => 'English - Ireland', 'code' => 'en', 'locale' => 'en-ie'],
            ['name' => 'French - France', 'code' => 'fr', 'locale' => 'fr-fr', 'is_active' => true],
            ['name' => 'French - Canada', 'code' => 'fr', 'locale' => 'fr-ca'],
            ['name' => 'French - Belgium', 'code' => 'fr', 'locale' => 'fr-be'],
            ['name' => 'French - Switzerland', 'code' => 'fr', 'locale' => 'fr-ch'],
            ['name' => 'Italian - Italy', 'code' => 'it', 'locale' => 'it-it', 'is_active' => true],
            ['name' => 'Italian - Switzerland', 'code' => 'it', 'locale' => 'it-ch'],
            ['name' => 'German - Germany', 'code' => 'de', 'locale' => 'de-de', 'is_active' => true],
            ['name' => 'German - Switzerland', 'code' => 'de', 'locale' => 'de-ch'],
            ['name' => 'German - Austria', 'code' => 'de', 'locale' => 'de-at'],
            ['name' => 'German - Liechtenstein', 'code' => 'de', 'locale' => 'de-li'],
            ['name' => 'German - Luxembourg', 'code' => 'de', 'locale' => 'de-lu'],
            ['name' => 'Portuguese - Portugal', 'code' => 'pt', 'locale' => 'pt-pt', 'is_active' => true],
            ['name' => 'Portuguese - Brazil', 'code' => 'pt', 'locale' => 'pt-br'],
            ['name' => 'Spanish - Mexico', 'code' => 'es', 'locale' => 'es-mx'],
            ['name' => 'Spanish - Spain', 'code' => 'es', 'locale' => 'es-es', 'is_active' => true],
            ['name' => 'Dutch - Netherlands', 'code' => 'nl', 'locale' => 'nl-nl', 'is_active' => true],
            ['name' => 'Dutch - Belgium', 'code' => 'nl', 'locale' => 'nl-be'],
            ['name' => 'Turkish - Turkey', 'code' => 'tr', 'locale' => 'tr-tr'],
            ['name' => 'Polish - Poland', 'code' => 'pl', 'locale' => 'pl-pl'],
            ['name' => 'Czech - Czech Republic', 'code' => 'cs', 'locale' => 'cs-cz'],
            ['name' => 'Hungarian - Hungary', 'code' => 'hu', 'locale' => 'hu-hu'],
            ['name' => 'Romanian - Romania', 'code' => 'ro', 'locale' => 'ro-ro'],
            ['name' => 'Greek - Greece', 'code' => 'el', 'locale' => 'el-gr'],
            ['name' => 'Swedish - Sweden', 'code' => 'sv', 'locale' => 'sv-se', 'is_active' => true],
            ['name' => 'Finnish - Finland', 'code' => 'fi', 'locale' => 'fi-fi'],
            ['name' => 'Danish - Denmark', 'code' => 'da', 'locale' => 'da-dk'],
            ['name' => 'Norwegian - Norway', 'code' => 'no', 'locale' => 'no-no'],
            ['name' => 'Icelandic - Iceland', 'code' => 'is', 'locale' => 'is-is'],
            ['name' => 'Bulgarian - Bulgaria', 'code' => 'bg', 'locale' => 'bg-bg'],
            ['name' => 'Ukrainian - Ukraine', 'code' => 'uk', 'locale' => 'uk-ua'],
            ['name' => 'Serbian - Serbia', 'code' => 'sr', 'locale' => 'sr-rs'],
            ['name' => 'Croatian - Croatia', 'code' => 'hr', 'locale' => 'hr-hr'],
            ['name' => 'Slovak - Slovakia', 'code' => 'sk', 'locale' => 'sk-sk'],
            ['name' => 'Lithuanian - Lithuania', 'code' => 'lt', 'locale' => 'lt-lt'],
            ['name' => 'Latvian - Latvia', 'code' => 'lv', 'locale' => 'lv-lv'],
            ['name' => 'Estonian - Estonia', 'code' => 'et', 'locale' => 'et-ee'],
            ['name' => 'Slovenian - Slovenia', 'code' => 'sl', 'locale' => 'sl-si'],
            ['name' => 'Bosnian - Bosnia and Herzegovina', 'code' => 'bs', 'locale' => 'bs-ba'],
            ['name' => 'Albanian - Albania', 'code' => 'sq', 'locale' => 'sq-al'],
            ['name' => 'Armenian - Armenia', 'code' => 'hy', 'locale' => 'hy-am'],
            ['name' => 'Georgian - Georgia', 'code' => 'ka', 'locale' => 'ka-ge'],
            ['name' => 'Azerbaijani - Azerbaijan', 'code' => 'az', 'locale' => 'az-az'],
        ];

        //limited number of languages for testing purposes
        if (App::runningUnitTests()) {
            $languages = array_filter($languages, function ($language) {
                return in_array($language['locale'], ['en', 'fr-fr']);
            });
        }

        foreach ($languages as $language) {
            $languageObject = Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
                'locale' => $language['locale'],
                'is_active' => $language['is_active'] ?? false,
                'is_default' => $language['is_default'] ?? false,
            ]);

            if ($language['locale'] === 'en') {
                $country = Country::whereIso('GB')->first();
                $languageObject->countries()->attach($country->id);
            }
        }
    }
}
