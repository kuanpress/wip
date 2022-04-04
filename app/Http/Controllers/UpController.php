<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class UpController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function calc(Request $r)
    {
        // Unit measured in inch
        $available_paper_sizes = (object) [
            'a' => (object) [
                'width' => 25,
                'height' => 35.5
            ],
            'b' => (object) [
                'width' => 25,
                'height' => 37
            ],
            'c' => (object) [
                'width' => 31,
                'height' => 43
            ]
        ];

        // Converted from MM to INCH
        $width = $r->width / 25.4;
        $height = $r->height / 25.4;

        $paper_size = $r->paper_size;

        $tmp = [];

        switch ($paper_size) {
            case 1:
                $twoCut = $this->doCalc(2, $available_paper_sizes, $width, $height, $paper_size);
                $threeCut = $this->doCalc(3, $available_paper_sizes, $width, $height, $paper_size);
                $fourCut = $this->doCalc(4, $available_paper_sizes, $width, $height, $paper_size);

                array_push($tmp, ['twoCut' => number_format(max($twoCut), 0)], ['threeCut' => number_format(max($threeCut), 0)], ['fourCut' => number_format(max($fourCut), 0)]);
                break;
            case 2:
                $twoCut = $this->doCalc(2, $available_paper_sizes, $width, $height, $paper_size);
                $threeCut = $this->doCalc(3, $available_paper_sizes, $width, $height, $paper_size);
                $fourCut = $this->doCalc(4, $available_paper_sizes, $width, $height, $paper_size);

                array_push($tmp, ['twoCut' => number_format(max($twoCut), 0)], ['threeCut' => number_format(max($threeCut), 0)], ['fourCut' => number_format(max($fourCut), 0)]);
                break;
            case 3:
                $twoCut = $this->doCalc(2, $available_paper_sizes, $width, $height, $paper_size);
                $threeCut = $this->doCalc(3, $available_paper_sizes, $width, $height, $paper_size);
                $fourCut = $this->doCalc(4, $available_paper_sizes, $width, $height, $paper_size);

                array_push($tmp, ['twoCut' => number_format(max($twoCut), 0)], ['threeCut' => number_format(max($threeCut), 0)], ['fourCut' => number_format(max($fourCut), 0)]);
                break;
        }

        // return $tmp;

        return view('front.index')->with('tmp', $tmp);
    }

    private function doCalc($howManyCut, $available_paper_sizes, $width, $height, $paper_size)
    {
        $tmp = [];

        switch ($paper_size) {
            case 1:
                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 2)) / $width)) * ($available_paper_sizes->a->height / $height);
                    $r2 = ($available_paper_sizes->a->width / $height) * floor((floor(($available_paper_sizes->a->height / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 3)) / $width)) * ($available_paper_sizes->a->height / $height);
                    $r2 = ($available_paper_sizes->a->width / $height) * floor((floor(($available_paper_sizes->a->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 2)) / $width)) * floor(floor(($available_paper_sizes->a->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->a->width / 2)) / $height)) * floor(floor(($available_paper_sizes->a->height / 2)) / $width);
                }
                array_push($tmp, $r1, $r2);
                break;
            case 2:
                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 2)) / $width)) * ($available_paper_sizes->b->height / $height);
                    $r2 = ($available_paper_sizes->b->width / $height) * floor((floor(($available_paper_sizes->b->height / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 3)) / $width)) * ($available_paper_sizes->b->height / $height);
                    $r2 = ($available_paper_sizes->b->width / $height) * floor((floor(($available_paper_sizes->b->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 2)) / $width)) * floor(floor(($available_paper_sizes->b->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->b->width / 2)) / $height)) * floor(floor(($available_paper_sizes->b->height / 2)) / $width);
                }
                array_push($tmp, $r1, $r2);
                break;
            case 3:
                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 2)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 2)) / $width)) * floor(floor(($available_paper_sizes->c->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->c->width / 2)) / $height)) * floor(floor(($available_paper_sizes->c->height / 2)) / $width);
                }
                array_push($tmp, $r1, $r2);
                break;
        }

        return $tmp;
    }

    public function draw()
    {
        // create a new empty image resource with red background
        $img = Image::canvas(32, 32, '#ff0000');
        return $img->response('png');
    }
}
