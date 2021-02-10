from django.shortcuts import render
from django.http import HttpResponse
from .models import Car

def index(request):
    return render(request, "index.html")

def catalog(request):
    cars = Car.objects.all()
    return render(request, "catalog.html", {"cars" : cars})

def pageadmin(request):
    cars = Car.objects.all()
    return render(request, "pageadmin.html", {"cars" : cars})

def productinfo(request, carNumber):
    singleCar = Car.objects.get(pk_car=carNumber)
    return render(request, "productinfo.html", {"singleCar" : singleCar})
