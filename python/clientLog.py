import mysql.connector

from tkinter import *
from tkinter import messagebox
from subprocess import call


def Ok():
    mydb = mysql.connector.connect(host="localhost",user="root",password="", database="reglog")
    mycursor= mydb.cursor()
    uname=e1.get()
    password=e2.get()
    
    sql = "SELECT * FROM userben WHERE username=%s AND password=%s"
    mycursor.execute(sql,[(uname),(password)])
    result= mycursor.fetchall()
    if result:
        messagebox.showinfo("","Login Succes")
        root.destroy()
        call(["python","insert.py"])
        return True
    else:
        messagebox.showinfo("","Date incorecte")
        return False

root = Tk()
root.title("Login")
root.geometry("220x130")
global e1
global e2

Label(root,text="Username").place(x=10,y=10)
Label(root,text="Password").place(x=10,y=40)

e1=Entry(root)
e1.place(x=80,y=10)

e2=Entry(root)
e2.place(x=80,y=40)
e2.config(show="*")

Button(root,text="Login",command=Ok, height=1,width=13).place(x=60,y=90)

root.mainloop()
