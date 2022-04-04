<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class UpController extends Controller
{

    private $zeroCut;
    private $twoCut;
    private $threeCut;
    private $fourCut;
    private $twoHCut;
    private $fourVCut;
    private $sixCut;
    private $eightCut;
    private $nineCut;

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
                $this->doPaperSize($available_paper_sizes, $width, $height, $paper_size);
                array_push(
                    $tmp,
                    ['zeroCut' => number_format(max($this->zeroCut), 0)],
                    ['twoCut' => number_format(max($this->twoCut), 0)],
                    ['threeCut' => number_format(max($this->threeCut), 0)],
                    ['fourCut' => number_format(max($this->fourCut), 0)],
                    ['twoHCut' => number_format(max($this->twoHCut), 0)],
                    ['fourVCut' => number_format(max($this->fourVCut), 0)],
                    ['sixCut' => number_format(max($this->sixCut), 0)],
                    ['eightCut' => number_format(max($this->eightCut), 0)],
                    ['nineCut' => number_format(max($this->nineCut), 0)]
                );
                break;
            case 2:
                $this->doPaperSize($available_paper_sizes, $width, $height, $paper_size);
                array_push(
                    $tmp,
                    ['zeroCut' => number_format(max($this->zeroCut), 0)],
                    ['twoCut' => number_format(max($this->twoCut), 0)],
                    ['threeCut' => number_format(max($this->threeCut), 0)],
                    ['fourCut' => number_format(max($this->fourCut), 0)],
                    ['twoHCut' => number_format(max($this->twoHCut), 0)],
                    ['fourVCut' => number_format(max($this->fourVCut), 0)],
                    ['sixCut' => number_format(max($this->sixCut), 0)],
                    ['eightCut' => number_format(max($this->eightCut), 0)],
                    ['nineCut' => number_format(max($this->nineCut), 0)]
                );
                break;
            case 3:
                $this->doPaperSize($available_paper_sizes, $width, $height, $paper_size);
                array_push(
                    $tmp,
                    ['zeroCut' => number_format(max($this->zeroCut), 0)],
                    ['twoCut' => number_format(max($this->twoCut), 0)],
                    ['threeCut' => number_format(max($this->threeCut), 0)],
                    ['fourCut' => number_format(max($this->fourCut), 0)],
                    ['twoHCut' => number_format(max($this->twoHCut), 0)],
                    ['fourVCut' => number_format(max($this->fourVCut), 0)],
                    ['sixCut' => number_format(max($this->sixCut), 0)],
                    ['eightCut' => number_format(max($this->eightCut), 0)],
                    ['nineCut' => number_format(max($this->nineCut), 0)]
                );
                break;
        }

        return view('front.index')->with('tmp', $tmp);
    }

    private function doCalc($howManyCut, $available_paper_sizes, $width, $height, $paper_size)
    {
        $tmp = [];

        $r1 = 0;
        $r2 = 0;

        switch ($paper_size) {
            case 1:
                if ($howManyCut == 0) {
                    $r1 = floor($available_paper_sizes->a->width / $width) * floor($available_paper_sizes->a->height / $height);
                    $r2 = floor($available_paper_sizes->a->width / $height) * floor($available_paper_sizes->a->height / $width);
                }

                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 2)) / $width)) * ($available_paper_sizes->a->height / $height);
                    $r2 = ($available_paper_sizes->a->width / $height) * floor((floor(($available_paper_sizes->a->height / 2)) / $width));
                }

                if ($howManyCut == '2H') {
                    $r1 = floor((floor(($available_paper_sizes->a->height / 2)) / $height)) * ($available_paper_sizes->a->width / $width);
                    $r2 = ($available_paper_sizes->a->height / $height) * floor((floor(($available_paper_sizes->a->width / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 3)) / $width)) * ($available_paper_sizes->a->height / $height);
                    $r2 = ($available_paper_sizes->a->width / $height) * floor((floor(($available_paper_sizes->a->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->a->width / 2)) / $width)) * floor(floor(($available_paper_sizes->a->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->a->width / 2)) / $height)) * floor(floor(($available_paper_sizes->a->height / 2)) / $width);
                }

                if ($howManyCut == '4V') {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 6) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }

                if ($howManyCut == 8) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 9) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 3) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 3) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }
                array_push($tmp, $r1, $r2);
                break;
            case 2:
                if ($howManyCut == 0) {
                    $r1 = floor($available_paper_sizes->b->width / $width) * floor($available_paper_sizes->b->height / $height);
                    $r2 = floor($available_paper_sizes->b->width / $height) * floor($available_paper_sizes->b->height / $width);
                }

                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 2)) / $width)) * ($available_paper_sizes->b->height / $height);
                    $r2 = ($available_paper_sizes->b->width / $height) * floor((floor(($available_paper_sizes->b->height / 2)) / $width));
                }

                if ($howManyCut == '2H') {
                    $r1 = floor((floor(($available_paper_sizes->b->height / 2)) / $height)) * ($available_paper_sizes->b->width / $width);
                    $r2 = ($available_paper_sizes->b->height / $height) * floor((floor(($available_paper_sizes->b->width / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 3)) / $width)) * ($available_paper_sizes->b->height / $height);
                    $r2 = ($available_paper_sizes->b->width / $height) * floor((floor(($available_paper_sizes->b->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->b->width / 2)) / $width)) * floor(floor(($available_paper_sizes->b->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->b->width / 2)) / $height)) * floor(floor(($available_paper_sizes->b->height / 2)) / $width);
                }

                if ($howManyCut == '4V') {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 6) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }

                if ($howManyCut == 8) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 9) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 3) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 3) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }
                array_push($tmp, $r1, $r2);
                break;
            case 3:
                if ($howManyCut == 0) {
                    $r1 = floor($available_paper_sizes->c->width / $width) * floor($available_paper_sizes->c->height / $height);
                    $r2 = floor($available_paper_sizes->c->width / $height) * floor($available_paper_sizes->c->height / $width);
                }

                if ($howManyCut == 2) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 2)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 2)) / $width));
                }

                if ($howManyCut == '2H') {
                    $r1 = floor((floor(($available_paper_sizes->c->height / 2)) / $height)) * ($available_paper_sizes->c->width / $width);
                    $r2 = ($available_paper_sizes->c->height / $height) * floor((floor(($available_paper_sizes->c->width / 2)) / $width));
                }

                if ($howManyCut == 3) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }

                if ($howManyCut == 4) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 2)) / $width)) * floor(floor(($available_paper_sizes->c->height / 2)) / $height);
                    $r2 = floor((floor(($available_paper_sizes->c->width / 2)) / $height)) * floor(floor(($available_paper_sizes->c->height / 2)) / $width);
                }

                if ($howManyCut == '4V') {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * ($available_paper_sizes->c->height / $height);
                    $r2 = ($available_paper_sizes->c->width / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 6) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }

                if ($howManyCut == 8) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 4)) / $width)) * (floor($available_paper_sizes->c->height / 2) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 2) / $height) * floor((floor(($available_paper_sizes->c->height / 4)) / $width));
                }

                if ($howManyCut == 9) {
                    $r1 = floor((floor(($available_paper_sizes->c->width / 3)) / $width)) * (floor($available_paper_sizes->c->height / 3) / $height);
                    $r2 = (floor($available_paper_sizes->c->width / 3) / $height) * floor((floor(($available_paper_sizes->c->height / 3)) / $width));
                }
                array_push($tmp, $r1, $r2);
                break;
        }

        return $tmp;
    }

    private function doPaperSize($available_paper_sizes, $width, $height, $paper_size)
    {
        $this->zeroCut = $this->doCalc(0, $available_paper_sizes, $width, $height, $paper_size);
        $this->twoCut = $this->doCalc(2, $available_paper_sizes, $width, $height, $paper_size);
        $this->threeCut = $this->doCalc(3, $available_paper_sizes, $width, $height, $paper_size);
        $this->fourCut = $this->doCalc(4, $available_paper_sizes, $width, $height, $paper_size);
        $this->twoHCut = $this->doCalc('2H', $available_paper_sizes, $width, $height, $paper_size);
        $this->fourVCut = $this->doCalc('4V', $available_paper_sizes, $width, $height, $paper_size);
        $this->sixCut = $this->doCalc(6, $available_paper_sizes, $width, $height, $paper_size);
        $this->eightCut = $this->doCalc(8, $available_paper_sizes, $width, $height, $paper_size);
        $this->nineCut = $this->doCalc(9, $available_paper_sizes, $width, $height, $paper_size);
    }
}
