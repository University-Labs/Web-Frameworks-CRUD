
@extends('layouts.layout')

@section('title')
	Автомобильные фирмы
@endsection

@section('content')

<main id="content">
	<div class="container">
		<h1>Список Фирм авто</h1>

      	<div class="add-car-button">
        	<a class="btn btn-primary" href="avtofirmcreate" role="button">Добавить</a>
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

			@foreach($firms as $firm)
			<tr>
				<th scope="row">{{ $firm->PK_AvtoFirm }}</th>
				<td>{{ $firm->firmName }}</td>
				<td>
					<div class = "d-flex">
		                <!-- Админские кнопки редактирования и удаления -->
		                  <a class="btn btn-primary edit-btn"  href="avtofirmedit_{{$firm->PK_AvtoFirm}}" role="button">Изменить</a>
		                <form method="POST" action="avtofirmdelete_{{ $firm->PK_AvtoFirm }}">
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
		{{ $firms->links('pagination::bootstrap-4') }}
	</div>
	</div>
</main>

@endsection