<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about() {
        /*
        $name = "Pedro Data";
        return view("pages/about")->with('name', $name);
         * 
         */
        
        $teste = 'coisas';
        $cenas = 'tretas';
        
        $people = [
            'Joqeuim Leitão', 'Joana Cenas', 'Francisca Mendes'
        ];
        
        return view("pages/about", compact('teste', 'cenas', 'people'))->with([
            'first' => 'Pedro',
            'second' => 'Data'
        ]);
    }
    
    public function contact() {
        return view('pages/contact');
    }
}
