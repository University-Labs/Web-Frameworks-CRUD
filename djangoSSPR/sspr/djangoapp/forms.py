from django import forms
from .models import Car, Superstructure, Baseavto, Avtocategory

class CarForm(forms.ModelForm):
    pk_baseavto = forms.ModelChoiceField(queryset = Baseavto.objects.all(), empty_label=None, label="База")
    pk_baseavto.widget.attrs.update({'class' : 'form-control'})

    pk_superstructure = forms.ModelChoiceField(queryset = Superstructure.objects.all(), empty_label=None, label="Надстройка")
    pk_superstructure.widget.attrs.update({'class' : 'form-control'})

    pk_category = forms.ModelChoiceField(queryset = Avtocategory.objects.all(), empty_label=None, label="Категория")
    pk_category.widget.attrs.update({'class' : 'form-control'})

    imagepath = forms.ImageField(label = "Изображение", required=False)
    imagepath.widget.attrs.update({'class' : 'form-control'})

    price = forms.DecimalField(decimal_places = 2, label = "Цена")
    price.widget.attrs.update({'class' : 'form-control'})

    yearissue = forms.CharField(max_length=4, label="Год выпуска")
    yearissue.widget.attrs.update({'class' : 'form-control'})

    description = forms.CharField(label="Описание", widget=forms.Textarea, required=False)
    description.widget.attrs.update({'class' : 'form-control'})

    class Meta:
        model = Car
        fields = ['pk_baseavto', 'pk_superstructure', 'pk_category', 'price', 'imagepath', 'description']
