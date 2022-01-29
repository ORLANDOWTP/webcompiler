#include <iostream>
using namespace std;

/* ------------------------------------------ */
/*    SYNTAX LOOPING WHILE PADA BAHASA C++    */
/* ------------------------------------------ */
/*          while(condition) {                */
/*             statement(s);                  */
/*          }                                 */
/* ------------------------------------------ */
 
int main () {
   // Deklarasi variabel lokal
   int a = 10;

   // Looping while dieksekusi
   while( a < 20 ) {
      cout << "Value of a: " << a << endl;
      a++;
   }
 
   return 0;
}