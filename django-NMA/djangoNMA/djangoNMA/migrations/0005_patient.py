# Generated by Django 4.2.7 on 2023-12-14 03:37

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('djangoNMA', '0004_delete_yourmodel'),
    ]

    operations = [
        migrations.CreateModel(
            name='Patient',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('pnum', models.IntegerField()),
                ('ssn', models.CharField(max_length=9)),
                ('name', models.CharField(max_length=200)),
                ('dob', models.CharField(max_length=10)),
                ('gender', models.CharField(max_length=1)),
                ('address', models.CharField(max_length=200)),
                ('bloodType', models.CharField(max_length=3)),
            ],
        ),
    ]
