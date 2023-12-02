<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{

    public function run(): void
    {
        Word::create([
            'category_id' => 1,
            'title' => [
                'latin' => 'Alma',
                'kiril' => 'Алма',
            ],
            'description' => [
                'latin' => 'Alma terekiniń suwlı mıywesi bolıp, ol jańa hám pısırılgen halda tutınıw etiledi, pısırıwde hám ishimlikler tayarlawda shiyki ónim bolıp xızmet etedi',
                'kiril' => 'Алма терекиниң суўлы мыйуеси болып, ол жаңа ҳәм пысырылген ҳалда тутыныў етиледи, писириўде ҳәм ишимликлер таярлаўда шийки оним болып хызмет етеди',
            ],
            'count' => 3,
            'is_correct' => true,
        ]);

        Word::create([
            'category_id' => 2,
            'title' => [
                'latin' => 'Sarı',
                'kiril' => 'Сары',
            ],
            'description' => [
                'latin' => 'L hám M tipindegi konuslar bir waqtıniń ózinde qozgalganda payda bolatuǵın reń',
                'kiril' => 'Л ҳәм М типиндеги конуслар бир ўақтыниң өзинде қоъзғалганда пайда болатуғын рең',
            ],
            'count' => 1,
            'is_correct' => true,
        ]);

        Word::create([
            'category_id' => 1,
            'title' => [
                'latin' => 'ayıw',
                'kiril' => 'аю',
            ],
            'description' => [
                'latin' => 'Ayıwlar -ursidae shańaraǵına tiyisli jırtqısh sutemiziwshiler. Olar kaniformalar yamasa iytke uqsas karnavorlar dep klassifikaciyalanadı',
                'kiril' => 'Айыўлар -урсидае шаңарағына тийисли жыртқыш сутемизушилер. Олар каниформалар ямаса итке уқсас карнаворлар деп классификацияланады',
            ],
            'count' => 2,
            'is_correct' => true,
        ]);

        Word::create([
            'category_id' => 1,
            'title' => [
                'latin' => '',
                'kiril' => 'тус',
            ],
            'description' => [
                'latin' => 'Waqtı -waqtı menen payda bolatuǵın fiziologiyalıq jaǵday, oyanıw jaǵdayına keri bolıp, sutemizuwshiler, qus, balıqlar hám basqa birpara haywanlarǵa, sonday-aq shıbın-shirkeyler hám sefalopodlarga tán bolǵan átirap daǵı dúnyaǵa reakciyanıń tómenlewi menen xarakterlenedi',
                'kiril' => 'Ўақты -ўақты менен пайда болатуғын физиологиалық жағдай, ояныў жағдайына кери болып, сутемизиушилер, қус, балықлар ҳәм басқа бирпара ҳайўанларға, сондай-ақ шыбын-ширкейлер ҳәм сефалоподларга тән болған әтирап дағы дүняға реакцияның төменлеўи менен характерленеди',
            ],
            'count' => 3,
            'is_correct' => true,
        ]);
    }
}
