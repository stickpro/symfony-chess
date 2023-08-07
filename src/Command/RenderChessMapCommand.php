<?php

namespace App\Command;

use App\Enum\File;
use App\Game\Board;
use App\Game\Coordinates;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Termwind\{render};

#[AsCommand(
    name: 'app:render-chess-map',
    description: 'Render chess map.',
    aliases: ['app:render-chess-map'],
    hidden: false
)]
class RenderChessMapCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setDescription('Render a chess map')
            ->setHelp('This command renders a simple chess map.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $board = new Board();
        $board->setupDefaultPiecePositions();
        while (true) {
            $this->clearTerminal();
            render($this->renderChessMap($board));
            sleep(10); // Optional: Adjust the delay as needed
        }

        return Command::SUCCESS;
    }

    private function renderChessMap(Board $board): string
    {
        $html = '<div class="flex justify-center">';

        for ($rank = 8; $rank >= 1; $rank--) {
            $html .= '<div class="flex">';
            $html .= "<span class='px-2'>{$rank}</span>";

            foreach (File::cases() as $file) {
                $coordinates = new Coordinates($file, $rank);
                $bgColor = Board::isSquaredDark($coordinates) ? 'amber-600' : 'slate-50';
                $cellValue = $board->isSquareEmpty($coordinates) === true ? " " : $board->getPiece($coordinates)->getIcon();
                $html .= "<span class='bg-{$bgColor} px-1 justify-center w-3 text-black'>{$cellValue}</span>";
            }
            $html .= '<div>';
        }
        $html .= '<div class="ml-4">';

        foreach (File::cases() as $file) {
            $html .= "<span class='pl-2 w-3 text-white'>{$file->name}</span>";
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
    private function clearTerminal(): void
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // For Windows
            system('cls');
        } else {
            // For other operating systems (Linux, macOS)
            system('clear');
        }
    }
}
