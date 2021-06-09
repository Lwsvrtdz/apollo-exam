<?php

namespace App\Http\Controllers;

use App\Models\Random;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function index()
    {
    	return view('exam');
    }

    public function spiral()
    {
        for ($i = 1; $i<=rand(5, 10); $i++) {
            $name = $this->randomName($i);

            $random = Random::create([
                'values' => $name,
                'flag' => null
            ]);

            for($x = 1; $x<=rand(5, 10); $x++) { //create breakdowns under RANDOM
                $random->breakdowns()->create([
                    'values' => $this->generateRandomString()
                ]);
            }
        }
        $random = Random::with('breakdowns')->get();
    	return response()->json([
    		'randoms' => $random
    	]);
    }

    private function generateRandomString($length = 5) { // for Alpha numeric
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function randomName($value) {
        $firstname = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha',
        );

        $name = $firstname[$value];

        return $name;
    }
}
