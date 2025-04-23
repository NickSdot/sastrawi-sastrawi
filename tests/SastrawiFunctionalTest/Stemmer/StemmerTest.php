<?php

declare(strict_types=1);

namespace SastrawiFunctionalTest\Stemmer;

use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Stemmer\Stemmer;

final class StemmerTest extends \PHPUnit\Framework\TestCase
{
    private \Sastrawi\Stemmer\Stemmer $stemmer;

    protected function setUp(): void
    {
        $dictionary = new ArrayDictionary(
            [
                'hancur', 'benar', 'apa', 'siapa', 'jubah', 'baju', 'beli',
                'celana', 'hantu', 'jual', 'buku', 'milik', 'kulit', 'sakit', 'kasih', 'buang', 'suap',
                'nilai', 'beri', 'rambut', 'adu', 'suara', 'daerah', 'ajar', 'kerja', 'ternak',
                'asing', 'raup', 'gerak', 'puruk', 'terbang', 'lipat', 'ringkas', 'warna', 'yakin',
                'bangun', 'fitnah', 'vonis',
                'baru', 'ajar',
                'tangkap', 'kupas',
                'minum', 'pukul',
                'cinta', 'dua', 'dahulu', 'jauh', 'jarah', 'ziarah',
                'nuklir', 'nasihat', 'gila', 'hajar', 'qasar', 'udara',
                'populer', 'warna', 'yoga', 'adil', 'rumah', 'muka', 'labuh', 'tarung',
                'tebar', 'indah', 'daya', 'untung', 'sepuluh', 'ekonomi', 'makmur', 'telah', 'serta',
                'percaya', 'pengaruh', 'kritik', 'seko', 'sekolah', 'tahan', 'capa', 'capai',
                'mula', 'mulai', 'petan', 'tani', 'aba', 'abai', 'balas', 'balik',
                'peran', 'medan', 'syukur', 'syarat', 'bom', 'promosi', 'proteksi', 'prediksi', 'kaji',
                'sembunyi', 'langgan', 'laku', 'baik', 'terang', 'iman', 'bisik', 'taat', 'puas', 'makan',
                'nyala', 'nyanyi', 'nyata', 'nyawa', 'rata', 'lembut', 'ligas',
                'budaya', 'karya', 'ideal', 'final',
                // sastrawi additional rules
                'taat', 'tiru', 'sepak', 'kuasa', 'malaikat', 'nikmat', 'stabil', 'transkripsi',
                'lewat', 'nganga', 'allah',
            ]
        );
        $this->stemmer = new Stemmer($dictionary);
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('stemDataProvider')]
    public function testStem($word, $stem): void
    {
        self::assertEquals($stem, $this->stemmer->stem($word));
    }

