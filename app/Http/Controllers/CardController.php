<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function distribute(Request $request)
    {
        $people = $request->input('people');

        if (!is_numeric($people) || $people < 0) {
            return response("Input value is invalid", 400);
        }

        $cards = [];
        $suits = ['S', 'H', 'D', 'C'];

        foreach ($suits as $suit) { //Loop through each suit
            for ($i = 1; $i <= 13; $i++) { // This means we will build 13 cards for each suit.
                $display = match ($i) {
                    1 => 'A',
                    10 => 'X',
                    11 => 'J',
                    12 => 'Q',
                    13 => 'K',
                    default => $i //using default to handle numbers 2-9
                };
                $cards[] = "$suit-$display";
            }
        }

        shuffle($cards); // Fisher-Yates is basically this in PHP

        $result = array_fill(0, $people, []);

        foreach ($cards as $i => $card) {
            $index = $i % $people;
            $result[$index][] = $card;
        }

        return response($result);
    }
}
