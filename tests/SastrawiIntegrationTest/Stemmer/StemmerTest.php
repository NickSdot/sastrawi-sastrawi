<?php

declare(strict_types=1);

namespace SastrawiIntegrationTest\Stemmer;

use Sastrawi\Stemmer\StemmerFactory;

final class StemmerTest extends \PHPUnit\Framework\TestCase
{
    public $stemmer;

    protected function setUp(): void
    {
        $stemmerFactory = new StemmerFactory();
        $this->stemmer  = $stemmerFactory->createStemmer(false);
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('stemDataProvider')]
    public function testStem(string $word, string $stem): void
    {
        $this->assertEquals($stem, $this->stemmer->stem($word));
    }

    public static function stemDataProvider(): \Iterator
    {
        yield ['kebijakan', 'bijak'];
        //$data[] = array('karyawan', 'karya');
        //$data[] = array('karyawati', 'karya');
        yield ['kinerja', 'kerja'];
        yield ['mengandung', 'kandung'];
        yield ['memakan', 'makan'];
        yield ['asean', 'asean'];
        yield ['pemandu', 'pandu'];
        yield ['mengurangi', 'kurang'];
        yield ['pemerintah', 'perintah'];
        yield ['mengabulkan', 'kabul'];
        yield ['mengupas', 'kupas'];
        yield ['keterpurukan', 'puruk'];
        yield ['ditemukan', 'temu'];
        yield ['mengerti', 'erti'];
        yield ['kebon', 'kebon'];
        yield ['terdepan', 'depan'];
        yield ['mengikis', 'kikis'];
        yield ['kedudukan', 'duduk'];
        yield ['menekan', 'tekan'];
        yield ['perusakan', 'rusa'];
        // overstemming, it's better than perusa
        yield ['ditemui', 'temu'];
        yield ['di', 'di'];
        yield ['mengalahkan', 'kalah'];
        yield ['melewati', 'lewat'];
        yield ['bernafas', 'nafas'];
        yield ['meniru-niru', 'tiru'];
        yield ['memanggil-manggil', 'panggil'];
        yield ['menyebut-nyebut', 'sebut'];
        yield ['menganga', 'nganga'];
        yield ['besaran', 'besar'];
        yield ['terhenyak', 'henyak'];
        yield ['mengokohkan', 'kokoh'];
        yield ['melainkan', 'lain'];
        yield ['kuasa-Mu', 'kuasa'];
        yield ['malaikat-malaikat-Nya', 'malaikat'];
        yield ['nikmat-Ku', 'nikmat'];
    }
}
