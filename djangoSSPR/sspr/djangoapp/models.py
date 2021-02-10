from django.db import models
from django.urls import reverse

class Avtocategory(models.Model):
    pk_category = models.IntegerField(db_column='PK_Category', primary_key=True) 
    namecategory = models.CharField(db_column='nameCategory', max_length=200)

    class Meta:
        managed = False
        db_table = 'AvtoCategory'


class Avtofirm(models.Model):
    pk_avtofirm = models.IntegerField(db_column='PK_AvtoFirm', primary_key=True) 
    firmname = models.CharField(db_column='firmName', max_length=100)

    class Meta:
        managed = False
        db_table = 'AvtoFirm'


class Baseavto(models.Model):
    pk_baseavto = models.IntegerField(db_column='PK_BaseAvto', primary_key=True)
    modelname = models.CharField(db_column='modelName', max_length=200)
    pk_avtofirm = models.ForeignKey(Avtofirm, models.DO_NOTHING, db_column='PK_AvtoFirm', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'BaseAvto'


class Car(models.Model):
    pk_car = models.IntegerField(db_column='PK_Car', primary_key=True)
    yearissue = models.DateField(db_column='yearIssue', blank=True, null=True)
    price = models.DecimalField(max_digits=15, decimal_places=2)
    imagepath = models.CharField(db_column='imagePath', max_length=255, blank=True, null=True)
    description = models.TextField(blank=True, null=True)
    pk_baseavto = models.ForeignKey(Baseavto, models.DO_NOTHING, db_column='PK_BaseAvto')
    pk_superstructure = models.ForeignKey('Superstructure', models.DO_NOTHING, db_column='PK_Superstructure')
    pk_category = models.ForeignKey(Avtocategory, models.DO_NOTHING, db_column='PK_Category', blank=True, null=True)

    def get_absolute_url(self):
        return reverse('productinfo',args=[str(self.pk_car)])


    class Meta:
        managed = False
        db_table = 'Car'
        unique_together = (('pk_car', 'pk_baseavto', 'pk_superstructure'),)


class Superstructure(models.Model):
    pk_superstructure = models.IntegerField(db_column='PK_Superstructure', primary_key=True) 
    supestructurename = models.CharField(db_column='supestructureName', max_length=200)  

    class Meta:
        managed = False
        db_table = 'Superstructure'
