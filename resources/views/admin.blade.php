@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome admin! - Loan Applications') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">Username

                                </th>
                                <th class="th-sm">Loan Amount

                                </th>
                                <th class="th-sm">Loan Duration

                                </th>
                                <th class="th-sm">Applied date

                                </th>
                                <th class="th-sm">Status

                                </th>
                                <th class="th-sm">Action

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                <tr>
                                    <td>{{$loan->user->username}}</td>
                                    <td>{{$loan->loan_amount}}</td>
                                    <td>{{$loan->duration .' '.$loan->loan_type}}</td>
                                    <td>{{$loan->created_at}}</td>
                                    <td>{{$loan->status}}</td>
                                    <td>
                                        @if($loan->status === 'pending')
                                            <a href="{{route('loan.approve', $loan->id)}}" class="btn btn-success">Approve</a>
                                            <a href="{{route('loan.reject', $loan->id)}}" class="btn btn-warning">Reject</a>
                                        @else
                                            <a href="{{route('loan.delete', $loan->id)}}" class="btn btn-danger">Delete</a>
                                        @endif
                                    </td>
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
