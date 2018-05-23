'''
Before execute this script, Please confirm following modules installed in your server or system
pyinotify, requests,MySQL-python
'''
import pyinotify
import requests
import base64 
import os
import json
import MySQLdb
import sys
import xlrd
import time
import datetime
from pathlib import Path
#open a database connection
def connect_db(host,user,passwd,db):
      try:
         return MySQLdb.connect(host=host, user=user, passwd=passwd, db=db)
      except MySQLdb.Error, e:
         # sys.stderr.write("[ERROR] %d: %s\n"% (e.args[0], e.args[1]))
         # sys.exit(1)
         return False


def ext_check(filename, ext):
           
      #Extension check 
      if(filename.endswith(tuple(ext))):
         print "Success connection with files"
      
      else:
         print "file %s is not authorized xlsx files" % filename
#                   sys.exit("File format not supported")

def get_result(query):
        con=connect_db('127.0.0.1','root','vahai', 'eprayoga')
        cursor=con.cursor()
        print "check the result from the db"                               
        row=[]
        try:
         cursor.execute(query)
         results = cursor.fetchall()
         print "check the results", results
         for row in results:  
             print "for checking the row", row         
             print "rows", row
             return  row
        except MySQLdb.Error, e:
               sys.stderr.write("[ERROR] %d: %s\n" % (e.args[0], e.args[1]))
               sys.exit(1)


def getid_bypath(event):
        print "For checking the path from getid_bypath", event.pathname
        event_splitter='upload'
        #event_splitter='upload'
        #Splitting document path using below line 
        eventpath=event.pathname[event.pathname.index(event_splitter) + len(event_splitter):]
        print "checking the file path", eventpath
        filename=os.path.basename(event.pathname)
        
        #To get the file extension type
        #ftype=filename.split(".")[-1]
        #file_type=ftype.upper()
        
        #ext_types=['.xlsx']
        #path=os.path.dirname(eventpath)
        #Title=os.path.splitext(filename)[0]
        #Regulation_data=path.split(os.sep)
        #ext_check(filename,ext_types)  
      #  os.close(filename)
        return filename 

def codegeneration():
    ts = int(time.time())  # this removes the decimals

    # convert the timestamp to a datetime object if you want to extract the date
    d = datetime.datetime.fromtimestamp(ts)
    #remove - in timestamp 
    return d.strftime("%Y%m%d%H%M%S")


