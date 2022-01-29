#include <iostream>
using namespace std;

/* -------------------------------------------------------------------------------------------------------------- */
/*                                  Function - Passing Parameter by Value                                         */
/* -------------------------------------------------------------------------------------------------------------- */
/* Dalam mekanisme ini, ketika metode ini dipanggil, lokasi penyimpanan baru dibuat untuk setiap parameter nilai. */
/* Nilai-nilai parameter yang sebenarnya akan disalin ke penyimpanan tersebut.                                    */
/* Oleh karena itu, perubahan yang dibuat kepada parameter dalam metode tidak berpengaruh pada argumen.           */
/* -------------------------------------------------------------------------------------------------------------- */

 /* ---------------------------------------------------------------------------- */
 /* Cara define suatu function dalam C++ :                                       */
 /* ---------------------------------------------------------------------------- */
 /*         return_type function_name( parameter list )                          */
 /*            {                                                                 */
 /*            body of the function                                              */
 /*            }                                                                 */
 /* --------------------------------------------------------------------------   */
 
// Mendefinisikan function Swap
void swap(int x, int y) {
   int temp;

   temp = x; /* Menyimpan nilai dari x pada temp */
   x = y;    /* Taruh/copy y kedalam x */
   y = temp; /* Taruh/copy temp kepada y */
  
   return;
}
 
int main () {
   // Deklarasi variabel lokal
   int a = 100;
   int b = 200;
 
   cout << "Before swap, value of a :" << a << endl;
   cout << "Before swap, value of b :" << b << endl;
 
   // Pemanggilan function swap dilakukan
   swap(a, b);
 
   cout << "After swap, value of a :" << a << endl;
   cout << "After swap, value of b :" << b << endl;
 
   return 0;
}