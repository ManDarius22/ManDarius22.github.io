import tkinter as tk
from tkinter import *
from tkinter import ttk
import mysql.connector
from tkinter import messagebox
import pymysql

import smtplib, ssl
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication
import pandas as pd


    

mydb = mysql.connector.connect(host="localhost",user="root",password="", database="reglog")
mycursor= mydb.cursor()

sql = "SELECT * FROM beneficiari"
mycursor.execute(sql)
row= mycursor.fetchall()

def mail():
    html= '''
        <html>
            <body>
                <h1>Ne bucuram sa va anuntam ca ati fost acceptati in programul nostru de intrajutorare!</h1>
                <p>Mai jos atasat acestui email puteti gasii softul nostru.</p>
                <p>https://we.tl/t-UI0irOS0Ao</p>
                <p>O zi buna,</p>
                <p>ManCare</p>
            </body>
        </html>
    '''
    email_from = 'mancare2022@gmail.com'
    password = 'dariuscool112'
    email_to = emailadr.get()

    date_str= pd.Timestamp.today().strftime('%Y-%m-%d')

    email_message=MIMEMultipart()
    email_message['From']=email_from
    email_message['To']= email_to
    email_message['Subject']=f'ManCare application - {date_str}'

    email_message.attach(MIMEText(html,"html"))


    email_string=email_message.as_string()



    context = ssl.create_default_context()
    with smtplib.SMTP_SSL('smtp.gmail.com',465,context=context)as server:
        server.login(email_from,password)
        server.sendmail(email_from,email_to,email_string)

def delete():
    try:
        con=pymysql.connect(user='root', password='', host='localhost',database='reglog')
        cur = con.cursor()
        sql = "DELETE FROM beneficiari WHERE id='%s'"%(idb.get())
        cur.execute(sql)
        con.commit()
        con.close()
        messagebox.showinfo('Succes','Record delete')
    except:
        messagebox.showinfo('Error','failed to delete')

def deleteAnuntBen():
    try:
        con=pymysql.connect(user='root', password='', host='localhost',database='reglog')
        cur = con.cursor()
        sql = "DELETE FROM anunturibeneficiari WHERE id='%s'"%(idbanunt.get())
        cur.execute(sql)
        con.commit()
        con.close()
        messagebox.showinfo('Succes','Record delete')
    except:
        messagebox.showinfo('Error','failed to delete')
    



global e1

win = Tk()

idb=StringVar()
idbanunt=StringVar()
emailadr=StringVar()

tv = ttk.Treeview(columns=(1,2,3,4,5,6), show="headings",height="6")
tv.pack()


tv.heading(1, text="ID:")
tv.heading(2, text="Email")
tv.heading(3, text="Nume")
tv.heading(4, text="Cui")
tv.heading(5, text="Tip")
tv.heading(6, text="Adresa")



for i in row:
    tv.insert('','end',values=i)

l3=Label(win,text='ID: ')
l3.place(x=100,y=170)
e3=Entry(win,textvariable=idb)
e3.place(x=140,y=170)
b3=Button(win,text='Delete ', command=delete)
b3.place(x=280,y=170) 

l4=Label(win,text='Email: ')
l4.place(x=600,y=170)
e4=Entry(win,textvariable=emailadr)
e4.place(x=650,y=170)
b4=Button(win,text='Send ', command=mail)
b4.place(x=780,y=170)



tv2= ttk.Treeview(columns=(1,2,3,4), show="headings",height="4")
tv2.place(x=25,y=260)

tv2.heading(1, text="ID:")
tv2.heading(2, text="Username")
tv2.heading(3, text="Tip")
tv2.heading(4, text="Descriere")

l5=Label(win, text="ID: ")
l5.place(x=100,y=380)
e5=Entry(win,textvariable=idbanunt)
e5.place(x=140,y=380)
b5=Button(win,text='Delete ', command=deleteAnuntBen)
b5.place(x=280,y=380)


sql2 = "SELECT * FROM anunturibeneficiari"
mycursor.execute(sql2)
row2= mycursor.fetchall()

for i in row2:
    tv2.insert('','end',values=i)


win.title("Registrations")
win.geometry("1250x520")
win.resizable(False, False);


win.mainloop()
