#!/usr/bin/python

# ---------------------------------------- #
# Syntax Statement If..Else if pada Python #
# ---------------------------------------- #
# 			  if expression1: 		   	   #
#    			  statement(s) 		   	   #
# 			  elif expression2:		   	   #
#    			  statement(s)		   	   #
# 			  elif expression3:		   	   #
#    			  statement(s)		   	   #
# 			  else:					   	   #
#    			  statement(s)		   	   #
# ---------------------------------------- #

var = 200
if var == 200:
   f0 = open("result.txt", "a")
   f0.write("%d#%d#%d\n" % (0,17,var))
   f0.close()
   print ("1 - Got a true expression value")
   f1 = open("result.txt", "a")
   f1.write("%d#%d#%d\n" % (1,18,var))
   f1.close()
   print (var)
elif var == 150:
   print ("2 - Got a true expression value")
   print (var)
elif var == 100:
   print ("3 - Got a true expression value")
   print (var)
else:
   print ("4 - Got a false expression value")
   print (var)

print ("Good bye!")