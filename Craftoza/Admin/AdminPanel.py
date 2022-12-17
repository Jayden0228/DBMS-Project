from cgitb import text
from distutils.cmd import Command
from tkinter import *
from tkinter import ttk
from typing import ItemsView
from PIL import ImageTk, Image
from tkinter import filedialog
import tkinter as tk
import time  
import matplotlib, numpy, sys
import mysql.connector as mysql
import webbrowser as wb
import threading
import os
from reportlab.pdfgen import canvas
from reportlab.lib.units import mm
from reportlab_qrcode import QRCodeImage
import imaplib
import email
from tkinter import messagebox
from nltk.sentiment.vader import SentimentIntensityAnalyzer
import schedule
import matplotlib
matplotlib.use("TkAgg")
from matplotlib.backends.backend_tkagg import ( FigureCanvasTkAgg, NavigationToolbar2Tk)
from matplotlib.figure import Figure



#Craftoza Modules
from CraftozaStatisticsHandler import General_CraftozaDeets
from CraftozaStatisticsHandler import CategoryWiseGRAPH
AdminInformation=["ADMIN1234","JAYLLO"]
OPPInformation=["ADMIN1234","RENSAL"]
USER_STATUS_INFO=("LOGGED IN","NOT LOGGED IN")
global UserSTATUS
class Splashscreen:

        def __init__(self):  
           self.SplashScreen=Tk()
           self.SplashScreen.title('Craftoza Admin Panel')
           self.SplashScreen.geometry('430x250')
           self.SplashScreen.overrideredirect(1)
           self.SplashScreen.configure(bg='#FF3030')
           self.screen_width=self.SplashScreen.winfo_screenwidth()
           self.screen_height=self.SplashScreen.winfo_screenheight()
           self.X=(self.screen_width/2)-(430/2)
           self.Y=(self.screen_height/2)-(250/2)
           self.SplashScreen.geometry(f'{430}x{250}+{int(self.X)}+{int(self.Y)}')
           self.imgg=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/redImage.png")
           self.resizeIMG=    self.imgg.resize((160,47))
           self.img=ImageTk.PhotoImage(    self.resizeIMG)
           self.label=Label(   self.SplashScreen,image=    self.img,bg='#FF3030')
           self.label.place(relx=0.5,rely=.5,anchor=CENTER)
           self.label.place(relx=0.5,rely=.5,anchor=CENTER)
           self.SplashScreen.after(5000,   self.des)
           self.SplashScreen.mainloop()
        
        def des(self):
            self.SplashScreen.destroy()

        
class OPTION_VERIFICATION:
   
       def __init__(self):      
            self.verificationPAGE=Tk()
            self.verificationPAGE.title('CRAFTOZA Admin Panel')
            self.verificationPAGE.configure(bg='white')
            self.verificationPAGE.geometry('1000x700')
            self.screen_width=self.verificationPAGE.winfo_screenwidth()
            self.screen_height=self.verificationPAGE.winfo_screenheight()
            self.X=(self.screen_width/2)-(1000/2)
            self.Y=(self.screen_height/2)-(700/2)-40
            self.verificationPAGE.geometry(f'{1000}x{700}+{int(self.X)}+{int(self.Y)}')

            self.sideRED=LabelFrame(self.verificationPAGE,bg='#FF3030',labelanchor="n",borderwidth=0)
            self.sideRED.place(x=0,y=0,width=350,height=700)
            self.img2=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/Img2.png")
            self.resizeIMG2= self.img2.resize((250,260))
            self.img2=ImageTk.PhotoImage( self.resizeIMG2)
            self.TitleImage2=Label(    self.sideRED,image= self.img2,bg="#FF3030")
            self.TitleImage2.place(x=60,y=170)


            self.verificationPAGE.overrideredirect(1)
          
            self.imgg=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/BackgroundLogin.png")
            self.resizeIMG= self.imgg.resize((540,590))
            self.img=ImageTk.PhotoImage( self.resizeIMG)
            self.TitleImage=Label(self.verificationPAGE,image= self.img,bg="white")
            self.TitleImage.place(x=408,y=47)


      
            self.Login=LabelFrame(self.verificationPAGE,pady=10,padx=10,labelanchor="n",borderwidth=0,bg="white",relief="solid")
            self.Login.place(x=478,y=123,width=400,height=450)

            # Logo
            self.imgg1=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/Logo.png")
            self.resizeIMG= self.imgg1.resize((104,28))
            self.img1=ImageTk.PhotoImage( self.resizeIMG)
            self.TitleImage1=Label(self.Login,image= self.img1,bg="white")
            self.TitleImage1.place(x=100,y=0,height=45,width=180)

            self.loginTAG=Label(self.Login,text='LOGIN',bg="white",fg='black' ,font=('century gothic',18,),justify=LEFT,pady=10)
            self.loginTAG.place(x=155,y=50,height=22)

            self.r=IntVar()
            self.r.set("1")
            Radiobutton(self.Login,text="Admin Panel",variable=self.r,value=1,bg="white",font=('century gothic',11,)).place(x=23,y=98)
            Radiobutton(self.Login,text="Order Placement Pool",variable=self.r,value=2,bg="white",font=('century gothic',11,)).place(x=163,y=98)
     
            
            self.usernameTAG=Label(self.Login,text='Username :  ',bg="white",fg='black' ,font=('century gothic',12,),justify=LEFT,pady=10)
            self.usernameTAG.place(x=23,y=140)
            self.username=Entry(self.Login,width=55,relief=SUNKEN)
            self.username.place(x=23,y=180,height=30)
            self.passwordTAG=Label(self.Login,text='Password :  ',bg="white",fg='black' ,font=('century gothic',12,),justify=LEFT,pady=10)
            self.passwordTAG.place(x=23,y=230)
            self.password=Entry(self.Login,width=55,relief=SUNKEN)
            self.password.place(x=23,y=270,height=30)
            self.submit=Button(self.Login,text='Login ',padx=10,pady=8,font=('century gothic',10,),bg='#FF3030',fg='white',relief=FLAT,command=self.AuthenticateAC)
            self.submit.place(x=70,y=340,width=80)
            self.Exit=Button(self.Login,text='Exit ',padx=10,pady=8,font=('century gothic',10,),bg='#FF3030',fg='white',relief=FLAT,command=self.QUIT)
            self.Exit.place(x=230,y=340,width=80)



            
            self.verificationPAGE.mainloop()


       def AuthenticateAC(self):
                if str(self.username.get()) == AdminInformation[0] and str(self.password.get()) == AdminInformation[1] and self.r.get()==1:
                    self.verificationPAGE.destroy()
                    t=mainAdmin()
     
                else:
                    if str(self.username.get()) == AdminInformation[0] and str(self.password.get()) == AdminInformation[1] and self.r.get()==2:
                        self.verificationPAGE.destroy()
                        s=OrderPool()
                    # self.ACusername.delete(0,END)
                    # self.ACpassword.delete(0,END)

       def QUIT(self):
            quit()





