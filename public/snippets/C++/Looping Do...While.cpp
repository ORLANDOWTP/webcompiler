#include <iostream>
using namespace std;

/* ------------------------------------------- */
/*  SYNTAX LOOPING DO...WHILE PADA BAHASA C++   */
/* ------------------------------------------- */
/*       do {                                  */
/*             statement(s);                   */
/*       } while( condition );                 */
/* ------------------------------------------- */

int main () {
   // Deklarasi variabel lokal
   int a = 10;

   // Do..while dieksekusi
   do {
      cout << "value of a: " << a << endl;
      a = a + 1;
   }while( a < 20 );
 
   return 0;
}