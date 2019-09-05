<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 17:32
 */

?>

@extends('layouts.app')

@section('content')
    @include('common.errors')
    @if (count($departments) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Список сотрудников
            </div>
            <div class="panel">
                <a href="/department/create" class="btn btn-primary" >Добавить отдел</a>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Имя</th>
                    <th>Колво</th>
                    <th>ЗП</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $department->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{(!empty($departmentsCountEmployee[$department->id]) ? $departmentsCountEmployee[$department->id] : 0) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ (!empty($dataWage[$department->id])? $dataWage[$department->id]: 0)}}</div>
                            </td>



                            <td>
                                <form action="{{ url('department/'.$department->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('department/'.$department->id.'/edit') }}" method="GET">
                                    {{ csrf_field() }}


                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-trash"></i> Редактировать
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection

