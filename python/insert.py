from tkinter import *
from tkinter import messagebox
import mysql.connector
import datetime


def Ok():
    tip=e1.get()
    descriere=e2.get()
    '''data=e3.get()'''
    '''timp=e4.get()'''

    mysqldb = mysql.connector.connect(host="localhost",user="root",password="", database="reglog")
    mycursor= mysqldb.cursor()

    try:
        sql = "INSERT INTO anunturib(id,tip,descriere,data,timp) VALUES (%s,%s,%s,%s,%s)"
        val = ("",tip,descriere,data,data2)
        mycursor.execute(sql,val)
        mysqldb.commit()
        messagebox.showinfo("information","Record inserted succesfully!")

    except Exception as e:
        print(e)
        mysqldb.rollback()
        mysqldb.close()

        

root= Tk();
root.title("Anunturi")
root.geometry("300x250")
global e1
global e2
global e4


bg = PhotoImage(file = "mancareL2.png")
label1 = Label( root, image = bg)
label1.place(x = 0, y = 0, width=300, height=250)


Label(root,text="Tip cerere:").place(x=10,y=10)
Label(root,text="Descriere").place(x=10,y=40)
Label(root,text="Data publicare:").place(x=10,y=80)
Label(root,text="Data expirare:").place(x=10,y=120)

TodayDate = datetime.datetime.now()
data=datetime.datetime.strftime(TodayDate,'%d-%m-%Y')

TodayDate2 = datetime.datetime.now()
data2=datetime.datetime.strftime(TodayDate,'%H:%M')

l=Label(root,text=data)
l.place(x=148,y=80)

e1 = Entry(root)
e1.place(x=148,y=10)

e2 = Entry(root)
e2.place(x=148,y=40)


e4 = Label(root,text=data2)
e4.place(x=148,y=120)

Button(root,text="Add",command=Ok ,height=3, width=13).place(x=10,y=180)

root.mainloop()
