import mysql.connector as mysql

    #   self.cat1={"Bamboo":"A","Clay":"B","Coconut":"C","Shells":"D","Wood":"E","Glass":"F","Ceramic":"G","Cloth":"H","Plastic":"I","General":"J"}
    #         self.cat2={"Bag":"1","Home Deco":"2","Earthen pots":"3","Juwellry":"4","Funiture":"5","Fashion":"6","Keychain":"7","Cups":"8","General":"9"}
class CategoryWiseGRAPH:

    def __init__(self):
        self.MYSQLconnection=mysql.connect(host="localhost",user="root",password="",database="craftozalloyd",port=3307)

        self.cat1Progress={ "A":0,
                            "B":0,
                            "C":0,
                            "D":0,
                            "E":0,
                            "F":0,
                            "G":0,
                            "H":0,
                            "I":0,
                            "J":0 }
        
        self.cat2Progress={ "1":0,
                            "2":0,
                            "3":0,
                            "4":0,
                            "5":0,
                            "6":0,
                            "7":0,
                            "8":0,
                            "9":0 }
        self.Algorithm_forCAT2()


    def Algorithm_forCAT1(self):
            self.Cat1DataExecuter=self.MYSQLconnection.cursor()
            self.Cat1DataExecuter.execute("commit")
            self.Cat1DataExecuter.execute("select pid,count(pid) from orders group by pid;")
            self.Cat1Data=self.Cat1DataExecuter.fetchall()

            for X in self.Cat1Data:
                PID=X[0].split("-")
                PID=PID[2].split("#")
                self.Cat1DataExecuter.execute("commit")
                self.Cat1DataExecuter.execute("select *from orders where pid like '"+str(X[0])+"'")
                self.Cat1Data2=self.Cat1DataExecuter.fetchall()
                for Y in self.Cat1Data2:
                    self.cat1Progress[str(PID[0])]+=Y[3]
            self.Cat1DataExecuter.close()
            return(self.cat1Progress)

    def Algorithm_forCAT2(self):
            self.Cat1DataExecuter=self.MYSQLconnection.cursor()
            self.Cat1DataExecuter.execute("commit")
            self.Cat1DataExecuter.execute("select pid,count(pid) from orders group by pid;")
            self.Cat1Data=self.Cat1DataExecuter.fetchall()

            for X in self.Cat1Data:
                PID=X[0].split("-")
                PID=PID[2].split("#")
                self.Cat1DataExecuter.execute("commit")
                self.Cat1DataExecuter.execute("select *from orders where pid like '"+str(X[0])+"'")
                self.Cat1Data2=self.Cat1DataExecuter.fetchall()
                for Y in self.Cat1Data2:
                    self.cat2Progress[str(PID[1])]+=Y[3]   
            self.Cat1DataExecuter.close()   
            return(self.cat2Progress)


class General_CraftozaDeets:
    def __init__(self):
        self.MYSQLconnection=mysql.connect(host="localhost",user="root",password="",database="craftozalloyd",port=3307)

    def get_Revenue(self):
        self.GneralDataExecuter=self.MYSQLconnection.cursor()
        self.GneralDataExecuter.execute("select orders.qnt,price,discnt from orders join product on orders.pid=product.pid") 
        self.revenueR=self.GneralDataExecuter.fetchall()
    
        Revenue=0
        for x in self.revenueR:
                discount=(x[1]*x[2])/100
                Revenue+=(x[0]*x[1])-discount
        self.GneralDataExecuter.close()
        return Revenue
    
    def get_UserCOUNT(self):
         self.GneralDataExecuter=self.MYSQLconnection.cursor()
         self.GneralDataExecuter.execute("select COUNT(uid) from user") 
         dataUser=self.GneralDataExecuter.fetchall()
         self.GneralDataExecuter.close()
         return dataUser[0][0]
    
    def get_ProductCOUNT(self):
         self.GneralDataExecuter=self.MYSQLconnection.cursor()
         self.GneralDataExecuter.execute("select COUNT(pid) from product")
         dataProduct=self.GneralDataExecuter.fetchall()
         self.GneralDataExecuter.close()
         return dataProduct[0][0]
    
    def get_TodaySales(self):
        self.GneralDataExecuter=self.MYSQLconnection.cursor()
        self.GneralDataExecuter.execute("select orders.qnt,price,discnt from orders join product on orders.pid=product.pid where OrderDate like CURDATE();")
        dataProduct=self.GneralDataExecuter.fetchall()
        RevenueT=0
        for x in  dataProduct:
                discount=(x[1]*x[2])/100
                RevenueT+=(x[0]*x[1])-discount
        self.GneralDataExecuter.close()
        return RevenueT




    


                        


