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
                    <h5>2-Cuts ({{ $tmp[0]['twoCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/2cut.png') }}" alt="Two Cuts">
                    <h6>Total Ups: {{ $tmp[0]['twoCut'] * 2 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>3-Cuts ({{ $tmp[1]['threeCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/3cut.png') }}" alt="Three Cuts">
                    <h6>Total Ups: {{ $tmp[1]['threeCut'] * 3 }}</h6>
                </div>
                <div class="col-sm-4 text-center">
                    <h5>4-Cuts ({{ $tmp[2]['fourCut'] }} Ups)</h5>
                    <img src="{{ asset('images/cuts/4cut.png') }}" alt="Four Cuts">
                    <h6>Total Ups: {{ $tmp[2]['fourCut'] * 4 }}</h6>
                </div>
            </div>
        @endif
    </div>
@endsection
