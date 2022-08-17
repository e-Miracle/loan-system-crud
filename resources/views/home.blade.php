@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome '.\Illuminate\Support\Facades\Auth::user()->username.' - Apply for a loan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('loan.request')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Loan Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('loan_amount') is-invalid @enderror" name="loan_amount" value="{{ old('loan_amount') }}" required autocomplete="amount" autofocus>

                                    @error('loan_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Loan Type') }}</label>

                                <div class="col-md-6">
                                    <select name="loan_type" id="type" class="form-control @error('loan_type') is-invalid @enderror" required autocomplete="type">
                                        <option value="">--select an option--</option>
                                        <option value="days">Days</option>
                                        <option value="months">Months</option>
                                        <option value="year">Year</option>
                                    </select>

                                    @error('loan_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="duration" class="col-md-4 col-form-label text-md-end">{{ __('Loan Duration') }}</label>

                                <div class="col-md-6">
                                    <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="duration">

                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Apply') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">{{ __('Loan history') }}</div>

                <div class="card-body">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Loan Amount

                            </th>
                            <th class="th-sm">Loan Duration

                            </th>
                            <th class="th-sm">Applied date

                            </th>
                            <th class="th-sm">Status

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loans as $loan)
                            <tr>
                                <td>{{$loan->loan_amount}}</td>
                                <td>{{$loan->duration .' '.$loan->loan_type}}</td>
                                <td>{{$loan->created_at}}</td>
                                <td>{{$loan->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
