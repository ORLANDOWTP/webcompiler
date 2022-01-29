#include <iostream>
using namespace std;

/* -------------------------------------------------- */
/*      SYNTAX SWITCH STATEMENT PADA BAHASA C++       */
/* -------------------------------------------------- */
/*  switch(expression) {                              */
/*                                                    */
/*     case constant-expression  :                    */
/*        statement(s);                               */
/*        break; // optional                          */ 
/*                                                    */
/*     case constant-expression  :                    */
/*        statement(s);                               */
/*        break; // optional                          */
/*                                                    */
/*     default : // Optional                          */
/*     statement(s);                                  */
/*  }                                                 */
/* -------------------------------------------------- */
 
int main () {
   // Deklarasi variabel lokal:
   char grade = 'D';

   switch(grade) {
      case 'A' :
         cout << "Excellent!" << endl; 
         break;
      case 'B' :
      case 'C' :
         cout << "Well done" << endl;
         break;
      case 'D' :
         cout << "You passed" << endl;
         break;
      case 'F' :
         cout << "Better try again" << endl;
         break;
      default :
        cout << "Invalid grade" << endl;
   }
	
   cout << "Your grade is " << grade << endl;
 
   return 0;
}