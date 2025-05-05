<?php

namespace Database\Seeders;

use App\Models\Tehsil;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DivisionsDistrictsTehsilsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Punjab' => [
                'Bahawalpur' => [
                    'Bahawalnagar' => [
                        ['name' => 'Bahawalnagar', 'name_urdu' => 'بہاولنگر'],
                        ['name' => 'Chishtian', 'name_urdu' => 'چشتیاں'],
                        ['name' => 'Cholistan', 'name_urdu' => 'چولستان'],
                        ['name' => 'Cholistan (Un-Settled)', 'name_urdu' => 'چولستان (غیر آباد)'],
                        ['name' => 'Fort Abbas', 'name_urdu' => 'فورٹ عباس'],
                        ['name' => 'Haroonabad', 'name_urdu' => 'ہارون آباد'],
                        ['name' => 'Minchinabad', 'name_urdu' => 'منچن آباد'],
                    ],
                    'Bahawalpur' => [
                        ['name' => 'Ahmadpur East', 'name_urdu' => 'احمد پور مشرقی'],
                        ['name' => 'Bahawalpur City', 'name_urdu' => 'بہاولپور شہر'],
                        ['name' => 'Bahawalpur Saddar', 'name_urdu' => 'بہاولپور صدر'],
                        ['name' => 'Hasilpur', 'name_urdu' => 'حاصل پور'],
                        ['name' => 'Khairpur Tamewali', 'name_urdu' => 'خیرپور تماولی'],
                        ['name' => 'Yazman', 'name_urdu' => 'یزمان'],
                    ],
                    'Rahim Yar Khan' => [
                        ['name' => 'Sadiqabad', 'name_urdu' => 'سدیق آباد'],
                        ['name' => 'Rahim Yar Khan', 'name_urdu' => 'رحیم یار خان'],
                        ['name' => 'Khanpur', 'name_urdu' => 'خانپور'],
                        ['name' => 'Liaquatpur', 'name_urdu' => 'لیاقتپور'],
                    ],
                ],
                'Dera Ghazi Khan' => [
                    'Dera Ghazi Khan' => [
                        ['name' => 'Dera Ghazi Khan', 'name_urdu' => 'ڈیرہ غازی خان'],
                        ['name' => 'De-Ex.Area Of D.G.Khan', 'name_urdu' => 'ڈی ایکس ایریا آف ڈی جی خان'],
                        ['name' => 'Kot Chutta', 'name_urdu' => 'کوٹ چھٹہ'],
                        ['name' => 'Tribal Area', 'name_urdu' => 'قبائلی علاقہ'],
                        ['name' => 'DG KHAN', 'name_urdu' => 'ڈی جی خان'],
                    ],
                    'Kot Addu' => [
                        ['name' => 'Chowk Sarwar Shaheed', 'name_urdu' => 'چوک سرور شہید'],
                        ['name' => 'Kot Addu', 'name_urdu' => 'کوٹ ادو'],
                    ],
                    'Layyah' => [
                        ['name' => 'Chaubara', 'name_urdu' => 'چوبارہ'],
                        ['name' => 'Karor Lal Esan', 'name_urdu' => 'کرور لال عیسن'],
                        ['name' => 'Layyah', 'name_urdu' => 'لیہ'],
                    ],
                    'Muzaffargarh' => [
                        ['name' => 'Muzaffargarh', 'name_urdu' => 'مظفر گڑھ'],
                        ['name' => 'Jatoi', 'name_urdu' => 'جاتوئی'],
                        ['name' => 'Alipur', 'name_urdu' => 'علی پور'],
                    ],
                    'Rajanpur' => [
                        ['name' => 'Jampur', 'name_urdu' => 'جامپور'],
                        ['name' => 'De-Ex.Area of Rajanpur', 'name_urdu' => 'ڈی ایکس ایریا آف راجن پور'],
                        ['name' => 'Rojhan', 'name_urdu' => 'روجھان'],
                        ['name' => 'Rajanpur', 'name_urdu' => 'راجن پور'],
                    ],
                    'Taunsa' => [
                        ['name' => 'Koh-e-Suleman', 'name_urdu' => 'کوہ سلیمان'],
                        ['name' => 'Taunsa', 'name_urdu' => 'ٹاؤنسا'],
                        ['name' => 'Vehova', 'name_urdu' => 'وہوہ'],
                    ],
                ],
                'Faisalabad' => [
                    'Chiniot' => [
                        ['name' => 'Lalian', 'name_urdu' => 'لالیاں'],
                        ['name' => 'Bhowana', 'name_urdu' => 'بھوانہ'],
                        ['name' => 'Chiniot', 'name_urdu' => 'چنیوٹ'],
                    ],
                    'Faisalabad' => [
                        ['name' => 'Chak Jhumra', 'name_urdu' => 'چک جھمرہ'],
                        ['name' => 'Faisalabad City', 'name_urdu' => 'فیصل آباد شہر'],
                        ['name' => 'Faisalabad Saddar', 'name_urdu' => 'فیصل آباد صدر'],
                        ['name' => 'Jaranwala', 'name_urdu' => 'جڑانوالہ'],
                        ['name' => 'Samundri', 'name_urdu' => 'سمندری'],
                        ['name' => 'Tandlianwala', 'name_urdu' => 'تندلیانوالہ'],
                    ],
                    'Jhang' => [
                        ['name' => '18-Hazari', 'name_urdu' => '18 ہزار'],
                        ['name' => 'Ahmad Pur Sial', 'name_urdu' => 'احمد پور سیال'],
                        ['name' => 'Jhang', 'name_urdu' => 'جھنگ'],
                        ['name' => 'Shorkot', 'name_urdu' => 'شورکوٹ'],
                    ],
                    'Toba Tek Singh' => [
                        ['name' => 'Peer Mahal', 'name_urdu' => 'پیر محل'],
                        ['name' => 'Kamalia', 'name_urdu' => 'کمالیہ'],
                        ['name' => 'Gojra', 'name_urdu' => 'گوجرہ'],
                        ['name' => 'Toba Tek Singh', 'name_urdu' => 'ٹوبہ ٹیک سنگھ'],
                        ['name' => 'Pir Mahal', 'name_urdu' => 'پیر محل'],
                    ],
                ],
                'Gujranwala' => [
                    'Gujranwala' => [
                        ['name' => 'Gujranwala City', 'name_urdu' => 'گوجرانوالہ شہر'],
                        ['name' => 'Gujranwala Saddar', 'name_urdu' => 'گوجرانوالہ صدر'],
                        ['name' => 'Kamoke', 'name_urdu' => 'کامونکے'],
                        ['name' => 'NEW Gujranwala TEHSIL', 'name_urdu' => 'نیا گوجرانوالہ تحصیل'],
                        ['name' => 'Nowshera Virkan', 'name_urdu' => 'نوشہرہ ورکاں'],
                        ['name' => 'Sialkot', 'name_urdu' => 'سیالکوٹ'],
                    ],
                    'Narowal' => [
                        ['name' => 'Shakargarh', 'name_urdu' => 'شکرگڑھ'],
                        ['name' => 'Zafarwal', 'name_urdu' => 'ظفر وال'],
                        ['name' => 'Narowal', 'name_urdu' => 'نارووال'],
                    ],
                    'Sialkot' => [
                        ['name' => 'Daska', 'name_urdu' => 'ڈسکہ'],
                        ['name' => 'Sialkot', 'name_urdu' => 'سیالکوٹ'],
                        ['name' => 'Sambrial', 'name_urdu' => 'سمبریال'],
                        ['name' => 'Pasrur', 'name_urdu' => 'پسرور'],
                        ['name' => 'Pasrur', 'name_urdu' => 'پسرور'], // Duplicate entry
                    ],
                ],
                'Gujrat' => [
                    'Gujrat' => [
                        ['name' => 'Jalalpur Jattan', 'name_urdu' => 'جلالپور جٹاں'],
                        ['name' => 'Kunjah', 'name_urdu' => 'کنجھا'],
                        ['name' => 'Sarai Alamgir', 'name_urdu' => 'سراے عالمگیر'],
                        ['name' => 'Gujrat', 'name_urdu' => 'گجرات'],
                        ['name' => 'Kharian', 'name_urdu' => 'کھاریاں'],
                    ],
                    'Hafizabad' => [
                        ['name' => 'Hafizabad', 'name_urdu' => 'حافظ آباد'],
                        ['name' => 'Pindi Bhattian', 'name_urdu' => 'پندی بھٹیاں'],
                    ],
                    'Mandi Bahauddin' => [
                        ['name' => 'Mandi Bahauddin', 'name_urdu' => 'منڈی بہاؤالدین'],
                        ['name' => 'Phalia', 'name_urdu' => 'پھالیہ'],
                        ['name' => 'Malakwal', 'name_urdu' => 'ملکوال'],
                    ],
                    'Wazirabad' => [
                        ['name' => 'Wazirabad', 'name_urdu' => 'وزیرآباد'],
                        ['name' => 'Alipur Chatha', 'name_urdu' => 'علی پور چٹھہ'],
                    ],
                ],
                'Lahore' => [
                    'Kasur' => [
                        ['name' => 'Kasur', 'name_urdu' => 'قصور'],
                        ['name' => 'Chunian', 'name_urdu' => 'چونیاں'],
                        ['name' => 'Kot Radha Kishan', 'name_urdu' => 'کوٹ رادھا کیشن'],
                        ['name' => 'Pattoki', 'name_urdu' => 'پتوکی'],
                    ],
                    'Lahore' => [
                        ['name' => 'Lahore City', 'name_urdu' => 'لاہور شہر'],
                        ['name' => 'Lahore City Old', 'name_urdu' => 'لاہور شہر پرانا'],
                        ['name' => 'Raiwind', 'name_urdu' => 'رائے ونڈ'],
                        ['name' => 'Shalimar', 'name_urdu' => 'شالیمار'],
                        ['name' => 'Lahore Cantt', 'name_urdu' => 'لاہور کینٹ'],
                        ['name' => 'Model Town', 'name_urdu' => 'ماڈل ٹاؤن'],
                        ['name' => 'Allama Iqbal Town', 'name_urdu' => 'علامہ اقبال'],
                        ['name' => 'Nishter', 'name_urdu' => 'نشتر'],
                        ['name' => 'Saddar', 'name_urdu' => 'صدر'],
                        ['name' => 'Wahga', 'name_urdu' => 'واہگہ'],
                        ['name' => 'Ravi', 'name_urdu' => 'راوی'],
                    ],
                    'Nankana Sahib' => [
                        ['name' => 'Shahkot', 'name_urdu' => 'شاہ کوٹ'],
                        ['name' => 'Nankana Sahib', 'name_urdu' => 'ننکانہ صاحب'],
                        ['name' => 'Sangla Hill', 'name_urdu' => 'سانگلہ ہل'],
                    ],
                    'Sheikhupura' => [
                        ['name' => 'Muridke', 'name_urdu' => 'مریدکے'],
                        ['name' => 'Safdarabad', 'name_urdu' => 'سفدرآباد'],
                        ['name' => 'Sharaqpur', 'name_urdu' => 'شراقپور'],
                        ['name' => 'Sheikhupura', 'name_urdu' => 'شیخوپورہ'],
                        ['name' => 'Ferozewala', 'name_urdu' => 'فیروزوالا'],
                    ],
                ],
                'Multan' => [
                    'Khanewal' => [
                        ['name' => 'Noorpur Thal', 'name_urdu' => 'نورپور تھل'],
                        ['name' => 'Jahanian', 'name_urdu' => 'جہانیاں'],
                        ['name' => 'Kabirwala', 'name_urdu' => 'کبیر والا'],
                        ['name' => 'Khanewal', 'name_urdu' => 'خانewal'],
                        ['name' => 'Mian Channu', 'name_urdu' => 'میاں چنوں'],
                    ],
                    'Lodhran' => [
                        ['name' => 'Lodhran', 'name_urdu' => 'لودھراں'],
                        ['name' => 'Kahror Pacca', 'name_urdu' => 'کہروڑ پکا'],
                        ['name' => 'Dunyapur', 'name_urdu' => 'دنیا پور'],
                        ['name' => 'Kheror Pacca', 'name_urdu' => 'کہروڑ پکا'],
                    ],
                    'Multan' => [
                        ['name' => 'Shah Rukn-e-alam Town', 'name_urdu' => 'شاہ رکن عالم ٹاؤن'],
                        ['name' => 'Shershah Town', 'name_urdu' => 'شیر شاہ ٹاؤن'],
                        ['name' => 'Shujabad', 'name_urdu' => 'شجاع آباد'],
                        ['name' => 'Multan City', 'name_urdu' => 'ملتان شہر'],
                        ['name' => 'Multan Saddar', 'name_urdu' => 'ملتان صدر'],
                        ['name' => 'Mumtazabad Town', 'name_urdu' => 'ممتاز آباد ٹاؤن'],
                        ['name' => 'Jalalpur Pirwala', 'name_urdu' => 'جلالپور پیروالا'],
                        ['name' => 'Bosan Town', 'name_urdu' => 'بوسن ٹاؤن'],
                    ],
                    'Vehari' => [
                        ['name' => 'Mailsi', 'name_urdu' => 'میلسی'],
                        ['name' => 'Burewala', 'name_urdu' => 'بوریوالا'],
                        ['name' => 'Vehari', 'name_urdu' => 'وہاڑی'],
                    ],
                ],
                'Rawalpindi' => [
                    'Attock' => [
                        ['name' => 'Hassanabdal', 'name_urdu' => 'حسن ابدال'],
                        ['name' => 'Hazro', 'name_urdu' => 'ہزارہ'],
                        ['name' => 'Jand', 'name_urdu' => 'جند'],
                        ['name' => 'Pindi Gheb', 'name_urdu' => 'پندی گھیب'],
                        ['name' => 'Attock', 'name_urdu' => 'اٹک'],
                        ['name' => 'Fateh Jang', 'name_urdu' => 'فتح جنگ'],
                    ],
                    'Chakwal' => [
                        ['name' => 'Kallar Kahar', 'name_urdu' => 'کلر کہار'],
                        ['name' => 'Chakwal town', 'name_urdu' => 'چکوال ٹاؤن'],
                        ['name' => 'Choa Saidan Shah', 'name_urdu' => 'چوآ سیداں شاہ'],
                        ['name' => 'Chakwal', 'name_urdu' => 'چکوال'],
                    ],
                    'Jhelum' => [
                        ['name' => 'Dina', 'name_urdu' => 'دینہ'],
                        ['name' => 'Jhelum', 'name_urdu' => 'جہلم'],
                        ['name' => 'Pind Dadan Khan', 'name_urdu' => 'پند دادن خان'],
                        ['name' => 'Sohawa', 'name_urdu' => 'سوہاوا'],
                    ],
                    'Muree' => [
                        ['name' => 'Muree', 'name_urdu' => 'مری'],
                        ['name' => 'Kotli Sattian', 'name_urdu' => 'کوٹلی ستیاں'],
                    ],
                    'Rawalpindi' => [
                        ['name' => 'Kahuta', 'name_urdu' => 'کہوٹہ'],
                        ['name' => 'Kallar Syedan', 'name_urdu' => 'کلر سیداں'],
                        ['name' => 'Gujjar Khan', 'name_urdu' => 'گوجر خان'],
                        ['name' => 'Rawalpindi/Potohar Town', 'name_urdu' => 'راولپنڈی/پوٹوہار ٹاؤن'],
                        ['name' => 'Taxila', 'name_urdu' => 'ٹیکسلا'],
                        ['name' => 'Wah Cantt', 'name_urdu' => 'واہ کینٹ'],
                        ['name' => 'Chaklala Cantt.', 'name_urdu' => 'چکلالہ کینٹ'],
                        ['name' => 'Rawalpindi/Rawal Town', 'name_urdu' => 'راولپنڈی/راول ٹاؤن'],
                        ['name' => 'Islamabad Urban', 'name_urdu' => 'اسلام آباد شہری'],
                        ['name' => 'Islamabad Rural', 'name_urdu' => 'اسلام آباد دیہی'],
                        ['name' => 'Gujar Khan1', 'name_urdu' => 'گوجر خان 1'],
                        ['name' => 'Murree', 'name_urdu' => 'مری'],
                        ['name' => 'Rawalpindi', 'name_urdu' => 'راولپنڈی'],
                        ['name' => 'Rawalpindi Saddar', 'name_urdu' => 'راولپنڈی صدر'],
                        ['name' => 'Rawalpindi Cantt', 'name_urdu' => 'راولپنڈی کینٹ'],
                        ['name' => 'Rawalpindi City', 'name_urdu' => 'راولپنڈی شہر'],
                    ],
                    'Talagang' => [
                        ['name' => 'Talagang', 'name_urdu' => 'تلہ گنگ'],
                        ['name' => 'Lawa', 'name_urdu' => 'لاوا'],
                    ],
                ],
                'Sahiwal' => [
                    'Okara' => [
                        ['name' => 'Depalpur', 'name_urdu' => 'ڈیپالپور'],
                        ['name' => 'Okara', 'name_urdu' => 'اوکاڑہ'],
                        ['name' => 'Renala Khurd', 'name_urdu' => 'رینالہ خورد'],
                    ],
                    'Pakpattan' => [
                        ['name' => 'Arifwala', 'name_urdu' => 'عارف والا'],
                        ['name' => 'Pakpattan', 'name_urdu' => 'پاکپتن'],
                    ],
                    'Sahiwal' => [
                        ['name' => 'Sahiwal (Sahiwal)', 'name_urdu' => 'ساہیوال (ساہیوال)'],
                        ['name' => 'Chichawatni', 'name_urdu' => 'چچہوتنی'],
                    ],
                ],
                'Sargodha' => [
                    'Bhakkar' => [
                        ['name' => 'Bhakkar', 'name_urdu' => 'بھکر'],
                        ['name' => 'Darya khan', 'name_urdu' => 'دریا خان'],
                        ['name' => 'Kalur kot', 'name_urdu' => 'کلور کوٹ'],
                        ['name' => 'Mankera', 'name_urdu' => 'منکیرہ'],
                    ],
                    'Khushab' => [
                        ['name' => 'Shorkot', 'name_urdu' => 'شورکوٹ'],
                        ['name' => 'Quaidabad', 'name_urdu' => 'قائد آباد'],
                        ['name' => 'Khushab', 'name_urdu' => 'خوشاب'],
                        ['name' => 'Naushera', 'name_urdu' => 'نوشہرہ'],
                        ['name' => 'Noorpur Thal', 'name_urdu' => 'نورپور تھل'],
                    ],
                    'Mianwali' => [
                        ['name' => 'Jalalpur Pirwala', 'name_urdu' => 'جلالپور پیروالا'],
                        ['name' => 'Isa Khel', 'name_urdu' => 'عیسٰی خیل'],
                        ['name' => 'Mianwali', 'name_urdu' => 'میاںوالی'],
                        ['name' => 'Piplan', 'name_urdu' => 'پپلاں'],
                    ],
                    'Sargodha' => [
                        ['name' => 'Sahiwal (Sargodha)', 'name_urdu' => 'ساہیوال (سرگودھا)'],
                        ['name' => 'Sargodha', 'name_urdu' => 'سرگودھا'],
                        ['name' => 'Shahpur', 'name_urdu' => 'شاہ پور'],
                        ['name' => 'Kot Momin', 'name_urdu' => 'کوٹ مومن'],
                        ['name' => 'Bhalwal', 'name_urdu' => 'بھلوال'],
                        ['name' => 'Bhera', 'name_urdu' => 'بہرا'],
                        ['name' => 'Sillanwali', 'name_urdu' => 'سلنوالی'],
                        ['name' => 'Bhera Tehsil', 'name_urdu' => 'بہرا تحصیل'],
                    ],
                ],
            ],

        ];
        DB::table('divisions')->truncate();
        DB::table('districts')->truncate();
        DB::table('tehsils')->truncate();

        DB::statement('ALTER TABLE divisions MODIFY id INT AUTO_INCREMENT');
        DB::statement('ALTER TABLE districts MODIFY id INT AUTO_INCREMENT');
        DB::statement('ALTER TABLE tehsils MODIFY id INT AUTO_INCREMENT');

        foreach ($data as $provinceName => $divisions) {
            foreach ($divisions as $divisionName => $districts) {
                $divisionId = DB::table('divisions')->insertGetId(['name' => $divisionName, 'province_id' => 1]);

                foreach ($districts as $districtName => $tehsils) {
                    $districtId = DB::table('districts')->insertGetId([
                        'division_id' => $divisionId,
                        'name' => $districtName,
                        'name_urdu' => $districtName,
                    ]);

                    // Ensure $tehsils is an array of tehsil data
                    $tehsils = $tehsils ?? []; // Use null coalescing operator to default to an empty array

                    // Check if $tehsils is an array
                    if (is_array($tehsils)) {
                        foreach ($tehsils as $tehsil) {
                            // Ensure $tehsil is an array
                            if (is_array($tehsil)) {
                                DB::table('tehsils')->insert([
                                    'tehsil_name' => $tehsil['name'],
                                    'tehsil_name_Urdu' => $tehsil['name_urdu'],
                                    'district_idFk' => $districtId,
                                ]);
                            } else {
                                // Log an error if $tehsil is not an array
                                Log::error("Tehsil data for district {$districtName} is not an array: ".print_r($tehsil, true));
                            }
                        }
                    } else {
                        // Log an error if $tehsils is not an array
                        Log::error("Tehsils for district {$districtName} is not an array: ".print_r($tehsils, true));
                    }
                }
            }
        }
    }
}
