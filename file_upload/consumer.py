import pika
import sys
import MySQLdb
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication

credentials = pika.PlainCredentials('eprayoga', 'eprayoga@123')
parameters = pika.ConnectionParameters('localhost',
                                    5672,
                                   '/',
                                    credentials)
 
connection = pika.BlockingConnection(parameters)

channel = connection.channel()

channel.exchange_declare(exchange='erlangmail',
                         exchange_type='direct',
			durable=True)

result = channel.queue_declare(queue='mails',exclusive=True)
queue_name ='mails' 

channel.queue_bind(exchange='erlangmail',
queue=queue_name)

def connect_db(host,user,passwd,db):
      try:
         return MySQLdb.connect(host=host, user=user, passwd=passwd, db=db)
      except MySQLdb.Error, e:
         sys.stderr.write("[ERROR] %d: %s\n"% (e.args[0], e.args[1]))
         return False

def callback(ch, method, properties, body):
    	print(int(body))
    	temid = int(body)
	con=connect_db('127.0.0.1','root','root', 'eprayoga')
        cursor=con.cursor()
	query = "select * from sending_mail where id = "+str(temid)
	cursor.execute(query)
    	value = cursor.fetchone()
	print(value)
	email_id = value[1]
	template = value[2]
	status = value[3]
	pdf_link = value[4]
	type_mail = value[7]
	print(email_id,template,status,pdf_link,type_mail)
	if(type_mail == 'certification'):
		sender = 'vahaitesting@gmail.com'
		part2 = MIMEText(template, 'html')
		msg = MIMEMultipart()
		msg['From'] = sender
		msg['To'] = email_id
		msg['Subject'] = 'Hello'
		msg.attach(part2)
		msg.attach(MIMEApplication(file(pdf_link).read(),Content_Disposition='attachment; filename=certificate.pdf',
                Name='certificate.pdf'))
 		server = smtplib.SMTP('smtp.gmail.com', 587)
		server.starttls()
   	        server.login("vahaitesting@gmail.com", "vahai@123")
   		server.sendmail(sender, email_id, msg.as_string())
   		server.close()
  		print "Successfully sent email"
	elif(type_mail == 'registration'):
	 	print "registration"
		sender = 'vahaitesting@gmail.com'
		part2 = MIMEText(template, 'html')
		msg = MIMEMultipart()
		msg['From'] = sender
		msg['To'] = email_id
		msg['Subject'] = 'Hello'
		msg.attach(part2)
 		server = smtplib.SMTP('smtp.gmail.com', 587)
		server.starttls()
   	        server.login("vahaitesting@gmail.com", "vahai@123")
   		server.sendmail(sender, email_id, msg.as_string())
   		server.close()
  		print "Successfully sent email"
		
channel.basic_consume(callback,
                      queue=queue_name,
                      no_ack=True)

channel.start_consuming()
