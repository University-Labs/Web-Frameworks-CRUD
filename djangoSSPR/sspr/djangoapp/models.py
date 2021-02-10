from django.db import models
from django.urls import reverse

class Avtocategory(models.Model):
    pk_category = models.AutoField(db_column='PK_Category', primary_key=True) 
    namecategory = models.CharField(db_column='nameCategory', max_length=200)

    class Meta:
        db_table = 'AvtoCategory'

    def __str__(self):
        return self.namecategory


class Avtofirm(models.Model):
    pk_avtofirm = models.AutoField(db_column='PK_AvtoFirm', primary_key=True) 
    firmname = models.CharField(db_column='firmName', max_length=100)

    class Meta:
        db_table = 'AvtoFirm'

    def __str__(self):
        return self.firmname


class Baseavto(models.Model):
    pk_baseavto = models.AutoField(db_column='PK_BaseAvto', primary_key=True)
    modelname = models.CharField(db_column='modelName', max_length=200)
    pk_avtofirm = models.ForeignKey(Avtofirm, models.DO_NOTHING, db_column='PK_AvtoFirm', blank=True, null=True)

    class Meta:
        db_table = 'BaseAvto'

    def __str__(self):
        return self.pk_avtofirm.firmname + " - " + self.modelname


class Car(models.Model):
    pk_car = models.AutoField(db_column='PK_Car', primary_key=True)
    yearissue = models.DateField(db_column='yearIssue', blank=True, null=True)
    price = models.DecimalField(max_digits=15, decimal_places=2)
    imagepath = models.ImageField(db_column='imagePath', max_length=255, blank=True, null=True)
    description = models.TextField(blank=True, null=True)
    pk_baseavto = models.ForeignKey(Baseavto, models.DO_NOTHING, db_column='PK_BaseAvto')
    pk_superstructure = models.ForeignKey('Superstructure', models.DO_NOTHING, db_column='PK_Superstructure')
    pk_category = models.ForeignKey(Avtocategory, models.DO_NOTHING, db_column='PK_Category', blank=True, null=True)

    def get_absolute_url(self):
        return reverse('productinfo',args=[str(self.pk_car)])

    class Meta:
        db_table = 'Car'


class Superstructure(models.Model):
    pk_superstructure = models.AutoField(db_column='PK_Superstructure', primary_key=True) 
    supestructurename = models.CharField(db_column='supestructureName', max_length=200)  

    class Meta:
        db_table = 'Superstructure'

    def __str__(self):
        return self.supestructurename

