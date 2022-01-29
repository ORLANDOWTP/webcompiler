#include <stdio.h>

/*	------------------------------------------	*/
/*	 SYNTAX LOOPING DO...WHILE PADA BAHASA C 	*/
/*	------------------------------------------	*/
/*			do {								*/			
/* 	  			statement(s);					*/
/*			} while( condition );				*/
/*	------------------------------------------	*/
 
int main () {

   /* Deklarasi variabel lokal */
   int a = 10;

   /* Eksekusi Do..While Looping dilakukan */
   do {
      printf("value of a: %d\n", a);
      a = a + 1;
   }while( a < 20 );
 
   return 0;
}