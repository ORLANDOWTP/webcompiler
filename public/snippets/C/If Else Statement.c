#include <stdio.h>

/*  ----------------------------------------------------------------  */
/*             SYNTAX IF ELSE STATEMENT PADA BAHASA C                 */
/*  ----------------------------------------------------------------  */
/*  if(boolean_expression) {                                          */               
/*     --    statement(s) akan dijalankan jika boolean = true     --  */
/*  }                                                                 */
/*  else if(boolean_expression){                                      */
/*     --    statement(s) akan dijalankan jika boolean = true     --  */  
/*  }                                                                 */
/*  else{                                                             */
/*     -- statement(s) akan dijalankan jika semua boolean = false --  */  
/*  }                                                                 */
/*  ----------------------------------------------------------------  */
 
int main () {

   /* Deklarasi Variabel Lokal */
   int a = 100;
 
   /* Cek Kondisi Boolean */
   if( a == 10 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      printf("Value of a is 10\n" );
   }
   /* Cek Kondisi Boolean */
   else if( a == 20 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      printf("Value of a is 20\n" );
   }
   else if( a == 30 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      printf("Value of a is 30\n" );
   }
   else {
      /* Jika semua kondisi boolean false, maka akan dijalankan statement dalam else berikut. */
      printf("None of the values is matching\n" );
   }
   
   printf("Exact value of a is: %d\n", a );
 
   return 0;
}