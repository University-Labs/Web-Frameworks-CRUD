
@extends('layouts.layout')

@section('title')
	База спецтехники
@endsection

@section('content')
<main id="content">
	<div class="container">
		<h1>Список баз для спецтехники</h1>

      	<div class="add-car-button">
        	<a class="btn btn-primary" href="baseavtocreate" role="button">Добавить</a>
      	</div>

	<table class="table table-bordered mb-5">
		<thead>
			<tr class="table-info">
				<th scope="col">ID</th>
				<th scope="col">Наименование</th>
				<th scope="col">Автофирма</th>
				<th scope="col">Manage btns</th>
			</tr>
		</thead>
		<tbody>

			@foreach($bases as $base)
			<tr>
				<th scope="row">{{ $base->PK_BaseAvto }}</th>
				<td>{{ $base->modelName }}</td>
				<td>{{ $base->avtoFirm->firmName }}</td>
				<td>
					<div class = "d-flex">
		                <!-- Админские кнопки редактирования и удаления -->
		                  <a class="btn btn-primary edit-btn"  href="baseavtoedit_{{$base->PK_BaseAvto}}" role="button">Изменить</a>
		                <form method="POST" action="baseavtodelete_{{ $base->PK_BaseAvto }}">
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
		{{ $bases->links('pagination::bootstrap-4') }}
	</div>
	</div>
</main>

@endsection