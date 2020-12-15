<?php

namespace Tests\Unit\Scores;

use App\DiceRoll;
use App\Scores\NumberScores\NumberScore;
use Tests\TestCase;

class NumberScoreTest extends TestCase
{
    /** @test */
    public function it_determines_if_the_numbers_score_the_set_number()
    {
        $score = new TestNumberScore(5);

        $this->assertTrue($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertTrue($score->hasBeenScored(new DiceRoll([5, 5, 5, 5, 5])));

        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 1, 1, 1, 1])));
        $this->assertFalse($score->hasBeenScored(new DiceRoll([1, 2, 3, 4, 6])));
    }

    /** @test */
    public function it_determines_the_correct_score()
    {
        $this->assertEquals(5, (new TestNumberScore(5))->getScore(new DiceRoll([1, 2, 3, 4, 5])));
        $this->assertEquals(25, (new TestNumberScore(5))->getScore(new DiceRoll([5, 5, 5, 5, 5])));
        $this->assertEquals(4, (new TestNumberScore(2))->getScore(new DiceRoll([1, 2, 3, 4, 2])));
    }
}

class TestNumberScore extends NumberScore
{
    public function __construct(int $score)
    {
        parent::__construct($score);
    }

    public function getName(): string
    {
        return 'Test score';
    }
}
