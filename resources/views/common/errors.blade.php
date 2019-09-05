<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 15:08
 */
?>
@if (count($errors) > 0)
    <!-- Список ошибок формы -->
    <div class="alert alert-danger">
        <strong>Упс! Что-то пошло не так!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif