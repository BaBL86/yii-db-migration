<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Db\Migration\Informer;

use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Writes migration process informational messages into console.
 */
final class ConsoleMigrationInformer implements MigrationInformerInterface
{
    private ?SymfonyStyle $io = null;

    public function beginCreateHistoryTable(string $message): void
    {
        if ($this->io) {
            $this->io->section($message);
        }
    }

    public function endCreateHistoryTable(string $message): void
    {
        if ($this->io) {
            $this->io->writeln("\t<fg=green>>>> [OK] - '.$message.'.</>");
        }
    }

    public function beginCommand(string $message): void
    {
        if ($this->io) {
            $this->io->write('    > ' . $message . ' ...');
        }
    }

    public function endCommand(string $message): void
    {
        if ($this->io) {
            $this->io->writeln(' ' . $message);
        }
    }

    public function setIO(?SymfonyStyle $io): void
    {
        $this->io = $io;
    }
}
