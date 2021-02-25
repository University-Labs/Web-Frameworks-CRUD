$(document).ready(function() {
	//Удаление элемента, исчезновение его блока через 2 сек. после успешного удаления
	$(".btn-erase").click(function(e){
		e.preventDefault();
		pk_car = $(this).data("pkcar");

		$.ajax({
			type: "DELETE",
			url: "/erasecar",
			headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
			data: { "PK_Car" : pk_car },
			success: function (data)
			{
				if(data.status == '1')
				{
					$("#car_"+ pk_car).html( '<div class="alert alert-success" role="alert">'+data.name+'</div>' );

					setTimeout(() => {
						//получаем следующий элемент(брата)
						var nextEl = $('#car_' + pk_car).next();

						//если он есть, то перемещаем его с удаляемым
						if(nextEl)
						{
							$('#car_' + pk_car).replaceWith(nextEl);
						}
					}, 2000);
				}
				else
				{
					alert("Error while delete car: " + data.name);
				}
			},
			error: function (msg) {
				alert(msg.responseJSON.message);
			},

		});
	});


	//предпросмотр автомобиля
	$(".btn-preview").click(function(e){
		e.preventDefault();

		pk_car = $(this).data("pkcar");

		$.ajax({
			type: "GET",
			url: "/previewcar_" + pk_car,
			success: function (data)
			{
				//успешно найдена модель в базе
				if(data.status === '1')
				{
					$('#modelInfo').text(data.modelName);
					$('#superstructureInfo').text(data.superstructure);
					$('#categoryInfo').text(data.category);
					$('#priceInfo').text(data.price);
					$('#yearInfo').text(data.year);
					$('#descriptionInfo').text(data.description);

				}
				else
				{
					//модель не была найдена
					alert("Ошибка: " + data.message);
				}
			},
			error: function(msg) {
				alert(msg.responseJSON.message);
				console.log(msg);
			},
		});
	});


	//форма добавления новых записей в бд
    $("#formStore").submit(function(e){
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "/createcar",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (data)
        {
        	//если запись успешно добавлена, выводим сообщение об этом
          if(data.status == '1')
          {
          	$("#formStore").before('<div class="alert alert-success" role="alert"><h4>Данные успешно добавлены</h4><p><a href="productinfo_'+data.PK_Car+'" class="alert-link">Перейти на страницу продукта</a></p><p> ИЛИ добавьте еще один продукт </p></div>');
          }
          else
          {
          	//иначе выводим информацию об ошибке
            alert(data.message);
          }
        },
        error: function (msg) {
          alert(msg.responseJSON.message);
        },
      });
    });
})
