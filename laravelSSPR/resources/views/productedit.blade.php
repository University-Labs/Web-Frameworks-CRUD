<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><%= title %></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Подключаем шрифты -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">

  </head>
  <body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>

    <%- include("partials/_header.ejs") %>

    <main id="content">
      <div class="container">

        <h1><%= title %></h1>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group edit-fields">
            <input type="hidden" name="pk_car" value="<%= curObj.PK_Car %>" >
            <label for="baseavto">Модель базы</label>
            <select required name="baseavto" type="text" class="form-control" placeholder="Укажите название модели">
              <%for(var i = 0; i < bases.length; i++) {%>

              <option <% if (bases[i].PK_BaseAvto == curObj.PK_BaseAvto) {%> selected <% } %>
                        id = "PK_BaseAvto" name="PK_BaseAvto" value="<%= bases[i].PK_BaseAvto %>">
                <%= bases[i].AvtoFirm.firmName %> - <%= bases[i].modelName %>
              </option>
              <% } %>
            </select>
          </div>

          <div class="form-group edit-fields">
            <label for="superstructure">Надстройка</label>
            <select required name="superstructure" type="text" class="form-control" placeholder="Выберите надстройку">
              <%for(var i = 0; i < superstructures.length; i++) {%>
              <option <% if (superstructures[i].PK_Superstructure == curObj.PK_Superstructure) {%> selected <% } %>
                        id = "PK_Superstructure" name="PK_Superstructure" value="<%= superstructures[i].PK_Superstructure %>">
                <%= superstructures[i].superstructureName %>
              </option>
              <% } %>
            </select>
          </div>

          <div class="form-group edit-fields">
            <label for="category">Категория</label>
            <select required name="category" type="text" class="form-control" placeholder="Выберите категорию">
              <%for(var i = 0; i < categories.length; i++) {%>
              <option <% if (categories[i].PK_Category == curObj.PK_Category) {%> selected <% } %>
                        id = "PK_Category" name="PK_Category" value="<%= categories[i].PK_Category %>">
                <%= categories[i].nameCategory %>
              </option>
              <% } %>
            </select>
          </div>

          <div class="form-group edit-fields">
            <label for="price">Цена</label>
            <input required name="price" type="number" class="form-control" placeholder="Укажите цену" value= <%= curObj.price %>>
          </div>

          <div class="form-group edit-fields">
            <label for="yearissue">Год производства</label>
            <input required name="yearissue" type="number" class="form-control" placeholder="Введите год" value= <%= curObj.yearissue %>>
          </div>

          <div class="form-group edit-fields">
            <label for="imagePath">Фото</label>
            <input name = "wallpaper" type="file" class="chooseFile form-control-file" placeholder="Выберите фото" value= <%= curObj.imagepath %>>
          </div>

          <div class="form-group edit-fields">
            <label for="description">Описание</label>
            <textarea class="description form-control" name="description"><%= curObj.description %></textarea></p>
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>


    <%- include("partials/_footer.ejs") %>


  </body>
</html>