class mainAdmin:
            
        def __init__(self):
            self.AC=Tk()
            self.AC.title('CRAFTOZA Admin Panel')
            self.AC.configure(bg='whitesmoke')
            self.AC.geometry('1366x768')
            self.AC.state('zoomed')
            self.flexX=50
            self.flexY=50
            self.FlexXD=10
            self.FlexYD=10

            self.SERVER="imap.gmail.com"
            self.EMAIL_ADDRESS="lloydcosta2002@gmail.com"
            self.PASSWORD="aayzraadrkxfsixk"

            self.MYSQLconnection=mysql.connect(host="localhost",user="root",password="",database="craftozalloyd",port=3307)
            self.cat1={"Bamboo":"A","Clay":"B","Coconut":"C","Shells":"D","Wood":"E","Glass":"F","Ceramic":"G","Cloth":"H","Plastic":"I","General":"J"}
            self.cat2={"Bag":"1","Home Deco":"2","Earthen pots":"3","Juwellry":"4","Funiture":"5","Fashion":"6","Keychain":"7","Cups":"8","General":"9"}
         
      
            self.Main_Title=Frame(self.AC,height=90,bg="#CD3333")
            self.Main_Title.pack(fill=X)
            self.imgg=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/redImage1.png")
            self.resizeIMG= self.imgg.resize((180,45))
            self.img=ImageTk.PhotoImage( self.resizeIMG)
            self.TitleImage=Label(self.Main_Title,image= self.img,bg="#CD3333")
            # self.TitleImage.place(relx=.5,rely=.5,anchor=CENTER)
            self.TitleImage.place(x=130,y=45,anchor=CENTER)
            
            self.LOGOUT=Label(self.Main_Title,bg="#CD3333",text="Log Out",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.LOGOUT.place(y=25,width=120,x=1400,height=70)
            self.LOGOUT.bind("<Button-1>",lambda event:self.ENDPROG)
            self.SITE=Label(self.Main_Title,bg="#CD3333",text="Change Password",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.SITE.place(y=25,width=120,x=1280,height=70)
            self.OPENWEB=Label(self.Main_Title,bg="#CD3333",text="Open Website",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.OPENWEB.place(y=25,width=120,x=1145,height=70)



            self.SideMenu=Frame(self.AC,bg="#CD3333")
            self.SideMenu.place(x=0,width=267,height=710,y=90)
            self.SideStart1=36
            self.INFORMATION=Label(self.SideMenu,bg="#CD3333",text="General Information",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.INFORMATION.place(y=0,width=235,x=13,height=35)
            self.DashBoard=Label(self.SideMenu,bg="#FF3030",text="Dashboard",fg='white' ,font=('roboto',11),justify=CENTER)
            self.DashBoard.place(y=self.SideStart1,width=235,x=13,height=35)
            self.productDeets=Label(self.SideMenu,bg="#FF3030",text="Product Info",fg='white' ,font=('roboto',11),justify=CENTER)
            self.productDeets.place(y=self.SideStart1+45,width=235,x=13,height=35)
            self.productStats=Label(self.SideMenu,bg="#FF3030",text="Statistics",fg='white' ,font=('roboto',11),justify=CENTER)
            self.productStats.place(y=self.SideStart1+90,width=235,x=13,height=35)
            self.deliveryAgentDEETS=Label(self.SideMenu,bg="#FF3030",text="Delivery Agent Info",fg='white' ,font=('roboto',11),justify=CENTER)
            self.deliveryAgentDEETS.place(y=self.SideStart1+135,width=235,x=13,height=35)

            self.SideStart2=272
            self.update=Label(self.SideMenu,bg="#CD3333",text="Database Updation",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.update.place(y=235,width=235,x=13,height=35)
            self.AddProducts=Label(self.SideMenu,bg="#FF3030",text="Add New Product",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AddProducts.place(y=self.SideStart2,width=235,x=13,height=35)
            self.EditProducts=Label(self.SideMenu,bg="#FF3030",text="Edit Product",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EditProducts.place(y=self.SideStart2+45,width=235,x=13,height=35)
            self.AddDeliveryAgents=Label(self.SideMenu,bg="#FF3030",text="Add Delivery Agent",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AddDeliveryAgents.place(y=self.SideStart2+90,width=235,x=13,height=35)
            self.EditDeliveryAgents=Label(self.SideMenu,bg="#FF3030",text="Edit Delivery Agent",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EditDeliveryAgents.place(y=self.SideStart2+135,width=235,x=13,height=35)
            self.PolicySELLER=Label(self.SideMenu,bg="#FF3030",text="Add Seller",fg='white' ,font=('roboto',11),justify=CENTER)
            self.PolicySELLER.place(y=self.SideStart2+180,width=235,x=13,height=35)
            self.AdUpdate=Label(self.SideMenu,bg="#FF3030",text="Ads & Desc",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AdUpdate.place(y=self.SideStart2+225,width=235,x=13,height=35)

            self.SideStart3=553
            self.Communication=Label(self.SideMenu,bg="#CD3333",text="Communication",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.Communication.place(y=561,width=235,x=13,height=35)
            self.NewsLetter=Label(self.SideMenu,bg="#FF3030",text="Send Newsletter",fg='white' ,font=('roboto',11),justify=CENTER)
            self.NewsLetter.place(y=self.SideStart3+45,width=235,x=13,height=35)
            self.EmailDeliveryAgent=Label(self.SideMenu,bg="#FF3030",text="Email Delivery Agents",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EmailDeliveryAgent.place(y=self.SideStart3+90,width=235,x=13,height=35)
    



            self.DASHBOARDcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.PRODUCT_INFOcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.STATISTICScover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.DELIVERY_AGENTcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.ADD_Productcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.EDIT_Productcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.ADD_DELIVERY_AGENTcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.EDIT_DELIVERY_AGENTcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.UPDATE_SELLERcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.UPDATE_ADScover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.SEND_NEWLETTERScover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.EMAIL_DELIVERY_AGENTScover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)

            self.DashBoardSIDE1=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE2=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE3=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE4=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE5=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE6=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE7=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE8=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE9=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE10=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE11=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE12=Label(self.SideMenu,bg="#FF3030")

            self.FRAMES=[
                self.DASHBOARDcover,
                self.PRODUCT_INFOcover,
                self.STATISTICScover,
                self.DELIVERY_AGENTcover,
                self.ADD_Productcover,
                self.EDIT_Productcover,
                self.ADD_DELIVERY_AGENTcover,
                self.EDIT_DELIVERY_AGENTcover,
                self.UPDATE_SELLERcover,
                self.UPDATE_ADScover,
                self.SEND_NEWLETTERScover,
                self.EMAIL_DELIVERY_AGENTScover]

            self.FRAMESindicator=[
            self.DashBoardSIDE1,
            self.DashBoardSIDE2,
            self.DashBoardSIDE3,
            self.DashBoardSIDE4,
            self.DashBoardSIDE5,
            self.DashBoardSIDE6,
            self.DashBoardSIDE7,
            self.DashBoardSIDE8,
            self.DashBoardSIDE9,
            self.DashBoardSIDE10,
            self.DashBoardSIDE11,
            self.DashBoardSIDE12]


            self.DashBoard.bind("<Button-1>",lambda event:self.MENU_LIST(0))
            self.productDeets.bind("<Button-1>",lambda event:self.MENU_LIST(1))
            self.productStats.bind("<Button-1>",lambda event:self.MENU_LIST(2))
            self.deliveryAgentDEETS.bind("<Button-1>",lambda event:self.MENU_LIST(3))
            self.AddProducts.bind("<Button-1>",lambda event:self.MENU_LIST(4))
            self.EditProducts.bind("<Button-1>",lambda event:self.MENU_LIST(5))
            self.AddDeliveryAgents.bind("<Button-1>",lambda event:self.MENU_LIST(6))
            self.EditDeliveryAgents.bind("<Button-1>",lambda event:self.MENU_LIST(7))
            self.PolicySELLER.bind("<Button-1>",lambda event:self.MENU_LIST(8))
            self.AdUpdate.bind("<Button-1>",lambda event:self.MENU_LIST(9))
            self.NewsLetter.bind("<Button-1>",lambda event:self.MENU_LIST(10))
            self.EmailDeliveryAgent.bind("<Button-1>",lambda event:self.MENU_LIST(11))

        
           
            # self.PRODUCT_INFO(0)
            self.DASHBOARD()
            
            # self.Statistics()
            # self.DELIVERY_AGENT()
            # self.EDIT_PRODUCT()
            # self.ADD_DELIVER_AGENT()

            self.AC.mainloop()



        def updateCompoundValue(self):
            self.NLTK_value=self.MYSQLconnection.cursor()
            self.NLTK_value.execute("commit")
            self.NLTK_value.execute("select *FROM REVIEWS where CommentCOMPUNDvalue is null")
            self.NLTK_valueX=self.NLTK_value.fetchall()
            self.NLTK=SentimentIntensityAnalyzer()

            for Z in self.NLTK_valueX:
                 score=self.NLTK.polarity_scores(Z[3])
                 self.NLTK_value.execute("update reviews set CommentCOMPUNDvalue="+str(score['compound'])+"where ReviewID ="+str(Z[4]))
                 self.NLTK_value.execute("Commit")
            self.NLTK_value.close()


        def MENU_LIST(self,next):
            self.FRAMES[self.current].place_forget()
            self.FRAMESindicator[self.current].place_forget()

            if next==0:
                self.DASHBOARD()
            elif next==1:
                self.PRODUCT_INFO()
            elif next==2:
                self.Statistics()
            elif next==3:
                self.DELIVERY_AGENT()
            elif next==4:
                self.ADD_PRODUCT()
            elif next==5:
                self.EDIT_PRODUCT()
            elif next==6:
                self.ADD_DELIVER_AGENT()
            elif next==7:
                self.EDIT_DELIVERY_AGENT()
            elif next==8:
                self.ADD_SELLER()
            elif next==9:
                self.UPDATE_ADVERTISEMENTS()
            elif next==10:
                self.SEND_NEWLETTERS()
            elif next==11:
                self.SEND_MAIL_DELIVERYagent()
      

        def ENDPROG(self,A):
            self.AC.destroy()


        def DASHBOARD(self):
            self.current=0
           

            self.DASHBOARDcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE1.place(y=self.SideStart1,width=235,x=236,height=35)
            self.dASHBOARD_mySQL=self.MYSQLconnection.cursor()
            
            self.getDataFromCraftozaModule=General_CraftozaDeets()
            self.R52=self.getDataFromCraftozaModule.get_Revenue()
            self.getUsercnt=self.getDataFromCraftozaModule.get_UserCOUNT()
            self.getProductCNT=self.getDataFromCraftozaModule.get_ProductCOUNT()
           
         
            self.TotalRevenueContainer=LabelFrame(self.DASHBOARDcover,bg="#3A5FCD",labelanchor="n",borderwidth=0)
            self.TotalRevenueContainer.place(y=self.flexY,x=self.flexX+900+30,width=250,height=165)
            self.TotalRevenueTitle=Label(self.TotalRevenueContainer,bg="#3A5FCD",text="Total Revenue",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.TotalRevenueTitle.place(y=120,x=22,width=200,height=50)
            self.TotalRevenueNumber=Label(self.TotalRevenueContainer,bg="#3A5FCD",text="Rs. "+str(self.R52),fg='white' ,font=('Century gothic',32),justify=CENTER)
            self.TotalRevenueNumber.place(y=20,x=10,width=240,height=100)

            self.NOUsers=LabelFrame(self.DASHBOARDcover,bg="#FF3030",labelanchor="n",borderwidth=0)
            self.NOUsers.place(y=self.flexY+200,x=self.flexX+900+30,width=250,height=165)
            self.PendingOrdersTitle=Label(self.NOUsers,bg="#FF3030",text="Users",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.PendingOrdersTitle.place(y=120,x=22,width=200,height=50)
            self.PendingOrdersNumber=Label(self.NOUsers,bg="#FF3030",text=str(self.getUsercnt),fg='white' ,font=('Century gothic',60),justify=CENTER)
            self.PendingOrdersNumber.place(y=20,x=47,width=150,height=100)

            
            self.NOProducts=LabelFrame(self.DASHBOARDcover,bg="#FFC125",labelanchor="n",borderwidth=0)
            self.NOProducts.place(y=self.flexY+400,x=self.flexX+900+30,width=250,height=165)
            self.OrdersTodayTitle=Label(self.NOProducts,bg="#FFC125",text="Products",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.OrdersTodayTitle.place(y=120,x=22,width=200,height=50)
            self.OrdersTodayNumber=Label(self.NOProducts,bg="#FFC125",text=str(self.getProductCNT),fg='white' ,font=('Century gothic',60),justify=CENTER)
            self.OrdersTodayNumber.place(y=20,x=47,width=150,height=100)

   
            self.EmailMsgBoxTitle=Label(self.DASHBOARDcover,bg="mistyrose1",text="Message Display",fg='black' ,font=('Century gothic',12),justify=CENTER)
            self.EmailMsgBoxTitle.place(x=self.flexX+635,y=self.flexY,width=270,height=35)
            self.textarea=Text( self.DASHBOARDcover,relief=FLAT,wrap="word")
            self.textarea.place(x=self.flexX+635,y=self.flexY+40,width=270,height=175)

 
            self.MidContainer2=Label(self.DASHBOARDcover,text="Product Reviews",bg="mistyrose1",font=('Century gothic',13),justify=CENTER,fg="black")
            self.MidContainer2.place(y=self.flexY+390,x=self.flexX,width=650,height=35)

            self.AdCampaignListTitle=Label(self.DASHBOARDcover,bg="mistyrose1",text="Current Advertise Campaigns",fg='black' ,font=('Century gothic',12),justify=CENTER)
            self.AdCampaignListTitle.place(x=self.flexX,y=self.flexY+180,width=323,height=35)
            self.AdCampaignList=Label(self.DASHBOARDcover,bg="white")
            self.AdCampaignList.place(x=self.flexX,y=self.flexY+221,width=323,height=147)


            self.MidContainer5=Label(self.DASHBOARDcover,bg="white")
            self.MidContainer5.place(x=self.flexX+350,y=self.flexY+240,width=555,height=130)


            self.updateCompoundValue()   


            self.style3=ttk.Style()
            self. style3.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style3.configure("mystyle.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSection1=ttk.Treeview(self.DASHBOARDcover,style="mystyle.Treeview")
            self.itemSection1['columns']=("PRODUCT ID","USER ID","COMMENT","COMPOUND VALUE")
            self.itemSection1.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSection1.column("PRODUCT ID",anchor=W,width=80)
            self.itemSection1.column("COMMENT",anchor=W,width=120)
            self.itemSection1.column("USER ID",anchor=W,width=100)
            self.itemSection1.column("COMPOUND VALUE",anchor=W,width=110)

            self.CommentDisplay=Label(self.DASHBOARDcover,text="Comment Display",bg="mistyrose1",font=('Century gothic',13),justify=CENTER,fg="black")
            self.CommentDisplay.place(y=self.flexY+390,x=self.flexX+673,width=235,height=35)
            self.textarea2=Text( self.DASHBOARDcover,relief=FLAT,wrap="word")
            self.textarea2.place(y=self.flexY+430,x=self.flexX+673,width=235,height=200)
            


            self.itemSection1.heading("PRODUCT ID",text="PRODUCT ID",anchor=W)
            self.itemSection1.heading("COMMENT",text="COMMENT",anchor=W)
            self.itemSection1.heading("USER ID",text="USER ID",anchor=W)
            self.itemSection1.heading("COMPOUND VALUE",text="COMPOUND VALUE",anchor=W)
            self.itemSection1.bind('<Button-1>',self.selectedReview)
            self.itemSection1.place(y=self.flexY+430,x=self.flexX,width=650,height=200)

            self.AdminProfile=LabelFrame(self.DASHBOARDcover,bg="white",labelanchor="n",borderwidth=0)
            self.AdminProfile.place(x=self.flexX,y=self.flexY,width=323,height=160)
            self.LLOYD=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Admin/AdminImages/Lloyd.png")
            self.resizeLLOYD= self.LLOYD.resize((50,50))
            self.LLOYD=ImageTk.PhotoImage( self.resizeLLOYD)
            self.ImageLLOYD=Label(self.AdminProfile,image= self.LLOYD,bg="white")
            self.ImageLLOYD.place(x=25,y=20,height=50,width=50)
            self.NameLLOYD=Label(self.AdminProfile,text="LLOYD ALRICH COSTA",bg="white",font=('Century gothic',13),justify=CENTER,fg="black")
            self.NameLLOYD.place(x=87,y=30,height=20,width=200)
            self.LinkLLOYD=Label(self.AdminProfile,text="View More",bg="white",font=('Century gothic',8),justify=CENTER,fg="blue")
            self.LinkLLOYD.place(x=82,y=52,height=10,width=80)

            self.JAYDEN=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Admin/AdminImages/Jayden.png")
            self.resizeJAYDEN= self.JAYDEN.resize((50,50))
            self.JAYDEN=ImageTk.PhotoImage( self.resizeJAYDEN)
            self.TitleJAYDEN=Label(self.AdminProfile,image= self.JAYDEN,bg="white")
            self.TitleJAYDEN.place(x=25,y=85,heigh=50,width=50)
            self.NameJAYDEN=Label(self.AdminProfile,text="JAYDEN VIEGAS",bg="white",font=('Century gothic',13),justify=CENTER,fg="black")
            self.NameJAYDEN.place(x=84,y=90,height=20,width=150)
            self.LinkJAYDEN=Label(self.AdminProfile,text="View More",bg="white",font=('Century gothic',8),justify=CENTER,fg="blue")
            self.LinkJAYDEN.place(x=82,y=112,height=10,width=80)

            self.Refresh33=Button(self.DASHBOARDcover,text='Refresh Page',padx=10,pady=8,font=('century gothic',10,),bg='white',fg='black',relief=FLAT,command=self.DASHBOARD)
            self.Refresh33.place(x=self.flexX+975,y=self.flexY+590,width=160,height=30)

            self.x1=threading.Thread(target=self.CUST_EMAIL)
            self.x1.start()

            self.dASHBOARD_mySQL.execute("select *from reviews") 
            self.dASHBOARD_mySQLDATA4=self.dASHBOARD_mySQL.fetchall()
            self.loopCount8=0
            for X in self.dASHBOARD_mySQLDATA4:
                  self.itemSection1.insert("",'end',iid=self.loopCount8,values=(X[0],X[1],X[3],X[2]))
                  self.loopCount8=self.loopCount8+1
            self.dASHBOARD_mySQL.close()
                   

        def selectedReview(self,a):
            self.CurItem6=self.itemSection1.focus()
            self.D6=self.itemSection1.item(self.CurItem6)
            self.textarea2.delete(1.0,END)
            self.textarea2.insert(END,str(self.D6.get('values')[2]))

        def selectedEmail(self,a):
            self.selectedEML=self.CustomerMails.get(ACTIVE)
            MSGG=self.selectedEML.split('"')
            self.textarea.delete(1.0,END)
            self.textarea.insert(1.0,str(MSGG[2]))

            

            
         


        def CUST_EMAIL(self):
            self.EmailInbox=Label(self.DASHBOARDcover,bg="mistyrose1",text="Email Inbox",fg='black' ,font=('Century gothic',12),justify=CENTER)
            self.EmailInbox.place(x=self.flexX+350,y=self.flexY,width=260,height=35)
            self.CustomerMails=Listbox(self.DASHBOARDcover,bg="white",borderwidth=0,fg='black',highlightthickness=0,font=('roboto',10),activestyle=None,selectborderwidth=0,relief=FLAT)
            self.CustomerMails.place(x=self.flexX+350,y=self.flexY+40,width=260,height=175)
            self.CustomerMails.bind('<Button-1>',self.selectedEmail)
      
            try:
                self.imap=imaplib.IMAP4_SSL(self.SERVER,993)
                self.imap.login(self.EMAIL_ADDRESS,self.PASSWORD)
                self.imap.select('"[Gmail]/All Mail"')
                result, data = self.imap.uid('search', None, "ALL") # search all email and return uids
                if result == 'OK':
                    for num in data[0].split():
                        S=str()
                        result, data = self.imap.uid('fetch', num, '(RFC822)')
                        if result == 'OK':
                            email_message = email.message_from_bytes(data[0][1])    # raw email text including headers
                            for part in email_message.walk():
                                if part.get_content_type()=="text/plain":
                                    S=S+part.as_string()
                            S=S.split(";")
                            self.CustomerMails.insert(END,"  From    "+email_message['From']+","+str(S[1]))
            
            except:
                messagebox.showinfo("Customer Email","Please check your internet connection")

           

        def selectedProductView(self,a):
            self.CurItem=self.itemSectionp.focus()
            self.D=self.itemSectionp.item(self.CurItem)
    
            self.ProductID.delete(1.0,END)
            self.ProductName.delete(1.0,END)
            self.ProductType1.delete(1.0,END)
            self.ProductType2.delete(1.0,END)
            self.ProductPrice.delete(1.0,END)
            self.ProductSeller.delete(1.0,END)
            self.ProductQTY.delete(1.0,END)
            self.ProductID.insert(END,str(self.D.get('values')[0]))
            self.ProductName.insert(END,str(self.D.get('values')[1]))
            self.ProductType1.insert(END,str(self.D.get('values')[2]))
            self.ProductType2.insert(END,str(self.D.get('values')[3]))
            self.ProductSeller.insert(END,str(self.D.get('values')[5]))
            self.ProductPrice.insert(END,str(self.D.get('values')[4]))
            self.ProductQTY.insert(END,str(self.D.get('values')[6]))

            self.ProductImage=Image.open(str(self.D.get('values')[7]))
            self.resizeproductIMG= self.ProductImage.resize((160,160))
            self.ProdImgObj=ImageTk.PhotoImage( self.resizeproductIMG)
            self.ProImageContainer=Label(self.ProductDisplay,image=self.ProdImgObj,bg=self.PrdouctContainerColor)
            self.ProImageContainer.place(x=135,y=100,anchor=CENTER)
         
        def SearchProducttreeview(self):
             self.Display_Products_mySQL=self.MYSQLconnection.cursor()
             if(len(self.userSearchIDPRODUCT.get())!=0):
                self.Display_Products_mySQL.execute("select *from product where pid like "+"'"+str(self.userSearchIDPRODUCT.get())+"'")
                self.SEARCHid=self.Display_Products_mySQL.fetchall()  

                if self.SEARCHid==[]:
                    self.textareaProduct.delete(1.0,END)
                    self.textareaProduct.insert(END,"Record Doesnt Exist")
                    return
                self.selections=[]
                for x in self.SEARCHid:
                    for i in range(len(self.itemSectionp.get_children())):
                        if x[0] ==self.itemSectionp.item(i)['values'][0]:
                            self.selections.append(i)
                self.itemSectionp.selection_set(self.selections)
               

             if(len(self.userSearchNAMEPRODUCT.get())!=0):
                self.Display_Products_mySQL.execute("select *from product where pname like "+"'%"+str(self.userSearchNAMEPRODUCT.get())+"%'")
                self.SEARCHid=self.Display_Products_mySQL.fetchall()  
                
                if self.SEARCHid==[]:
                    self.textareaProduct.delete(1.0,END)
                    self.textareaProduct.insert(END,"Record Doesnt Exist")
                    return
                self.selections=[]
                for x in self.SEARCHid:
                    for i in range(len(self.itemSectionp.get_children())):
                        if x[0] ==self.itemSectionp.item(i)['values'][0]:
                            self.selections.append(i)
                self.itemSectionp.selection_set(self.selections)
                        


   
    



        def PRODUCT_INFO(self):
            self.current=1
            self.loopCount1=0
            self.loopCount2=0
            self.ViewIteration=0
            self.PRODUCT_INFOcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE2.place(y=self.SideStart1+45,width=200,x=236,height=35)
            self.Display_Products_mySQL=self.MYSQLconnection.cursor()
            self.Display_Products_mySQL.execute("select *from product") 
            self.FetchedProductsDisplay=self.Display_Products_mySQL.fetchall()  

            self.textareaProduct=Text(self.PRODUCT_INFOcover,bg="white",fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.textareaProduct.place(y=470,x=1060,width=175,height=50)

            self.style=ttk.Style()
            self. style.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style.configure("mystyle.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSectionp=ttk.Treeview( self.PRODUCT_INFOcover,style="mystyle.Treeview")

            self.ProdDispcroll=ttk.Scrollbar(self.PRODUCT_INFOcover,orient="vertical",command=self.itemSectionp.yview)
            self.ProdDispcroll.place(x=905,y=self.flexX,height=400)
            self.itemSectionp.configure(yscrollcommand=self.ProdDispcroll.set)

            self.itemSectionp['columns']=("ID","PRODUCT NAME","TYPE1","TYPE2","PRICE","SELLER","QTY","LINK")
            self.itemSectionp.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionp.column("ID",anchor=W,width=80)
            self.itemSectionp.column("PRODUCT NAME",anchor=W,width=250)
            self.itemSectionp.column("TYPE1",anchor=W,width=100)
            self.itemSectionp.column("TYPE2",anchor=W,width=80)
            self.itemSectionp.column("PRICE",anchor=W,width=80)
            self.itemSectionp.column("SELLER",anchor=W,width=100)
            self.itemSectionp.column("QTY",anchor=W,width=50)
            self.itemSectionp.column("LINK",anchor=W,width=0)


            self.itemSectionp.heading("ID",text="ID",anchor=W)
            self.itemSectionp.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSectionp.heading("TYPE1",text="TYPE1",anchor=W)
            self.itemSectionp.heading("TYPE2",text="TYPE2",anchor=W)
            self.itemSectionp.heading("PRICE",text="PRICE",anchor=W)
            self.itemSectionp.heading("SELLER",text="SELLER",anchor=W)
            self.itemSectionp.heading("QTY",text="QTY",anchor=W)
            self.itemSectionp.heading("LINK",text="LINK",anchor=W)
            self.itemSectionp.bind('<Button-1>',self.selectedProductView)
            self.itemSectionp.place(x=self.flexX-10,y=self.flexX,width=880,height=400)

            
            for X in self.FetchedProductsDisplay:
              self.itemSectionp.insert("",'end',iid=self.loopCount1,values=(X[0],X[2],X[8],X[9],X[3],X[1],X[4],X[12]))
              self.loopCount1=self.loopCount1+1

            

            #Product Description Container
            self.PrdouctContainerColor="white"
            self.ProductDisplay=LabelFrame( self.PRODUCT_INFOcover,bg=self.PrdouctContainerColor,labelanchor="n",borderwidth=0)
            self.ProductDisplay.place(x=self.flexX+900,y=self.flexY,width=290,height=400)
            #Product Image
         

            #Product ID
            self.ProductIDTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="ID: ")
            self.ProductIDTAG.place(y=200,x=38,width=50,height=20)
            self.ProductID=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductID.place(y=200,x=90,width=190,height=20)
            self.ProductID.insert(tk.END," ")
            #Product Name
            self.ProductNameTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="NAME: ")
            self.ProductNameTAG.place(y=220,x=23,width=50,height=20)
            self.ProductName=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductName.place(y=220,x=90,width=190,height=20)
    
  

            #Product Type1
            self.ProductType1TAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="TYPE 1: ")
            self.ProductType1TAG.place(y=240,x=23,width=50,height=20)
            self.ProductType1=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductType1.place(y=240,x=90,width=190,height=20)
            
       

             #Product Type2
            self.ProductType2TAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="TYPE 2: ")
            self.ProductType2TAG.place(y=260,x=23,width=50,height=20)
            self.ProductType2=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductType2.place(y=260,x=90,width=190,height=20)
          
        

             #Product Seller
            self.ProductSellerTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="SELLER: ")
            self.ProductSellerTAG.place(y=280,x=20,width=52,height=20)
            self.ProductSeller=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductSeller.place(y=280,x=90,width=190,height=20)
          
      

            #Product Price
            self.ProductPriceTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="PRICE: ")
            self.ProductPriceTAG.place(y=300,x=23,width=52,height=20)
            self.ProductPrice=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductPrice.place(y=300,x=90,width=190,height=20)
           
   
             #Product QTY
            self.ProductQTYTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="QTY: ")
            self.ProductQTYTAG.place(y=320,x=27,width=52,height=20)
            self.ProductQTY=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductQTY.place(y=320,x=90,width=190,height=20)
           



            #Product Search by ID
            self.userSearchTAG=Label( self.PRODUCT_INFOcover,text='Search by ID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchTAG.place(x=self.flexX,y=self.flexY+420)
            self.userSearchIDPRODUCT=Entry(self.PRODUCT_INFOcover,width=25,relief=SUNKEN)
            self.userSearchIDPRODUCT.place(x=self.flexX+120,y=self.flexY+430,height=30)

             #Product Search by Name
            self.userSearchTAG=Label( self.PRODUCT_INFOcover,text='Search by Product Name :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchTAG.place(x=self.flexX+290,y=self.flexY+420)
            self.userSearchNAMEPRODUCT=Entry(self.PRODUCT_INFOcover,width=45,relief=SUNKEN)
            self.userSearchNAMEPRODUCT.place(x=self.flexX+500,y=self.flexY+430,height=30)

             #Search Button
            self.Search1=Button( self.PRODUCT_INFOcover,text='Search',padx=10,pady=8,font=('century gothic',10,),bg='snow1',fg='black',relief=RAISED,command=self.SearchProducttreeview)
            self.Search1.place(x=self.flexX+810,y=self.flexY+420,width=80)

                 #Refresh Button
            self.Refresh=Button( self.PRODUCT_INFOcover,text='Refresh',padx=10,pady=8,font=('century gothic',10,),bg='snow1',fg='black',relief=RAISED,)
            self.Refresh.place(x=self.flexX+910,y=self.flexY+420,width=80)



            #Inventory Shortage
            self.Display_Products_mySQL.execute("select * from product where qnt<50") 
            self.SHORTAGE=self.Display_Products_mySQL.fetchall() 

            self.InventoryShortageTAG=Label( self.PRODUCT_INFOcover,text='Inventory Shortage Alert  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.InventoryShortageTAG.place(x=self.flexX,y=self.flexY+475)
            self.style1=ttk.Style()
            self. style1.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style1.configure("mystyle1.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSectionS=ttk.Treeview( self.PRODUCT_INFOcover,style="mystyle1.Treeview")
            self.itemSectionS['columns']=("ID","PRODUCT NAME","QTY","SELLER")
            self.itemSectionS.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionS.column("ID",anchor=W,width=50)
            self.itemSectionS.column("PRODUCT NAME",anchor=W,width=250)
            self.itemSectionS.column("QTY",anchor=W,width=40)
            self.itemSectionS.column("SELLER",anchor=W,width=40)

            
            self.itemSectionS.heading("ID",text="ID",anchor=W)
            self.itemSectionS.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSectionS.heading("QTY",text="QTY",anchor=W)
            self.itemSectionS.heading("SELLER",text="SELLER",anchor=W)
            self.itemSectionS.place(x=self.flexX,y=self.flexY+515,width=590,height=120)

            for Y in self.SHORTAGE:
                self.itemSectionS.insert("",'end',iid=self.loopCount2,values=(Y[0],Y[2],Y[4],Y[1]))
                self.loopCount2=self.loopCount2+1

            #Topup Needed Count  
            self.Display_Products_mySQL.execute("select count(pid) from product") 
            self.InventoryCount=self.Display_Products_mySQL.fetchall()   
            self.InventoryCountContainer=LabelFrame( self.PRODUCT_INFOcover,bg="#FF3030",labelanchor="n",borderwidth=0)
            self.InventoryCountContainer.place(y=self.flexY+510,x=self.flexX+670+240,width=220,height=125)
            self.InventoryCountTitle=Label(self.InventoryCountContainer,bg="#FF3030",text="Total Inventory Count",fg='white' ,font=('Century gothic',13))
            self.InventoryCountTitle.place(y=65,x=6,width=210,height=50)
            self.InventoryCountNumber=Label(self.InventoryCountContainer,bg="#FF3030",text=self.InventoryCount[0][0],fg='white' ,font=('Century gothic',40))
            self.InventoryCountNumber.place(y=10,x=35,width=150,height=60)
     


            self.Display_Products_mySQL.execute("select count(pid) from (select pid from product where qnt<50) as k") 
            self.InventoryTOPup=self.Display_Products_mySQL.fetchall() 
            self.TopUPContainer=LabelFrame( self.PRODUCT_INFOcover,bg="#3A5FCD",labelanchor="n",borderwidth=0)
            self.TopUPContainer.place(y=self.flexY+510,x=self.flexX+670,width=220,height=125)
            self.TopUTitle=Label(self.TopUPContainer,bg="#3A5FCD",text="Top Ups Needed ",fg='white' ,font=('Century gothic',13))
            self.TopUTitle.place(y=65,x=6,width=210,height=50)
            self.TopUNumber=Label(self.TopUPContainer,bg="#3A5FCD",text=self.InventoryTOPup[0][0],fg='white' ,font=('Century gothic',40))
            self.TopUNumber.place(y=10,x=35,width=150,height=60)
            self.Display_Products_mySQL.close()




        def Statistics(self):
             self.current=2
             self.Statistics_mySQL=self.MYSQLconnection.cursor()
             self.updateCompoundValue()  
             self.STATISTICScover.place(y=90,x=267,width=1300,height=710)

             self.DashBoardSIDE3.place(y=self.SideStart1+90,width=200,x=236,height=35)

             self.GraphTitle=Label( self.STATISTICScover,bg="white",text="Yearly Statistics",fg='Black' ,font=('Century gothic',13),justify=CENTER)
             self.GraphTitle.place(x=self.flexX,y=self.flexY,width=400,height=30)
             self.f = Figure(figsize=(3,3), dpi=70)
             self.a = self.f.add_subplot(111)
             self.a.set_xlabel('Days')
             self.a.set_ylabel('Sales')
             self.a.plot([1,2,3,4,5,6,7,8],[5,6,1,3,8,9,3,5])
             self.canvasMonthlyRevenue = FigureCanvasTkAgg(self.f, self.STATISTICScover)
             self.canvasMonthlyRevenue .draw()
             self.canvasMonthlyRevenue .get_tk_widget().place(height=300,width=400,x=self.flexX,y=self.flexY+30)

      

             self.PieChartTitle=Label( self.STATISTICScover,bg="white",text="Top 5 Popular Brands",fg='Black' ,font=('Century gothic',13),justify=CENTER)
             self.PieChartTitle.place(x=self.flexX+428,y=self.flexY,width=250,height=30)
             self.f1=Figure()
             self.AX=self.f1.add_subplot(111)
             self.AX.pie([15,25,40,10,10],radius=1,labels=["A","B","C","D","E"],autopct='%0.2f%%',shadow=True)
             self.chart1=FigureCanvasTkAgg(self.f1,self.STATISTICScover)
             self.chart1.get_tk_widget().place(x=self.flexX+428,y=self.flexY+30,width=250,height=210)
            

          
             self.GraphData=CategoryWiseGRAPH()
             self.CAT1Dict=self.GraphData.Algorithm_forCAT1()
           

             catLIST1=[]
             for X in self.CAT1Dict.values():
                    catLIST1.append(X)
          
             self.T1GraphTitle=Label( self.STATISTICScover,bg="white",text="Category Type-1 Sale",fg='Black' ,font=('Century gothic',13),justify=CENTER)
             self.T1GraphTitle.place(x=self.flexX,y=self.flexY+350,width=440,height=30)
             self.f2 = Figure(figsize=(5,4), dpi=100)
             self.AX2 = self.f2.add_subplot(111)
             self.dataTAG1=["A","B","C","D","E","F","G","H","I","J"]
             self.data1 = list(catLIST1)
             self.ind1 = numpy.arange(len(self.dataTAG1))  # the x locations for the groups
             self.widthG1 = .05
             self.rects1 = self.AX2.bar(self.dataTAG1, self.data1)  
            #  , self.ind1,0.4
       
             self.canvas = FigureCanvasTkAgg(self.f2,self.STATISTICScover)
             self.canvas.draw()
             self.canvas.get_tk_widget().place(height=250,width=440,x=self.flexX,y=self.flexY+374)

  
             self.dataTAG2=["1","2","3","4","5","6","7","8","9"]
             self.CAT2Dict=self.GraphData.Algorithm_forCAT2()

             catLIST=[]
             for X in self.CAT2Dict.values():
                    catLIST.append(X)

             self.T2GraphTitle=Label( self.STATISTICScover,bg="white",text="Category Type-2 Sale",fg='Black' ,font=('Century gothic',13),justify=CENTER)
             self.T2GraphTitle.place(x=self.flexX+462,y=self.flexY+350,width=440,height=30)
             self.f3 = Figure(figsize=(5,4), dpi=100)
             self.AX3 = self.f3.add_subplot(111)
             self.data2 =  list( catLIST)
             self.ind2 = numpy.arange(len(self.dataTAG2))  # the x locations for the groups
             self.widthG2 = .05
             self.rects2 = self.AX3.bar(self.dataTAG2,self.data2)
            #  , self.ind2, self.widthG2
             self.canvas = FigureCanvasTkAgg(self.f3,self.STATISTICScover)
             self.canvas.draw()
             self.canvas.get_tk_widget().place(height=250,width=440,x=self.flexX+462,y=self.flexY+374)
            


           
             self.getDataFromCraftozaModule=General_CraftozaDeets()
             self.R5=self.getDataFromCraftozaModule.get_Revenue()
             self.TodaySale=self.getDataFromCraftozaModule.get_TodaySales()

             self.TotalRevenueContainerStats=LabelFrame(self.STATISTICScover,bg="darkseagreen1",labelanchor="n",borderwidth=0)
             self.TotalRevenueContainerStats.place(y=self.flexY,x=self.flexX+900+30,width=250,height=165)
             self.TotalRevenueTitleStats=Label( self.TotalRevenueContainerStats,bg="darkseagreen1",text="Total Revenue",fg='black' ,font=('Century gothic',13),justify=CENTER)
             self.TotalRevenueTitleStats.place(y=110,x=22,width=200,height=50)
             self.TotalRevenueNumberStats=Label( self.TotalRevenueContainerStats,bg="darkseagreen1",text="Rs "+str(self.R5),fg='black' ,font=('Century gothic',25),justify=CENTER)
             self.TotalRevenueNumberStats.place(y=20,x=10,width=240,height=100)

             self.TodayRevenueContainerStats=LabelFrame(self.STATISTICScover,bg="darkslategray1",labelanchor="n",borderwidth=0)
             self.TodayRevenueContainerStats.place(y=self.flexY+200,x=self.flexX+900+30,width=250,height=165)
             self.TodayRevenueTitleStats=Label( self.TodayRevenueContainerStats,bg="darkslategray1",text="Sales Today",fg='black' ,font=('Century gothic',13),justify=CENTER)
             self.TodayRevenueTitleStats.place(y=110,x=22,width=200,height=50)
             self.TodayRevenueNumberStats=Label( self.TodayRevenueContainerStats,bg="darkslategray1",text="Rs."+str(self.TodaySale),fg='black' ,font=('Century gothic',25),justify=CENTER)
             self.TodayRevenueNumberStats.place(y=20,x=10,width=240,height=100)

             self.LastMonthRevenueContainerStats=LabelFrame(self.STATISTICScover,bg="lightpink",labelanchor="n",borderwidth=0)
             self.LastMonthRevenueContainerStats.place(y=self.flexY+400,x=self.flexX+900+30,width=250,height=165)
             self.LastMonthTitleStats=Label( self.LastMonthRevenueContainerStats,bg="lightpink",text="Sales Last Month",fg='black' ,font=('Century gothic',13),justify=CENTER)
             self.LastMonthTitleStats.place(y=110,x=22,width=200,height=50)
             self.LastMonthNumberStats=Label( self.LastMonthRevenueContainerStats,bg="lightpink",text="Rs. 0",fg='black' ,font=('Century gothic',35),justify=CENTER)
             self.LastMonthNumberStats.place(y=20,x=10,width=240,height=100)

             self.Statistics_mySQL.execute("commit")
             self.Statistics_mySQL.execute("select pname from product where pid like (select pid from (select pid,count(pid) as cnt from orders group by pid)as k4 where k4.cnt = (select MAX(cnt) as BESTSELLINGproduct from (select pid,count(pid) as cnt from orders group by pid)as K))")
             self.Frequently_Ordered_product=self.Statistics_mySQL.fetchall()
             self.MostSoldTitle=Label( self.STATISTICScover,bg="darkslategray1",text="Most Sold Product",fg='Black' ,font=('Century gothic',12),justify=CENTER)
             self.MostSoldTitle.place(x=self.flexX+705,y=self.flexY,width=200,height=30)
             self.MostSoldFigure=Label( self.STATISTICScover,bg="white",text=str(self.Frequently_Ordered_product[0][0]),fg='Black' ,font=('calibri',9),justify=CENTER)
             self.MostSoldFigure.place(x=self.flexX+705,y=self.flexY+30,width=200,height=50)

             self.Statistics_mySQL.execute("commit")
             self.Statistics_mySQL.execute("select pname from product where pid like ( select pid from (select *from (select pid,count(pid) as cnt from reviews group by pid) as T1 natural join (select pid,AVG(CommentCOMPUNDvalue) as AVG from reviews group by pid) as T2 where cnt >=3)as H where AVG = (select MAX(AVG) as MAX from (select *from (select pid,count(pid) as cnt from reviews group by pid) as T1 natural join (select pid,AVG(CommentCOMPUNDvalue) as AVG from reviews group by pid) as T2 where cnt >=3)as Y));")
             self.HightProductAVG=self.Statistics_mySQL.fetchall()
             self.HighestRatedTitle=Label( self.STATISTICScover,bg="darkseagreen1",text="Highest Rated Product",fg='Black' ,font=('Century gothic',12),justify=CENTER)
             self.HighestRatedTitle.place(x=self.flexX+705,y=self.flexY+100,width=200,height=30)
             
             self.HighestRatedFigure=Label( self.STATISTICScover,bg="white",text=str(self.HightProductAVG[0][0]),fg='Black' ,font=('calibri',9),justify=CENTER)
             self.HighestRatedFigure.place(x=self.flexX+705,y=self.flexY+130,width=200,height=50)
             
             self.Statistics_mySQL.execute("commit")
             self.Statistics_mySQL.execute(" select pname from (select *from (select pid,count(pid) as cnt from reviews group by pid) as T1 natural join (select pid,AVG(CommentCOMPUNDvalue) as AVG from reviews group by pid) as T2 where cnt >=3 and AVG<0)as S natural join product;")
             self.NegativeRated=self.Statistics_mySQL.fetchall()
             self.NegativeListTitle=Label( self.STATISTICScover,bg="#FCE6C9",text="Negative Feedback",fg='Black' ,font=('Century gothic',12),justify=CENTER)
             self.NegativeListTitle.place(x=self.flexX+705,y=self.flexY+200,width=200,height=30)
             self.NegativeList=Listbox(self.STATISTICScover,bg="white",borderwidth=0,fg='black',highlightthickness=0,font=('calibri',9),activestyle=None,selectborderwidth=0,relief=FLAT)
             self.NegativeList.place(x=self.flexX+705,y=self.flexY+230,width=200,height=100)

             for X in self.NegativeRated:     
                self.NegativeList.insert(END,str(X[0]))


             self.CFPTitle=Label( self.STATISTICScover,bg="#FCE6C9",text="Current Financial Year Profit",fg='Black' ,font=('Century gothic',13),justify=CENTER)
             self.CFPTitle.place(x=self.flexX+428,y=self.flexY+260,width=250,height=30)
             self.CFP=Label( self.STATISTICScover,bg="white",text="Rs 0",fg='Black' ,font=('Century gothic',9),justify=CENTER)
             self.CFP.place(x=self.flexX+428,y=self.flexY+287,width=250,height=45)

             self.Refresh44=Button(self.STATISTICScover,text='Refresh Page',padx=10,pady=8,font=('century gothic',10,),bg='white',fg='black',relief=FLAT)
             self.Refresh44.place(x=self.flexX+975,y=self.flexY+590,width=160,height=30)
        


        def SearchDeliveryAgenttreeview(self):
             self.ViewDELIVERY_mySQL=self.MYSQLconnection.cursor()
             if(len(self.DeliveryByIDSearch.get())!=0):
                self.ViewDELIVERY_mySQL.execute("select *from deliverymember where did ="+str(self.DeliveryByIDSearch.get()))
                self.SEARCHid2=self.ViewDELIVERY_mySQL.fetchall()  

                if self.SEARCHid2==[]:
                    self.textareaDelivery.delete(1.0,END)
                    self.textareaDelivery.insert(END,"Record Doesnt Exist")
                    return
                self.selections=[]
                for x in self.SEARCHid2:
                    for i in range(len( self.itemSectionDelivery.get_children())):
                        if x[0] == self.itemSectionDelivery.item(i)['values'][0]:
                            self.selections.append(i)
                self.itemSectionDelivery.selection_set(self.selections)
                
               

             if(len(self.DeliveryByNameSearch.get())!=0):
                self.ViewDELIVERY_mySQL.execute("select *from deliverymember where fname like "+"'%"+str(self.DeliveryByNameSearch.get())+"%'")
                self.SEARCHid2=self.ViewDELIVERY_mySQL.fetchall()  
                if self.SEARCHid2==[]:
                    self.textareaDelivery.delete(1.0,END)
                    self.textareaDelivery.insert(END,"Record Doesnt Exist")
                    return
                self.selections=[]
                for x in self.SEARCHid2:
                    for i in range(len( self.itemSectionDelivery.get_children())):
                        if x[0] == self.itemSectionDelivery.item(i)['values'][0]:
                            self.selections.append(i)
                self.itemSectionDelivery.selection_set(self.selections)
                
                        
        def selectedDeliveryAgentView(self,a):
            self.CurItem=self.itemSectionDelivery.focus()
            self.D=self.itemSectionDelivery.item(self.CurItem)
    
            self.DeliveryID.delete(1.0,END)
            self.DeliveryName.delete(1.0,END)
            self.DeliveryPlocation.delete(1.0,END)
            self.DeliveryHno.delete(1.0,END)
            self.DeliveryPH.delete(1.0,END)
            self.DeliveryMail.delete(1.0,END)

            self.DeliveryID.insert(END,str(self.D.get('values')[0]))
            self.DeliveryName.insert(END,str(self.D.get('values')[1]))
            self.DeliveryPlocation.insert(END,str(self.D.get('values')[2]))
            self.DeliveryHno.insert(END,str(self.D.get('values')[3]))
            self.DeliveryPH.insert(END,str(self.D.get('values')[4]))
            self.DeliveryMail.insert(END,str(self.D.get('values')[5]))
        

        def DELIVERY_AGENT(self): 
            self.current=3
            self.loopCount3=0
           
            self.DELIVERY_AGENTcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE4.place(y=self.SideStart1+135,width=235,x=236,height=35)

            self.style1=ttk.Style()
            self. style1.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style1.configure("mystyle.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSectionDelivery=ttk.Treeview( self.DELIVERY_AGENTcover,style="mystyle.Treeview")
            self.itemSectionDelivery['columns']=("SSN","NAME","POSTING LOCATION","ADDRESS","PHONE NUMBER","EMAIL")
            self.itemSectionDelivery.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionDelivery.column("SSN",anchor=W,width=20)
            self.itemSectionDelivery.column("NAME",anchor=W,width=120)
            self.itemSectionDelivery.column("POSTING LOCATION",anchor=W,width=70)
            self.itemSectionDelivery.column("ADDRESS",anchor=W,width=70)
            self.itemSectionDelivery.column("PHONE NUMBER",anchor=W,width=70)
            self.itemSectionDelivery.column("EMAIL",anchor=W,width=50)
            self.itemSectionDelivery.bind('<Button-1>',self.selectedDeliveryAgentView)
       


            self.itemSectionDelivery.heading("SSN",text="SSN",anchor=W)
            self.itemSectionDelivery.heading("NAME",text="NAME",anchor=W)
            self.itemSectionDelivery.heading("POSTING LOCATION",text="POSTING LOCATION",anchor=W)
            self.itemSectionDelivery.heading("ADDRESS",text="ADDRESS",anchor=W)
            self.itemSectionDelivery.heading("PHONE NUMBER",text="PHONE NUMBER",anchor=W)
            self.itemSectionDelivery.heading("EMAIL",text="EMAIL",anchor=W)
          
            self.itemSectionDelivery.place(x=self.flexX-10,y=self.flexX,width=900,height=400)


            #Delivery Agent Display Container
            self.Deliver_Agent_color="white"
            self.Deliver_Agent_display=LabelFrame( self.DELIVERY_AGENTcover,bg=self.Deliver_Agent_color,labelanchor="n",borderwidth=0)
            self.Deliver_Agent_display.place(x=self.flexX+910,y=self.flexY,width=280,height=400)
            #Image
            self.DeliveryImage=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Admin/AdminImages/deliveryBoyIcon.png")
            self.resizeproductDIMG= self.DeliveryImage.resize((160,160))
            self.DelImgObj=ImageTk.PhotoImage( self.resizeproductDIMG)
            self.DelImageContainer=Label(self.Deliver_Agent_display,image=self.DelImgObj,bg=self.Deliver_Agent_color)
            self.DelImageContainer.place(x=135,y=100,anchor=CENTER)

            #SSN
            self.DeliveryIDTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="SSN: ")
            self.DeliveryIDTAG.place(y=200,x=20,width=50,height=20)
            self.DeliveryID=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.DeliveryID.place(y=200,x=130,width=190,height=20)
 
 

            #Name
            self.DeliveryNameTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="NAME: ")
            self.DeliveryNameTAG.place(y=220,x=23,width=50,height=20)
            self.DeliveryName=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.DeliveryName.place(y=220,x=130,width=190,height=20)

 

            
            #Posting Location
            self.DeliveryPlocationTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="P LOCATION: ")
            self.DeliveryPlocationTAG.place(y=240,x=20,width=100,height=20)
            self.DeliveryPlocation=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.DeliveryPlocation.place(y=240,x=130,width=190,height=20)
 
      

             #aDDRESS
            self.DeliveryHnoTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="ADDRESS: ")
            self.DeliveryHnoTAG.place(y=260,x=17,width=80,height=20)
            self.DeliveryHno=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',9),relief=FLAT,foreground="red")
            self.DeliveryHno.place(y=260,x=135,width=190,height=30)
    



            #Phone Number
            self.DeliveryPHTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="PH NUMBER: ")
            self.DeliveryPHTAG.place(y=300,x=17,width=100,height=20)
            self.DeliveryPH=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.DeliveryPH.place(y=300,x=130,width=190,height=20)
  

             #Email
            self.DeliveryMailTAG=Label(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="EMAIL: ")
            self.DeliveryMailTAG.place(y=320,x=22,width=50,height=20)
            self.DeliveryMail=Text(self.Deliver_Agent_display,bg=self.Deliver_Agent_color,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.DeliveryMail.place(y=320,x=130,width=190,height=20)
    
        
            
            #Product Search by ID
            self.DeliveryByIDSearchTAG=Label( self.DELIVERY_AGENTcover,text='Search by ID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryByIDSearchTAG.place(x=self.flexX,y=self.flexY+420)
            self.DeliveryByIDSearch=Entry(self.DELIVERY_AGENTcover,width=25,relief=SUNKEN)
            self.DeliveryByIDSearch.place(x=self.flexX+120,y=self.flexY+430,height=30)

             #Product Search by Name
            self.DeliveryByNameSearchTAG=Label(self.DELIVERY_AGENTcover,text='          Search by Name :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryByNameSearchTAG.place(x=self.flexX+300,y=self.flexY+420)
            self.DeliveryByNameSearch=Entry(self.DELIVERY_AGENTcover,width=45,relief=SUNKEN)
            self.DeliveryByNameSearch.place(x=self.flexX+500,y=self.flexY+430,height=30)

             #Search Button
            self.Search11=Button(self.DELIVERY_AGENTcover,text='Search',padx=10,pady=8,font=('century gothic',10,),bg='white',fg='black',relief=RAISED,command=self.SearchDeliveryAgenttreeview)
            self.Search11.place(x=self.flexX+810,y=self.flexY+420,width=80)

             #Refresh Button
            self.Refresh22=Button(self.DELIVERY_AGENTcover,text='Refresh',padx=10,pady=8,font=('century gothic',10,),bg='white',fg='black',relief=RAISED,)
            self.Refresh22.place(x=self.flexX+910,y=self.flexY+420,width=80)

            self.textareaDelivery=Text(self.DELIVERY_AGENTcover,bg="white",fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.textareaDelivery.place(y=470,x=1060,width=175,height=50)

            self.ViewDELIVERY_mySQL=self.MYSQLconnection.cursor()
            self.ViewDELIVERY_mySQL.execute("select *from deliverymember")
            self.ViewDELIVERY=self.ViewDELIVERY_mySQL.fetchall() 
   
            for X in self.ViewDELIVERY:
                  self.MYSQLDeloveryname=str(self.ViewDELIVERY[self.loopCount3][1])+" "+str(self.ViewDELIVERY[self.loopCount3][2])+" "+str(self.ViewDELIVERY[self.loopCount3][3])
                  self.itemSectionDelivery.insert("",'end',iid=self.loopCount3,values=(X[0],self.MYSQLDeloveryname,X[6],X[8],X[4],X[5],X[5]))
                  self.loopCount3=self.loopCount3+1

            self.ViewDELIVERY_mySQL.close()



        def imageFunc(self):
            self.ADDimageFlag=1
            self.product_IMG12=filedialog.askopenfilename(initialdir="C:\CraftozaParentImages",title="Select a File",filetypes=(("png files","*.png"),("all files","*.*")))
            self.ProductImageAddPro=Image.open(str(self.product_IMG12))
            self.resizeproductIMGAddPro=   self.ProductImageAddPro.resize((160,160))
            self.ProdImgObjAddPro=ImageTk.PhotoImage( self.resizeproductIMGAddPro)
            self.ProImageContainerAddPro=Label(  self.ProductDisplayAddPro,image= self.ProdImgObjAddPro,bg=self.PrdouctContainerColor)
            self.ProImageContainerAddPro.place(x=135,y=100,anchor=CENTER)
       


        def ADD_product_submitted(self):
            self.count=1
            self.Add_product_mySQL=self.MYSQLconnection.cursor()
            

            if str(self.EnterProductName.get())=='':
                  self.textareaAddProduct.delete(1.0,END)
                  self.textareaAddProduct.insert(END,"  Name Field Empty")
                  return
            elif str(self.EnterProductPrice.get())=='':
                  self.textareaAddProduct.delete(1.0,END)
                  self.textareaAddProduct.insert(END,"  Price Field Empty")
                  return
            elif str(self.EnterPSeller.get())=='':
                  self.textareaAddProduct.delete(1.0,END)
                  self.textareaAddProduct.insert(END,"  Seller Field Empty")
                  return
            elif str(self.Addqtyr.get())=='':
                  self.textareaAddProduct.delete(1.0,END)
                  self.textareaAddProduct.insert(END,"  Qty Field Empty")
                  return
            elif self.ADDimageFlag==1 and str(self.product_IMG12)=='' or self.ADDimageFlag==0:
                  self.textareaAddProduct.delete(1.0,END)
                  self.textareaAddProduct.insert(END,"  Image Not Selected")
                  return
            elif self.product_IMG12 == "":
                    self.textareaAddProduct.delete(1.0,END)
                    self.textareaAddProduct.insert(END,"Image Not Selected")
                    return




            if str(self.CAT1value.get()) in self.cat1.keys():
                self.CAT1_Alpha=self.cat1[str(self.CAT1value.get())]
            
            if str(self.CAT2value.get()) in self.cat2.keys():
                self.CAT2_Alpha=self.cat2[str(self.CAT2value.get())]
            
            self.Uniq=20
        

           
            self.Add_product_mySQL.execute("select count(pid) from product") #Query to get count of current products
            self.PRODUCTcountADD=self.Add_product_mySQL.fetchall()  
            self.PCNT=self.PRODUCTcountADD[0][0]
            
            try:
                self.Add_product_mySQL.execute("select sid from seller where company_name like"+"'"+str(self.EnterPSeller.get()+"'"))
                self.PRODUCTsidLIST=self.Add_product_mySQL.fetchall() 
                self.SID= self.PRODUCTsidLIST[0][0]
            
                self.UN="CRAF-"+str(self.PCNT)+"-"+self.CAT1_Alpha+"#"+self.CAT2_Alpha
                self.ProductInsert_query1="INSERT INTO Product (pid,sid,pname,price,qnt,material,type,ParentImgLink) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
                self.ProductInsert_query1Value=(str(self.UN),int(self.SID),str(self.EnterProductName.get()),int(self.EnterProductPrice.get()),int(self.Addqtyr.get()),str(self.CAT1value.get()),str(self.CAT2value.get()),str(self.product_IMG12))
                self.Add_product_mySQL.execute(self.ProductInsert_query1,self.ProductInsert_query1Value)
                self.Add_product_mySQL.execute('commit')
                self.Add_product_mySQL.close()

        
                self.itemSectionPROD.insert("",'end',iid=1,values=(self.PRODUCTcountADD,str(self.EnterProductName.get()),self.CAT1value.get(),self.CAT2value.get(),str(self.EnterProductPrice.get()),str(self.EnterPSeller.get()),self.Addqtyr.get()))
                
                self.textareaAddProduct.delete(1.0,END)
                self.textareaAddProduct.insert(END,"  Data Entered Successfully")
            except:
                messagebox.showerror("Wrong Input","Please check your input once again")


        def ADD_product_RESET(self):
            for item in  self.itemSectionPROD.get_children():
                  self.itemSectionPROD.delete(item)
            self.EnterProductName.delete(0,END)
            self.EnterPSeller.delete(0,END)
            self.EnterProductPrice.delete(0,END)
            self.Addqtyr.delete(0,END)
            self.textareaAddProduct.delete(1.0,END)
            self.textareaAddProduct.insert(END," STATUS BOX:")
     
            self.ADDimageFlag=0


        def ADD_PRODUCT(self):
            self.ADDimageFlag=0
            self.current=4
            self.FlexXA=70
            self.ADD_Productcover.place(y=90,x=267,width=1300,height=710)
            self.ADD_ProductcoverSCROLL=Scrollbar(self.ADD_Productcover,orient="vertical")
            self.ADD_ProductcoverSCROLL.pack(side="right",fill="y")
            self.DashBoardSIDE5.place(y=self.SideStart2,width=200,x=235,height=35)
            self.AddProductFrame=LabelFrame(self.ADD_Productcover,bg="white",labelanchor="n",borderwidth=0)
            self.AddProductFrame.place(x=self.FlexXA+20,y=self.flexY,width=1090,height=425)
        
            
            self.EnterProductNameTAG=Label(self.ADD_Productcover,text='          Enter Product Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.EnterProductNameTAG.place(x=self.FlexXA+20,y=self.flexY+20)
            self.EnterProductName=Entry( self.ADD_Productcover,width=45,relief=SUNKEN)
            self.EnterProductName.place(x=self.FlexXA+250,y=self.flexY+26,height=30,width=300)

            
            self.CAT1TAG=Label(self.ADD_Productcover,text='          Select Cateogory (TYPE-1) :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.CAT1TAG.place(x=self.FlexXA+20,y=self.flexY+80)
            self.CAT1value=StringVar()
            self.CAT1value.set("Bamboo")
            self.CAT1valueOPTION=OptionMenu(self.ADD_Productcover,self.CAT1value,"Bamboo","Clay","Coconut","Shells","Wood","Glass","Ceramic","Cloth","Plastic","General")
            self.CAT1valueOPTION.place(x=self.FlexXA+280,y=self.flexY+86)
    

            self.CAT2TAG=Label(self.ADD_Productcover,text='          Select Cateogory (TYPE-2) :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.CAT2TAG.place(x=self.FlexXA+380,y=self.flexY+80)
            self.CAT2value=StringVar()
            self.CAT2value.set("Bag")
            self.CAT2valueOPTION=OptionMenu(self.ADD_Productcover,self.CAT2value,"Bag","Home Deco","Earthen pots","Juwellry","Funiture","Fashion","Keychain","Cups","General")
            self.CAT2valueOPTION.place(x=self.FlexXA+640,y=self.flexY+86)

            self.PriceTAG=Label(self.ADD_Productcover,text='          Enter Price :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.PriceTAG.place(x=self.FlexXA+20,y=self.flexY+140)
            self.EnterProductPrice=Entry( self.ADD_Productcover,width=45,relief=SUNKEN)
            self.EnterProductPrice.place(x=self.FlexXA+250,y=self.flexY+146,height=30,width=300)

            
            self.PSellerTAG=Label(self.ADD_Productcover,text='          Enter Seller :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.PSellerTAG.place(x=self.FlexXA+20,y=self.flexY+200)
            self.EnterPSeller=Entry( self.ADD_Productcover,width=45,relief=SUNKEN)
            self.EnterPSeller.place(x=self.FlexXA+250,y=self.flexY+206,height=30,width=300)

            self.AddImageTAG=Label(self.ADD_Productcover,text='          Add Image :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.AddImageTAG.place(x=self.FlexXA+20,y=self.flexY+260)
            self.Add_ProductImage=Button(self.ADD_Productcover,text='Add Main Img',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.Add_ProductImage.place(x=self.FlexXA+250,y=self.flexY+266,width=100)

            self.Add_ProductImage1A=Button(self.ADD_Productcover,text='Add Image 1A',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.Add_ProductImage1A.place(x=self.FlexXA+360,y=self.flexY+266,width=100)

            self.Add_ProductImage1B=Button(self.ADD_Productcover,text='Add Image 1B',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.Add_ProductImage1B.place(x=self.FlexXA+470,y=self.flexY+266,width=100)

            self.Add_ProductImage1C=Button(self.ADD_Productcover,text='Add Image 1C',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.Add_ProductImage1C.place(x=self.FlexXA+580,y=self.flexY+266,width=100)

            self.ShowSellers=Button(self.ADD_Productcover,text='Display Seller List',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.displaySellerTAB)
            self.ShowSellers.place(x=self.FlexXA+1010,y=self.flexY+580,width=100)

            self.AddqtyTAG=Label(self.ADD_Productcover,text='          Enter QTY :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.AddqtyTAG.place(x=self.FlexXA+570,y=self.flexY+170)
            self.Addqtyr=Entry( self.ADD_Productcover,width=45,relief=SUNKEN)
            self.Addqtyr.place(x=self.FlexXA+615,y=self.flexY+206,height=30,width=100)

            self.PRODdisp=ttk.Style()
            self. PRODdisp.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.PRODdisp.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionPROD=ttk.Treeview(self.ADD_Productcover,style="myPRODdisp.Treeview")
            self.itemSectionPROD['columns']=("ID","PRODUCT NAME","TYPE1","TYPE2","PRICE","SELLER","QTY")
            self.itemSectionPROD.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionPROD.column("ID",anchor=W,width=40)
            self.itemSectionPROD.column("PRODUCT NAME",anchor=W,width=200)
            self.itemSectionPROD.column("TYPE1",anchor=W,width=100)
            self.itemSectionPROD.column("TYPE2",anchor=W,width=80)
            self.itemSectionPROD.column("PRICE",anchor=W,width=80)
            self.itemSectionPROD.column("SELLER",anchor=W,width=80)
            self.itemSectionPROD.column("QTY",anchor=W,width=80)


            self.itemSectionPROD.heading("ID",text="ID",anchor=W)
            self.itemSectionPROD.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSectionPROD.heading("TYPE1",text="TYPE1",anchor=W)
            self.itemSectionPROD.heading("TYPE2",text="TYPE2",anchor=W)
            self.itemSectionPROD.heading("PRICE",text="PRICE",anchor=W)
            self.itemSectionPROD.heading("SELLER",text="SELLER",anchor=W)
            self.itemSectionPROD.heading("QTY",text="QTY",anchor=W)
            self.itemSectionPROD.place(x=self.FlexXA+20,y=self.flexY+460,width=1090,height=100)


            self.textareaAddProduct=Text( self.ADD_Productcover,width=35,height=5)
            self.textareaAddProduct.place(x=self.FlexXA+780,y=self.flexY+300,)
            self.textareaAddProduct.insert(END," STATUS BOX:")


            self.Add_ProductSubmit=Button(self.ADD_Productcover,text='SUBMIT THE ENTRY',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.ADD_product_submitted)
            self.Add_ProductSubmit.place(x=self.FlexXA+60,y=self.flexY+350,width=150)

            self.Add_ProductRESET=Button(self.ADD_Productcover,text='RESET',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.ADD_product_RESET)
            self.Add_ProductRESET.place(x=self.FlexXA+246,y=self.flexY+350,width=150)

            self.AddImageDisplayTAG=Label(self.ADD_Productcover,text='Selected Image :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.AddImageDisplayTAG.place(x=self.FlexXA+780,y=self.flexY+20)
            
            self.PrdouctContainerColor="white"
            self.ProductDisplayAddPro=LabelFrame( self.ADD_Productcover,bg=self.PrdouctContainerColor,labelanchor="n",borderwidth=0)
            self.ProductDisplayAddPro.place(x=self.FlexXA+780,y=self.flexY+60,width=280,height=200)
            #Product Image

        def displaySellerTAB(self):
            self.SellerTAB=Tk()
            self.SellerTAB.title('Seller List')
            self.SellerTAB.configure(bg='whitesmoke')
            self.SellerTAB.geometry('820x400')
            self.SELLERdispTAB=ttk.Style()
            self. SELLERdispTAB.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.SELLERdispTAB.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionSELLER5=ttk.Treeview(self.SellerTAB,style="myPRODdisp.Treeview")
            self.itemSectionSELLER5['columns']=("ID","NAME","ADDRESS","EMAIL","CONTACT")
            self.itemSectionSELLER5.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionSELLER5.column("ID",anchor=W,width=40)
            self.itemSectionSELLER5.column("NAME",anchor=W,width=200)
            self.itemSectionSELLER5.column("ADDRESS",anchor=W,width=200)
            self.itemSectionSELLER5.column("EMAIL",anchor=W,width=80)
            self.itemSectionSELLER5.column("CONTACT",anchor=W,width=80)
       
            self.itemSectionSELLER5.heading("ID",text="ID",anchor=W)
            self.itemSectionSELLER5.heading("NAME",text="NAME",anchor=W)
            self.itemSectionSELLER5.heading("ADDRESS",text="ADDRESS",anchor=W)
            self.itemSectionSELLER5.heading("EMAIL",text="EMAIL",anchor=W)
            self.itemSectionSELLER5.heading("CONTACT",text="CONTACT",anchor=W)
            self.itemSectionSELLER5.place(x=40,y=20,width=740,height=350)

            self.DispSELL_mySQL=self.MYSQLconnection.cursor()
            self.DispSELL_mySQL.execute("select *from seller")
            self.DispSELL_mySQL1=self.DispSELL_mySQL.fetchall()


            countS=0
            for X in self.DispSELL_mySQL1:
                self.itemSectionSELLER5.insert("",'end',iid=countS,values=(X[0],X[1],X[6],X[5],X[4]))
                countS=countS+1

            self.DispSELL_mySQL.close()



        
   
        


        def EDIT_PRODUCT_funcNameUpdate(self):
            
              if str(self.UpdateProductName.get())=='':
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Name Field Empty")
              else:
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)
                    
                    self.EDIT_product_mySQL.execute("UPDATE product SET pname= '" +str(self.UpdateProductName.get())+ "' where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Name Updated \nSuccessfully")
                    self.EDIT_product_mySQL.close()

        def EDIT_PRODUCT_funcPriceUpdate(self):
              if str(self.UpdateEnterProductPrice.get())=='':
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Price Field Empty")

              else:
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)
                    
                    self.EDIT_product_mySQL.execute("UPDATE product SET price= " +str(self.UpdateEnterProductPrice.get())+ " where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.EDIT_product_mySQL.close()
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Price Updated \nSuccessfully")

        def EDIT_PRODUCT_funcSellerUpdate(self):
              if str(self.UpdateEnterPSeller.get())=='':
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Seller Field Empty")
              else:
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)
                    
                    self.EDIT_product_mySQL.execute("UPDATE product SET sid= " +str(self.UpdateEnterPSeller.get())+ " where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.EDIT_product_mySQL.close()
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," SellerID Updated\n Successfully")

        def imageFunc2(self):
             self.ImageEditFLAG=1
             self.product_IMG123=filedialog.askopenfilename(initialdir="C:\CraftozaParentImages",title="Select a File",filetypes=(("png files","*.png"),("all files","*.*")))
             self.ProductImageAddPro1=Image.open(str(self.product_IMG123))
             self.resizeproductIMGAddPro1=   self.ProductImageAddPro1.resize((160,160))

             if self.product_IMG123 == "":
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END,"Image Not Selected")
                    return

             self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
             self.CurItem1=self.itemSectionPRODEDIT.focus()
             self.A=self.itemSectionPRODEDIT.item( self.CurItem1)
                    
             self.EDIT_product_mySQL.execute("UPDATE product SET ParentImgLink= '" +str(self.product_IMG123)+ "' where pid= '"+str(self.A.get('values')[0])+"'")
             self.EDIT_product_mySQL.execute("commit")
             self.EDIT_product_mySQL.close()
        
          


        def EDIT_PRODUCT_funcImageUpdate(self):     
           
            if self.ImageEditFLAG==1 and str(self.product_IMG123)=='' or self.ImageEditFLAG==0:
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," Image Not Selected")
                    return
            else:
                self.textareaEDITProduct.delete(1.0,END)
                self.textareaEDITProduct.insert(END," Image Added")
                
                   


        def EDIT_PRODUCT_funcQTYUpdate(self):   
              if str(self.Updateqtyr.get())=='':
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," QTY Field Empty")
              else:
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)
                    
                    self.EDIT_product_mySQL.execute("UPDATE product SET qnt= " +str(self.Updateqtyr.get())+ " where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.EDIT_product_mySQL.close()
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," QTY Updated\n Successfully") 

        def EDIT_PRODUCT_funcCAT1Update(self):
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)

                    if str(self.UpdateCAT1value.get()) in self.cat1.keys():
                        self.CAT1_Alpha=self.cat1[str(self.UpdateCAT1value.get())]
                    
                    self.EditChangeID=str(self.A.get('values')[0])
                    self.EditChangeIDSplit1=self.EditChangeID.split("-")
                    self.EditChangeIDSplit2=self.EditChangeIDSplit1[2].split("#")
                    self.EditChangeID=str(self.EditChangeIDSplit1[0])+"-"+str(self.EditChangeIDSplit1[1])+"-"+str(self.CAT1_Alpha)+"#"+str(self.EditChangeIDSplit2[1])
                
    
                  
                   
                    self.EDIT_product_mySQL.execute("UPDATE product SET pid='"+str(self.EditChangeID)+"',material= '" +str(self.UpdateCAT1value.get())+ "' where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.EDIT_product_mySQL.close()
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," CAT1 Entered\n Successfully") 
        
        def EDIT_PRODUCT_funcCAT2Update(self): 
                    self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
                    self.CurItem1=self.itemSectionPRODEDIT.focus()
                    self.A=self.itemSectionPRODEDIT.item( self.CurItem1)

                    if str(self.UpdateCAT2value.get()) in self.cat2.keys():
                         self.CAT2_Alpha=self.cat2[str(self.UpdateCAT2value.get())]

                    self.EditChangeID=str(self.A.get('values')[0])
                    self.EditChangeIDSplit1=self.EditChangeID.split("-")
                    self.EditChangeIDSplit2=self.EditChangeIDSplit1[2].split("#")
                    self.EditChangeID=str(self.EditChangeIDSplit1[0])+"-"+str(self.EditChangeIDSplit1[1])+"-"+str(self.EditChangeIDSplit2[0])+"#"+str(self.CAT2_Alpha)
             
                    self.EDIT_product_mySQL.execute("UPDATE product SET pid='"+str(self.EditChangeID)+"',type= '" +str(self.UpdateCAT2value.get())+ "' where pid= '"+str(self.A.get('values')[0])+"'")
                    self.EDIT_product_mySQL.execute("commit")
                    self.EDIT_product_mySQL.close()
                    self.textareaEDITProduct.delete(1.0,END)  
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END," CAT2 Entered\n Successfully") 
 
        def EDIT_searchBYidORName(self):
            self.EDIT_product_mySQL=self.MYSQLconnection.cursor()
            for item in self.itemSectionPRODEDIT.get_children():
                     self.itemSectionPRODEDIT.delete(item)

            if(len(self.userSearchIDEDITprod.get())!=0):
                self.EDIT_product_mySQL.execute("select *from product where pid like "+"'"+str(self.userSearchIDEDITprod.get())+"'")
                self.ProductSearchByIdEdit=self.EDIT_product_mySQL.fetchall()  

                if self.ProductSearchByIdEdit==[]:
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END,"Record Doesnt Exist")
                    return
                self.EditCount=0
                for X in self.ProductSearchByIdEdit:  
                     self.itemSectionPRODEDIT.insert("",'end',iid=self.EditCount,values=(X[0],X[2],X[8],X[9],X[3],X[1],X[4]))
                     self.EditCount =self.EditCount+1
                self.userSearchIDEDITprod.delete(0,END)

            if(len(self.userSearchEDITnameprod.get())!=0):
                self.EDIT_product_mySQL.execute("select *from product where pname like "+"'%"+str(self.userSearchEDITnameprod.get())+"%'")
                self.ProductSearchByIdEdit=self.EDIT_product_mySQL.fetchall()  
                
                if self.ProductSearchByIdEdit==[]:
                    self.textareaEDITProduct.delete(1.0,END)
                    self.textareaEDITProduct.insert(END,"Record Doesnt Exist")
                    return
                self.EditCount=0
                for X in self.ProductSearchByIdEdit:  
                     self.itemSectionPRODEDIT.insert("",'end',iid=self.EditCount,values=(X[0],X[2],X[8],X[9],X[3],X[1],X[4]))
                     self.EditCount =self.EditCount+1
                self.userSearchEDITnameprod.delete(0,END)

            self.textareaEDITProduct.delete(1.0,END)
            self.textareaEDITProduct.insert(END," Please Select the\n Product")
            
            self.EDIT_product_mySQL.close()
                    



        def EDIT_PRODUCT(self):
            self.ImageEditFLAG=0
            self.current=5
          
            self.EDIT_Productcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE6.place(y=self.SideStart2+45,width=200,x=235,height=35)
       

            self.userSearchIDEDITprodTAG=Label(self.EDIT_Productcover,text='Search by ID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchIDEDITprodTAG.place(x=self.flexX+60,y=self.flexY+20)
            self.userSearchIDEDITprod=Entry(self.EDIT_Productcover,width=25,relief=SUNKEN)
            self.userSearchIDEDITprod.place(x=self.flexX+180,y=self.flexY+26,height=30)


             #Product Search by Name
            self.userSearchEDITnameprodTAG=Label( self.EDIT_Productcover,text='Search by Product Name :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchEDITnameprodTAG.place(x=self.flexX+380,y=self.flexY+20)
            self.userSearchEDITnameprod=Entry(self.EDIT_Productcover,width=45,relief=SUNKEN)
            self.userSearchEDITnameprod.place(x=self.flexX+600,y=self.flexY+26,height=30)

            self.EditSearchsubmit=Button(self.EDIT_Productcover,text='Search',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_searchBYidORName)
            self.EditSearchsubmit.place( x=self.flexX+910,y=self.flexY+17,width=130)

            self.PRODdispEDIT=ttk.Style()
            self. PRODdispEDIT.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.PRODdispEDIT.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionPRODEDIT=ttk.Treeview(self.EDIT_Productcover,style="myPRODdisp.Treeview")
            self.itemSectionPRODEDIT['columns']=("ID","PRODUCT NAME","TYPE1","TYPE2","PRICE","SELLER","QTY")
            self.itemSectionPRODEDIT.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionPRODEDIT.column("ID",anchor=W,width=40)
            self.itemSectionPRODEDIT.column("PRODUCT NAME",anchor=W,width=200)
            self.itemSectionPRODEDIT.column("TYPE1",anchor=W,width=100)
            self.itemSectionPRODEDIT.column("TYPE2",anchor=W,width=80)
            self.itemSectionPRODEDIT.column("PRICE",anchor=W,width=80)
            self.itemSectionPRODEDIT.column("SELLER",anchor=W,width=80)
            self.itemSectionPRODEDIT.column("QTY",anchor=W,width=80)


            self.itemSectionPRODEDIT.heading("ID",text="ID",anchor=W)
            self.itemSectionPRODEDIT.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSectionPRODEDIT.heading("TYPE1",text="TYPE1",anchor=W)
            self.itemSectionPRODEDIT.heading("TYPE2",text="TYPE2",anchor=W)
            self.itemSectionPRODEDIT.heading("PRICE",text="PRICE",anchor=W)
            self.itemSectionPRODEDIT.heading("SELLER",text="SELLER",anchor=W)
            self.itemSectionPRODEDIT.heading("QTY",text="QTY",anchor=W)
            self.itemSectionPRODEDIT.place(x=self.flexX+60,y=self.flexY+80,width=1010,height=100)

            self.EditProductFrame=LabelFrame(self.EDIT_Productcover,bg="white",labelanchor="n",borderwidth=0)
            self.EditProductFrame.place(x=self.flexX+60,y=self.flexY+210,width=1010,height=420)

            
            self.UpdateProductTITLE=Label(self.EditProductFrame,text='          Update Product Options:  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateProductTITLE.place(x=15,y=10)

            self.UpdateProductNameTAG=Label(self.EditProductFrame,text='          Update Product Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateProductNameTAG.place(x=self.flexX+20,y=self.flexY+20)
            self.UpdateProductName=Entry(self.EditProductFrame,width=45,relief=SUNKEN)
            self.UpdateProductName.place(x=self.flexX+250,y=self.flexY+26,height=30,width=300)

            
            self.UpdateCAT1TAG=Label(self.EditProductFrame,text='          New Cateogory (TYPE-1) :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateCAT1TAG.place(x=self.flexX+20,y=self.flexY+80)
            self.UpdateCAT1value=StringVar()
            self.UpdateCAT1value.set("Bamboo")
            self.UpdateCAT1valueOPTION=OptionMenu(self.EditProductFrame, self.UpdateCAT1value,"Bamboo","Clay","Coconut","Shells","Wood","Glass","Ceramic","Cloth","Plastic","General")
            self.UpdateCAT1valueOPTION.place(x=self.flexX+280,y=self.flexY+86)
    

            self.UpdateCAT2TAG=Label(self.EditProductFrame,text='          New Cateogory (TYPE-2) :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateCAT2TAG.place(x=self.flexX+380,y=self.flexY+80)
            self.UpdateCAT2value=StringVar()
            self.UpdateCAT2value.set("Bag")
            self.UpdateCAT2valueOPTION=OptionMenu(self.EditProductFrame,    self.UpdateCAT2value,"Bag","Home Deco","Earthen pots","Juwellry","Funiture","Fashion","Keychain","Cups","General")
            self.UpdateCAT2valueOPTION.place(x=self.flexX+640,y=self.flexY+86)

            self.UpdatePriceTAG=Label(self.EditProductFrame,text='          Enter New Price :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdatePriceTAG.place(x=self.flexX+20,y=self.flexY+140)
            self.UpdateEnterProductPrice=Entry( self.EditProductFrame,width=45,relief=SUNKEN)
            self.UpdateEnterProductPrice.place(x=self.flexX+250,y=self.flexY+146,height=30,width=300)

            
            self.UpdatePSellerTAG=Label(self.EditProductFrame,text='          Update New SellerID :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdatePSellerTAG.place(x=self.flexX+20,y=self.flexY+200)
            self.UpdateEnterPSeller=Entry( self.EditProductFrame,width=45,relief=SUNKEN)
            self.UpdateEnterPSeller.place(x=self.flexX+250,y=self.flexY+206,height=30,width=300)

            self.UpdateImageTAG=Label(self.EditProductFrame,text='          Add New Image :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateImageTAG.place(x=self.flexX+20,y=self.flexY+260)
            self.Update_ProductImage=Button(self.EditProductFrame,text='Add Image',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc2)
            self.Update_ProductImage.place(x=self.flexX+250,y=self.flexY+266)

            self.UpdateqtyTAG=Label(self.EditProductFrame,text='          Update QTY :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.UpdateqtyTAG.place(x=self.flexX+360,y=self.flexY+260)
            self.Updateqtyr=Entry( self.EditProductFrame,width=45,relief=SUNKEN)
            self.Updateqtyr.place(x=self.flexX+514,y=self.flexY+266,height=30,width=100)

           


            self.UpdateButtons=840
            self.flexY1=15
            self.UpdateNAMEsubmit=Button(self.EditProductFrame,text='UPDATE NAME',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcNameUpdate)
            self.UpdateNAMEsubmit.place( x=self.UpdateButtons,y=self.flexY1+10,width=130)

            self.UpdatCAT1submit=Button(self.EditProductFrame,text='UPDATE TYPE1',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcCAT1Update)
            self.UpdatCAT1submit.place(  x=self.UpdateButtons,y=self.flexY1+60+10,width=130)

            self.UpdatCAT2submit=Button(self.EditProductFrame,text='UPDATE TYPE2',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcCAT2Update)
            self.UpdatCAT2submit.place(  x=self.UpdateButtons,y=self.flexY1+110+20,width=130)

            self.UpdatPricesubmit=Button(self.EditProductFrame,text='UPDATE PRICE',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcPriceUpdate)
            self.UpdatPricesubmit.place(  x=self.UpdateButtons,y=self.flexY1+160+30,width=130)

            self.UpdatSellersubmit=Button(self.EditProductFrame,text='UPDATE SELLER',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcSellerUpdate)
            self.UpdatSellersubmit.place(  x=self.UpdateButtons,y=self.flexY1+210+40,width=130)

            self.UpdatImagesubmit=Button(self.EditProductFrame,text='UPDATE IMAGE',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcImageUpdate)
            self.UpdatImagesubmit.place( x= self.UpdateButtons,y=self.flexY1+260+50,width=130)

            self.UpdatQTYsubmit=Button(self.EditProductFrame,text='UPDATE QTY',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcQTYUpdate)
            self.UpdatQTYsubmit.place(  x=self.UpdateButtons-150,y=self.flexY1+210+40,width=130)

            self.UpdatOtherIMGsubmit=Button(self.EditProductFrame,text='UPDATE 1A,2B,1C',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_PRODUCT_funcQTYUpdate)
            self.UpdatOtherIMGsubmit.place( x=self.UpdateButtons-150,y=self.flexY1+260+50,width=130)


            self.EDIT_ProductImage1A=Button(self.EditProductFrame,text='Add Image 1A',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.EDIT_ProductImage1A.place(x=self.flexX+250,y=self.flexY+330,width=100,height=20)

            self.EDIT_ProductImage1B=Button(self.EditProductFrame,text='Add Image 1B',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.EDIT_ProductImage1B.place(x=self.flexX+360,y=self.flexY+330,width=100,height=20)

            self.EDIT_ProductImage1C=Button(self.EditProductFrame,text='Add Image 1C',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.imageFunc)
            self.EDIT_ProductImage1C.place(x=self.flexX+470,y=self.flexY+330,width=100,height=20)

            self.AddqtyTAG=Label(self.ADD_Productcover,text='          Enter QTY :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)

            self.textareaEDITProduct=Text(self.EditProductFrame,width=20,height=3)
            self.textareaEDITProduct.place(x=self.UpdateButtons-200,y=self.flexY)
            self.textareaEDITProduct.insert(END," STATUS BOX:")
       


        def ADD_DELIVERY_AGENT_submit(self):
    
             if str(self.DeliveryFirstName.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," First Name Field Empty")
                    return

             elif str(self.DeliveryLastName.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," Last Name Field Empty")
                    return
            
             elif str(self.DeliveryPostingLocation.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," Posting Location Field Empty")
                    return

             elif str(self.DeliveryAddress.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," Address Field Empty")
                    return

             elif str(self.DeliveryEmail.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," Email Field Empty")
                    return

             elif str(self.DeliveryContact.get())=='':
                    self.textareaAddDelivery.delete(1.0,END)
                    self.textareaAddDelivery.insert(END," Contact Field Empty")
                    return
             self.AddDevliveryAgenet_MySQL=self.MYSQLconnection.cursor()
             self.AddDevliveryAgenetQuery1="INSERT INTO deliverymember (fname,mname,lname,pnum,email,location,Address) VALUES (%s,%s,%s,%s,%s,%s,%s)"
             self.AddDevliveryAgenetQuery2=(str(self.DeliveryFirstName.get()),str(self.DeliverySecondName.get()),str(self.DeliveryLastName.get()),int(self.DeliveryContact.get()),str(self.DeliveryEmail.get()),str(self.DeliveryPostingLocation.get()),str(self.DeliveryAddress.get()))
             self.AddDevliveryAgenet_MySQL.execute(self.AddDevliveryAgenetQuery1,self.AddDevliveryAgenetQuery2)
             self.AddDevliveryAgenet_MySQL.execute('commit')
             self.itemSectionDELIVERY.insert("",'end',iid=1,values=("1",(str(self.DeliveryFirstName.get())+" "+str(self.DeliverySecondName.get())+" "+str(self.DeliveryLastName.get())) ,str(self.DeliveryAddress.get()),str(self.DeliveryPostingLocation.get()),str(self.DeliveryEmail.get()),str(self.DeliveryContact.get()),str(self.DeliveryAddress.get())))
            
             self.textareaAddDelivery.delete(1.0,END)
             self.textareaAddDelivery.insert(END,"  Data Entered Successfully")
             self.AddDevliveryAgenet_MySQL.close()


        def ADD_DELIVERY_AGENT_reset(self):
                for item in self.itemSectionDELIVERY.get_children():
                  self.itemSectionDELIVERY.delete(item)

                self.DeliveryFirstName.delete(0,END)
                self.DeliverySecondName.delete(0,END)
                self.DeliveryLastName.delete(0,END)
                self.DeliveryPostingLocation.delete(0,END)
                self.DeliveryAddress.delete(0,END)
                self.DeliveryEmail.delete(0,END)
                self.DeliveryContact.delete(0,END)
              
                self.textareaAddDelivery.delete(1.0,END)
                self.textareaAddDelivery.insert(END," STATUS BOX:")
         
            
        def ADD_DELIVER_AGENT(self):
            self.current=6
            self.ADD_DELIVERY_AGENTcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE7.place(y=self.SideStart2+90,width=200,x=235,height=35)
           
  
            self.AddDeliveryFrame=LabelFrame(self.ADD_DELIVERY_AGENTcover,bg="white",labelanchor="n",borderwidth=0)
            self.AddDeliveryFrame.place(x=self.flexX+40,y=self.flexY,width=1090,height=425)

                      
            self.textareaAddDelivery=Text( self.AddDeliveryFrame,width=35,height=5)
            self.textareaAddDelivery.place(x=self.FlexXD+600,y=self.FlexYD+240,)
            self.textareaAddDelivery.insert(END," STATUS BOX:")
        

            self.DeliveryFirstNameTAG=Label(self.AddDeliveryFrame,text='          Enter First Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryFirstNameTAG.place(x=self.FlexXD+20,y=self.FlexYD+20)
            self.DeliveryFirstName=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryFirstName.place(x=self.FlexXD+220,y=self.FlexYD+26,height=30,width=300)

            
            self.DeliverySecondNameTAG=Label(self.AddDeliveryFrame,text='Enter Middle Name:  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliverySecondNameTAG.place(x=self.FlexXD+560,y=self.FlexYD+20)
            self.DeliverySecondName=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliverySecondName.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)
            self.DeliverySecondName.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)

              
            self.DeliveryLastNameTAG=Label(self.AddDeliveryFrame,text='          Enter Last Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryLastNameTAG.place(x=self.FlexXD+20,y=self.FlexYD+80) 
            self.DeliveryLastName=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryLastName.place(x=self.FlexXD+220,y=self.FlexYD+86,height=30,width=300)

            self.DeliveryPostingLocationTAG=Label(self.AddDeliveryFrame,text='Enter Posting Location :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryPostingLocationTAG.place(x=self.FlexXD+560,y=self.FlexYD+80) 
            self.DeliveryPostingLocation=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryPostingLocation.place(x=self.FlexXD+750,y=self.FlexYD+86,height=30,width=300)

            self.DeliveryAddressTAG=Label(self.AddDeliveryFrame,text='          Enter Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryAddressTAG.place(x=self.FlexXD+20,y=self.FlexYD+140) 
            self.DeliveryAddress=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryAddress.place(x=self.FlexXD+220,y=self.FlexYD+146,height=60,width=300)

            self.DeliveryEmailTAG=Label(self.AddDeliveryFrame,text='Enter Email Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryEmailTAG.place(x=self.FlexXD+560,y=self.FlexYD+140) 
            self.DeliveryEmail=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryEmail.place(x=self.FlexXD+750,y=self.FlexYD+146,height=30,width=300)

            self.DeliveryContactTAG=Label(self.AddDeliveryFrame,text='          Enter Contact No :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryContactTAG.place(x=self.FlexXD+20,y=self.FlexYD+230)
            self.DeliveryContact=Entry( self.AddDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryContact.place(x=self.FlexXD+220,y=self.FlexYD+236,height=30,width=300)

            
            


            self.Delivery_Submit=Button(self.AddDeliveryFrame,text='SUBMIT THE ENTRY',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.ADD_DELIVERY_AGENT_submit)
            self.Delivery_Submit.place(x=self.FlexXD+60,y=self.FlexYD+310,width=150)

            self.Delivery_RESET=Button(self.AddDeliveryFrame,text='RESET',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.ADD_DELIVERY_AGENT_reset)
            self.Delivery_RESET.place(x=self.FlexXD+246,y=self.FlexYD+310,width=150)


            self.DELIVERYdisp=ttk.Style()
            self. DELIVERYdisp.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.DELIVERYdisp.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionDELIVERY=ttk.Treeview(self.ADD_DELIVERY_AGENTcover,style="myPRODdisp.Treeview")
            self.itemSectionDELIVERY['columns']=("ID","NAME","ADDRESS","POSTING LOCATON","EMAIL","CONTACT")
            self.itemSectionDELIVERY.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionDELIVERY.column("ID",anchor=W,width=40)
            self.itemSectionDELIVERY.column("NAME",anchor=W,width=200)
            self.itemSectionDELIVERY.column("ADDRESS",anchor=W,width=200)
            self.itemSectionDELIVERY.column("POSTING LOCATON",anchor=W,width=100)
            self.itemSectionDELIVERY.column("EMAIL",anchor=W,width=80)
            self.itemSectionDELIVERY.column("CONTACT",anchor=W,width=80)
       


            self.itemSectionDELIVERY.heading("ID",text="ID",anchor=W)
            self.itemSectionDELIVERY.heading("NAME",text="NAME",anchor=W)
            self.itemSectionDELIVERY.heading("ADDRESS",text="ADDRESS",anchor=W)
            self.itemSectionDELIVERY.heading("POSTING LOCATON",text="POSTING LOCATON",anchor=W)
            self.itemSectionDELIVERY.heading("EMAIL",text="EMAIL",anchor=W)
            self.itemSectionDELIVERY.heading("CONTACT",text="CONTACT",anchor=W)
            self.itemSectionDELIVERY.place(x=self.flexX+40,y=self.FlexYD+490,width=1090,height=100)



        
            
        def EDIT_DELIVERY_AGENT_reset(self):
                for item in  self.itemSectionDELIVERYEDIT.get_children():
                   self.itemSectionDELIVERYEDIT.delete(item)

                self.DeliveryFirstNameEDIT.delete(0,END)
                self.DeliverySecondNameEDIT.delete(0,END)
                self.DeliveryLastNameEDIT.delete(0,END)
                self.DeliveryPostingLocationEDIT.delete(0,END)
                self.DeliveryAddressEDIT.delete(0,END)
                self.DeliveryEmailEDIT.delete(0,END)
                self.DeliveryContactEDIT.delete(0,END)
              
                self.textareaEDITDelivery.delete(1.0,END)
                self.textareaEDITDelivery.insert(END," STATUS BOX:")




        def EDIT_DELIVERY_AGENT_submit(self):
             if str(self.DeliveryFirstNameEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," First Name Field Empty")
                    return

             elif str(self.DeliveryLastNameEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Last Name Field Empty")
                    return
            
             elif str(self.DeliveryPostingLocationEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Posting Location Field Empty")
                    return

             elif str(self.DeliveryAddressEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Address Field Empty")
                    return

             elif str(self.DeliveryEmailEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Email Field Empty")
                    return

             elif str(self.DeliveryContactEDIT.get())=='':
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Contact Field Empty")
                    return

             if len(str(self.DeliveryContactEDIT.get()))!=10:
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END," Invalid Phone Number")
                    return

             self.EDIT_DeliveryAgent_mySQL=self.MYSQLconnection.cursor()
             self.CurItem2=self.itemSectionDELIVERYEDIT.focus()
             self.A1=self.itemSectionDELIVERYEDIT.item( self.CurItem2)
             
                       
             self.EDIT_DeliveryAgent_mySQL.execute("update deliverymember set fname='"+str(self.DeliveryFirstNameEDIT.get())+"',mname='"+str(self.DeliverySecondNameEDIT.get())+"',lname='"+str(self.DeliveryLastNameEDIT.get())+"',pnum="+str(self.DeliveryContactEDIT.get())+",email='"+str(self.DeliveryEmailEDIT.get())+"',Address='"+str(self.DeliveryAddressEDIT.get())+"',location='"+str(self.DeliveryPostingLocationEDIT.get())+"' where did='"+str(self.A1.get('values')[0])+"'")
             self.EDIT_DeliveryAgent_mySQL.execute("commit")
             self.EDIT_DeliveryAgent_mySQL.close()
             self.textareaEDITDelivery.delete(1.0,END)
             self.textareaEDITDelivery.insert(END," QTY Updated\n Successfully") 
             self.textareaEDITDelivery.delete(1.0,END)
             self.textareaEDITDelivery.insert(END,"  Data Entered Successfully")







        def EDIT_searchBYidORNameDeliveryAgent(self):
        
            self.EDIT_DeliveryAgent_mySQL=self.MYSQLconnection.cursor()
            for item in self.itemSectionDELIVERYEDIT.get_children():
                    self.itemSectionDELIVERYEDIT.delete(item)

            if(len(self.userSearchEDITIDDelivery.get())!=0):
                self.EDIT_DeliveryAgent_mySQL.execute("select *from deliverymember where did = "+str(self.userSearchEDITIDDelivery.get()))
                self.DeliverySearchByIdEdit=self.EDIT_DeliveryAgent_mySQL.fetchall()  

                if self.DeliverySearchByIdEdit==[]:
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END,"Record Doesnt Exist")
                    return
                self.EditCount4=0
                for X in self.DeliverySearchByIdEdit:  
                    self.MYSQLDeloveryname=str(self.DeliverySearchByIdEdit[self.EditCount4][1])+" "+str(self.DeliverySearchByIdEdit[self.EditCount4][2])+" "+str(self.DeliverySearchByIdEdit[self.EditCount4][3])
                    self.itemSectionDELIVERYEDIT.insert("",'end',iid=self.EditCount4,values=(X[0],self.MYSQLDeloveryname,X[6],X[8],X[5],X[4]))
                    self.EditCount4 =self.EditCount4+1
                self.userSearchEDITIDDelivery.delete(0,END)

            if(len(self.userSearchDeliveryEDITName.get())!=0):
                self.NameSplit=str(self.userSearchDeliveryEDITName.get()).split(" ")
                self.EDIT_DeliveryAgent_mySQL.execute("select *from deliverymember where fname like "+"'%"+self.NameSplit[0]+"%'")
                self.DeliverySearchByIdEdit=self.EDIT_DeliveryAgent_mySQL.fetchall()  
                
                if self.DeliverySearchByIdEdit==[]:
                    self.textareaEDITDelivery.delete(1.0,END)
                    self.textareaEDITDelivery.insert(END,"Record Doesnt Exist")
                    return
                self.EditCount4=0
                for X in self.DeliverySearchByIdEdit:  
                     self.MYSQLDeloveryname=str(self.DeliverySearchByIdEdit[self.EditCount4][1])+" "+str(self.DeliverySearchByIdEdit[self.EditCount4][2])+" "+str(self.DeliverySearchByIdEdit[self.EditCount4][3])
                     self.itemSectionDELIVERYEDIT.insert("",'end',iid=self.EditCount4,values=(X[0],self.MYSQLDeloveryname,X[6],X[8],X[5],X[4],))
                     self.EditCount4 =self.EditCount4+1
                self.userSearchDeliveryEDITName.delete(0,END)

            self.textareaEDITDelivery.delete(1.0,END)
            self.textareaEDITDelivery.insert(END," Please Select the\n Product")
            
            self.EDIT_DeliveryAgent_mySQL.close()


        def EDIT_DELIVERY_AGENT(self):
            self.current=7
       
            self.EDIT_DELIVERY_AGENTcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE8.place(y=self.SideStart2+135,width=200,x=235,height=35)

            self.DELIVERYEDITdisp=ttk.Style()
            self. DELIVERYEDITdisp.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.DELIVERYEDITdisp.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionDELIVERYEDIT=ttk.Treeview(self.EDIT_DELIVERY_AGENTcover,style="myPRODdisp.Treeview")
            self.itemSectionDELIVERYEDIT['columns']=("ID","NAME","ADDRESS","POSTING LOCATON","EMAIL","CONTACT")
            self.itemSectionDELIVERYEDIT.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionDELIVERYEDIT.column("ID",anchor=W,width=40)
            self.itemSectionDELIVERYEDIT.column("NAME",anchor=W,width=200)
            self.itemSectionDELIVERYEDIT.column("ADDRESS",anchor=W,width=200)
            self.itemSectionDELIVERYEDIT.column("POSTING LOCATON",anchor=W,width=100)
            self.itemSectionDELIVERYEDIT.column("EMAIL",anchor=W,width=80)
            self.itemSectionDELIVERYEDIT.column("CONTACT",anchor=W,width=80)
        

            self.itemSectionDELIVERYEDIT.heading("ID",text="ID",anchor=W)
            self.itemSectionDELIVERYEDIT.heading("NAME",text="PRODUCT NAME",anchor=W)
            self.itemSectionDELIVERYEDIT.heading("ADDRESS",text="ADDRESS",anchor=W)
            self.itemSectionDELIVERYEDIT.heading("POSTING LOCATON",text="POSTING LOCATON",anchor=W)
            self.itemSectionDELIVERYEDIT.heading("EMAIL",text="EMAIL",anchor=W)
            self.itemSectionDELIVERYEDIT.heading("CONTACT",text="CONTACT",anchor=W)
 
            self.itemSectionDELIVERYEDIT.place(x=self.flexX+40,y=self.flexY+80,width=1090,height=100)

            self.userSearchDeliverEDITIDTAG=Label(self.EDIT_DELIVERY_AGENTcover,text='Search by ID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchDeliverEDITIDTAG.place(x=self.flexX+60,y=self.flexY+20)
            self.userSearchEDITIDDelivery=Entry(self.EDIT_DELIVERY_AGENTcover,width=25,relief=SUNKEN)
            self.userSearchEDITIDDelivery.place(x=self.flexX+180,y=self.flexY+26,height=30)

             #Product Search by Name
            self.userSearchDeliveryEDITNameTAG=Label(self.EDIT_DELIVERY_AGENTcover,text='Search by Name :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchDeliveryEDITNameTAG.place(x=self.flexX+380,y=self.flexY+20)
            self.userSearchDeliveryEDITName=Entry(self.EDIT_DELIVERY_AGENTcover,width=45,relief=SUNKEN)
            self.userSearchDeliveryEDITName.place(x=self.flexX+600,y=self.flexY+26,height=30)

            self.DeliverEDITSearchsubmit=Button(self.EDIT_DELIVERY_AGENTcover,text='Search',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.EDIT_searchBYidORNameDeliveryAgent)
            self.DeliverEDITSearchsubmit.place( x=self.flexX+910,y=self.flexY+17,width=130)


            self.EditDeliveryFrame=LabelFrame(self.EDIT_DELIVERY_AGENTcover,bg="white",labelanchor="n",borderwidth=0)
            self.EditDeliveryFrame.place(x=self.flexX+40,y=self.flexY+200,width=1090,height=425)

            self.DeliveryFirstNameEDITTAG=Label(self.EditDeliveryFrame,text='          Enter First Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryFirstNameEDITTAG.place(x=self.FlexXD+20,y=self.FlexYD+20)
            self.DeliveryFirstNameEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryFirstNameEDIT.place(x=self.FlexXD+220,y=self.FlexYD+26,height=30,width=300)

            
            self.DeliverySecondNameEDITTAG=Label(self.EditDeliveryFrame,text='Enter Middle Name:  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliverySecondNameEDITTAG.place(x=self.FlexXD+560,y=self.FlexYD+20)
            self.DeliverySecondNameEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliverySecondNameEDIT.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)
            self.DeliverySecondNameEDIT.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)

              
            self.DeliveryLastNameEDITTAG=Label(self.EditDeliveryFrame,text='          Enter Last Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryLastNameEDITTAG.place(x=self.FlexXD+20,y=self.FlexYD+80) 
            self.DeliveryLastNameEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryLastNameEDIT.place(x=self.FlexXD+220,y=self.FlexYD+86,height=30,width=300)

            self.DeliveryPostingLocationEDITTAG=Label(self.EditDeliveryFrame,text='Enter Posting Location :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryPostingLocationEDITTAG.place(x=self.FlexXD+560,y=self.FlexYD+80) 
            self.DeliveryPostingLocationEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryPostingLocationEDIT.place(x=self.FlexXD+750,y=self.FlexYD+86,height=30,width=300)

            self.DeliveryAddressEDITTAG=Label(self.EditDeliveryFrame,text='          Enter Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryAddressEDITTAG.place(x=self.FlexXD+20,y=self.FlexYD+140) 
            self.DeliveryAddressEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryAddressEDIT.place(x=self.FlexXD+220,y=self.FlexYD+146,height=60,width=300)

            self.DeliveryEmailEDITTAG=Label(self.EditDeliveryFrame,text='Enter Email Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryEmailEDITTAG.place(x=self.FlexXD+560,y=self.FlexYD+140) 
            self.DeliveryEmailEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryEmailEDIT.place(x=self.FlexXD+750,y=self.FlexYD+146,height=30,width=300)

            self.DeliveryContactEDITTAG=Label(self.EditDeliveryFrame,text='          Enter Contact No :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DeliveryContactEDITTAG.place(x=self.FlexXD+20,y=self.FlexYD+230)
            self.DeliveryContactEDIT=Entry( self.EditDeliveryFrame,width=45,relief=SUNKEN)
            self.DeliveryContactEDIT.place(x=self.FlexXD+220,y=self.FlexYD+236,height=30,width=300)

            
            self.textareaEDITDelivery=Text( self.EditDeliveryFrame,width=35,height=5)
            self.textareaEDITDelivery.place(x=self.FlexXD+600,y=self.FlexYD+240,)
            self.textareaEDITDelivery.insert(END," STATUS BOX:")


            self.Delivery_SubmitEDIT=Button(self.EditDeliveryFrame,text='UPDATE THE ENTRY',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.EDIT_DELIVERY_AGENT_submit)
            self.Delivery_SubmitEDIT.place(x=self.FlexXD+60,y=self.FlexYD+310,width=150)

            self.Delivery_RESETEDIT=Button(self.EditDeliveryFrame,text='RESET',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.EDIT_DELIVERY_AGENT_reset)
            self.Delivery_RESETEDIT.place(x=self.FlexXD+246,y=self.FlexYD+310,width=150)






        def SELLER_AGENT_submit(self):
         

             if str(self.SELLERFirstName.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Company Name Field Empty")
                    return
             elif str(self.SELLERSecondName.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," First Name Field Empty")
                    return

             elif str(self.SELLERLastName.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Last Name Field Empty")
                    return
            
             elif str(self.SELLERAddress.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Address Field Empty")
                    return

             elif str(self.SELLEREmail.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Email Field Empty")
                    return

             elif str(self.SELLERContact.get())=='':
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Contact Field Empty")
                    return

             if len(str(self.SELLERContact.get()))!=10:
                    self.textareaSELLER.delete(1.0,END)
                    self.textareaSELLER.insert(END," Invalid Phone Number")
                    return

             self.Add_Seller_mySQL=self.MYSQLconnection.cursor()
             self.Add_Seller_mySQL_insertQuery="INSERT INTO seller (company_name,fname,lname,pnum,email,addr) values (%s,%s,%s,%s,%s,%s)"
             self.Add_Seller_mySQL_insertQueryVALUES=(str(self.SELLERFirstName.get()), str(self.SELLERSecondName.get()), str(self.SELLERLastName.get()),int(self.SELLERContact.get()),str(self.SELLEREmail.get()),str(self.SELLERAddress.get()))
             self.Add_Seller_mySQL.execute(self.Add_Seller_mySQL_insertQuery,self.Add_Seller_mySQL_insertQueryVALUES)
             self.Add_Seller_mySQL.execute('commit')
             self.Add_Seller_mySQL.close()
             self.itemSectionSELLER.insert("",'end',iid=1,values=("1",(str(self.SELLERFirstName.get())+" "+str(self.SELLERSecondName.get())+" "+str(self.SELLERLastName.get())) ,str(self.SELLERAddress.get()),str(self.SELLEREmail.get()),str(self.SELLERContact.get())))
             self.textareaSELLER.delete(1.0,END)
             self.textareaSELLER.insert(END,"  Data Entered Successfully")



        def SELLER_AGENT_reset(self):
                for item in  self.itemSectionSELLER.get_children():
                   self.itemSectionSELLER.delete(item)

                self.SELLERFirstName.delete(0,END)
                self.SELLERSecondName.delete(0,END)
                self.SELLERLastName.delete(0,END)
                self.SELLERAddress.delete(0,END)
                self.SELLEREmail.delete(0,END)
                self.SELLERContact.delete(0,END)
           
              
                self.itemSectionSELLER.delete(0,END)
                self.itemSectionSELLER.insert(END," STATUS BOX:")


        def ADD_SELLER(self):
            self.current=8
            self.UPDATE_SELLERcover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE9.place(y=self.SideStart2+180,width=200,x=235,height=35)
            self.SELLERFrame=LabelFrame(self.UPDATE_SELLERcover,bg="white",labelanchor="n",borderwidth=0)
            self.SELLERFrame.place(x=self.flexX+40,y=self.flexY,width=1090,height=425)

                      
            self.textareaSELLER=Text( self.SELLERFrame,width=35,height=5)
            self.textareaSELLER.place(x=self.FlexXD+600,y=self.FlexYD+240,)
            self.textareaSELLER.insert(END," STATUS BOX:")
        

            self.SELLERFirstNameTAG=Label(self.SELLERFrame,text='          Company Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLERFirstNameTAG.place(x=self.FlexXD+20,y=self.FlexYD+20)
            self.SELLERFirstName=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLERFirstName.place(x=self.FlexXD+220,y=self.FlexYD+26,height=30,width=300)

            
            self.SELLERSecondNameTAG=Label(self.SELLERFrame,text='Owner First Name:  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLERSecondNameTAG.place(x=self.FlexXD+560,y=self.FlexYD+20)
            self.SELLERSecondName=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLERSecondName.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)
            self.SELLERSecondName.place(x=self.FlexXD+750,y=self.FlexYD+26,height=30,width=300)

              
            self.SELLERLastNameTAG=Label(self.SELLERFrame,text='          Owner Last Name :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLERLastNameTAG.place(x=self.FlexXD+20,y=self.FlexYD+80) 
            self.SELLERLastName=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLERLastName.place(x=self.FlexXD+220,y=self.FlexYD+86,height=30,width=300)


            self.SELLERAddressTAG=Label(self.SELLERFrame,text='          Enter Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLERAddressTAG.place(x=self.FlexXD+20,y=self.FlexYD+140) 
            self.SELLERAddress=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLERAddress.place(x=self.FlexXD+220,y=self.FlexYD+146,height=60,width=300)

            self.SELLEREmailTAG=Label(self.SELLERFrame,text='Enter Email Address :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLEREmailTAG.place(x=self.FlexXD+560,y=self.FlexYD+80) 
            self.SELLEREmail=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLEREmail.place(x=self.FlexXD+750,y=self.FlexYD+86,height=30,width=300)

            self.SELLERContactTAG=Label(self.SELLERFrame,text='          Enter Contact No :  ',bg="white",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SELLERContactTAG.place(x=self.FlexXD+20,y=self.FlexYD+230)
            self.SELLERContact=Entry( self.SELLERFrame,width=45,relief=SUNKEN)
            self.SELLERContact.place(x=self.FlexXD+220,y=self.FlexYD+236,height=30,width=300)

            
        
            self.SELLER_Submit=Button(self.SELLERFrame,text='SUBMIT THE ENTRY',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.SELLER_AGENT_submit)
            self.SELLER_Submit.place(x=self.FlexXD+60,y=self.FlexYD+310,width=150)

            self.SELLER_RESET=Button(self.SELLERFrame,text='RESET',padx=20,pady=10,font=('Microsoft JhengHei',10,'bold'),command=self.SELLER_AGENT_reset)
            self.SELLER_RESET.place(x=self.FlexXD+246,y=self.FlexYD+310,width=150)

            self.SELLERdisp=ttk.Style()
            self. SELLERdisp.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.SELLERdisp.configure("mystyle.Treeview",font=('Microsoft JhengHei',9))
            self.itemSectionSELLER=ttk.Treeview(self.UPDATE_SELLERcover,style="myPRODdisp.Treeview")
            self.itemSectionSELLER['columns']=("ID","NAME","ADDRESS","EMAIL","CONTACT")
            self.itemSectionSELLER.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSectionSELLER.column("ID",anchor=W,width=40)
            self.itemSectionSELLER.column("NAME",anchor=W,width=200)
            self.itemSectionSELLER.column("ADDRESS",anchor=W,width=200)
            self.itemSectionSELLER.column("EMAIL",anchor=W,width=80)
            self.itemSectionSELLER.column("CONTACT",anchor=W,width=80)
       
            self.itemSectionSELLER.heading("ID",text="ID",anchor=W)
            self.itemSectionSELLER.heading("NAME",text="NAME",anchor=W)
            self.itemSectionSELLER.heading("ADDRESS",text="ADDRESS",anchor=W)
            self.itemSectionSELLER.heading("EMAIL",text="EMAIL",anchor=W)
            self.itemSectionSELLER.heading("CONTACT",text="CONTACT",anchor=W)
            self.itemSectionSELLER.place(x=self.flexX+40,y=self.FlexYD+490,width=1090,height=100)



        def UpdateSpecs1(self):
            if self.SetProduct.get()=="":
                self.SetSearchIDTEXT.delete(1.0,END)
                self.SetSearchIDTEXT.insert(END,"Search ID Field\nEmpty")
                return
            self.UpdateSPECS_mySQL=self.MYSQLconnection.cursor()
            self.UpdateSPECS_mySQL.execute("select *from product where pid like '"+str(self.SetProduct.get())+"'")
            self.FetchedData=self.UpdateSPECS_mySQL.fetchall()

            if self.FetchedData==[]:
                self.SetSearchIDTEXT.delete(0,END)
                self.SetSearchIDTEXT.insert(END,"Record Doesnt Exist")
                self.UpdateSPECS_mySQL.close()
                return
           
            self.UpdateSPECS_mySQL.execute("Update product set spec='"+str(self.textareaProductSpecification.get("1.0",END))+"' where pid like '"+str(self.SetProduct.get())+"'")
            self.UpdateSPECS_mySQL.execute("commit")
            self.UpdateSPECS_mySQL.close()
            self.SetSearchIDTEXT.delete(1.0,END)
            self.textareaProductSpecification.delete(1.0,END)
            self.SetSearchIDTEXT.insert(END,"Product Specification\nUpdated Successfully")
            self.SetProduct.delete(0,END)

        def UpdateDescription(self):

            if self.SetProduct.get()=="":
                self.SetSearchIDTEXT.delete(1.0,END)
                self.SetSearchIDTEXT.insert(END,"Search ID Field\nEmpty")
                return
            self.UpdateSPECS_mySQL=self.MYSQLconnection.cursor()
            self.UpdateSPECS_mySQL.execute("select *from product where pid like '"+str(self.SetProduct.get())+"'")
            self.FetchedData=self.UpdateSPECS_mySQL.fetchall()

            if self.FetchedData==[]:
                self.SetSearchIDTEXT.delete(0,END)
                self.SetSearchIDTEXT.insert(END,"Record Doesnt Exist")
                self.UpdateSPECS_mySQL.close()
                return
            self.UpdateSPECS_mySQL.execute("Update product set des='"+str(self.textareaProductDescription.get("1.0",END))+"' where pid like '"+str(self.SetProduct.get())+"'")
            self.UpdateSPECS_mySQL.execute("commit")
            self.UpdateSPECS_mySQL.close()
            self.SetSearchIDTEXT.delete(1.0,END)
            self.textareaProductDescription.delete(1.0,END)
            self.SetSearchIDTEXT.insert(END,"Product Description\nUpdated Successfully")
            self.SetProduct.delete(0,END)

            
        def UPDATE_ADVERTISEMENTS(self):
            self.current=9
            self.FlexXD1=340
            self.UPDATE_ADScover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE10.place(y=self.SideStart2+225,width=200,x=235,height=35)
            self.SepcificationTAG=Label(self.UPDATE_ADScover,text='Enter Product Specifications :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SepcificationTAG.place(x=self.FlexXD1+40,y=self.FlexYD+26) 
            self.textareaProductSpecification=Text(self.UPDATE_ADScover,width=50,height=30)
            self.textareaProductSpecification.place(x=self.FlexXD1+40,y=self.FlexYD+70)
            self.textareaProductSpecification.insert(END," STATUS BOX:")

            self.DescriptionTAG=Label(self.UPDATE_ADScover,text='Enter Product Description :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.DescriptionTAG.place(x=self.FlexXD1+440+40,y=self.FlexYD+26) 
            self.textareaProductDescription=Text(self.UPDATE_ADScover,width=50,height=30)
            self.textareaProductDescription.place(x=self.FlexXD1+40+440,y=self.FlexYD+70)
            self.textareaProductDescription.insert(END," STATUS BOX:")

            self.SetProductTAG=Label(self.UPDATE_ADScover,text='Enter ProductID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.SetProductTAG.place(x=self.FlexXD+40,y=self.FlexYD+80) 
            self.SetProduct=Entry( self.UPDATE_ADScover,width=45,relief=SUNKEN)
            self.SetProduct.place(x=self.FlexXD+40,y=self.FlexYD+120,height=30,width=280)

            self.SetSearchIDTEXT=Text(self.UPDATE_ADScover,width=34,height=5)
            self.SetSearchIDTEXT.place(x=self.FlexXD+40,y=self.FlexYD+190)
            self.SetSearchIDTEXT.insert(END," STATUS BOX:")

            self.UpdateSpecs=Button(self.UPDATE_ADScover,text='Update Sepcifications',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.UpdateSpecs1)
            self.UpdateSpecs.place(x=self.FlexXD+40,y=self.FlexYD+310,width=130)

            self.UpdateDesc=Button(self.UPDATE_ADScover,text='Update Descriptions',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.UpdateDescription)
            self.UpdateDesc.place(x=self.FlexXD+185,y=self.FlexYD+310,width=130)


        def SEND_NEWLETTERS(self):
            self.current=10
            self.SEND_NEWLETTERScover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE11.place(y=self.SideStart3+45,width=200,x=235,height=35)
        
        def SEND_MAIL_DELIVERYagent(self):
            self.current=11
            self.EMAIL_DELIVERY_AGENTScover.place(y=90,x=267,width=1300,height=710)
            self.DashBoardSIDE12.place(y=self.SideStart3+90,width=200,x=235,height=35)
      
class invoiceDesign:
    
    img1="C:/Users/Lloyd/Desktop/Craftoza/Invoice/Final Non Tested Invoice/Main Template.png"
    img2="C:/Users/Lloyd/Desktop/Craftoza/Invoice/3.png"
    img3="C:/Users/Lloyd\Desktop/Craftoza/Invoice/2.png"
    img4="C:/Users/Lloyd/Desktop/Craftoza/Invoice/1.png"
    GrandTotal=0
    GrandTaxTotal=0
    

    def __init__(self,x):  
        self.ParentPath="C:/Invoice PDFs Craftoza"
        self.ChildPath=str(self.ParentPath)+"/"+str(x)+".pdf"
        self.c=canvas.Canvas( self.ChildPath)
        self.d=canvas.Canvas( self.ChildPath)
        self.c.drawImage(self.img1,0,-140,width=210*mm,preserveAspectRatio=True,mask='auto')
    

    def QR(self,UDC):
        qr=QRCodeImage(UDC,size=30*mm)
        qr.drawOn(self.c,35,415)
    

    def Seller(self,Name,Ward,Village_City,Taluka_State):
        self.c.drawString(28,700,Name)
        self.c.drawString(28,685,Ward)
        self.c.drawString(28,670,Village_City)
        self.c.drawString(28,655,Taluka_State)
    
        

    def BillingAddress(self,Name,Ward,Village_City,Taluka_State,Pincode):
        self.c.drawRightString(560,700,Name)
        self.c.drawRightString(560,685,Ward)
        self.c.drawRightString(560,670,Village_City)
        self.c.drawRightString(560,655,Taluka_State)
        self.c.drawRightString(560,640,Pincode)
       

    def ShippingAddress(self,Name,Ward,Village_City,Taluka_State,Pincode):
        self.c.drawRightString(560,560,Name)
        self.c.drawRightString(560,545,Ward)
        self.c.drawRightString(560,530,Village_City)
        self.c.drawRightString(560,515,Taluka_State)
        self.c.drawRightString(560,500,Pincode)
      

    def OrderDeets(self,OrderDate,Customer_ID,UDC):
        self.c.drawString(180,575,OrderDate)
        self.c.drawString(107,553,Customer_ID)
        self.c.drawString(158,526,UDC)


    def TableTitle(self):
        self.c.drawImage(self.img2,28,375,width=190.544*mm,preserveAspectRatio=True,mask='auto')


    def UpdateTableNew(self,ProductName,UnitPrice,Discount,Qty,NetAmount,TaxRate,TaxAmount,TotalAmount):
            i=325
            z=i+28
            self.c.setFont('Helvetica', 8)
            self.c.drawImage(self.img3,28,i,width=190.544*mm,preserveAspectRatio=True,mask='auto')
            self.c.drawString(37,z,str("1"))
            self.c.drawString(60,z,str(ProductName))
            self.c.drawString(315,z,str(UnitPrice))
            self.c.drawString(370,z,str(Discount))
            self.c.drawString(409,z,str(Qty))
            self.c.drawRightString(449,z,str(NetAmount))
            self.c.drawRightString(472,z,str(TaxRate))
            self.c.drawRightString(505,z,str(TaxAmount))
            self.c.drawRightString(560,z,str(TotalAmount))
            i=i-50
        
    def update(self):
        self.c.showPage()
        self.c.save()



class OrderPool:
          
    def __init__(self):
            self.OP=Tk()
            self.MYSQLconnection2=mysql.connect(host="localhost",user="root",password="",database="craftozalloyd",port=3307)
            self.OP.title('CRAFTOZA Admin Panel')
            self.OP.configure(bg='whitesmoke')
            self.OP.geometry('1366x768')
            self.OP.state('zoomed')
            self.tabControl = ttk.Notebook(self.OP)
            self.tab1 = Frame(self.tabControl,width=1600,height=710,bg="whitesmoke")
            self.tab2 = Frame(self.tabControl,width=1600,height=710,bg="whitesmoke")
            self.tabControl.add(self.tab1, text='Order Pool')
            self.tabControl.add(self.tab2, text='Order Invoice')
            self.tabControl.place(y=90,x=0)
            style=ttk.Style()
            style.theme_create( "MyStyle", parent="classic", settings={
        "TNotebook": {"configure": {"tabmargins": [0, 0, 0, 0] } },
        "TNotebook.Tab": {
            "configure": {"padding": [50, 12], "background":"#CD3333", "foreground":"white"  },
            "map":       {"background": [("selected", "#CD3333")],
                          "expand": [("selected", [1, 1, 1, 0])] } } } )
     

            style.theme_use("MyStyle")
            self.Main_TitleOP=Frame(self.OP,height=90,bg="#CD3333")
            self.Main_TitleOP.pack(fill=X)
            self.imggOP=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/redImage1.png")
            self.resizeIMGOP= self.imggOP.resize((180,45))
            self.imgOP=ImageTk.PhotoImage( self.resizeIMGOP)
            self.TitleImageOP=Label(self.Main_TitleOP,image= self.imgOP,bg="#CD3333")
            self.TitleImageOP.place(x=130,y=45,anchor=CENTER)
            
            self.LOGOUTOP=Label(self.Main_TitleOP,bg="#CD3333",text="Log Out",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.LOGOUTOP.place(y=25,width=120,x=1400,height=70)
            self.SITEOP=Label(self.Main_TitleOP,bg="#CD3333",text="Change Password",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.SITEOP.place(y=25,width=120,x=1280,height=70)
            self.OPENWEBOP=Label(self.Main_TitleOP,bg="#CD3333",text="Open Website",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.OPENWEBOP.place(y=25,width=120,x=1145,height=70)

 
            self.TreeviewTAG=Label(self.tab1,bg="whitesmoke",text="ORDER POOL",fg='black' ,font=('century gothic',14),justify=CENTER)
            self.TreeviewTAG.place(y=20,width=126,x=59,height=70)

     
            self.OrderPOOLTable=ttk.Style()
            self. OrderPOOLTable.configure("mystyle.Treeview.Heading",font=('century gothic',11,),background="#EE3B3B",foreground="white")
            self.OrderPOOLTable.configure("mystyle.Treeview",font=('Microsoft JhengHei',9),background="white",foreground="black")
            self.iteamSectionOP=ttk.Treeview(self.tab1,style="mystyle.Treeview")
            self.OrderPOOLTable.map("Treeview",background=[('selected','light blue')])
            self.iteamSectionOP['columns']=("UDC","Pid","Did","Uid","Quantity","Status","Delivery Address","Invoice Generated Status")
            self.iteamSectionOP.column("#0",anchor=W,width=0,stretch=NO)
            self.iteamSectionOP.column("UDC",anchor=W,width=90)
            self.iteamSectionOP.column("Pid",anchor=W,width=30)
            self.iteamSectionOP.column("Did",anchor=W,width=30)
            self.iteamSectionOP.column("Uid",anchor=W,width=30)
            self.iteamSectionOP.column("Quantity",anchor=W,width=30)
            self.iteamSectionOP.column("Status",anchor=W,width=30)
            self.iteamSectionOP.column("Delivery Address",anchor=W,width=130)
            self.iteamSectionOP.column("Invoice Generated Status",anchor=W,width=80)
       
            self.iteamSectionOP.heading("UDC",text="Unique Delivery Code",anchor=W)
            self.iteamSectionOP.heading("Pid",text="Product ID",anchor=W)
            self.iteamSectionOP.heading("Did",text="Delivery Agent ID",anchor=W)
            self.iteamSectionOP.heading("Uid",text="User ID",anchor=W)
            self.iteamSectionOP.heading("Quantity",text="Quantity",anchor=W)
            self.iteamSectionOP.heading("Status",text="Status",anchor=W)
            self.iteamSectionOP.heading("Delivery Address",text="Delivery Address",anchor=W)
            self.iteamSectionOP.heading("Invoice Generated Status",text="Invoice Generated Status",anchor=W)
            self.iteamSectionOP.place(x=65,y=76,width=1400,height=500)

            self.x=threading.Thread(target=self.Update_OrderPOOL)
            self.x.start()

            self.OPRefresh=Button(self.tab1,text='Refresh',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.Update_OrderPOOL2)
            self.OPRefresh.place(x=1300,y=600,width=130,height=30)

            self.OPRefresh=Button(self.tab1,text='Update Invoice Folder',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.Update_PDFfolderInvoice)
            self.OPRefresh.place(x=1140,y=600,width=130,height=30)


            self.TAB2FRAME=LabelFrame(self.tab2,bg="white",labelanchor="n",borderwidth=0)
            self.TAB2FRAME.place(x=210,y=100,width=1090,height=425)

            self.OPUpdateFolderViewLIst=Button(self.TAB2FRAME,text='Update List',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.UpdateFolderLIST)
            self.OPUpdateFolderViewLIst.place(x=350,y=50,width=130,height=30)
            
            self.OPUpdateFolderViewLIst1=Button(self.TAB2FRAME,text='Open PDF',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.UpdateFolderShowPDF)
            self.OPUpdateFolderViewLIst1.place(x=350,y=100,width=130,height=30)

            self.OPUpdateFolderViewLIst2=Button(self.TAB2FRAME,text='Print PDF',padx=20,pady=10,font=('Microsoft JhengHei',8,'bold'),command=self.PrintSelected)
            self.OPUpdateFolderViewLIst2.place(x=350,y=150,width=130,height=30)

            self.PdfFolderViewTAG=Label(self.TAB2FRAME,bg="whitesmoke",text="Invoice PDF Directory View",fg='black' ,font=('Century gothic',12),justify=CENTER)
            self.PdfFolderViewTAG.place(x=46,y=50,width=260,height=35)
            self.PdfFolderView=Listbox(self.TAB2FRAME,bg="#FCFCFC",borderwidth=0,fg='black',highlightthickness=0,font=('roboto',10),activestyle=None,selectborderwidth=0,relief=FLAT)
            self.PdfFolderView.place(x=46,y=90,width=260,height=280)

            for Directory in os.walk(r"C:\Invoice PDFs Craftoza"):
                content=Directory[2]
            
            for i in content:
                self.PdfFolderView.insert(END,str(i))

            self.textareaOP5=Text( self.TAB2FRAME,width=35,height=5)
            self.textareaOP5.place(x=520,y=50,)
            self.textareaOP5.insert(END," STATUS BOX:")


            
            
          
     
       
            self.OP.mainloop()
            
    def UpdateFolderLIST(self):
         self.PdfFolderView.delete(0,END)
         for Directory in os.walk(r"C:\Invoice PDFs Craftoza"):
                content=Directory[2]
            
         for i in content:
                self.PdfFolderView.insert(END,str(i))

    def UpdateFolderShowPDF(self):
        self.PATHPDF="C:/Invoice PDFs Craftoza/"+str(self.PdfFolderView.get(ACTIVE))
        wb.open_new(self.PATHPDF)
    
    def PrintSelected(self):
        self.PATHPDFprint="C:/Invoice PDFs Craftoza/"+str(self.PdfFolderView.get(ACTIVE))
        try:
            os.startfile(self.PATHPDFprint,"print")
        except Exception as e:
              self.textareaOP5.delete(1.0,END)
              self.textareaOP5.insert(END," Printer Error")




    def Update_OrderPOOL(self):

            while True:
                for item in  self.iteamSectionOP.get_children():
                    self.iteamSectionOP.delete(item)
                self.UpdateOrderPool1_mySQL=self.MYSQLconnection2.cursor()
                self.UpdateOrderPool1_mySQL.execute('COMMIT;')
                self.UpdateOrderPool1_mySQL.execute("SET global TRANSACTION ISOLATION LEVEL READ COMMITTED;")
                self.UpdateOrderPool1_mySQL.execute("select *from orders natural join address;")
                self.UpdateOrderPool1_mySQL_OrderTableAddress=self.UpdateOrderPool1_mySQL.fetchall()
         
        

                self.OPcount=0
                for x in self.UpdateOrderPool1_mySQL_OrderTableAddress:
                    self.NewAddress=str(x[7])+" "+str(x[8])+" "+str(x[9])+" "+str(x[10])+" "+str(x[11])+" "+str(x[12]) 
                    self.iteamSectionOP.insert("",'end',iid= self.OPcount,values=(x[6],x[1],x[2],x[0],x[3],x[4],self.NewAddress,x[5]))
                    self.OPcount= self.OPcount+1
                self.UpdateOrderPool1_mySQL.close()
                time.sleep(10)
    
    def Update_OrderPOOL2(self):
                for item in  self.iteamSectionOP.get_children():
                    self.iteamSectionOP.delete(item)
                self.UpdateOrderPool_mySQL=self.MYSQLconnection2.cursor()
                self.UpdateOrderPool_mySQL.execute("select *from orders natural join address;")
                self.UpdateOrderPool_mySQL_OrderTableAddress=self.UpdateOrderPool_mySQL.fetchall()
        
                self.OPcount=0
                for x in self.UpdateOrderPool_mySQL_OrderTableAddress:
                    self.NewAddress=str(x[7])+" "+str(x[8])+" "+str(x[9])+" "+str(x[10])+" "+str(x[11])+" "+str(x[12]) 
                    self.iteamSectionOP.insert("",'end',iid= self.OPcount,values=(x[0],x[1],x[2],x[6],x[3],x[4],self.NewAddress,x[5]))
                    self.OPcount= self.OPcount+1
                self.UpdateOrderPool_mySQL.close()
                
    
    def Update_PDFfolderInvoice(self):
        UpdatePDF_mySQL=self.MYSQLconnection2.cursor()
        UpdatePDF_mySQL.execute("select udc,pid,did,qnt,status,PrintStatus,fname,mname,lname,hno,wname,villageCity,taluka,state,pincode,pnum,uid from(select *from orders natural join address natural join user)as k where k.PrintStatus like '0'")
        UpdatePDFdata_mySQL=UpdatePDF_mySQL.fetchall()
        
       
        for x in UpdatePDFdata_mySQL:
            NewInstance=invoiceDesign(x[0])   
            name=str(x[6])+" "+str(x[7])+" "+str(x[8])
            addr=str(x[10])+" "+str(x[11])
            UpdatePDF_mySQL.execute(" select *from seller where sid = (select sid from product where pid like '"+str(x[1])+"')")
            currentseller=UpdatePDF_mySQL.fetchall()
            NewInstance.Seller(str(currentseller[0][1]),str(currentseller[0][6]),str(currentseller[0][5]),str(currentseller[0][4]))
            NewInstance.BillingAddress(name,x[9],addr,str(x[12])+" "+str(x[13]),str(x[14]))
            NewInstance.ShippingAddress("Craftoza Warehouse","Reg-2365","Alto-Panjim","Bardez Goa","403604")
            NewInstance.OrderDeets("2-2-2002",str(x[16]),str(x[0]))
            NewInstance.QR(str(x[0]))
            UpdatePDF_mySQL.execute("select pname,price,discnt from product where pid like '"+str(x[1])+"'")
            ProductPrice_mySQL=UpdatePDF_mySQL.fetchall()
            NetAMount=int(ProductPrice_mySQL[0][1])*int(x[3])
            discount=NetAMount-(NetAMount*int(ProductPrice_mySQL[0][2]))
            TaxAMount=discount*(8/100)
            TotalAmount=discount+TaxAMount
            NewInstance.UpdateTableNew(ProductPrice_mySQL[0][0], ProductPrice_mySQL[0][1],ProductPrice_mySQL[0][2],x[3], str(NetAMount),"8",str(TaxAMount),str(TotalAmount))
            UpdatePDF_mySQL.execute("update orders set PrintStatus ='1' where udc ="+str(x[0]))
            NewInstance.TableTitle()
            NewInstance.update()
            UpdatePDF_mySQL.execute('commit')
       
            

if __name__ == '__main__':

    # SPLASHscreen=Splashscreen()
    # OV=OPTION_VERIFICATION()
    x=mainAdmin()
 

    

    
    
    