<?php

namespace App\Console\Commands;

use App\Dice;
use App\DiceRoll;
use App\Game;
use App\Scorer;
use App\Scores\Score;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class PlayYahtzee extends Command
{
    protected $signature = 'yahtzee:play';

    protected $description = 'Play a game of Yahtzee!';

    protected Game $game;

    private Scorer $scorer;

    public function __construct(Game $game)
    {
        parent::__construct();
        $this->game = $game;
        $this->scorer = new Scorer($game);
    }

    public function handle()
    {
        $this->lineBreak();
        $this->info("Lets play YAHTZEE!!");

        for ($i = 1; $i <= 5; $i++) {
            $this->lineBreak();
            $this->line("# Round $i");
            $this->playRound();
            $this->line("-----------------------");
        }

        $this->lineBreak();
        $this->info("Well done! You scored: " . $this->game->getScore());
    }

    private function playRound(): void
    {
        $roll = $this->rollDice();

        $potentialScores = $this->scorer->getScores($roll);

        if ($potentialScores->isEmpty()) {
            $this->lineBreak();
            $this->info("No score :(");
            $this->lineBreak();
            return;
        }

        $chosenScore = $this->pickScore($potentialScores, $roll);

        $this->game->recordScore($potentialScores[$chosenScore], $roll);
    }

    private function rollDice(): DiceRoll
    {
        $roll = Dice::roll();
        $numbers = $roll->getRoll();

        $this->lineBreak();
        $this->comment("[$numbers[0]] [$numbers[1]] [$numbers[2]] [$numbers[3]] [$numbers[4]]");

        return $roll;
    }

    private function pickScore(Collection $potentialScores, DiceRoll $roll)
    {
        $scoreOptions = $potentialScores
            ->map(fn(Score $score) => $score->getName() . ": Scores " . $score->getScore($roll))
            ->toArray();

        $chosenScore = $this->choice(
            "You've rolled the following scores. Pick one!",
            $scoreOptions
        );

        return array_search($chosenScore, $scoreOptions);
    }

    private function lineBreak(): void
    {
        $this->line("");
    }
}
