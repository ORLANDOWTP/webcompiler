#include <stdio.h>

/*	------------------------------------------	*/
/*		SYNTAX LOOPING WHILE PADA BAHASA C 		*/
/*	------------------------------------------	*/
/*				while(condition) {				*/
/*	  		 		statement(s);				*/
/*				}								*/
/*	------------------------------------------	*/
 
int main () {

   /* Deklarasi variabel lokal */
   int a = 10;

   /* Looping while dilakukan */
   while( a < 20 ) {
      printf("value of a: %d\n", a);
      a++;
   }
 
   return 0;
}