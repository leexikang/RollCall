<?php

namespace App\Http\Controllers;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class ApiController extends Controller
{
    private $fractal;

    /**
     * @param mixed $fractal
     */

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function transform($data, $transformer)
    {    
        $resource = new Collection($data, $transformer);
        return $data = $this->fractal->createData($resource)->toJson();
    }



}
