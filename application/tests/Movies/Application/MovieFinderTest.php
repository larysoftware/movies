<?php
declare(strict_types=1);

use App\Movies\Application\FilterFactory;
use App\Movies\Application\MovieFinder;
use App\Movies\Application\MovieQuery;
use App\Movies\Application\SearchCriteriaDto;
use App\Movies\Domain\MoviesRepositoryInterface;
use App\Movies\Domain\Movie;
use App\Movies\Application\MovieResult;
use App\Movies\Domain\MovieTitle;
use App\Movies\Application\Exception\TypeIsEmptyException;
use App\Movies\Application\Exception\FilterNotExistException;
use PHPUnit\Framework\TestCase;

class MovieFinderTest extends TestCase
{
    public function testRandomMethod(): void
    {
        $movieQueryMock = $this->createMock(MoviesRepositoryInterface::class);
        $movieQueryMock->expects($this->once())->method('getAll')->willReturn(
            [
                new Movie(new MovieTitle('ab')),
                new Movie(new MovieTitle('bc')),
                new Movie(new MovieTitle('fx')),
                new Movie(new MovieTitle('fff')),
                new Movie(new MovieTitle('sdsdsd'))
            ]
        );

        $movieFinder = new MovieFinder(new MovieQuery($movieQueryMock), new FilterFactory());
        $result = $movieFinder->findByType(new SearchCriteriaDto('random'));

        $this->assertCount(3, $result);
    }

    public function testFindMoviesStartingWithWAndHaveEvenLength(): void
    {
        $movieQueryMock = $this->createMock(MoviesRepositoryInterface::class);
        $movieQueryMock->expects($this->once())->method('getAll')->willReturn(
            [
                new Movie(new MovieTitle('Wb')),
                new Movie(new MovieTitle('bc')),
                new Movie(new MovieTitle('Wxd')),
                new Movie(new MovieTitle('WWaf')),
                new Movie(new MovieTitle('sdsdsd')),
                new Movie(new MovieTitle(' Wad')),
                new Movie(new MovieTitle('Wad ')),
                new Movie(new MovieTitle('')),
                new Movie(new MovieTitle('Wad llll')),
            ]
        );

        $movieFinder = new MovieFinder(new MovieQuery($movieQueryMock), new FilterFactory());
        $result = $movieFinder->findByType(new SearchCriteriaDto('startWithW'));


        $this->assertEquals([
            new MovieResult('Wb'),
            new MovieResult('WWaf'),
            new MovieResult('Wad '),
            new MovieResult('Wad llll'),
        ], $result);
    }

    public function testFindMoviesMoreThanTwoWords(): void
    {
        $movieQueryMock = $this->createMock(MoviesRepositoryInterface::class);
        $movieQueryMock->expects($this->once())->method('getAll')->willReturn(
            [
                new Movie(new MovieTitle(' Wb')),
                new Movie(new MovieTitle('bc  ')),
                new Movie(new MovieTitle('  Wxd')),
                new Movie(new MovieTitle('sd a')),
                new Movie(new MovieTitle('sd a b')),
                new Movie(new MovieTitle('c')),
                new Movie(new MovieTitle('F F F ')),
                new Movie(new MovieTitle('')),
                new Movie(new MovieTitle('Wad ')),
            ]
        );

        $movieFinder = new MovieFinder(new MovieQuery($movieQueryMock), new FilterFactory());
        $result = $movieFinder->findByType(new SearchCriteriaDto('moreThanTwoWords'));


        $this->assertEquals([
            new MovieResult('sd a'),
            new MovieResult('sd a b'),
            new MovieResult('F F F '),
        ], $result);
    }


    public function testTypeIsEmptyException(): void
    {

        $movieQueryMock = $this->createMock(MoviesRepositoryInterface::class);
        $movieQueryMock->expects($this->never())->method('getAll')->willReturn([
            ]);

        $movieFinder = new MovieFinder(new MovieQuery($movieQueryMock), new FilterFactory());

        $this->expectException(TypeIsEmptyException::class);

        $movieFinder->findByType(new SearchCriteriaDto(''));

    }


    public function testFilterNotExistException(): void
    {

        $movieQueryMock = $this->createMock(MoviesRepositoryInterface::class);
        $movieQueryMock->expects($this->never())->method('getAll')->willReturn([
        ]);

        $movieFinder = new MovieFinder(new MovieQuery($movieQueryMock), new FilterFactory());

        $this->expectException(FilterNotExistException::class);

        $movieFinder->findByType(new SearchCriteriaDto('sdsd'));

    }

}