from django.http import Http404, HttpResponse
from django.shortcuts import redirect, render
from django.db.models import Q
from djangoNMA.forms import createEmployeeForm, searchEmployeeForm, createPatientForm, searchPatientForm
from djangoNMA.models import Employee, Patient



def home(request):
    return HttpResponse("ok")

def homePage(request):
    return render(request, 'nmaHomePage.html')

def createEmployee(request):
    if request.POST:
        form = createEmployeeForm(request.POST)
        print(request.POST)
        if form.is_valid(): 
            #this saves the information in the db
            form.save()
        return redirect(home)
    return render(request, 'employeeHTML/createEmployee.html', {'form' : createEmployeeForm})

# This view is to display all objects of the Employee table. Don't need this right now.
#def displayEmployees(request):
   # query_results= Employee.objects.all()
   # return render(request, 'employeeHTML/employeeManagement.html', locals())

def searchEmployee_view(request):
    form = searchEmployeeForm(request.GET)
    results = []

    if form.is_valid():
        query = form.cleaned_data['query']
        results = Employee.objects.filter(jobType__icontains=query)
    
    return render(request, 'employeeHTML/employeeManagement.html', {'form': form, 'results': results})

def createPatient(request):
    if request.POST:
        form = createPatientForm(request.POST)
        print(request.POST)
        if form.is_valid(): 
            #this saves the information in the db
            form.save()
        return redirect(home)
    return render(request, 'patientHTML/createPatient.html', {'form' : createPatientForm})


def searchPatient_view(request):
    form = searchPatientForm(request.GET)
    results = []

    if form.is_valid():
        query = form.cleaned_data['query']
        results = Patient.objects.filter(Q(name__icontains=query) | Q(ssn__icontains=query))
    
    return render(request, 'PatientHTML/PatientManagement.html', {'form': form, 'results': results})
