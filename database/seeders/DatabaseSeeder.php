<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            "name"=> "Dakwah",
            "slug"=> "dakwah",
        ]);

        Category::create([
            "name"=> "Dunia Islam",
            "slug"=> "dunia-islam",
        ]);

        Category::create([
            "name"=> "Lifestyle Islami",
            "slug"=> "lifestyle-islami",
        ]);

        Category::create([
            "name"=> "Wawasan / Umum",
            "slug"=> "Wawasan-Umum",
        ]);

        User::create([
            "name" => 'Kompas',
            "slug"=> "kompas",
        ]);

        User::create([
            "name" => 'Detik',
            "slug"=> "detik",
        ]);

        User::create([
            "name" => 'CNN Indonesia',
            "slug"=> "cnn-indonesia",
        ]);

        User::create([
            "name" => 'Liputan6',
            "slug"=> "liputan6",
        ]);

        User::create([
            "name" => 'Tribun News',
            "slug"=> "tribun-news",
        ]);

        Admin::create([
            "name" => 'Hilmy Hafizh',
            "email" => 'hafizhhilmy17@gmail.com',
            "password"=> bcrypt("tamankota"),
        ]);

        Admin::create([
            "name" => 'Arya Suprobo',
            "email" => 'aryasuprobo2766@gmail.com',
            "password"=> bcrypt("admin123"),
        ]);

        Admin::create([
            "name" => 'Adam Nur Zidane',
            "email" => 'adamnurzidane025@gmail.com',
            "password"=> bcrypt("admin123"),
        ]);

        // News::factory(20)->create();
        
        
        // Berita kategori Dakwah
        // News::create([
        //     "title" => 'Khutbah Jumat Awal Tahun: Evaluasi Iman di Tahun Baru Hijriah',
        //     "slug" => 'khutbah-jumat-awal-tahun-evaluasi-iman-di-tahun-baru-hijriah',
        //     'category_id' => 1,
        //     'source_id' => 2,
        //     'excerpt' => "Tahun baru Hijriah adalah momen penting bagi umat Islam untuk mengevaluasi diri dan memperbaiki keimanan. Melalui khutbah Jumat awal tahun, umat diajak merenungkan perjalanan hidup selama setahun terakhir, memperbanyak syukur atas nikmat yang telah diberikan, dan memperkuat tekad untuk menjadi pribadi yang lebih bertakwa.",
        //     'body' => "
        //         Jakarta - Tahun baru Hijriah adalah momen penting bagi umat Islam untuk mengevaluasi diri dan memperbaiki keimanan. Melalui khutbah Jumat awal tahun, umat diajak merenungkan perjalanan hidup selama setahun terakhir, memperbanyak syukur atas nikmat yang telah diberikan, dan memperkuat tekad untuk menjadi pribadi yang lebih bertakwa.

        //         Sebagaimana Allah berfirman dalam surah Al-Hasyr ayat 18:
        //         يٰٓاَيُّهَا الَّذِيْنَ اٰمَنُوا اتَّقُوا اللّٰهَ وَلْتَنْظُرْ نَفْسٌ مَّا قَدَّمَتْ لِغَدٍۚ وَاتَّقُوا اللّٰهَ ۗاِنَّ اللّٰهَ خَبِيْرٌ ۢبِمَا تَعْمَلُوْنَ 

        //         Arab latin: Yā ayyuhal-lażīna āmanuttaqullāha waltanẓur nafsum mā qaddamat ligad(in), wattaqullāh(a), innallāha khabīrum bimā ta'malūn(a).

        //         Artinya: Wahai orang-orang yang beriman, bertakwalah kepada Allah dan hendaklah setiap orang memperhatikan apa yang telah diperbuatnya untuk hari esok (akhirat). Bertakwalah kepada Allah. Sesungguhnya Allah Maha Teliti terhadap apa yang kamu kerjakan.

        //         Khutbah Jumat Awal Tahun Hijriah
        //         1. Mengawali Tahun Hijriah dengan Meneladani Puasa Asyura 
        //         Khutbah Pertama
                
        //         إنَّ الحَمْدَ لله، نَحْمَدُه، ونستعينُه، ونستغفرُهُ، ونعوذُ به مِن شُرُورِ أنفُسِنَا، وَمِنْ سيئاتِ أعْمَالِنا، مَنْ يَهْدِه الله فَلا مُضِلَّ لَهُ، ومن يُضْلِلْ، فَلا هَادِي لَهُ.
        //         أَشْهَدُ أَنْ لاَ إِلَهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ وَأَشْهَدُ أَنَّ سَيِّدَنا مُحَمَّدًا عَبْدُهُ وَرَسُوْلُهُ
        //         اللّهُمَّ صَلِّ وَسَلِّمْ علَى عَبْدِكَ وَرَسُوْلِكَ مُحَمّدٍ وَعَلَى آلِه وأصْحَابِهِ هُدَاةِ الأَنَامِ في أَنْحَاءِ البِلاَدِ. أمَّا بعْدُ،
        //         فيَا أَيُّهَا النَّاسُ اتَّقُوا اللهَ تَعَالَى بِفِعْلِ الطَّاعَاتِ، فَقَدْ قَالَ اللهُ تَعَالىَ فِي كِتَابِهِ الْكَرِيْمِ: يَا اَيُّهَا الَّذِيْنَ آمَنُوْا اتَّقُوْا اللهَ حَقَّ تُقَاتِهِ وَلاَ تَمُوْتُنَّ إِلاَّ وَاَنْتُمْ مُسْلِمُوْنَ
        //         وقال تعالى: يَاأَيُّهَا النَّاسُ اتَّقُوا رَبَّكُمُ الَّذِي خَلَقَكُمْ مِنْ نَفْسٍ وَاحِدَةٍ وَخَلَقَ مِنْهَا زَوْجَهَا وَبَثَّ مِنْهُمَا رِجَالا كَثِيرًا وَنِسَاءً وَاتَّقُوا اللَّهَ الَّذِي تَسَاءَلُونَ بِهِ وَالأرْحَامَ إِنَّ اللَّهَ كَانَ عَلَيْكُمْ رَقِيبًا
        //         يَاأَيُّهَا الَّذِينَ آمَنُوا اتَّقُوا اللَّهَ وَقُولُوا قَوْلا سَدِيدًا
        //         يُصْلِحْ لَكُمْ أَعْمَالَكُمْ وَيَغْفِرْ لَكُمْ ذُنُوبَكُمْ وَمَنْ يُطِعِ اللَّهَ وَرَسُولَهُ فَقَدْ فَازَ فَوْزًا عَظِيمًا

        //         Hadirin Jamaah Shalat Jumat yang Dimuliakan Allah SWT

        //         Dari Ibnu Abbas radhiyallahu 'anhuma:
        //         أَنَّ النَّبِيَّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ لَمَّا قَدِمَ الْمَدِينَةَ وَجَدَهُمْ يَصُومُونَ يَوْمًا يَعْنِي عَاشُورَاءَ

        //         Nabi shallallahu 'alaihi wasallam ketika tiba di Madinah mendapati orang-orang Yahudi sedang berpuasa pada hari Asyura (10 Muharram).

        //         Mereka mengatakan bahwa hari itu adalah hari yang agung, hari di mana Allah menyelamatkan Nabi Musa dan menenggelamkan Fir'aun. Maka Nabi Musa pun berpuasa sebagai bentuk rasa syukur kepada Allah. Lalu Rasulullah bersabda,

        //         'Aku lebih berhak terhadap Musa daripada mereka.' Maka beliau pun berpuasa pada hari itu dan memerintahkan umat Islam untuk ikut berpuasa (HR. Bukhari).

        //         Asyura berasal dari kata 'asyarah yang berarti sepuluh, yakni tanggal 10 Muharram. Saat ini kita telah memasuki tanggal 7 Muharram 1444 Hijriah, dan insyaAllah tanggal 10 akan jatuh pada hari Senin, 8 Agustus 2022. Namun, kita dianjurkan tidak hanya berpuasa pada hari Senin saja. Rasulullah bersabda:

        //         'Berpuasalah pada hari Asyura dan bedakanlah dengan kaum Yahudi.'

        //         Yang paling utama adalah berpuasa tiga hari, yaitu sehari sebelum, sehari saat Asyura, dan sehari sesudahnya, yakni hari Ahad, Senin, dan Selasa. Jika tidak mampu tiga hari, maka cukup dua hari, yaitu tanggal 9 dan 10 Muharram, Ahad dan Senin.

        //         Hadirin yang dirahmati Allah,

        //         Apa pelajaran yang bisa kita ambil dari riwayat ini? Pertama, kita diajarkan untuk mensyukuri nikmat Allah, meskipun nikmat itu terjadi ribuan tahun yang lalu. Nabi Musa diperkirakan hidup sekitar 1500 tahun sebelum Masehi, dan kini kita berada di tahun 2022. Itu artinya peristiwa penyelamatan Nabi Musa dari Fir'aun terjadi sekitar 3500 tahun yang lalu.

        //         Namun kita tetap berpuasa karena mengikuti sunnah Nabi Muhammad shallallahu 'alaihi wasallam yang juga melaksanakannya, sebagai wujud rasa syukur kepada Allah.
        //         Beliau bersabda,

        //         'Aku lebih berhak terhadap Musa daripada mereka.'

        //         Orang-orang Yahudi melakukannya karena kesamaan suku, sedangkan Rasulullah melakukannya karena mengikuti syariat Nabi Musa sebagai bagian dari kebenaran yang diakui sebelum datangnya Islam. Ketika Umar bin Khattab membawa selembar tulisan dari Taurat, Nabi pun merobeknya dan bersabda:

        //         'Demi Allah, jika Musa hidup pada masa ini, maka dia pasti mengikuti aku.'

        //         Apa maknanya? Semua syariat sebelum Nabi Muhammad sudah tidak berlaku. Tidak ada nabi setelah Nabi Muhammad. Beliau adalah penutup para nabi dan penutup syariat-syariat sebelumnya.

        //         Namun, ada beberapa amalan nabi terdahulu yang dibenarkan dan diteruskan oleh Nabi Muhammad, seperti puasa Nabi Daud. Maka kita mengikutinya bukan karena mengikuti syariat terdahulu, tetapi karena itu telah ditetapkan dalam syariat Nabi Muhammad.

        //         Oleh karena itu, jika seseorang ingin mencintai Allah, maka ikutilah Nabi Muhammad. Tak ada jalan keselamatan kecuali dengan mengikuti beliau.

        //         Hadirin yang dimuliakan Allah,

        //         Kenapa kita berpuasa di tanggal 10 Muharram? Karena itu adalah bentuk syukur kepada Allah. Dengan menahan lapar, menahan haus, dan menahan nafsu, kita menunjukkan rasa syukur. Allah telah berfirman bahwa siapa yang bersyukur, akan Allah tambahkan nikmat-Nya. Tapi siapa yang kufur, maka sungguh azab Allah amat pedih.

        //         Apa keutamaan orang yang berpuasa pada hari Asyura? Rasulullah ditanya tentang hal itu, lalu beliau menjawab, 'Puasa Asyura dapat menghapus dosa satu tahun yang lalu.' Imam An-Nawawi menjelaskan bahwa yang dihapus adalah dosa-dosa kecil. Adapun dosa besar seperti utang, mengambil hak orang lain, atau berbuat zalim, tidak akan terhapus dengan puasa.

        //         Maka bayarlah utang, kembalikan pinjaman, dan jangan memakan hak orang lain, karena semua itu akan menjadi kegelapan di hari kiamat.

        //         Dosa kecil pun tidak cukup hanya dengan istighfar atau shalat taubat, maka kita tambahkan dengan amalan seperti puasa Asyura. Rasulullah tidak berbicara dari hawa nafsu, melainkan dari wahyu Allah. Maka yakinlah, puasa Asyura adalah salah satu bentuk penghapus dosa yang diakui dalam Islam.

        //         Hadirin jamaah Jumat yang dirahmati Allah,

        //         Pelajaran kedua dari puasa Asyura adalah perjuangan Nabi Musa alaihissalam dalam membebaskan Bani Israil dari Mesir menuju Palestina, menghindari kekejaman Fir'aun. Nama Fir'aun bahkan disebutkan dalam Al-Qur'an lebih banyak daripada Nabi Muhammad. Ini menunjukkan betapa besar pelajaran dari kisahnya.

        //         Allah menyelamatkan jasad Fir'aun agar menjadi pelajaran bagi generasi setelahnya. Hingga kini, jasad Fir'aun masih bisa disaksikan dan menjadi simbol keangkuhan, kesombongan, dan kekejaman. Ia dulu berkuasa, menyembelih anak laki-laki dan membiarkan anak perempuan hidup karena merasa terancam. Hari ini kita pun masih melihat praktik serupa: siapa pun yang dianggap ancaman, dibungkam, bahkan dihancurkan. Inilah mental Fir'aun.

        //         Konon, Fir'aun bermimpi mahkotanya direbut seorang bayi. Ia pun berkonsultasi dengan para tukang sihir, dan mereka menafsirkan bahwa kekuasaannya akan runtuh oleh seorang anak. Maka dia perintahkan pembantaian terhadap bayi laki-laki. Sampai hari ini, masih banyak penguasa zalim yang percaya pada bisikan dukun dan mengandalkan sihir dalam kekuasaannya.

        //         Hadirin yang berbahagia,

        //         Banyak orang kini tertipu oleh sosok yang tampil bak ulama, padahal sejatinya bukan. Mereka berpakaian seperti orang saleh, namun membawa kesesatan. Pendidikan agama dikesampingkan, anak-anak enggan belajar mengaji, bahkan tidak lagi mau datang ke TPA. Umat ini semakin jauh dari ilmu agama, mudah terpedaya oleh tontonan yang mengaburkan tuntunan.

        //         Yang patutnya jadi panutan ditinggalkan, sedangkan yang tak layak justru dielu-elukan: artis, selebriti, idol-idol asing, dan budaya luar yang menyita waktu dan perhatian umat.

        //         Semoga Allah memberkahi aku dan kalian dengan Al-Qur'an yang agung, serta menjadikan kita orang-orang yang mengambil manfaat dari ayat-ayat dan nasihat yang terkandung di dalamnya. Mohonlah ampun kepada Allah, sesungguhnya Dia Maha Pengampun dan Maha Penyayang.

        //         2. Keistimewaan Bulan Muharram
        //         Khutbah Pertama

        //         الْحَمْدُ لِلَّهِ الَّذِي هَدَانَا لِهَذَا وَمَا كُنَّا لِنَهْتَدِيَ لَوْلَا أَنْ هَدَانَا اللَّهُ لَقَدْ جَاءَتْ رُسُلُ رَبِّنَا بِالْحَقِّ وَنُودُوا أَنْ تِلْكُمُ الْجَنَّةُ أُورِثْتُمُوهَا بِمَا كُنْتُمْ تَعْمَلُونَ

        //         أَشْهَدُ أَنْ لاَ إِلَهَ إِلاَّاللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ وَأَشْهَدُ أَنَّ مُحَمَّداً عَبْدُهُ وَرَسُوْلُهُ.

        //         اَللَّهُمّ صَلِّ وَسَلِّمْ عَلى مُحَمّدٍ وَعَلَى آلِهِ وِأَصْحَابِهِ وَمَنْ تَبِعَهُمْ بِإِحْسَانٍ إِلَى يَوْمِ الدّيْن

        //         يَا أَيُّهَا النَّاسُ اتَّقُوا رَبَّكُمُ الَّذِي خَلَقَكُمْ مِنْ نَفْسٍ وَاحِدَةٍ وَخَلَقَ مِنْهَا زَوْجَهَا وَبَثَّ مِنْهُمَا رِجَالًا كَثِيرًا وَنِسَاءً وَاتَّقُوا اللَّهَ الَّذِي تَسَاءَلُونَ بِهِ وَالْأَرْحَامَ إِنَّ اللَّهَ كَانَ عَلَيْكُمْ رَقِيبًا

        //         اللّهُمَّ عَلِّمْنَا مَا يَنْفَعُنَا، وَانْفَعَنَا بِمَا عَلَّمْتَنَا، وَزِدْنَا عِلْماً، وَأَرَنَا الحَقَّ حَقّاً وَارْزُقْنَا اتِّبَاعَهُ، وَأَرَنَا البَاطِلَ بَاطِلاً وَارْزُقْنَا اجْتِنَابَهُ

        //         Ma'asyiral muslimin rahimakumullah,

        //         Segala puji bagi Allah yang telah memberikan berbagai macam kenikmatan kepada kita semua, terutama nikmat kesehatan sehingga kita bisa berada di bulan Muharram 1445 H, yang disebut sebagai Syahrullah, yaitu bulan yang benar-benar dimuliakan oleh Allah.
        //         Shalawat dan salam semoga tetap tercurahkan kepada junjungan kita, Nabi besar Muhammad shallallahu 'alaihi wasallam, beserta keluarga dan para sahabatnya. Semoga pada hari kiamat nanti kita dan keluarga besar kita mendapatkan syafa'at dari beliau. Aamiin ya Rabbal 'aalamiin.

        //         Jamaah Jumat yang berbahagia,

        //         Bulan Muharram termasuk bulan yang dimuliakan oleh Allah. Di dalamnya terdapat hari ke-10 Muharram yang sering disebut Hari 'Asyura, yang memiliki keistimewaan tersendiri. Nabi Muhammad shallallahu 'alaihi wasallam biasa berpuasa pada hari itu dan memerintahkan umatnya untuk melakukan hal serupa.

        //         Ketika Nabi shallallahu 'alaihi wasallam tiba di Madinah, beliau melihat orang-orang Yahudi berpuasa di hari 'Asyura. Beliau bertanya, 'Hari apa ini?' Mereka menjawab, 'Ini adalah hari baik. Pada hari ini Allah menyelamatkan Bani Israil dari musuhnya, maka Musa alaihissalam berpuasa pada hari ini.' Maka Nabi shallallahu 'alaihi wasallam bersabda, 'Saya lebih berhak mengikuti Musa daripada kalian.' Lalu beliau pun berpuasa pada hari itu dan memerintahkan umatnya untuk berpuasa. (HR. Al-Bukhari)

        //         Jamaah Jumat yang dirahmati Allah,

        //         Dalam berbagai riwayat disebutkan terdapat beberapa peristiwa penting yang terjadi pada 10 Muharram, di antaranya:

        //         Nabi Nuh AS: Kaumnya yang ingkar, kufur, dan syirik dihancurkan Allah dengan banjir topan selama enam bulan. Setelah banjir surut, Nabi Nuh dan pengikutnya yang berjumlah kurang lebih 80 orang selamat dan turun dari kapal tepat pada tanggal 10 Muharram.
        //         Nabi Ibrahim AS: Diselamatkan dari api yang menyala-nyala setelah dituduh menghancurkan berhala oleh Raja Namrud. Api tersebut menjadi dingin dan tidak membakar beliau, atas perintah Allah:

        //         'Wahai api, jadilah dingin dan keselamatan bagi Ibrahim.' (QS. Al-Anbiya: 69)
        //         Nabi Musa AS: Diselamatkan bersama umatnya dari kejaran Fir'aun. Fir'aun dan bala tentaranya ditenggelamkan di laut pada hari yang sama. Karena itu Nabi Musa berpuasa sebagai bentuk syukur.
        //         Nabi Adam AS: Diterima taubatnya setelah memakan buah yang dilarang. Setelah bertahun-tahun bertobat, Allah menerima taubatnya tepat pada 10 Muharram.
        //         Nabi Yunus AS: Dikeluarkan dari perut ikan besar (ikan nun) dan diselamatkan oleh Allah pada tanggal 10 Muharram.
        //         Nabi Sulaiman AS: Allah mengembalikan kerajaannya kepadanya tepat pada tanggal 10 Muharram. Sebagai ungkapan syukur, beliau berpuasa dan memperbanyak ibadah.

        //         Ma'asyiral muslimin rahimakumullah,

        //         Karena pentingnya kejadian-kejadian tersebut pada Hari 'Asyura, maka umat Islam dianjurkan untuk berpuasa dan memperbanyak amal ibadah serta tafakur pada hari itu. Puasa Asyura dapat menghapus dosa-dosa kecil setahun yang lalu.

        //         Nabi shallallahu 'alaihi wasallam pernah ditanya tentang keistimewaan puasa 'Asyura, beliau menjawab:

        //         وَسُئِلَ عَنْ صَوْمِ يَوْمِ عَاشُورَاءَ فَقَالَ: يُكَفِّرُ السَّنَةَ الْمَاضِيَةَ

        //         'Puasa 'Asyura menghapus dosa setahun yang lalu.' (HR. Muslim no. 1162)

        //         Demikian khutbah yang bisa saya sampaikan. Semoga kita semua bisa mengambil manfaatnya.

        //         بَارَكَ اللهُ لِي وَلَكُمْ فِي القُرْأنِ العَظِيْمِ وَنَفَعَنِي وَاِيَّاكُمْ بِمَا فِيْهِ مِنَ الْاَ يَاتِ وَ ذِكْرِالحَكِيْمِ , وَ تَقَبَّلَ اللهُ مِنِّي وَمِنْكُمْ تِلَاوَتَهُ اِنَّهُ هُوَ السَّمِيْعُ العَلِيْمِ,وَاَقُوْلُ قَوْلِي هَذَا فَاسْتَغْفِرُ اللهَ العَظِيْمَ اِنَّهُ هُوَ الغَفُوْرُ الرَّحِيْم

        //         Khutbah Kedua

        //         اَلْحَمْدُ للهِ الَّذِى جَعَلَنَا وَاِيَّكُمْ عِبَادِهِ الْمُتَّقِيْنَ وَاَدَّبَنَا بِالْقُرْاَنِ الْكَرِيْمِ.
        //         اَشْهَدُ اَنْ لاَ الَهَ اِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ. وَاَشْهَدُ اَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ. َاللَّهُمَّ صَلِّ وَسَلِّمْ عَلَى مُحَمَّدٍ وَعَلَى اَلِهِ وَصَحْبِهِ اَجْمَعِيْنَ اَمَّا بَعْدُ : فَيَا اَيُّهَا النَّا سُ اتَّقُوا اللهَ حَقَّ تُقَاتِهِ وَلاَ تَمُوتُنَّ اِلاَّ وَاَنْتُمْ مُسْلِمُونَ
        //         إِنَّ ٱللَّهَ وَمَلٰئِكَتَهُ يُصَلُّوْنَ عَلَى النَّبِىِّ ۚ يٰأَيُّهَا ٱلَّذِينَ ءَامَنُوْاصَلُّوْا عَلَيْهِ وَسَلِّمُوْا تَسْلِيْمًا .
        //         أَللّٰهُمَّ صَلِّ عَلَى مُحَمَّدٍ عَبْدِكَ وَرَسُوْلِكَ كَمَا صَلَّيْتَ عَلٰى اِبْرَاهِيْمَ وَبَارِكْ عَلٰى مُحَمَّدٍ وَعَلٰى اٰلِ مُحَمَّدٍ كَمَا بَارَكْتَ عَلٰى اِبْرَاهِيْمَ وَعَلٰى اٰلِ اِبْرَاهِيْمَ ٭ فِى الْعَالَمِيْنَ اِنَّكَ حَمِيْدٌ مَجِيْدٌ.

        //         أَللّٰهُمَّ اغْفِرْ لِلْمُؤْمِنِيْنَ وَالْمُؤْمِنَاتِ وَالْمُسْلِمِيْنَ وَالْمُسْلِمَاتِ اَلْاَحْيَآءِ مِنْهُمْ وَاْلاَمْوَاتِ.٭
        //         أَللّٰهُمَّ اِنَّانَسْأَلُكَ سَلَامَةً فِى الدِّيْنِ، وَعَافِيَةً فِى الْجَسَدِ, وَزِيَادَةً فِى الْعِلْمِ, وَبَرَكَةً فِى الرِّزْقِ , وَتَوْبَةَ قَبْلَ الْمَوْت,
        //         وَرَحْمَةًعِنْدَالْمَوْتِ , وَمَغْفِرَةً بَعْدَالْمَوْتِ
        //         أَللّٰهُمَّ هَوِّنْ عَلَيْنَا فِيْ سَكَرَاتِ الْمَوْتِ وَالنَّجَاةَ مِنَ النَّارِ وَالْعَفْوَ عِنْدَ الْحِسَابِ.٭

        //         اَللّٰهُمَّ نَوِرْ قَلْبِيْ بِنُوْرِ هِدَيَتِكَ كَمَا
        //         نَوَرْتَ الْاَرْضَ بِنَوْرِ شَمْسِكَ اَبَدًا اَبَدَا بِرَحْمَتِكَ يَااَرْحَمَ الرَّاحِمِيْنَ
        //         رَبَّنَا آتِناَ فِى الدُّنْيَا حَسَنَةً وَفِى اْلآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ.

        //         عِبَادَالِلّٰهِ ! إِنَّ اللّٰهَ يَأْمُرُنَا بِاْلعَدْلِ وَاْلإِحْسَانِ وَإِيْتآءِ ذِي اْلقُرْبىَ وَيَنْهَى عَنِ اْلفَحْشآءِ وَالْمُنْكَرِ وَاْلبَغْيِ يَعِظُكُمْ لَعَلَّكُمْ تَذَكَّرُوْنَ وَاذْكُرُوا اللّٰهَ اْلعَظِيْمَ يَذْكُرْكُمْ وَاشْكُرُوْهُ عَلىَ نِعَمِهِ يَزِدْكُمْ وَلَذِكْرُ الِلّٰهِ اَكْبَرْ.
        //     "
        // ]);
        
    }
}
