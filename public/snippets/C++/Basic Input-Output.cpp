#include <iostream>
using namespace std;

/* ---------------------------------------------------------------------------- */
/* 					BASIC INPUT-OUTPUT PADA BAHASA C++ 				     		*/
/* ---------------------------------------------------------------------------- */
/* 1.) Standard Output Stream (cout)  									 		*/
/*	   - Merupakan suatu syntax yang digunakan untuk menampilkan output. 		*/
/*	   - Menggunakan tanda "<<" 									     		*/
/* 	   Contoh : - cout << "The Value is:" << number << endl;			 		*/
/* ---------------------------------------------------------------------------- */
/*	2.) Standard Input Stream (cin)										 		*/
/*		- Merupakan suatu syntax yang digunakan untuk assign stdin ke variabel. */
/*		- Menggunakan tanda ">>"												*/
/*		Contoh : cin >> number;													*/
/* ---------------------------------------------------------------------------- */
 
int main( ) {
   char name[50];
 
   cout << "Please enter your name: ";
   cin >> name;
   
   cout << "Your name is: " << name << endl;
 
}