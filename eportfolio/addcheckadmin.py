import os
from art import tprint

old = """if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){""" 
news = """if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){\n"""
menu = """include "admin_menu.php";"""

def readFile(file_name):
    f = open(file_name,'r',encoding="utf8")
    contents = f.readlines()
    f.close()
    return contents

def writeFile(file_name,contents):
    f = open(file_name,'w',encoding="utf8")
    contents = f.write(contents)
    f.close()


def main():
    total = []
    files = os.listdir()
    for i in files:     
       
        if i.find(".php") != -1:  
            file_old = readFile(i)
            
            for j in file_old: # find menu
                if menu in j :
                    print('fond',i,'adding...')
                    total.append(i)
                    for j,k in enumerate(file_old,start=0):
                        if old in k:
                            file_old[j] = news   
                            file_new = "".join(file_old)  
                            writeFile(i,file_new)
    tprint("Total    {}    File    Chengs".format(len(total)))

           

                


if __name__ == "__main__":
    tprint(" ~ PHP  SCRIPT ~")
    tprint("add check user stat",font="cybermedum")
    tprint("BY ANANTASAK",font="cybermedum")
    main()
    tprint("Chear !!! ")

