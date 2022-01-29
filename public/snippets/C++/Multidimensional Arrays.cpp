#include <iostream>
using namespace std;
 
/* ----------------------------------------------------------------------------	*/
/*   		Cara Dekalarasi Multidimensional Arrays dalam Bahasa C++   	     	*/
/* ----------------------------------------------------------------------------	*/
/*             		   type arrayName [ baris ][ kolom ];                  		*/
/* Contoh inisialisasi :                                       					*/
/*  - int a[3][4] = {  															*/
/*   					{0, 1, 2, 3} ,   //  initializers untuk baris index 0 	*/
/*  					{4, 5, 6, 7} ,   //  initializers untuk baris index 1  	*/
/*   					{8, 9, 10, 11}   //  initializers untuk baris index 2  	*/
/*			    	}; 															*/
/*  - int a[3][4] = {0,1,2,3,4,5,6,7,8,9,10,11};  								*/
/* ----------------------------------------------------------------------------	*/


int main () {
   // a adalah sebuah array dengan 5 baris dan 2 kolom.
   int a[5][2] = { {0,0}, {1,2}, {2,4}, {3,6},{4,8}};
 
   // Print output untuk setiap nilai                     
   for ( int i = 0; i < 5; i++ )
      for ( int j = 0; j < 2; j++ ) {
         cout << "a[" << i << "][" << j << "]: ";
         cout << a[i][j]<< endl;
      }
 
   return 0;
}