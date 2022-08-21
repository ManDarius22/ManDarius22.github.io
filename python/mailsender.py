import smtplib, ssl
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication
from tkinter import *

import pandas as pd

def attach_file_to_email(email_message,filename):
    #open file for reading
    with open(filename,"rb")as f:
        file_attachment = MIMEApplication(f.read())
    #add header to attachment
    file_attachment.add_header(
        "Content-Disposition",
        f"attachment; filename={filename}",
    )
    #attach file to message
    email_message.attach(file_attachment)
    

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
email_to = 'dariudarius2000@gmail.com'

date_str= pd.Timestamp.today().strftime('%Y-%m-%d')

email_message=MIMEMultipart()
email_message['From']=email_from
email_message['To']= email_to
email_message['Subject']=f'ManCare application - {date_str}'

email_message.attach(MIMEText(html,"html"))

attach_file_to_email(email_message,'text.txt')

email_string=email_message.as_string()



context = ssl.create_default_context()
with smtplib.SMTP_SSL('smtp.gmail.com',465,context=context)as server:
    server.login(email_from,password)
    server.sendmail(email_from,email_to,email_string)
