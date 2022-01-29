#include <iostream>
using namespace std;

/*  ----------------------------------------------------------------  */
/*             SYNTAX IF ELSE STATEMENT PADA BAHASA C++               */
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
   // Deklarasi variabel lokal
   int a = 100;
 
   // Cek apakah kondisi boolean nya benar atau salah
   if( a == 10 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      cout << "Value of a is 10" << endl;
   } else if( a == 20 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      cout << "Value of a is 20" << endl;
   } else if( a == 30 ) {
      /* Jika kondisi boolean True, maka statement dibawah akan dijalankan lalu exit */
      /* Jika False, maka akan dicek pada kondisi boolean selanjutnya pada else if*/
      cout << "Value of a is 30" << endl;
   }else {
      /* Jika semua kondisi boolean false, maka akan dijalankan statement dalam else berikut. */
      cout << "Value of a is not matching" << endl;
   }
	
   cout << "Exact value of a is : " << a << endl;
 
   return 0;
}