#Section For handling cru section modify, access section
class MyEventHandler(pyinotify.ProcessEvent):
   
    def process_IN_CLOSE_WRITE(self, event):
       
        #Generate base64 encoding for file
        print "CLOSE_WRITE event:", event.pathname
        print "before closing"

        d = getid_bypath(event)
        print "d[0] section", d
        print "test"
        # sys.exit("stop here");

        
        book = xlrd.open_workbook(event.pathname)
 
        # print number of sheets
        print book.nsheets
         #database connect
        con=connect_db('127.0.0.1','root','root', 'eprayoga')
        cursor=con.cursor()
        cursor.execute("select clnt_id,clnt_group_id,file_category_type,user_profile_id from bl_file where status = 'upload' and file_name ='"+d+"'")
        result = cursor.fetchone()
        print result
        clnt_id = result[0]
        clnt_group_id = result[1]
        file_category_type = result[2]
        user_profile_id = result[3]
        # print sheet names
        
        for i in range (0,book.nsheets):

            sheetname =  str(book.sheet_names()[i])
            print sheetname

            if(file_category_type == 1):
                    # get the first worksheet
                    sheet = book.sheet_by_index(i)
                    
                    # read a row
                    print sheet.row_values(0)

                    #database connect
                    con=connect_db('127.0.0.1','root','root', 'eprayoga')
                    cursor=con.cursor()

                    #generate code 
                    code = 0
                    
                    #query for category insert
                    query = """INSERT INTO bl_category (category_name,category_description,category_code,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s, %s, %s, %s)"""
                    generate_code = codegeneration()
                    category_prefix = "BLSCT" 
                    # read a cell and starting at row 2 to skip the headers
                    for r in range(1, sheet.nrows):
                          category_name = sheet.cell(r,0).value
                          category_description = sheet.cell(r,1).value
                          
                          code +=1
                          final_code = int(generate_code) + code
                          category_code = category_prefix + str(final_code)
                          final_code = ''
                          cursor.execute("select count(category_id) from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                          result = cursor.fetchone()
                          #print result
                          if (int(result[0]) >=1):
                            print "already exist"
                          else:
                              if(category_name!= '' and category_description != ''):
                                    # Assign values from each row
                                    values = (category_name,category_description, category_code,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                    print values
                                    # Execute sql Query
                                    cursor.execute(query, values)
                                    #time.sleep(1)
                    # Close the cursor
                    cursor.close()

                    # Commit the transaction
                    con.commit()

                    # Close the database connection
                    con.close()

            elif(file_category_type == 2):
                    # get the first worksheet
                    sheet = book.sheet_by_index(i)
                    
                    # read a row
                    print sheet.row_values(0)

                    #database connect
                    con=connect_db('127.0.0.1','root','root', 'eprayoga')
                    cursor=con.cursor()

                    #generate code 
                    code = 0
                    
                    #query for subject insert
                    query = """INSERT INTO bl_subject (subject_name,sub_description,subject_code,category_id,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s, %s, %s, %s)"""
                    query1 = """INSERT INTO bl_category (category_name,category_description,category_code,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s, %s, %s, %s)"""
                    generate_code = codegeneration()
                    category_prefix = "BLSCT" 
                    subject_prefix = "BLSUB" 
                    # read a cell and starting at row 2 to skip the headers
                    for r in range(1, sheet.nrows):
                          subject_name = sheet.cell(r,0).value
                          subject_description = sheet.cell(r,1).value
                           
                          code +=1
                          final_code = int(generate_code) + code
                          category_code = category_prefix + str(final_code)
                          subject_code = subject_prefix + str(final_code)
                          category_name = sheet.cell(r,2).value
                          cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                          category_id = cursor.fetchone()
                          #print category_id
                          if(category_id is None):
                             values = (category_name,"category_description", category_code,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                             cursor.execute(query1, values)
                             cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                             category_id = cursor.fetchone()
                          category_id = int(category_id[0])
                          cursor.execute("select count(subject_id) from bl_subject where is_deleted=0 and is_active=1 and subject_name ='"+subject_name+"'")
                          result = cursor.fetchone()
                          if (int(result[0]) >= 1):
                            print "already exist"
                          else:
                              if(subject_name!= '' and subject_description != '' and category_id!= ''):
                                    # Assign values from each row
                                    values = (subject_name,subject_description, subject_code,category_id,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                    print values
                                    # Execute sql Query
                                    cursor.execute(query, values)
                                    #time.sleep(1)
                    # Close the cursor
                    cursor.close()

                    # Commit the transaction
                    con.commit()

                    # Close the database connection
                    con.close()

            elif(file_category_type == 3):
                    # get the first worksheet
                    sheet = book.sheet_by_index(i)
                    
                    # read a row
                    print sheet.row_values(0)
                    #database connect
                    con=connect_db('127.0.0.1','root','root', 'eprayoga')
                    cursor=con.cursor()

                    #generate code 
                    code = 0
                    generate_code = codegeneration()
                    category_prefix = "BLSCT" 
                    subject_prefix = "BLSUB" 
                    topic_prefix = "BLTOP" 
                    #query for subject insert
                    query = """INSERT INTO bl_topic (topic_name,topic_description,topic_code,category_id,subject_id,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s,%s, %s, %s, %s)"""
                    query2 = """INSERT INTO bl_subject (subject_name,sub_description,subject_code,category_id,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s, %s, %s, %s)"""
                    query1 = """INSERT INTO bl_category (category_name,category_description,category_code,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s, %s, %s, %s)"""
                    # read a cell and starting at row 2 to skip the headers
                    for r in range(1, sheet.nrows):
                          topic_name = sheet.cell(r,0).value
                          topic_description = sheet.cell(r,1).value
                          code +=1
                          final_code = int(generate_code) + code
                          category_code = category_prefix + str(final_code)
                          subject_code = subject_prefix + str(final_code)
                          topic_code = topic_prefix + str(final_code)
                          category_name = sheet.cell(r,2).value
                          subject_name = sheet.cell(r,3).value
                          
                          cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                          category_id = cursor.fetchone()
                          if(category_id is None):
                             values = (category_name,"category_description", category_code,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                             cursor.execute(query1, values)
                             con.commit()
                             cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                             category_id = cursor.fetchone()
                          category_id = int(category_id[0])
                          cursor.execute("select subject_id from bl_subject where is_deleted=0 and is_active=1 and subject_name ='"+subject_name+"'")
                          subject_id = cursor.fetchone()
                          if(subject_id is None):
                             values = (subject_name,"subject_description", subject_code,category_id,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                             cursor.execute(query2, values)
                             cursor.execute("select subject_id from bl_subject where is_deleted=0 and is_active=1 and subject_name ='"+subject_name+"'")
                             subject_id = cursor.fetchone()
                             con.commit()
                          subject_id = int(subject_id[0])
                          #if(subject_id == 0)

                          cursor.execute("select count(topic_id) from bl_topic where is_deleted=0 and is_active=1 and topic_name ='"+topic_name+"'")
                          result = cursor.fetchone()
                          if (int(result[0]) >= 1):
                            print "already exist"
                          else:
                              if(topic_name != '' and subject_id!= '' and topic_description != '' and category_id!= ''):
                                    # Assign values from each row
                                    values = (topic_name,topic_description, topic_code,category_id,subject_id,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                    print values
                                    # Execute sql Query
                                    cursor.execute(query, values)
                                   # time.sleep(1)
                    # Close the cursor
                    cursor.close()

                    # Commit the transaction
                    con.commit()

                    # Close the database connection
                    con.close()
            elif(file_category_type == 4):

                    # get the first worksheet
                    sheet = book.sheet_by_index(i)
                    
                    # read a row
                    print sheet.row_values(0)

                    #database connect
                    con=connect_db('127.0.0.1','root','root', 'eprayoga')
                    cursor=con.cursor()

                    #generate code 
                    code = 0
                    print sheet.nrows
                    #query for category insert
                    query1 = """INSERT INTO bl_category (category_name,category_description,category_code,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s, %s, %s, %s)"""
                    query2 = """INSERT INTO bl_subject (subject_name,sub_description,subject_code,category_id,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s, %s, %s, %s)"""
                    query3 = """INSERT INTO bl_topic (topic_name,topic_description,topic_code,category_id,subject_id,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s,%s, %s, %s, %s)"""
                    query4 = """ INSERT INTO bl_question_master(category_id,subject_id,topic_id,difficulty_level_id,descriptive,pos_marks,neg_marks,weightage,question_type_id,question_txt_format,tips,question_code,clnt_id,clnt_group_id,last_update_user_id,created_by_user_id) VALUES (%s, %s, %s,%s,%s,%s, %s, %s,%s, %s, %s,%s,%s,%s,%s,%s)"""
                    query5 = """ INSERT INTO bl_question_option(question_id,question_option_txt,created_by_user_id, last_update_user_id,option_group)  VALUES (%s, %s, %s,%s,%s) """
                    query6 = """ INSERT INTO bl_question_answer(question_id,question_answer_txt, created_by_user_id,last_update_user_id)  VALUES (%s, %s, %s,%s) """
                   
                    generate_code = codegeneration()
                    category_prefix = "BLSCT" 
                    subject_prefix = "BLSUB" 
                    topic_prefix = "BLTOP" 
                    question_prefix = "BLQST" 
                    # read a cell and starting at row 2 to skip the headers
                    for r in range(1, sheet.nrows):
                          question_type = sheet.cell(r,0).value
                          category_name = sheet.cell(r,1).value
                          subject_name = sheet.cell(r,2).value
                          topic_name = sheet.cell(r,3).value
                          complexity_level = sheet.cell(r,4).value
                          descriptive = sheet.cell(r,5).value
                          total_marks =  sheet.cell(r,6).value
                          negative_marks = sheet.cell(r,7).value
                          weightage = sheet.cell(r,8).value
                          question = sheet.cell(r,9).value
                          tips = sheet.cell(r,10).value
                          key_answer1 = key_answer2 = key_answer3 =  key_answer4 = key_answer5 =  key_answer6 = key_answer7 = ''
                          option1 = option2 = option3 = option4 = option5 = option6 = option7 = ''
                          crctanswser1 = crctanswser2 = crctanswser3 = crctanswser4 = crctanswser5 = crctanswser6 = crctanswser7 = ''
                          optiongroup = []
                          filloption = []
                          fillanswer = ''
                          cellcount = 10
                          skip1 = skip2 = 0
                          if(question_type == 1):
                              option1 = sheet.cell(r,11).value
                              option2 = sheet.cell(r,12).value
                              option3 = sheet.cell(r,13).value
                              option4 = sheet.cell(r,14).value
                              option5 = sheet.cell(r,15).value
                              option6 = sheet.cell(r,16).value
                              option7 = sheet.cell(r,17).value 
                              key_answer1 = sheet.cell(r,18).value
                          elif(question_type == 3):
                              key_answer1 = sheet.cell(r,18).value
                              option1 = "True"
                              option2 = "False"
                          elif(question_type == 4):
                              key_answer1 = sheet.cell(r,18).value
                              option1 = "Yes"
                              option2 = "No"
                          elif(question_type == 6):
                              key_answer1 = sheet.cell(r,18).value
                              option1 = sheet.cell(r,18).value
                          elif(question_type == 2 or question_type == 7 ):
                              option1 = sheet.cell(r,11).value
                              option2 = sheet.cell(r,12).value
                              option3 = sheet.cell(r,13).value
                              option4 = sheet.cell(r,14).value
                              option5 = sheet.cell(r,15).value
                              option6 = sheet.cell(r,16).value
                              option7 = sheet.cell(r,17).value 
                              key_answer1 = sheet.cell(r,18).value
                              key_answer2 = sheet.cell(r,19).value
                              key_answer3 = sheet.cell(r,20).value
                              key_answer4 = sheet.cell(r,21).value
                              key_answer5 = sheet.cell(r,22).value
                              key_answer6 = sheet.cell(r,23).value
                              key_answer7 = sheet.cell(r,24).value
                          #contributed_by = sheet.cell(r,19).value
                          elif(question_type == 5):
                              countvalue = question.count("___")
                              for i in range(0,countvalue):
                                  cellcount = cellcount+1
                                  optiongroup.append(sheet.cell(r,cellcount).value)
                              for j in range(0,len(optiongroup)):
                                  nested = ''
                                  skip1 = 0
                                  for k in range(0,int(optiongroup[j])):
                                     cellcount = cellcount+1
                                     print k,j
                                     if skip1 == 0:
                                          nested = sheet.cell(r,cellcount).value
                                          skip1 = 10
                                     else:
                                          nested = nested + '<fziu>'+ sheet.cell(r,cellcount).value
                                  filloption.append(nested)
                                  print filloption
                              for k in range(0,len(optiongroup)):
                                 cellcount = cellcount+1
                                 print k,j
                                 if skip1 == 0:
                                       fillanswer = sheet.cell(r,cellcount).value
                                       skip2 = 10
                                 else:
                                       fillanswer = fillanswer + '<fziu>'+ sheet.cell(r,cellcount).value  
                              print fillanswer
                          elif(question_type == 9 ):
                              option1 = sheet.cell(r,11).value
                              option2 = sheet.cell(r,12).value
                              option3 = sheet.cell(r,13).value
                              option4 = sheet.cell(r,14).value
                              option5 = sheet.cell(r,15).value
                              option6 = sheet.cell(r,16).value
                              option7 = sheet.cell(r,17).value 
                              key_answer1 = sheet.cell(r,18).value
                              key_answer2 = sheet.cell(r,19).value
                              key_answer3 = sheet.cell(r,20).value
                              key_answer4 = sheet.cell(r,21).value
                              key_answer5 = sheet.cell(r,22).value
                              key_answer6 = sheet.cell(r,23).value
                              key_answer7 = sheet.cell(r,24).value
                              crctanswser1 = sheet.cell(r,25).value
                              crctanswser2 = sheet.cell(r,26).value
                              crctanswser3 = sheet.cell(r,27).value
                              crctanswser4 = sheet.cell(r,28).value
                              crctanswser5 = sheet.cell(r,29).value
                              crctanswser6 = sheet.cell(r,30).value
                              crctanswser7 = sheet.cell(r,31).value
                          elif(question_type == 8 ):
                              option1 = sheet.cell(r,11).value
                              option2 = sheet.cell(r,12).value
                              option3 = sheet.cell(r,13).value
                              option4 = sheet.cell(r,14).value
                              option5 = sheet.cell(r,15).value
                              option6 = sheet.cell(r,16).value
                              option7 = sheet.cell(r,17).value 
                              key_answer1 = sheet.cell(r,18).value
                              key_answer2 = sheet.cell(r,19).value
                              key_answer3 = sheet.cell(r,20).value
                              key_answer4 = sheet.cell(r,21).value
                              key_answer5 = sheet.cell(r,22).value
                              key_answer6 = sheet.cell(r,23).value
                              key_answer7 = sheet.cell(r,24).value
                              crctanswser1 = sheet.cell(r,25).value
                              
                          code +=1
                          final_code = int(generate_code) + code
                          category_code = category_prefix + str(final_code)
                          subject_code = subject_prefix + str(final_code)
                          topic_code = topic_prefix + str(final_code)
                          question_code = question_prefix + str(final_code)


                          cursor.execute("select count(category_id) from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                          result = cursor.fetchone()
                          #print result
                          if (result == 1000000):
                            print "already exist"
                          else:
                              cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                              category_id = cursor.fetchone()
                              print category_id
                              if(category_id is None):
                                 values = (category_name,"category_description", category_code,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                 cursor.execute(query1, values)
                                 cursor.execute("select category_id from bl_category where is_deleted=0 and is_active=1 and category_name ='"+category_name+"'")
                                 category_id = cursor.fetchone()

                              category_id = int(category_id[0])
                              cursor.execute("select subject_id from bl_subject where is_deleted=0 and is_active=1 and subject_name ='"+subject_name+"'")
                              subject_id = cursor.fetchone()
                              if(subject_id is None):
                                 values = (subject_name,"subject_description", subject_code,category_id,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                 cursor.execute(query2, values)
                                 cursor.execute("select subject_id from bl_subject where is_deleted=0 and is_active=1 and subject_name ='"+subject_name+"'")
                                 subject_id = cursor.fetchone()
                              subject_id = int(subject_id[0])
                              cursor.execute("select topic_id from bl_topic where topic_name ='"+topic_name+"'")
                              topic_id = cursor.fetchone()
                              if(topic_id is None):
                                 values = (topic_name,"topic_description", topic_code,category_id,subject_id,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                 cursor.execute(query3, values)
                                 cursor.execute("select topic_id from bl_topic where is_deleted=0 and is_active=1 and topic_name ='"+topic_name+"'")
                                 topic_id = cursor.fetchone()
                              topic_id = int(topic_id[0])
                              cursor.execute("select difficulty_level_id from bl_difficulty_level_master where difficulty_level_name ='"+complexity_level+"'")
                              complexity_id = cursor.fetchone()
                              print option1
                              if(category_id != '' and subject_id!= '' and topic_id != '' and descriptive!= '' and complexity_id!= '' and total_marks!= '' and negative_marks!= '' and weightage!= '' and question_type!= '' and question != '' ):
                                  # Assign values from each row
                                  values = (category_id,subject_id,topic_id,complexity_id,descriptive,total_marks,negative_marks,weightage,question_type,question,tips,question_code,clnt_id,clnt_group_id,user_profile_id,user_profile_id)
                                  print values
                                  # Execute sql Query
                                  cursor.execute(query4, values)
                                  lastrowid = cursor.lastrowid
                                  print lastrowid
                                  if(question_type == 1 or question_type == 2 or question_type == 3 or question_type == 4 or question_type == 7 or question_type == 6):
                                        if (key_answer1 != '' and option1 != ''):
                                            if option1 != '':
                                                values = (lastrowid, option1 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if option2 != '':
                                                values = (lastrowid, option2 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if option3 != '':
                                                values = (lastrowid, option3 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if option4 != '':
                                                values = (lastrowid, option4 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if option5 != '':
                                                values = (lastrowid, option5 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if option6 != '':
                                                values = (lastrowid, option6 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)
                                            
                                            if option7 != '':
                                                values = (lastrowid, option7 ,user_profile_id,user_profile_id,'A')
                                                print values
                                                cursor.execute(query5,values)

                                            if key_answer1 != '':
                                               keyconcat = key_answer1

                                            if key_answer2 != '':
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer2

                                            if key_answer3 != '':
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer3

                                            if key_answer4 != '':
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer4

                                            if key_answer5 != '':
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer5

                                            if key_answer6 != '':
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer6

                                            if key_answer7 != '' :
                                               keyconcat =  keyconcat+ '<fziu>' + key_answer7
                                            
                                            values = (lastrowid, keyconcat ,user_profile_id,user_profile_id)
                                            cursor.execute(query6,values)
                                            print values
                                  elif(question_type == 9):
                                        if option1 != '':
                                            optionconcat = option1

                                        if option2 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option2

                                        if option3 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option3
                                        if option4 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option4

                                        if option5 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option5

                                        if option6 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option6
                                        
                                        if option7 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option7

                                        if key_answer1 != '':
                                           keyconcat = key_answer1

                                        if key_answer2 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer2

                                        if key_answer3 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer3

                                        if key_answer4 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer4

                                        if key_answer5 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer5

                                        if key_answer6 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer6

                                        if key_answer7 != '' :
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer7

                                        values = (lastrowid, optionconcat ,user_profile_id,user_profile_id,'column-1')
                                        print values
                                        cursor.execute(query5,values)
                                        values = (lastrowid, keyconcat ,user_profile_id,user_profile_id,'column-2')
                                        cursor.execute(query5,values)
                                        print values

                                        if crctanswser1 != '' and option1 != '':
                                           crctconcat = option1 + '<fziu>' + crctanswser1
                                           
                                        if crctanswser2 != ''  and option2 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option2 + '<fziu>' + crctanswser2
                                           
                                        if crctanswser3 != '' and option3 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option3 + '<fziu>' + crctanswser3
                                           
                                        if crctanswser4 != '' and option4 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option4 + '<fziu>' + crctanswser4
                                           
                                        if crctanswser5 != '' and option5 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option5 + '<fziu>' + crctanswser5
                                           
                                        if crctanswser6 != '' and option6 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option6 + '<fziu>' + crctanswser6
                                           
                                        if crctanswser7 != ''  and option7 != '':
                                           crctconcat +='<fzin>'
                                           crctconcat += option7 + '<fziu>' + crctanswser7
                                        values = (lastrowid, crctconcat ,user_profile_id,user_profile_id)
                                        cursor.execute(query6,values)
                                        print values  


                                  elif(question_type == 8):
                                        if option1 != '':
                                            optionconcat = option1

                                        if option2 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option2

                                        if option3 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option3
                                        if option4 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option4

                                        if option5 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option5

                                        if option6 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option6
                                        
                                        if option7 != '':
                                            optionconcat =  optionconcat+ '<fziu>' + option7

                                        if key_answer1 != '' and option1 != '':
                                           keyconcat = key_answer1

                                        if key_answer2 != '' and option2 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer2

                                        if key_answer3 != '' and option3 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer3

                                        if key_answer4 != '' and option4 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer4

                                        if key_answer5 != '' and option5 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer5

                                        if key_answer6 != '' and option6 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer6

                                        if key_answer7 != '' and option7 != '':
                                           keyconcat =  keyconcat+ '<fziu>' + key_answer7

                                        values = (lastrowid, optionconcat ,user_profile_id,user_profile_id,'column-1')
                                        print values
                                        cursor.execute(query5,values)
                                        values = (lastrowid, keyconcat ,user_profile_id,user_profile_id,'column-2')
                                        cursor.execute(query5,values)
                                        print values

                                        if crctanswser1 != '':
                                          values = (lastrowid, crctanswser1 ,user_profile_id,user_profile_id)
                                          cursor.execute(query6,values)
                                          print values 

                                  elif(question_type == 5):
                                        print "inside"
                                        if fillanswer != '':
                                            values = (lastrowid, fillanswer ,user_profile_id,user_profile_id)
                                            cursor.execute(query6,values)
                                            print values 
                                        if (filloption != '' and optiongroup != ''):
                                            for i in range(0,len(optiongroup)):
                                                 blankname = 'blank-'+str(i)
                                                 values = (lastrowid, filloption[i] ,user_profile_id,user_profile_id,blankname)
                                                 print values
                                                 cursor.execute(query5,values) 
                                                 
                                 #time.sleep(1)
                    cursor.execute("update bl_file set status='complete',update_time=now() where status='upload' and file_name='"+ d+"'")
                    # Close the cursor
                    cursor.close()

                    # Commit the transaction
                    con.commit()

                    # Close the database connection
                    con.close()

        
       


    def process_IN_DELETE(self, event):
        print "DELETE event:", event.pathname
    def process_IN_MODIFY(self, event):
        print "MODIFY event:", event.pathname
    def process_IN_OPEN(self, event):
        print "OPEN event:", event.pathname
        
    def process_IN_ACCESS(self, event):
        print "ACCESS event:", event.pathname
        
    def process_IN_ATTRIB(self, event):
        print "ATTRIB event:", event.pathname

    def process_IN_CLOSE_NOWRITE(self, event):
        print "CLOSE_NOWRITE event:", event.pathname
       
       
    def process_IN_CREATE(self, event):
        print "CREATE event:", event.pathname

def main():
    # watch manager
    wm = pyinotify.WatchManager()
    wm.add_watch('../public/upload1/', pyinotify.ALL_EVENTS, rec=True, auto_add=True)
    #wm.add_watch('../assets/documents/upload/', pyinotify.ALL_EVENTS, rec=True)

    # event handler
    eh = MyEventHandler()

    # notifier
    notifier = pyinotify.Notifier(wm, eh)
    notifier.loop()



if __name__ == '__main__':
    main()
   
