#!/usr/bin/python

# --------------------------------------- #
# Cara Define Sebuah Function pada Python #
# --------------------------------------- #
# 	  def functionname( parameters ): 	  #
#   	  "function_docstring" 			  #
#   	  function_suite 				  #
#   	  return [expression] 			  #
# --------------------------------------- #


# Define Function
def changeme( mylist ):
   "This changes a passed list into this function"
   mylist.append([1,2,3,4]);
   print ("Values inside the function: ", mylist)
   return

# Calling the Function
mylist = [10,20,30];
changeme( mylist );
print ("Values outside the function: ", mylist)