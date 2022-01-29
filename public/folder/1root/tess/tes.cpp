#include <iostream>
using namespace std;
#include <iomanip>
using std::setw;

/* ------------------------------------------------------------ */
/*   Cara Dekalarasi Single Dimensional Array dalam Bahasa C++  */
/* ------------------------------------------------------------ */
/*               type arrayName [ arraySize ];                  */
/* Contoh inisialisasi :                                        */
/*        - double balance[5] = {1000.0, 2.0, 3.4, 17.0, 50.0}; */
/*        - double balance[] = {1000.0, 2.0, 3.4, 17.0, 50.0};  */
/* ------------------------------------------------------------ */

int main () {
   int n[ 10 ]; // n adalah sebuah array dengan 10 integer
 
   // Inisialisasi setiap nilai dari hasil looping, ditampung dengan array       
   for ( int i = 0; i < 10; i++ ) {
      n[ i ] = i + 100;
   }
	
   // Setw adalah set width, merupakan panjang jarak antar nilai pada output
   cout << "Element" << setw( 13 ) << "Value" << endl;
 
   // Print output satu per satu                     
   for ( int j = 0; j < 10; j++ ) {
      cout << setw( 7 )<< j << setw( 13 ) << n[ j ] << endl;
   }
 
   return 0;
}