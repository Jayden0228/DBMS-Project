from cgitb import text
from distutils.cmd import Command
from tkinter import *
from tkinter import ttk
from typing import ItemsView
from PIL import ImageTk, Image
from openpyxl import Workbook,load_workbook
from openpyxl.utils import get_column_letter 
from tkinter import filedialog
import tkinter as tk
import time  


import matplotlib
matplotlib.use("TkAgg")
from matplotlib.backends.backend_tkagg import ( FigureCanvasTkAgg, NavigationToolbar2Tk)
from matplotlib.figure import Figure
     
class temp:
            
        def __init__(self):
            self.AC=Tk()
            self.AC.title('CRAFTOZA Admin Panel')
            self.AC.configure(bg='whitesmoke')
            self.AC.geometry('1366x768')
            self.AC.state('zoomed')
            self.flexX=50
            self.flexY=50
            self.MAINCOLOR="#CD3333"
            self.MAINCOLOR1="#FF3030"
            self.Main_Title=Frame(self.AC,height=90,bg=self.MAINCOLOR)
            self.Main_Title.pack(fill=X)
            self.imgg=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Images/redImage1.png")
            self.resizeIMG= self.imgg.resize((180,45))
            self.img=ImageTk.PhotoImage( self.resizeIMG)
            self.TitleImage=Label(self.Main_Title,image= self.img,bg=self.MAINCOLOR)
            # self.TitleImage.place(relx=.5,rely=.5,anchor=CENTER)
            self.TitleImage.place(x=130,y=45,anchor=CENTER)
            
            self.LOGOUT=Label(self.Main_Title,bg=self.MAINCOLOR,text="Log Out",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.LOGOUT.place(y=25,width=120,x=1400,height=70)
            self.SITE=Label(self.Main_Title,bg=self.MAINCOLOR,text="Change Password",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.SITE.place(y=25,width=120,x=1280,height=70)
            self.POLICY=Label(self.Main_Title,bg=self.MAINCOLOR,text="Open Website",fg='white' ,font=('century gothic',10),justify=CENTER)
            self.POLICY.place(y=25,width=120,x=1145,height=70)


           
            self.SideMenu=Frame(self.AC,bg=self.MAINCOLOR)
            self.SideMenu.place(x=0,width=267,height=710,y=90)
            self.SideStart1=36
            self.INFORMATION=Label(self.SideMenu,bg=self.MAINCOLOR,text="General Information",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.INFORMATION.place(y=0,width=235,x=13,height=35)
            self.DashBoard=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Dashboard",fg='white' ,font=('roboto',11),justify=CENTER)
            self.DashBoard.place(y=self.SideStart1,width=235,x=13,height=35)
            self.productDeets=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Product Info",fg='white' ,font=('roboto',11),justify=CENTER)
            self.productDeets.place(y=self.SideStart1+45,width=235,x=13,height=35)
            self.productStats=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Statistics",fg='white' ,font=('roboto',11),justify=CENTER)
            self.productStats.place(y=self.SideStart1+90,width=235,x=13,height=35)
            self.deliveryAgentDEETS=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Delivery Agent Info",fg='white' ,font=('roboto',11),justify=CENTER)
            self.deliveryAgentDEETS.place(y=self.SideStart1+135,width=235,x=13,height=35)

            self.SideStart2=272
            self.update=Label(self.SideMenu,bg=self.MAINCOLOR,text="Database Updation",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.update.place(y=235,width=235,x=13,height=35)
            self.AddProducts=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Add New Product",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AddProducts.place(y=self.SideStart2,width=235,x=13,height=35)
            self.EditProducts=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Edit Product",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EditProducts.place(y=self.SideStart2+45,width=235,x=13,height=35)
            self.AddDeliveryAgents=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Add Delivery Agent",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AddDeliveryAgents.place(y=self.SideStart2+90,width=235,x=13,height=35)
            self.EditDeliveryAgents=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Edit Delivery Agent",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EditDeliveryAgents.place(y=self.SideStart2+135,width=235,x=13,height=35)
            self.PolicyUpdate=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Update Policy",fg='white' ,font=('roboto',11),justify=CENTER)
            self.PolicyUpdate.place(y=self.SideStart2+180,width=235,x=13,height=35)
            self.AdUpdate=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Update Advertisement",fg='white' ,font=('roboto',11),justify=CENTER)
            self.AdUpdate.place(y=self.SideStart2+225,width=235,x=13,height=35)

            self.SideStart3=553
            self.Communication=Label(self.SideMenu,bg=self.MAINCOLOR,text="Communication",fg='white' ,font=('century gothic',13),justify=CENTER)
            self.Communication.place(y=561,width=235,x=13,height=35)
            self.NewsLetter=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Send Newsletter",fg='white' ,font=('roboto',11),justify=CENTER)
            self.NewsLetter.place(y=self.SideStart3+45,width=235,x=13,height=35)
            self.EmailDeliveryAgent=Label(self.SideMenu,bg=self.MAINCOLOR1,text="Email Delivery Agents",fg='white' ,font=('roboto',11),justify=CENTER)
            self.EmailDeliveryAgent.place(y=self.SideStart3+90,width=235,x=13,height=35)
    
            # self.PRODUCT_INFO(0)
            self.DASHBOARD(0)
            # self.Statistics(0)

            self.AC.mainloop()

        def DASHBOARD(self,event):

            self.DASHBOARDcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.DASHBOARDcover.place(y=90,x=267,width=1300,height=710)

            self.DashBoardSIDE1=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE1.place(y=self.SideStart1,width=235,x=236,height=35)
         

            self.PendingOrdersContainer=LabelFrame(self.DASHBOARDcover,bg="#3A5FCD",labelanchor="n",borderwidth=0)
            self.PendingOrdersContainer.place(y=self.flexY,x=self.flexX+900+30,width=250,height=165)
            self.PendingOrdersTitle=Label(self.PendingOrdersContainer,bg="#3A5FCD",text="Orders Placed",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.PendingOrdersTitle.place(y=110,x=6,width=200,height=50)
            self.PendingOrdersNumber=Label(self.PendingOrdersContainer,bg="#3A5FCD",text="0",fg='white' ,font=('Century gothic',60),justify=CENTER)
            self.PendingOrdersNumber.place(y=20,x=30,width=150,height=100)

            self.OrdersTodayContainer=LabelFrame(self.DASHBOARDcover,bg="#FF3030",labelanchor="n",borderwidth=0)
            self.OrdersTodayContainer.place(y=self.flexY+200,x=self.flexX+900+30,width=250,height=165)
            self.OrdersTodayTitle=Label(self.OrdersTodayContainer,bg="#FF3030",text="Pending Deliveries ",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.OrdersTodayTitle.place(y=110,x=6,width=200,height=50)
            self.OrdersTodayNumber=Label(self.OrdersTodayContainer,bg="#FF3030",text="0",fg='white' ,font=('Century gothic',60),justify=CENTER)
            self.OrdersTodayNumber.place(y=20,x=30,width=150,height=100)

            self.TotalRevenueContainer=LabelFrame(self.DASHBOARDcover,bg="#FFC125",labelanchor="n",borderwidth=0)
            self.TotalRevenueContainer.place(y=self.flexY+400,x=self.flexX+900+30,width=250,height=165)
            self.TotalRevenueTitle=Label(self.TotalRevenueContainer,bg="#FFC125",text="Total Revenue",fg='white' ,font=('Century gothic',13),justify=CENTER)
            self.TotalRevenueTitle.place(y=110,x=22,width=200,height=50)
            self.TotalRevenueNumber=Label(self.TotalRevenueContainer,bg="#FFC125",text="Rs. 0",fg='white' ,font=('Century gothic',35),justify=CENTER)
            self.TotalRevenueNumber.place(y=20,x=10,width=240,height=100)

            self.EmailInbox=Label(self.DASHBOARDcover,bg="#FF3030",text="Email Inbox",fg='white' ,font=('Century gothic',12),justify=CENTER)
            self.EmailInbox.place(x=self.flexX,y=self.flexY,width=380,height=50)
            self.CustomerMails=Listbox(self.DASHBOARDcover,bg="white",borderwidth=0,fg='black',highlightthickness=0,font=('roboto',10),activestyle=None,selectborderwidth=0,relief=FLAT)
            self.CustomerMails.place(x=self.flexX,y=self.flexY+45,width=380,height=180)
            self.CustomerMails.insert(END,"    Message From: Ashlan Crastro")
            self.CustomerMails.insert(END,"    Message From: Edrich Cardozo")
            self.CustomerMails.insert(END,"    Message From: Renza Vas")
            self.CustomerMails.insert(END,"    Message From: Salrima Fernandes")

            
            self.EmailMsgBoxTitle=Label(self.DASHBOARDcover,bg="#FF3030",text="Message Display",fg='white' ,font=('Century gothic',12),justify=CENTER)
            self.EmailMsgBoxTitle.place(x=self.flexX,y=self.flexY+250,width=380,height=50)
            self.textarea=Text( self.DASHBOARDcover,relief=FLAT)
            self.textarea.place(x=self.flexX,y=self.flexY+300,width=380,height=130)

            # self.MidContainer=LabelFrame(self.DASHBOARDcover,bg="white",labelanchor="n",borderwidth=0)
            # self.MidContainer.place(y=self.flexY+190,x=self.flexX,width=750,height=430)

            self.AdminProfile=LabelFrame(self.DASHBOARDcover,bg="white",labelanchor="n",borderwidth=0)
            self.AdminProfile.place(x=self.flexX,y=self.flexY+460,width=380,height=160)
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



        def PRODUCT_INFO(self,event):

            self.PRODUCT_INFOcover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
            self.PRODUCT_INFOcover.place(y=90,x=267,width=1300,height=710)

            self.DashBoardSIDE2=Label(self.SideMenu,bg="#FF3030")
            self.DashBoardSIDE2.place(y=self.SideStart1+45,width=200,x=236,height=35)

            self.style=ttk.Style()
            self. style.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style.configure("mystyle.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSection=ttk.Treeview( self.PRODUCT_INFOcover,style="mystyle.Treeview")
            self.itemSection['columns']=("ID","PRODUCT NAME","TYPE1","TYPE2","PRICE","SELLER","QTY")
            self.itemSection.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSection.column("ID",anchor=W,width=80)
            self.itemSection.column("PRODUCT NAME",anchor=W,width=250)
            self.itemSection.column("TYPE1",anchor=W,width=100)
            self.itemSection.column("TYPE2",anchor=W,width=80)
            self.itemSection.column("PRICE",anchor=W,width=80)
            self.itemSection.column("SELLER",anchor=W,width=100)
            self.itemSection.column("QTY",anchor=W,width=50)


            self.itemSection.heading("ID",text="ID",anchor=W)
            self.itemSection.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSection.heading("TYPE1",text="TYPE1",anchor=W)
            self.itemSection.heading("TYPE2",text="TYPE2",anchor=W)
            self.itemSection.heading("PRICE",text="PRICE",anchor=W)
            self.itemSection.heading("SELLER",text="SELLER",anchor=W)
            self.itemSection.heading("QTY",text="QTY",anchor=W)
            self.itemSection.place(x=self.flexX-10,y=self.flexX,width=900,height=400)


            #Product Description Container
            self.PrdouctContainerColor="snow1"
            self.ProductDisplay=LabelFrame( self.PRODUCT_INFOcover,bg=self.PrdouctContainerColor,labelanchor="n",borderwidth=0)
            self.ProductDisplay.place(x=self.flexX+910,y=self.flexY,width=280,height=400)
            #Product Image
            self.ProductImage=Image.open("C:/Users/Lloyd/Desktop/CLLoyd/Cropped Prod Images/BAG.png")
            self.resizeproductIMG= self.ProductImage.resize((160,160))
            self.ProdImgObj=ImageTk.PhotoImage( self.resizeproductIMG)
            self.ProImageContainer=Label(self.ProductDisplay,image=self.ProdImgObj,bg=self.PrdouctContainerColor)
            self.ProImageContainer.place(x=135,y=100,anchor=CENTER)

            #Product ID
            self.ProductIDTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="ID: ")
            self.ProductIDTAG.place(y=200,x=38,width=50,height=20)
            self.ProductID=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductID.place(y=200,x=90,width=190,height=20)
            self.ProductID.insert(tk.END,"CRAFT-1-1#A")
            self.ProductID.config(state=DISABLED)

            #Product Name
            self.ProductNameTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="NAME: ")
            self.ProductNameTAG.place(y=220,x=23,width=50,height=20)
            self.ProductName=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductName.place(y=220,x=90,width=190,height=20)
            self.ProductName.insert(tk.END,"Bamboo Bag")
            self.ProductName.config(state=DISABLED)

            #Product Type1
            self.ProductType1TAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="TYPE 1: ")
            self.ProductType1TAG.place(y=240,x=23,width=50,height=20)
            self.ProductType1=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductType1.place(y=240,x=90,width=190,height=20)
            self.ProductType1.insert(tk.END,"Bamboo")
            self.ProductType1.config(state=DISABLED)

             #Product Type2
            self.ProductType2TAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="TYPE 2: ")
            self.ProductType2TAG.place(y=260,x=23,width=50,height=20)
            self.ProductType2=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductType2.place(y=260,x=90,width=190,height=20)
            self.ProductType2.insert(tk.END,"Bag")
            self.ProductType2.config(state=DISABLED)

             #Product Seller
            self.ProductSellerTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="SELLER: ")
            self.ProductSellerTAG.place(y=280,x=20,width=52,height=20)
            self.ProductSeller=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductSeller.place(y=280,x=90,width=190,height=20)
            self.ProductSeller.insert(tk.END,"Proud Bardezkar Pvt Ltd")
            self.ProductSeller.config(state=DISABLED)

            #Product Price
            self.ProductPriceTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="PRICE: ")
            self.ProductPriceTAG.place(y=300,x=23,width=52,height=20)
            self.ProductPrice=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductPrice.place(y=300,x=90,width=190,height=20)
            self.ProductPrice.insert(tk.END,"Rs 1500")
            self.ProductPrice.config(state=DISABLED)

             #Product QTY
            self.ProductPriceTAG=Label(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',11,'bold'),relief=FLAT,text="QTY: ")
            self.ProductPriceTAG.place(y=320,x=27,width=52,height=20)
            self.ProductPrice=Text(self.ProductDisplay,bg=self.PrdouctContainerColor,fg='black' ,font=('Century gothic',10),relief=FLAT,foreground="red")
            self.ProductPrice.place(y=320,x=90,width=190,height=20)
            self.ProductPrice.insert(tk.END,"50")
            self.ProductPrice.config(state=DISABLED)


            #Product Search by ID
            self.userSearchTAG=Label( self.PRODUCT_INFOcover,text='Search by ID :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchTAG.place(x=self.flexX,y=self.flexY+420)
            self.userSearch=Entry(self.PRODUCT_INFOcover,width=25,relief=SUNKEN)
            self.userSearch.place(x=self.flexX+120,y=self.flexY+430,height=30)

             #Product Search by Name
            self.userSearchTAG=Label( self.PRODUCT_INFOcover,text='Search by Product Name :  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.userSearchTAG.place(x=self.flexX+290,y=self.flexY+420)
            self.userSearch=Entry(self.PRODUCT_INFOcover,width=45,relief=SUNKEN)
            self.userSearch.place(x=self.flexX+500,y=self.flexY+430,height=30)

             #Search Button
            self.Search1=Button( self.PRODUCT_INFOcover,text='Search',padx=10,pady=8,font=('century gothic',10,),bg='snow1',fg='black',relief=RAISED,)
            self.Search1.place(x=self.flexX+810,y=self.flexY+420,width=80)

                 #Refresh Button
            self.Refresh=Button( self.PRODUCT_INFOcover,text='Refresh',padx=10,pady=8,font=('century gothic',10,),bg='snow1',fg='black',relief=RAISED,)
            self.Refresh.place(x=self.flexX+910,y=self.flexY+420,width=80)



            #Inventory Shortage
            self.InventoryShortageTAG=Label( self.PRODUCT_INFOcover,text='Inventory Shortage Alert  ',bg="whitesmoke",fg='black' ,font=('century gothic',11,),justify=LEFT,pady=10)
            self.InventoryShortageTAG.place(x=self.flexX,y=self.flexY+475)
            self.style1=ttk.Style()
            self. style1.configure("mystyle.Treeview.Heading",font=('Microsoft JhengHei',10,'bold'))
            self.style1.configure("mystyle1.Treeview",font=('Microsoft JhengHei',9),labelanchor="n")
            self.itemSection=ttk.Treeview( self.PRODUCT_INFOcover,style="mystyle1.Treeview")
            self.itemSection['columns']=("ID","PRODUCT NAME","QTY","SELLER")
            self.itemSection.column("#0",anchor=W,width=0,stretch=NO)
            self.itemSection.column("ID",anchor=W,width=50)
            self.itemSection.column("PRODUCT NAME",anchor=W,width=250)
            self.itemSection.column("QTY",anchor=W,width=40)
            self.itemSection.column("SELLER",anchor=W,width=40)

            
            self.itemSection.heading("ID",text="ID",anchor=W)
            self.itemSection.heading("PRODUCT NAME",text="PRODUCT NAME",anchor=W)
            self.itemSection.heading("QTY",text="QTY",anchor=W)
            self.itemSection.heading("SELLER",text="SELLER",anchor=W)
            self.itemSection.place(x=self.flexX,y=self.flexY+515,width=590,height=120)

            #Topup Needed Count     
            self.TopUPContainer=LabelFrame( self.PRODUCT_INFOcover,bg="#FF3030",labelanchor="n",borderwidth=0)
            self.TopUPContainer.place(y=self.flexY+510,x=self.flexX+670+240,width=220,height=125)
            self.TopUTitle=Label(self.TopUPContainer,bg="#FF3030",text="Total Inventory Amount",fg='white' ,font=('Century gothic',13))
            self.TopUTitle.place(y=65,x=6,width=210,height=50)
            self.TopUNumber=Label(self.TopUPContainer,bg="#FF3030",text="0",fg='white' ,font=('Century gothic',40))
            self.TopUNumber.place(y=10,x=35,width=150,height=60)

            #Total Inventory Amount
            self.TopUPContainer=LabelFrame( self.PRODUCT_INFOcover,bg="dodgerblue1",labelanchor="n",borderwidth=0)
            self.TopUPContainer.place(y=self.flexY+510,x=self.flexX+670,width=220,height=125)
            self.TopUTitle=Label(self.TopUPContainer,bg="dodgerblue1",text="Top Ups Needed ",fg='white' ,font=('Century gothic',13))
            self.TopUTitle.place(y=65,x=6,width=210,height=50)
            self.TopUNumber=Label(self.TopUPContainer,bg="dodgerblue1",text="0",fg='white' ,font=('Century gothic',40))
            self.TopUNumber.place(y=10,x=35,width=150,height=60)


        def Statistics(self,event):
             self.STATISTICScover=LabelFrame(self.AC,bg="whitesmoke",labelanchor="n",borderwidth=0)
             self.STATISTICScover.place(y=90,x=267,width=1300,height=710)

             self.DashBoardSIDE3=Label(self.SideMenu,bg="#FF3030")
             self.DashBoardSIDE3.place(y=self.SideStart1+90,width=200,x=236,height=35)
             self.f = Figure(figsize=(5,5), dpi=100)
             self.a = self.f.add_subplot(111)
             self.a.set_xlabel('Sales')
             self.a.set_ylabel('Days')
             self.a.plot([1,2,3,4,5,6,7,8],[5,6,1,3,8,9,3,5])
           

        

             self.canvasMonthlyRevenue = FigureCanvasTkAgg(self.f, self.AC)
             self.canvasMonthlyRevenue .draw()
             self.canvasMonthlyRevenue .get_tk_widget().place(height=390,width=500,x=320,y=150)

            #  self.toolbar = NavigationToolbar2Tk(self.canvas, self.AC)
            #  self.toolbar.update()
            #  self.canvas._tkcanvas.place(height=300,width=400,x=600,y=400)



            







if __name__ == '__main__':
    t=temp()