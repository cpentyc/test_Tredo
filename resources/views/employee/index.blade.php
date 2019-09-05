@extends('layouts.app')

@section('content')

    @if (count($employees) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Список сотрудников
            </div>
            <div class="panel">
                <a href="/employee/create" class="btn btn-primary" >Добавить сотрудника</a>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>ЗП</th>
                    <th>Пол</th>
                    <th>Отделы</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $employee->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $employee->surname }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $employee->patronymic }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $employee->wage }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ ($employee->gender==1? 'Муж' : "Жен") }}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <?php
                                    foreach ($employee->departments as $department) {
                                        //
                                        echo $department->name.', ';
                                    }
                                    ?>
                                </div>
                            </td>

                            <td>
                                <form action="{{ url('employee/'.$employee->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('employee/'.$employee->id.'/edit') }}" method="GET">
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
