<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;

class ImageProductController extends Controller
{
    public function create(Request $request)
    {
        // Verifique se o arquivo de imagem foi enviado
        if ($request->hasFile('image')) {
            // Obtenha o arquivo de imagem do request
            $image = $request->file('image');
            
            // Salve a imagem no diretório de armazenamento desejado (por exemplo, a pasta 'public/images')
            $path = $image->store('public/images');
            
            // Crie uma nova instância de Imagem
            $imagem = new Imagem;
            
            // Defina o caminho da imagem no atributo 'image_path' do modelo
            $imagem->image_path = $path;
            
            // Salve a imagem no banco de dados
            $imagem->save();
            
            return response()->json(['message' => 'Imagem enviada com sucesso!']);
        }
        
        return response()->json(['message' => 'Nenhuma imagem foi enviada.']);
    }
    
    public function show($id)
    {
        // Encontre a imagem pelo ID
        $imagem = Imagem::findOrFail($id);
        
        // Retorne a imagem como resposta
        return response()->file(storage_path('app/' . $imagem->image_path));
    }
}
