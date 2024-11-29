<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('reset-database', function () {
    $file = database_path("sqlbanco.sql");

    // Verifica se o arquivo SQL existe
    if (!file_exists($file)) {
        $this->error("Arquivo {$file} não encontrado.");
        return;
    }

    // Lê o conteúdo do arquivo SQL
    $sql = file_get_contents($file);

    // Executa o script SQL
    try {
        DB::unprepared($sql);
        $this->info("Script SQL rodado com sucesso.");
    } catch (Exception $e) {
        $this->error("Erro ao rodar o script SQL: " . $e->getMessage());
    }

    // Remove o diretório /public/img
    $imgDirectory = public_path('img');

    if (File::exists($imgDirectory)) {
        try {
            File::deleteDirectory($imgDirectory);
            $this->info("Diretório /public/img removido com sucesso.");
        } catch (Exception $e) {
            $this->error("Erro ao remover o diretório /public/img: " . $e->getMessage());
        }
    } else {
        $this->info("Diretório /public/img não encontrado, nada para remover.");
    }
})->purpose('Rodar um script SQL a partir de um arquivo e remover o diretório /public/img.');
