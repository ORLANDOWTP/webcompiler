# ------------------------------------------------------------------------------ #
# 						Basic Input-Output pada Python 						     #
# ------------------------------------------------------------------------------ #
# OUTPUT :																		 #
# 1.) Untuk print/menampilkan pada stdout (layar) : 							 #
# 		- print "string"														 #
#		Contoh :																 #
# 		- print "Python adalah bahasa pemograman yang sangat bagus"				 #
#  input([prompt]) => fungsi ini membaca satu baris dari stdin (keyboard) #
#                            dan return sebagai sebuah stringself. 				 #


# --------------------------------------------------------------------------- #
# 							BASIC TUPLES OPERATION 							  #
# --------------------------------------------------------------------------- #
# Python Expression				Results							Description   #
# --------------------------------------------------------------------------- #
# len((1, 2, 3))				3								Length   	  #
# (1, 2, 3) + (4, 5, 6)			(1, 2, 3, 4, 5, 6)				Concatenation #
# ('Hi!',) * 4					('Hi!', 'Hi!', 'Hi!', 'Hi!')	Repetition    #
# 3 in (1, 2, 3)				True							Membership    #
# for x in (1, 2, 3): print x,	1 2 3							Iteration     #
# --------------------------------------------------------------------------- #

#!/usr/bin/python

# Contoh input([prompt])
str = input("Enter your input: ");
print ("Received input is : ", str)