    public static function stemDataProvider(): array
    {
        $data = [];

        // don't stem short words
        $data[] = ['mei', 'mei'];
        $data[] = ['bui', 'bui'];

        // lookup up the dictionary, to prevent overstemming
        // don't stem nilai to nila
        $data[] = ['nilai', 'nilai'];

        // lah|kah|tah|pun
        $data[] = ['hancurlah', 'hancur'];
        $data[] = ['benarkah', 'benar'];
        $data[] = ['apatah', 'apa'];
        $data[] = ['siapapun', 'siapa'];

        // ku|mu|nya
        $data[] = ['jubahku', 'jubah'];
        $data[] = ['bajumu', 'baju'];
        $data[] = ['celananya', 'celana'];

        // i|kan|an
        $data[] = ['hantui', 'hantu'];
        $data[] = ['belikan', 'beli'];
        $data[] = ['jualan', 'jual'];

        // combination of suffixes
        $data[] = ['bukumukah', 'buku'];
        $data[] = ['miliknyalah', 'milik'];
        $data[] = ['kulitkupun', 'kulit'];
        $data[] = ['berikanku', 'beri'];
        $data[] = ['sakitimu', 'sakit'];
        $data[] = ['beriannya', 'beri'];
        $data[] = ['kasihilah', 'kasih'];

        // plain prefix
        $data[] = ['dibuang', 'buang'];
        $data[] = ['kesakitan', 'sakit'];
        $data[] = ['sesuap', 'suap'];

        //$data[] = array('teriakanmu', 'teriak'); // wtf? kok jadi ria?
        //teriakanmu -> te-ria-kan-mu

        /* template formulas for derivation prefix rules (disambiguation) */

        // rule 1a : berV -> ber-V
        $data[] = ['beradu', 'adu'];

        // rule 1b : berV -> be-rV
        $data[] = ['berambut', 'rambut'];

        // rule 2 : berCAP -> ber-CAP
        $data[] = ['bersuara', 'suara'];

        // rule 3 : berCAerV -> ber-CAerV where C  !==  'r'
        $data[] = ['berdaerah', 'daerah'];

        // rule 4 : belajar -> bel-ajar
        $data[] = ['belajar', 'ajar'];

        // rule 5 : beC1erC2 -> be-C1erC2 where C1  !==  {'r'|'l'}
        $data[] = ['bekerja', 'kerja'];
        $data[] = ['beternak', 'ternak'];

        // rule 6a : terV -> ter-V
        $data[] = ['terasing', 'asing'];

        // rule 6b : terV -> te-rV
        $data[] = ['teraup', 'raup'];

        // rule 7 : terCerV -> ter-CerV where C  !==  'r'
        $data[] = ['tergerak', 'gerak'];

        // rule 8 : terCP -> ter-CP where C  !==  'r' and P  !==  'er'
        $data[] = ['terpuruk', 'puruk'];

        // rule 9 : teC1erC2 -> te-C1erC2 where C1  !==  'r'
        $data[] = ['teterbang', 'terbang'];

        // rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
        $data[] = ['melipat', 'lipat'];
        $data[] = ['meringkas', 'ringkas'];
        $data[] = ['mewarnai', 'warna'];
        $data[] = ['meyakinkan', 'yakin'];

        // rule 11 : mem{b|f|v} -> mem-{b|f|v}
        $data[] = ['membangun', 'bangun'];
        $data[] = ['memfitnah', 'fitnah'];
        $data[] = ['memvonis', 'vonis'];

        // rule 12 : mempe{r|l} -> mem-pe
        $data[] = ['memperbarui', 'baru'];
        $data[] = ['mempelajari', 'ajar'];

        // rule 13a : mem{rV|V} -> mem{rV|V}
        $data[] = ['meminum', 'minum'];

        // rule 13b : mem{rV|V} -> me-p{rV|V}
        $data[] = ['memukul', 'pukul'];

        // rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
        $data[] = ['mencinta', 'cinta'];
        $data[] = ['mendua', 'dua'];
        $data[] = ['menjauh', 'jauh'];
        $data[] = ['menziarah', 'ziarah'];

        // rule 15a : men{V} -> me-n{V}
        $data[] = ['menuklir', 'nuklir'];

        // rule 15b : men{V} -> me-t{V}
        $data[] = ['menangkap', 'tangkap'];

        // rule 16 : meng{g|h|q} -> meng-{g|h|q}
        $data[] = ['menggila', 'gila'];
        $data[] = ['menghajar', 'hajar'];
        $data[] = ['mengqasar', 'qasar'];

        // rule 17a : mengV -> meng-V
        $data[] = ['mengudara', 'udara'];

        // rule 17b : mengV -> meng-kV
        $data[] = ['mengupas', 'kupas'];

        // rule 18 : menyV -> meny-sV
        $data[] = ['menyuarakan', 'suara'];

        // rule 19 : mempV -> mem-pV where V  !==  'e'
        $data[] = ['mempopulerkan', 'populer'];

        // rule 20 : pe{w|y}V -> pe-{w|y}V
        $data[] = ['pewarna', 'warna'];
        $data[] = ['peyoga', 'yoga'];

        // rule 21a : perV -> per-V
        $data[] = ['peradilan', 'adil'];

        // rule 21b : perV -> pe-rV
        $data[] = ['perumahan', 'rumah'];

        // rule 22 is missing in the document?

        // rule 23 : perCAP -> per-CAP where C  !==  'r' and P  !==  'er'
        $data[] = ['permuka', 'muka'];

        // rule 24 : perCAerV -> per-CAerV where C  !==  'r'
        $data[] = ['perdaerah', 'daerah'];

        // rule 25 : pem{b|f|v} -> pem-{b|f|v}
        $data[] = ['pembangun', 'bangun'];
        $data[] = ['pemfitnah', 'fitnah'];
        $data[] = ['pemvonis', 'vonis'];

        // rule 26a : pem{rV|V} -> pe-m{rV|V}
        $data[] = ['peminum', 'minum'];

        // rule 26b : pem{rV|V} -> pe-p{rV|V}
        $data[] = ['pemukul', 'pukul'];

        // rule 27 : men{c|d|j|z} -> men-{c|d|j|z}
        $data[] = ['pencinta', 'cinta'];
        $data[] = ['pendahulu', 'dahulu'];
        $data[] = ['penjarah', 'jarah'];
        $data[] = ['penziarah', 'ziarah'];

        // rule 28a : pen{V} -> pe-n{V}
        $data[] = ['penasihat', 'nasihat'];

        // rule 28b : pen{V} -> pe-t{V}
        $data[] = ['penangkap', 'tangkap'];

        // rule 29 : peng{g|h|q} -> peng-{g|h|q}
        $data[] = ['penggila', 'gila'];
        $data[] = ['penghajar', 'hajar'];
        $data[] = ['pengqasar', 'qasar'];

        // rule 30a : pengV -> peng-V
        $data[] = ['pengudara', 'udara'];

        // rule 30b : pengV -> peng-kV
        $data[] = ['pengupas', 'kupas'];

        // rule 31 : penyV -> peny-sV
        $data[] = ['penyuara', 'suara'];

        // rule 32 : pelV -> pe-lV except pelajar -> ajar
        $data[] = ['pelajar', 'ajar'];
        $data[] = ['pelabuhan', 'labuh'];

        // rule 33 : peCerV -> per-erV where C  !==  {r|w|y|l|m|n}
        // TODO : find the examples

        // rule 34 : peCP -> pe-CP where C  !==  {r|w|y|l|m|n} and P  !==  'er'
        $data[] = ['petarung', 'tarung'];

        // CS additional rules

        // rule 35 : terC1erC2 -> ter-C1erC2 where C1  !==  'r'
        $data[] = ['terpercaya', 'percaya'];

        // rule 36 : peC1erC2 -> pe-C1erC2 where C1  !==  {r|w|y|l|m|n}
        $data[] = ['pekerja', 'kerja'];
        $data[] = ['peserta', 'serta'];

        // CS modify rule 12
        $data[] = ['mempengaruhi', 'pengaruh'];

        // CS modify rule 16
        $data[] = ['mengkritik', 'kritik'];

        // CS adjusting rule precedence
        $data[] = ['bersekolah', 'sekolah'];
        $data[] = ['bertahan', 'tahan'];
        $data[] = ['mencapai', 'capai'];
        $data[] = ['dimulai', 'mulai'];
        $data[] = ['petani', 'tani'];
        $data[] = ['terabai', 'abai'];

        // ECS
        $data[] = ['mensyaratkan', 'syarat'];
        $data[] = ['mensyukuri', 'syukur'];
        $data[] = ['mengebom', 'bom'];
        $data[] = ['mempromosikan', 'promosi'];
        $data[] = ['memproteksi', 'proteksi'];
        $data[] = ['memprediksi', 'prediksi'];
        $data[] = ['pengkajian', 'kaji'];
        $data[] = ['pengebom', 'bom'];

        // ECS loop pengembalian akhiran
        $data[] = ['bersembunyi', 'sembunyi'];
        $data[] = ['bersembunyilah', 'sembunyi'];
        $data[] = ['pelanggan', 'langgan'];
        $data[] = ['pelaku', 'laku'];
        $data[] = ['pelangganmukah', 'langgan'];
        $data[] = ['pelakunyalah', 'laku'];

        $data[] = ['perbaikan', 'baik'];
        $data[] = ['kebaikannya', 'baik'];
        $data[] = ['bisikan', 'bisik'];
        $data[] = ['menerangi', 'terang'];
        $data[] = ['berimanlah', 'iman'];

        $data[] = ['memuaskan', 'puas'];
        $data[] = ['berpelanggan', 'langgan'];
        $data[] = ['bermakanan', 'makan'];

        // CC (Modified ECS)
        $data[] = ['menyala', 'nyala'];
        $data[] = ['menyanyikan', 'nyanyi'];
        $data[] = ['menyatakannya', 'nyata'];

        $data[] = ['penyanyi', 'nyanyi'];
        $data[] = ['penyawaan', 'nyawa'];

        // CC infix
        $data[] = ['rerata', 'rata'];
        $data[] = ['lelembut', 'lembut'];
        $data[] = ['lemigas', 'ligas'];
        $data[] = ['kinerja', 'kerja'];

        // plurals
        $data[] = ['buku-buku', 'buku'];
        $data[] = ['berbalas-balasan', 'balas'];
        $data[] = ['bolak-balik', 'bolak-balik'];

        // combination of prefix + suffix
        $data[] = ['bertebaran', 'tebar'];
        $data[] = ['terasingkan', 'asing'];
        $data[] = ['membangunkan', 'bangun'];
        $data[] = ['mencintai', 'cinta'];
        $data[] = ['menduakan', 'dua'];
        $data[] = ['menjauhi', 'jauh'];
        $data[] = ['menggilai', 'gila'];
        $data[] = ['pembangunan', 'bangun'];

        // return the word if not found in the dictionary
        $data[] = ['marwan', 'marwan'];
        $data[] = ['subarkah', 'subarkah'];

        // recursively remove prefix
        $data[] = ['memberdayakan', 'daya'];
        $data[] = ['persemakmuran', 'makmur'];
        $data[] = ['keberuntunganmu', 'untung'];
        $data[] = ['kesepersepuluhnya', 'sepuluh'];

        // test stem sentence
        $data[] = ['siapakah memberdayakan pembangunan', 'siapa daya bangun'];

        // issues
        $data[] = ['Perekonomian', 'ekonomi'];
        $data[] = ['menahan', 'tahan'];

        // test stem multiple sentences
        $multipleSentence1 = 'Cinta telah bertebaran.Keduanya saling mencintai.';
        $multipleSentence2 = "(Cinta telah bertebaran)\n\n\n\nKeduanya saling mencintai.";
        $data[]            = [$multipleSentence1, 'cinta telah tebar dua saling cinta'];
        $data[]            = [$multipleSentence2, 'cinta telah tebar dua saling cinta'];

        // failed on other method / algorithm but we should succeed
        $data[] = ['peranan', 'peran'];
        $data[] = ['memberikan', 'beri'];
        $data[] = ['medannya', 'medan'];

        // TODO:
        //$data[] = array('sebagai', 'bagai');
        //$data[] = array('bagian', 'bagian');
        //$data[] = array('berbadan', 'badan');
        //$data[] = array('abdullah', 'abdullah');

        // adopted foreign suffixes
        //$data[] = array('budayawan', 'budaya');
        //$data[] = array('karyawati', 'karya');
        $data[] = ['idealis', 'ideal'];
        $data[] = ['idealisme', 'ideal'];
        $data[] = ['finalisasi', 'final'];

        // sastrawi additional rules
        $data[] = ['penstabilan', 'stabil'];
        $data[] = ['pentranskripsi', 'transkripsi'];

        $data[] = ['mentaati', 'taat'];
        $data[] = ['meniru-nirukan', 'tiru'];
        $data[] = ['menyepak-nyepak', 'sepak'];

        $data[] = ['melewati', 'lewat'];
        $data[] = ['menganga', 'nganga'];

        $data[] = ['kupukul', 'pukul'];
        $data[] = ['kauhajar', 'hajar'];

        $data[] = ['kuasa-Mu', 'kuasa'];
        $data[] = ['malaikat-malaikat-Nya', 'malaikat'];
        $data[] = ['nikmat-Ku', 'nikmat'];
        $data[] = ['allah-lah', 'allah'];

        return $data;
    }
}
