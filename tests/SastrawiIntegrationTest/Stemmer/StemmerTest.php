<?php

declare(strict_types=1);

namespace SastrawiIntegrationTest\Stemmer;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\Stemmer\StemmerInterface;

final class StemmerTest extends TestCase
{
    public StemmerInterface $stemmer;

    protected function setUp(): void
    {
        $this->stemmer  =  new StemmerFactory()->createStemmer();
    }

    #[DataProvider('stemDataProvider')]
    public function testStem(string $word, string $stem): void
    {
        self::assertEquals($stem, $this->stemmer->stem($word));
    }


    /** @return \Iterator<array{string, string}> */
    public static function stemDataProvider(): Iterator
    {
        yield ['kebijakan', 'bijak'];
        //$data[] = ['karyawan', 'karya'];
        //$data[] = ['karyawati', 'karya'];
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
        yield ['perusakan', 'rusa']; // over-stemming, it's better than perusa (todo?)
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
