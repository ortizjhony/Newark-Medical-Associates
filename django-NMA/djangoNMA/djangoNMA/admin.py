#This will allow us to see the data stored in the db.
#Add any new models to the myModels array.

from django.contrib import admin
from .models import Employee, Patient

class EmployeeAdmin(admin.ModelAdmin):
    readonly_fields = ('id',)

myModels = [Employee, Patient]
admin.site.register(myModels, EmployeeAdmin)