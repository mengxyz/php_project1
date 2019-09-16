import os
from art import tprint

old = """if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){""" 
news = """if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){"""
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
    
    files = os.listdir()
    for i in files:     
        stat = 0
        if i.find(".php") != -1:  
            file_old = readFile(i)
            for j in file_old:
                if j in files_list:
                    if i == menu:
                        stat = 1
                if stat != 0:
                    if j,k in enumerate(files_list,start=0):
                    if k == old:
                        file_new = (file_old[j] = news)     
                        writeFile(i,file_old)
                


if __name__ == "__main__":
    # tprint(" ~ PHP  SCRIPT ~")
    # tprint("add check user stat",font="cybermedum")
    # tprint("BY ANANTASAK",font="cybermedum")
    main()

