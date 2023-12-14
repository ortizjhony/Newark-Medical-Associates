#This file will store classes for all tables we want to define in the DB.
#Don't forget to update admin.py and register model!

from django.db import models

class Employee(models.Model):
    #define attributes here
    #https://docs.djangoproject.com/en/4.2/ref/models/fields/ 

    empid = models.IntegerField()
    ssn = models.CharField(max_length=9)
    name = models.CharField(max_length=200)
    salary = models.IntegerField()
    gender = models.CharField(max_length=1)
    address = models.CharField(max_length=200)
    phone = models.CharField(max_length=12)
    jobType= models.CharField(max_length=40)

class Patient(models.Model):
    #define attributes here
    pnum = models.IntegerField()
    ssn = models.CharField(max_length=9)
    name = models.CharField(max_length=200)
    dob = models.CharField(max_length=10)
    gender = models.CharField(max_length=1)
    address = models.CharField(max_length=200)
    bloodType = models.CharField(max_length=3)
   


    