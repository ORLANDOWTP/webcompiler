#include <stdio.h>

/*	--------------------------------------------------	*/
/*		  SYNTAX SWITCH STATEMENT PADA BAHASA C 		   */
/*	--------------------------------------------------	*/
/*  switch(expression) {								      */
/*														            */
/*     case constant-expression  : 						   */
/*        statement(s); 								      */
/*        break; // optional 							      */ 
/*														            */
/*     case constant-expression  :						   */
/*        statement(s);									      */
/*        break; // optional 							      */
/*  													            */
/*     default : // Optional 							      */
/*     statement(s);									         */
/*  }													            */
/*	--------------------------------------------------	*/
 
int main () {

   /* Deklarasi variabel lokal */
   char grade = 'B';

   switch(grade) {
      case 'A' :
         printf("Excellent!\n" );
         break;
      case 'B' :
      case 'C' :
         printf("Well done\n" );
         break;
      case 'D' :
         printf("You passed\n" );
         break;
      case 'F' :
         printf("Better try again\n" );
         break;
      default :
         printf("Invalid grade\n" );
   }
   
   printf("Your grade is  %c\n", grade );
 
   return 0;
}