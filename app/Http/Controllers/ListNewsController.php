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

    public function showFullNews($id)
    {
        try {

            $listNews = ListNews::find($id);
            return $listNews;

            if (!$listNews) return $this->error('Dado não encontrado', Response::HTTP_NOT_FOUND);

            return $listNews;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                'titulo' => 'string|max:255|required',
                'descricao' => 'string|max:255|required',
                'texto_completo' => 'string|required',
                'imagem' => 'string|required',
                'data_de_publicacao' => 'date_format:Y-m-d|required',
            ]);

            $exercise = ListNews::create($data);

            return $exercise;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
