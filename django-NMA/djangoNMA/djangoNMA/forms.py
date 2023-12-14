from django.forms import ModelForm
from django import forms
from .models import Employee, Patient
from django.db.models import Q

class createEmployeeForm(ModelForm):
    empid = forms.TextInput()
    ssn = forms.TextInput()
    name = forms.TextInput()
    salary = forms.TextInput()
    gender = forms.TextInput()
    address = forms.TextInput()
    phone = forms.TextInput()
    jobType = forms.TextInput()

    class Meta:
        #meta data about our form
        model = Employee
        fields = ['empid','ssn','name','salary','gender','address','phone','jobType']

class searchEmployeeForm(forms.Form):
    query = forms.CharField(max_length=255, required=False)


class createPatientForm(ModelForm):
    pnum = forms.TextInput()
    ssn = forms.TextInput()
    name = forms.TextInput()
    dob = forms.TextInput()
    gender = forms.TextInput()
    address = forms.TextInput()
    bloodType = forms.TextInput()
   
    class Meta:
        #meta data about our form
        model = Patient
        fields = ['pnum','ssn','name','dob','gender','address','bloodType']

class searchPatientForm(forms.Form):
    query = forms.CharField(max_length=255, required=False)
 