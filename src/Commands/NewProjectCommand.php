<?php

namespace Antonella\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class NewProjectCommand extends Command
{
    protected static $defaultName = 'new';

    protected function configure()
    {
        $this
            ->setDescription('Crea un nuevo proyecto con Antonella Framework');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $projectName = $input->getArgument('name') ?? 'project';
        $targetDir = getcwd() . DIRECTORY_SEPARATOR . $projectName;

        $output->writeln("📦 Creando nuevo proyecto Antonella en <info>{$targetDir}</info>");

        // Obtener la última versión desde GitHub
        $apiUrl = 'https://api.github.com/repos/cehojac/antonella-framework-for-wp/releases/latest';
        $context = stream_context_create([
            'http' => ['user_agent' => 'antonella-installer']
        ]);
        $response = file_get_contents($apiUrl, false, $context);
        $data = json_decode($response, true);

        if (!isset($data['zipball_url'])) {
            $output->writeln('<error>❌ No se pudo obtener la última versión desde GitHub.</error>');
            return Command::FAILURE;
        }

        $zipUrl = $data['zipball_url'];
        $version = $data['tag_name'] ?? 'última';

        $output->writeln("⬇️  Descargando Antonella Framework versión <info>{$version}</info>");

        // Descargar el zip
        $tmpZip = tempnam(sys_get_temp_dir(), 'antonella') . '.zip';
        file_put_contents($tmpZip, file_get_contents($zipUrl, false, $context));

        // Extraer el zip
        $zip = new \ZipArchive();
        if ($zip->open($tmpZip) === true) {
            $extractPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('antonella_', true);
            $zip->extractTo($extractPath);
            $zip->close();
        } else {
            $output->writeln('<error>❌ No se pudo descomprimir el archivo ZIP.</error>');
            return Command::FAILURE;
        }

        unlink($tmpZip);

        // Copiar el contenido
        $dirs = glob($extractPath . '/*', GLOB_ONLYDIR);
        $templatePath = $dirs[0] ?? null;

        if (!$templatePath) {
            $output->writeln('<error>❌ No se encontró contenido en el ZIP.</error>');
            return Command::FAILURE;
        }

        $fs = new Filesystem();
        if (!is_dir($targetDir)) {
            $fs->mkdir($targetDir);
        }

        $dirIterator = new RecursiveDirectoryIterator($templatePath, RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $item) {
            $destPath = $targetDir . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
            if ($item->isDir()) {
                $fs->mkdir($destPath);
            } else {
                $fs->copy($item, $destPath, true);
            }
        }

        $output->writeln("<info>✅ Proyecto creado con éxito. Versión {$version}</info>");
        $output->writeln("📌 Ejecuta:
   cd {$projectName}
   composer install");

        return Command::SUCCESS;
    }
}
