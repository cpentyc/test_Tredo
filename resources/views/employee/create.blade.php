<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 15:16
 */
?>
@extends('layouts.app')

@section('content')
    @include('common.errors')
<form action="{{ url('employee') }}" method="POST" class="form-horizontal">
{{ csrf_field() }}

    <div class="form-group">
        <label for="employee-name">Имя</label>
        <input type="text" name="name" id="employee-name"  class="form-control" placeholder="Иван">
    </div>

    <div class="form-group">
        <label for="employee-surname">Фамилия</label>
        <input type="text" name="surname" id="employee-surname" class="form-control"  placeholder="Иванов">
    </div>


    <div class="form-group">
        <label for="employee-patronymic">Отчество</label>
        <input type="text" name="patronymic" id="employee-patronymic" class="form-control"  placeholder="Отчество">
    </div>

    <div class="form-group">
        <label for="employee-wage">ЗП</label>
        <input type="text" name="wage" id="employee-wage" class="form-control"  placeholder="1000">
    </div>

    <label>Пол</label> <br />
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" checked>
        <label class="form-check-label" for="inlineRadio1">М</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0">
        <label class="form-check-label" for="inlineRadio2">Ж</label>
    </div>
    <br />

    <label>Отделы</label>
    @if (count($departments) > 0)
        @foreach ($departments as $department)
            <div class="form-check alignLeft">
                <input class="form-check-input" type="checkbox" value="{{$department->id}}" name="department[]" id="inlineCheckbox{{$department->id}}">
                <label class="form-check-label" for="inlineCheckbox{{$department->id}}">
                    {{$department->name}}
                </label>
            </div>
        @endforeach
    @endif

    <div class="form-check form-check-inline">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i>Сохранить
            </button>
    </div>
</form>

@endsection