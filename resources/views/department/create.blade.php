<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 17:38
 */
?>


@extends('layouts.app')

@section('content')
    @include('common.errors')
    <form action="{{ url('department') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="department-name">Название отдела</label>
            <input type="text" name="name" id="department-name" class="form-control" placeholder="Отдел разработки">
        </div>

        <div class="form-check form-check-inline">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i>Сохранить
            </button>
        </div>
    </form>

@endsection
