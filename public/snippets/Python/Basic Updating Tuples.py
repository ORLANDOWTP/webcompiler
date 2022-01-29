#!/usr/bin/python

# ------------------------------------------------- #
# 				Cara Membuat Tuples 				#
# ------------------------------------------------- #
# 			 Ada 3 cara membuat Tuples 				#
# ------------------------------------------------- #
# 1.) tup1 = ('physics', 'chemistry', 1997, 2000);  #
# 2.) tup2 = (1, 2, 3, 4, 5 );						#
# 3.) tup3 = "a", "b", "c", "d";					#
# ------------------------------------------------- #

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


tup1 = (12, 34.56);
tup2 = ('abc', 'xyz');

# Statement berikut adalah tidak valid untuk updating tuple
# tup1[0] = 100;

# Jadi, mari buat seperti berikut:
tup3 = tup1 + tup2;
print (tup3)