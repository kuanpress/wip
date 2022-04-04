<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function draw()
    {
        // create a new empty image resource with red background
        $img = Image::canvas(350, 280, '#FFF');

        $img->rectangle(0, 0, 350, 280, function ($draw) {
            $draw->background('#FF0000');
            // $draw->border(2, '#000');
        });

        $img->rectangle(5, 5, 345, 275, function ($draw) {
            $draw->background('#FFF');
            // $draw->border(2, '#000');
        });

        $img->line(345 / 2, 5, 345 / 2, 275, function ($draw) {
            $draw->color('#0000ff');
        });

        $x = 345;
        $y = 275;
        $oneSideUps = 8;

        // Need how many box or ups
        for ($ups = 0; $ups < $oneSideUps; $ups++) {


            // First box
            if ($ups == 0) {
            }
        }

        // $img->rectangle(10, 10, $k, $o, function ($draw) {
        //     $draw->background('#DDD234');
        //     $draw->border(1, '#000');
        // });

        // draw a blue pixel
        // for ($x = 0; $x < 21; $x++){
        //     $img->pixel('#0000ff', $x, $x);
        // }

        // draw a red pixel
        // $img->pixel('#ff0000', 64, 64);

        return $img->response('png');
    }
}
