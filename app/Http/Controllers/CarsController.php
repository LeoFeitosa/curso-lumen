<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    private $model;

    public function __construct(cars $cars)
    {
        $this->model = $cars;
    }

    public function getAll(){
        $cars = $this->model->all();
        try{
            if(count($cars) > 0)
                return response()->json($cars, Response::HTTP_OK);
            else
                return response()->json([], Response::HTTP_OK);
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }            
    }

    public function get($id){
        $car = $this->model->find($id);
        try{
            if(count($car) > 0)
                return response()->json($cars, Response::HTTP_OK);
            else
                return response()->json(null, Response::HTTP_OK);
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function store(Request $request){
        $car = $this->model->create($request->all());
        try{
            return response()->json($car, Response::HTTP_CREATE);
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function update($id, Request $request){
        try{
        $car = $this->model->find($id)
            ->update($request->all());

            return response()->json($car, Response::HTTP_OK);
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function destroy($id){
        try{
            $car = $this->model->find($id)
                ->delete();

            return response()->json(null, Response::HTTP_OK);
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
