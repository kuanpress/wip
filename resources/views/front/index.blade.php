@extends('master')

@section('content')
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-sm-4">
            <form action="{{ route('img_calc') }}" method="post">
                @csrf
                <div class="mb-3">
                    <select class="form-select" name="paper_size">
                        <option selected>-- Select the paper size --</option>
                        <option value="1">25'' x 35.5''</option>
                        <option value="2">25'' x 37''</option>
                        <option value="3">31'' x 43''</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="number" class="form-control" name="width"
                            aria-label="Width length (with dot and two decimal places)">
                        <span class="input-group-text">mm</span>
                        <span class="input-group-text">width</span>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="number" class="form-control" name="height"
                            aria-label="Height length (with dot and two decimal places)">
                        <span class="input-group-text">mm</span>
                        <span class="input-group-text">height</span>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-sm btn-warning" value="Generate" name="calc">
                </div>
            </form>
        </div>

        @if (isset($tmp))
            <div class="row mt-3">
                <div class="col-sm-4 text-center">
                    <h5>2-Cuts ({{ $tmp[0]['zeroCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/nocut.png') }}" alt="No Cut">
                    <h6>Total Ups: {{ $tmp[0]['zeroCut'] * 1 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>2-Cuts ({{ $tmp[1]['twoCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/2cut.png') }}" alt="Two Cuts">
                    <h6>Total Ups: {{ $tmp[1]['twoCut'] * 2 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>2H-Cuts ({{ $tmp[4]['twoHCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/2hcut.png') }}" alt="Two H Cuts">
                    <h6>Total Ups: {{ $tmp[4]['twoHCut'] * 2 }}</h6>
                </div>
            </div>
        @endif

        @if (isset($tmp))
            <div class="row mt-3">
                <div class="col-sm-4 text-center">
                    <h5>3-Cuts ({{ $tmp[2]['threeCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/3cut.png') }}" alt="Three Cuts">
                    <h6>Total Ups: {{ $tmp[2]['threeCut'] * 3 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>4-Cuts ({{ $tmp[3]['fourCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/4cut.png') }}" alt="Four Cuts">
                    <h6>Total Ups: {{ $tmp[3]['fourCut'] * 4 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>4V-Cuts ({{ $tmp[5]['fourVCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/4vcut.png') }}" alt="Four V Cuts">
                    <h6>Total Ups: {{ $tmp[5]['fourVCut'] * 4 }}</h6>
                </div>
            </div>
        @endif

        @if (isset($tmp))
            <div class="row mt-3">
                <div class="col-sm-4 text-center">
                    <h5>6-Cuts ({{ $tmp[6]['sixCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/6cut.png') }}" alt="Six Cuts">
                    <h6>Total Ups: {{ $tmp[6]['sixCut'] * 6 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>8-Cuts ({{ $tmp[7]['eightCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/8cut.png') }}" alt="Eight Cuts">
                    <h6>Total Ups: {{ $tmp[7]['eightCut'] * 8 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>9-Cuts ({{ $tmp[8]['nineCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/9cut.png') }}" alt="Nine Cuts">
                    <h6>Total Ups: {{ $tmp[8]['nineCut'] * 9 }}</h6>
                </div>
            </div>
        @endif
    </div>
@endsection
