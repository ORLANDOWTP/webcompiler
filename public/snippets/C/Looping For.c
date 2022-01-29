#include <stdio.h>

/*	--------------------------------------	*/
/*	   SYNTAX LOOPING FOR PADA BAHASA C 	*/
/*	--------------------------------------	*/
/*	for ( init; condition; increment ) {	*/
/*	   statement(s);						*/
/*	}										*/
/*	--------------------------------------	*/
 
int main () {

   int a;
	
   /* Looping for dieksekusi */
   for( a = 10; a < 20; a = a + 1 ){
      printf("value of a: %d\n", a);
   }
 
   return 0;
}