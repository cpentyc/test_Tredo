@extends('layouts.app')

@section('content')
    <table  class="table">
        <thead>
        <th>&nbsp;</th>
        @if (count($departments) > 0)
            @foreach ($departments as $department)
                <th  scope="col">{{$department->name}}</th>
            @endforeach
        @endif
        </thead>
        <tbody>


        @if (count($employees) > 0)
            @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->name}}</th>
                    @foreach ($departments as $department)
                        <td>{{(!empty($result[$department->id][$employee->id]) ? "&#10004;" : "&mdash;" )}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


@endsection