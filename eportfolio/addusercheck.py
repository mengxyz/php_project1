import os

val = """
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
"""
val1 = """
<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
?>
"""
val2 = """
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
"""
admin = """include "admin_menu.php";"""
connect = """include "connect.php";"""
total = []

def readFile(file_name):
    f = open(file_name, "r",encoding="utf8")

    contents = f.readlines()
    f.close()
    return contents

def writeFile(file_name,contents):
    f = open(file_name, "w",encoding="utf8")
    f.write(contents)
    f.close()

for i in os.listdir():
    if i.find('.php') != -1:
        contents = readFile(i)
        stat = 0
        for j in contents:
            if j.find(val) != -1 or j.find(val2) != -1 or j.find(admin) != -1 :
                stat += 1
        if stat > 0:
            line = 1
            if(contents[0].find('<?php') != -1):
                line = 1
                contents.insert(line,val)
                print('fond',i,'add in second line..')
            else:
                line = 0
                contents.insert(line,val1)
                print('fond',i,'add in first line..')
            contents.insert(len(contents),val2)
            newFile = "".join(contents)
            writeFile(i,newFile)
            total.append(i)

print("Total",len(total),'files')
for i in total:
    print(i)
print(len(os.listdir()))