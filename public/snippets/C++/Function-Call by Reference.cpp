#include <iostream>
using namespace std;

/* -------------------------------------------------------------------------------------------------------------- */
/*                                  Function - Passing Parameter by Reference                                     */
/* -------------------------------------------------------------------------------------------------------------- */
/* Sebuah reference parameter merupakan sebuah referensi kepada lokasi memori dari variabel.                      */
/* Pada saat memanggil method dengan passing by reference, sebuah storage tidak dibuat utk parameter ini.         */
/* Hal itu karena reference parameter merepresentasikan lokasi memori yang sama dengan parameter sebenarnya yang  */
/* diberikan/dipass ke method ini.                                                                                */
/* -------------------------------------------------------------------------------------------------------------- */

 /* -------------------------------------------------------------------------- */
 /* Cara define suatu function dalam C++ :                                     */
 /* -------------------------------------------------------------------------- */
 /*         return_type function_name( parameter list )                        */
 /*            {                                                               */ 
 /*            body of the function                                            */
 /*            }                                                               */
 /* -------------------------------------------------------------------------- */

// Definisi dari function swap
void swap(int *x, int *y) {
   int temp;
   temp = *x; /* simpan value yang berupa alamat x pada temp */
   *x = *y; /* masukkan y dalam x */
   *y = temp; /* masukkan temp kedalam y */
  
   return;
}

int main () {
   // local variable declaration:
   int a = 100;
   int b = 200;
 
   cout << "Before swap, value of a :" << a << endl;
   cout << "Before swap, value of b :" << b << endl;

   /* calling a function to swap the values.
      * &a indicates pointer to a ie. address of variable a and 
      * &b indicates pointer to b ie. address of variable b.
   */
	
   swap(&a, &b);

   cout << "After swap, value of a :" << a << endl;
   cout << "After swap, value of b :" << b << endl;
 
   return 0;
}