<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProgramsController extends Controller
{
    public function index(): View
    {
        $programs = $this->getPrograms();
        return view('pages.programs', compact('programs'));
    }

    private function getPrograms(): array
    {
        return [
            ['category' => 'engineering', 'name_fr' => 'Intelligence Artificielle', 'name_ar' => 'الذكاء الاصطناعي', 'name_en' => 'Artificial Intelligence', 'university' => 'Tsinghua University', 'duration' => '4', 'price' => 30000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'engineering', 'name_fr' => 'Génie Civil', 'name_ar' => 'الهندسة المدنية', 'name_en' => 'Civil Engineering', 'university' => 'Zhejiang University', 'duration' => '4', 'price' => 25000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'engineering', 'name_fr' => 'Robotique', 'name_ar' => 'الروبوتات', 'name_en' => 'Robotics', 'university' => 'Harbin Institute of Technology', 'duration' => '4', 'price' => 28000, 'language' => 'English', 'scholarship' => false],
            ['category' => 'medicine', 'name_fr' => 'MBBS', 'name_ar' => 'MBBS', 'name_en' => 'MBBS', 'university' => 'Peking University', 'duration' => '6', 'price' => 45000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'medicine', 'name_fr' => 'Pharmacie', 'name_ar' => 'الصيدلة', 'name_en' => 'Pharmacy', 'university' => 'Fudan University', 'duration' => '5', 'price' => 35000, 'language' => 'English', 'scholarship' => false],
            ['category' => 'medicine', 'name_fr' => 'Dentaire', 'name_ar' => 'طب الأسنان', 'name_en' => 'Dentistry', 'university' => 'Wuhan University', 'duration' => '5', 'price' => 40000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'business', 'name_fr' => 'MBA', 'name_ar' => 'MBA', 'name_en' => 'MBA', 'university' => 'Shanghai Jiao Tong University', 'duration' => '2', 'price' => 50000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'business', 'name_fr' => 'Finance Internationale', 'name_ar' => 'التمويل الدولي', 'name_en' => 'International Finance', 'university' => 'Renmin University', 'duration' => '4', 'price' => 28000, 'language' => 'English', 'scholarship' => false],
            ['category' => 'business', 'name_fr' => 'Commerce International', 'name_ar' => 'التجارة الدولية', 'name_en' => 'International Trade', 'university' => 'Sun Yat-sen University', 'duration' => '4', 'price' => 26000, 'language' => 'English/Chinese', 'scholarship' => true],
            ['category' => 'languages', 'name_fr' => 'Langue Chinoise (HSK)', 'name_ar' => 'اللغة الصينية (HSK)', 'name_en' => 'Chinese Language (HSK)', 'university' => 'Beijing Language University', 'duration' => '1-2', 'price' => 18000, 'language' => 'Chinese', 'scholarship' => true],
            ['category' => 'languages', 'name_fr' => 'Traduction Anglais-Chinois', 'name_ar' => 'الترجمة الإنجليزية-الصينية', 'name_en' => 'English-Chinese Translation', 'university' => 'Nanjing University', 'duration' => '4', 'price' => 22000, 'language' => 'English/Chinese', 'scholarship' => false],
            ['category' => 'science', 'name_fr' => 'Physique Quantique', 'name_ar' => 'الفيزياء الكمية', 'name_en' => 'Quantum Physics', 'university' => 'University of Science and Technology', 'duration' => '4', 'price' => 32000, 'language' => 'English', 'scholarship' => true],
            ['category' => 'science', 'name_fr' => 'Biotechnologie', 'name_ar' => 'التكنولوجيا الحيوية', 'name_en' => 'Biotechnology', 'university' => 'Xiamen University', 'duration' => '4', 'price' => 27000, 'language' => 'English', 'scholarship' => false],
        ];
    }
}
