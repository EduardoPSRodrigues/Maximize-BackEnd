<?php

namespace App\Http\Controllers;

use App\Models\ListNews;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListNewsController extends Controller
{
    public function index(Request $request)
    {
        try {

            $listNews = ListNews::orderBy('data_de_publicacao', 'desc')
            ->get();

            $newsArray = [];
            foreach ($listNews as $news) {
                $newsArray[] = [
                    'id' => $news->id,
                    'titulo' => $news->titulo,
                    'descricao' => $news->descricao,
                    'data_de_publicacao' => $news->data_de_publicacao,
                    'imagem' => $news->imagem,
                ];
            }

            return $newsArray;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }


}
