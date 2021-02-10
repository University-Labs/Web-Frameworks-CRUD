from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from .models import Car
from .forms import CarForm

def index(request):
    # Главная
    return render(request, "index.html")

def catalog(request):
    # Каталог товаров
    cars = Car.objects.all()
    return render(request, "catalog.html", {"cars" : cars})

def pageadmin(request):
    # Страница админа (с добавление, редактированием, удалением)
    cars = Car.objects.all()
    return render(request, "pageadmin.html", {"cars" : cars})

def productinfo(request, carNumber):
    # Подробности конкретного продукта
    singleCar = Car.objects.get(pk_car=carNumber)
    return render(request, "productinfo.html", {"singleCar" : singleCar})

def erasecar(request, carNumber):
    # Удаление продукта
    carObject = Car.objects.get(pk_car = carNumber)
    carObject.delete()
    return HttpResponseRedirect('/pageadmin')

def createcar(request):
    # Создание продукта
    if request.method == 'POST':
        # Создание формы с уже готовыми параметрами
        form = CarForm(request.POST, request.FILES)
        if form.is_valid():
            #сохранение без создания модели в базе
            newCar = form.save(commit=False)
            newCar.yearissue = request.POST.get("yearissue") + "-01-01"
            #запись в базу
            newCar.save()

            #переход к админской странице
            return HttpResponseRedirect('/pageadmin')

    # Создание пустой формы
    form = CarForm()
    return render(request, "productedit.html", {'form' : form})
        
def editcar(request, carNumber):
    # Редактирование продукта
    # получение редактируемого продукта
    editingCar = Car.objects.get(pk_car = carNumber)

    if request.method == 'POST':
        #Создание формы с уже готовыми параметрами
        form = CarForm(request.POST, request.FILES)

        if form.is_valid():

            #изменение полей
            editingCar.pk_baseavto = form.cleaned_data["pk_baseavto"]
            editingCar.pk_superstructure = form.cleaned_data["pk_superstructure"]
            editingCar.pk_category = form.cleaned_data["pk_category"]
            editingCar.price = form.cleaned_data["price"]
            editingCar.yearissue = form.cleaned_data["yearissue"] + "-01-01"
            editingCar.description = form.cleaned_data["description"]
            editingCar.imagepath = form.cleaned_data["imagepath"]
            
            # запись модели
            editingCar.save()
            return HttpResponseRedirect('/pageadmin')

    #создание формы с заполнением полей данными модели
    form = CarForm(instance=editingCar, initial={ 'yearissue' : editingCar.yearissue.strftime("%Y")[editingCar.yearissue.strftime("%Y").find("-") + 1 : ] if editingCar.yearissue  else ""})
    return render(request, "productedit.html", {'form' : form, 'pk' : editingCar.pk_car})