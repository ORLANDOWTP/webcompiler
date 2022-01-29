#include <stdio.h>

/*	-------------------------------------------------------------------------------------------------------------------------------------------  */
/*  					        Penjelasan Fungsi scanf() & printf()						                									 */
/*	-------------------------------------------------------------------------------------------------------------------------------------------  */
/*  Fungsi int scanf(const char *format, ...) membaca input dari stdin (keyboard) dan scan input tersebut sesuai dengan format yang disediakan.  */
/*	-------------------------------------------------------------------------------------------------------------------------------------------  */
/*  Fungsi int printf(const char *format, ...) menampilkan output ke stdout (layar) sesuai dengan format yang disediakan.	                     */
/*	-------------------------------------------------------------------------------------------------------------------------------------------  */
/*  Beberapa Format yang disediakan: 	  */
/*	------------------------------------  */
/*    1.) %s (untuk tipe data String)     */
/*    2.) %d (untuk tipe data Integer)    */
/*    3.) %c (untuk tipe data Char)  	  */
/*    4.) %f (untuk tipe data Float)      */
/*    dsb.      						  */
/*	------------------------------------  */


int main( ) {

   char str[100];
   int i;

   printf( "Enter a value :");
   scanf("%s %d", str, &i);

   printf( "\nYou entered: %s %d ", str, i);

   return 0;
}