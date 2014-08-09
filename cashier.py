import sys
from PyQt4 import QtCore, QtGui, uic
import pymysql
import lightblue

class Customer():
	def __init__(self,name,customerID,pebbleID):
		self.name = name
		self.id = customerID
		self.pebble = pebbleID
class GUI(QtGui.QWidget):
	def __init__(self):
		QtGui.QWidget.__init__(self)
		self.ui = uic.loadUi('cashier.ui')
		self.ui.show()

		self.ui.customerList.itemClicked.connect(self.selectCustomer)
		self.ui.barcode.returnPressed.connect(self.addItemToBasket)
		self.ui.buttonBox.accepted.connect(self.checkout)
		self.ui.buttonBox.rejected.connect(self.cancel)
		self.ui.searchButton.clicked.connect(self.initCustomerList)

		self.initCustomerList()

	def initCustomerList(self):
		self.dbconn = pymysql.connect(host='localhost',port =3306,
			user='root',passwd='root',db='id_mapping')

		self.cur = self.dbconn.cursor()

		self.listCustomer=[]
		self.ui.customerList.clear()
		
		listPebbles = lightblue.finddevices()
		# listPebbles = [('00:18:33:7E:17:28', u'Pebble 1728\x00', 15730436), 
		# 		('00:17:E9:4F:92:E9', u'Pebble 92E9\x00', 15730436)]
		if len(listPebbles)==0:
			print 'unable to find'
			return

		for pebble in listPebbles:
			pebbleID= str(pebble[0].replace(':',''))
			print pebbleID
			self.cur.execute('''SELECT customerID,customerName 
				FROM id_mapping where pebbleID = \"%s\" '''% str(pebbleID))
			row=self.cur.fetchone()
			# (customerID,customerName) = row
			# if(customerID!=None and customerName!=None):
			print row

			if(row!=None):
				self.listCustomer.append(Customer(row[1],row[0],pebbleID))

		for customer in self.listCustomer:
			self.ui.customerList.addItem(customer.name)
	
	def checkout(self):
		self.ui.idText.setPlainText("")
		self.ui.pebbleText.setPlainText("")
		self.ui.barcode.setText("")
		self.ui.checkoutItems.clear()

		self.listCustomer.remove(self.customer)
		self.ui.customerList.clear()
		for customer in self.listCustomer:
			self.ui.customerList.addItem(customer.name)

	def cancel(self):
		self.ui.idText.setPlainText("")
		self.ui.pebbleText.setPlainText("")
		self.ui.barcode.setText("")
		self.ui.checkoutItems.clear()

	def selectCustomer(self):
		index = self.ui.customerList.currentRow()
		self.customer = self.listCustomer[index]

		self.ui.pebbleText.setPlainText(self.customer.pebble[8:12])
		
		self.ui.idText.setPlainText(self.customer.id)
	
	def addItemToBasket(self):
		self.ui.checkoutItems.addItem(self.ui.barcode.text())
		self.ui.barcode.setText("")
	

def main():
    app = QtGui.QApplication(sys.argv)
    try:
        myApp = GUI()
        sys.exit(app.exec_())
    except KeyboardInterrupt:
        print 'KeyboardInterrupt!'
        sys.exit(0)

if __name__ == '__main__':
    main()
