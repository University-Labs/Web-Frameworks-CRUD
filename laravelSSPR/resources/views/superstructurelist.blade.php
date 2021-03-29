
@extends('layouts.layout')

@section('title')
	Надстройки
@endsection

@section('content')

<main id="content">
	<div class="container">
		<h1>Список Надстроек</h1>

      	<div class="add-car-button">
        	<a class="btn btn-primary" href="superstructurecreate" role="button">Добавить</a>
      	</div>

	<table class="table table-bordered mb-5">
		<thead>
			<tr class="table-info">
				<th scope="col">ID</th>
				<th scope="col">Наименование</th>
				<th scope="col">Manage btns</th>
			</tr>
		</thead>
		<tbody>

			@foreach($supers as $super)
			<tr>
				<th scope="row">{{ $super->PK_Superstructure }}</th>
				<td>{{ $super->superstructureName }}</td>
				<td>
					<div class = "d-flex">
		                <!-- Админские кнопки редактирования и удаления -->
		                  <a class="btn btn-primary edit-btn"  href="superstructureedit_{{$super->PK_Superstructure}}" role="button">Изменить</a>
		                <form method="POST" action="superstructuredelete_{{ $super->PK_Superstructure }}">
		                  @method('DELETE')
		                  @csrf
		                  <button type="submit" class="btn edit" onclick="return confirm('Вы действительно хотите удалить запись?');">Удалить</button>
		                </form>
            		</div>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>

	<div class="justify-content-center">
		{{ $supers->links('pagination::bootstrap-4') }}
	</div>
	</div>
</main>

@endsection