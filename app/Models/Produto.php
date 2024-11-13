<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Produto extends Model
{
    use HasFactory;

    /**
     * Remove a imagem associada ao objeto caso a imagem não esteja no diretório padrão
     */
    public function removeImage()
    {
        $diretorioImagemAntiga = dirname($this->urlImage);
        // Remove a imagem anterior, se existir e não estiver no diretório de imagens padrão
        if ($diretorioImagemAntiga != "/img-default") {
            $imagemAntiga = public_path($this->urlImage);
            if (File::exists($imagemAntiga)) {
                File::delete($imagemAntiga); // Remove a imagem antiga
            }
        }
    }

    /**
     * Atualiza a imagem associada ao objeto, removendo a imagem anterior, se necessário, e salvando a nova imagem enviada.
     * @param \Illuminate\Http\Request $request O objeto da requisição contendo os dados enviados, incluindo a imagem.
     * @param string $name O nome do campo da imagem no formulário de envio.
     */
    public function updateImage($request, $name)
    {
        // Verifica se uma imagem foi enviada e a armazena
        if ($request->hasFile($name)) {
            $diretorioImagemAntiga = dirname($this->urlImage);
            // Remove a imagem anterior, se existir e não estiver no diretório de imagens padrão
            if ($diretorioImagemAntiga != "/img-default") {
                $imagemAntiga = public_path($this->urlImage);
                if (File::exists($imagemAntiga)) {
                    File::delete($imagemAntiga); // Remove a imagem antiga
                }
            }
            $imagem = $request->file($name); // pega a imagem enviada e coloca na variável $imagem
            // Usa explode para dividir a string de microtime em duas partes
            [$segundos, $microsegundos] = explode(".", microtime(true)); // retorna uma string no formato "segundos.microsegundos"
            // Gera o nome da imagem no formato: nome-YYYY-MM-DD-SS-MS.ext
            $nomeImagem = $this->nome . date("-Y-m-d-") . $segundos . "-" . $microsegundos . "." . $imagem->getClientOriginalExtension();
            $caminhoImagem = public_path("/img/produto"); // caminho da pasta public
            $this->urlImage = "/img/produto/$nomeImagem"; // Prepara o caminho para salvar no banco de dados
            $this->update();
            $imagem->move($caminhoImagem, $nomeImagem); // Move a imagem para a pasta
        }
    }
}
