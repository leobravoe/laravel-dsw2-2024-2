<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('reset-database', function () {
    $file = database_path("sqlbanco.sql");
    if (!file_exists($file)) {
        $this->error("Arquivo {$file} não encontrado.");
        return;
    }
    $sql = file_get_contents($file);
    try {
        DB::unprepared($sql);
        $this->info("Script SQL rodado com sucesso.");
    } catch (Exception $e) {
        $this->error("Erro ao rodar o script SQL: " . $e->getMessage());
    }
})->purpose('Rodar um script SQL a partir de um arquivo.');
