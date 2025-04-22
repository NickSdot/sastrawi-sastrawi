<?php

namespace SastrawiIntegrationTest\Stemmer;

use Sastrawi\Stemmer\StemmerFactory;

class StemmerTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        $stemmerFactory = new StemmerFactory();
        $this->stemmer  = $stemmerFactory->createStemmer(false);
    }

    /**
     * @dataProvider stemDataProvider
     */
    public function testStem($word, $stem): void
    {
        $this->assertEquals($stem, $this->stemmer->stem($word));
    }

    public static function stemDataProvider()
    {
        $data = [];

        $data[] = ['kebijakan', 'bijak'];
        //$data[] = array('karyawan', 'karya');
        //$data[] = array('karyawati', 'karya');
        $data[] = ['kinerja', 'kerja'];
        $data[] = ['mengandung', 'kandung'];
        $data[] = ['memakan', 'makan'];
        $data[] = ['asean', 'asean'];
        $data[] = ['pemandu', 'pandu'];
        $data[] = ['mengurangi', 'kurang'];
        $data[] = ['pemerintah', 'perintah'];
        $data[] = ['mengabulkan', 'kabul'];
        $data[] = ['mengupas', 'kupas'];
        $data[] = ['keterpurukan', 'puruk'];
        $data[] = ['ditemukan', 'temu'];
        $data[] = ['mengerti', 'erti'];
        $data[] = ['kebon', 'kebon'];
        $data[] = ['terdepan', 'depan'];
        $data[] = ['mengikis', 'kikis'];
        $data[] = ['kedudukan', 'duduk'];
        $data[] = ['menekan', 'tekan'];
        $data[] = ['perusakan', 'rusa']; // overstemming, it's better than perusa
        $data[] = ['ditemui', 'temu'];
        $data[] = ['di', 'di'];
        $data[] = ['mengalahkan', 'kalah'];
        $data[] = ['melewati', 'lewat'];
        $data[] = ['bernafas', 'nafas'];
        $data[] = ['meniru-niru', 'tiru'];
        $data[] = ['memanggil-manggil', 'panggil'];
        $data[] = ['menyebut-nyebut', 'sebut'];
        $data[] = ['menganga', 'nganga'];
        $data[] = ['besaran', 'besar'];
        $data[] = ['terhenyak', 'henyak'];
        $data[] = ['mengokohkan', 'kokoh'];
        $data[] = ['melainkan', 'lain'];
        $data[] = ['kuasa-Mu', 'kuasa'];
        $data[] = ['malaikat-malaikat-Nya', 'malaikat'];
        $data[] = ['nikmat-Ku', 'nikmat'];

        return $data;
    }
}
