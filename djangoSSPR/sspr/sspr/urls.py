"""sspr URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from djangoapp import views
from django.conf import settings
from django.conf.urls.static import static


urlpatterns = [
    # админ страница сайта (стандартная для джанго)
    path('admin', admin.site.urls),

    #главная страница
    path('', views.index, name="index"),
    path('index/', views.index, name="index1"),

    #каталог для пользователя
    path('catalog/', views.catalog, name="catalog"),

    #каталог для админа ( с удалением, добавлением, редактированием )
    path('pageadmin/', views.pageadmin, name="pageadmin"),

    #подробности продукта carNumber
    path('productinfo_<int:carNumber>/', views.productinfo, name="productinfo"),

    #удаление продукта carNumber
    path('erasecar_<int:carNumber>/', views.erasecar, name="erasecar"),

    #создание нового продукта
    path('createcar/', views.createcar, name="createcar"),

    #редактирование продукта carNumber
    path('editcar_<int:carNumber>/', views.editcar, name="editcar"),

]
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
