<?php

namespace Antonella\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NewProjectCommand extends Command
{
    protected static $defaultName = 'new';

    protected function configure()
    {
        $this
            ->setDescription('Crea un nuevo proyecto Antonella')
            ->addArgument('name', InputArgument::REQUIRED, 'Nombre del proyecto');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $targetDir = getcwd() . DIRECTORY_SEPARATOR . $name;

        if (is_dir($targetDir)) {
            $output->writeln("<error>❌ La carpeta ya existe: $targetDir</error>");
            return Command::FAILURE;
        }

        $output->writeln("📦 Creando nuevo proyecto Antonella en <info>$targetDir</info>");

        $zipUrl = 'https://github.com/cehojac/antonella-framework-for-wp/archive/refs/heads/main.zip';
        $tmpZip = tempnam(sys_get_temp_dir(), 'antonella') . '.zip';
        file_put_contents($tmpZip, file_get_contents($zipUrl));

        $zip = new \ZipArchive();
        $zip->open($tmpZip);
        $zip->extractTo(sys_get_temp_dir() . '/antonella');
        $zip->close();
        unlink($tmpZip);

        $templatePath = sys_get_temp_dir() . '/antonella/antonella-template-main';
        mkdir($targetDir);
        shell_exec("cp -r $templatePath/* $targetDir");
        shell_exec("cp -r $templatePath/.env.example $targetDir/.env");

        $output->writeln("✅ Proyecto creado. Ejecuta:");
        $output->writeln("   cd $name");
        $output->writeln("   composer install");

        return Command::SUCCESS;
    }
}
