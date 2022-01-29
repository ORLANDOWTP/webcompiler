#include <stdio.h>

 /* -------------------------------------------------------------------------- */
 /* Secara default, Function dalam C dinyatakan sebagai Function:Call by Value */
 /* -------------------------------------------------------------------------- */
 /* Cara define suatu function :                                               */
 /* -------------------------------------------------------------------------- */
 /*         return_type function_name( parameter list )                        */
 /*            {                                                               */ 
 /*            body of the function                                            */
 /*            }                                                               */
 /* -------------------------------------------------------------------------- */
 
/* Sebuah Function untuk Melakukan Swap Nilai */
void swap(int *x, int *y) {

   int temp;
   temp = *x;    /*  Menyimpan nilai dalam sebuah alamat x dalam variabel temp  */
   *x = *y;      /*      Memasukkan nilai dari alamat y kedalam alamat x        */
   *y = temp;    /*          Memasukkan nilai temp kedalam alamat y             */
  
   return;
}
 
int main () {

   /* Mendefinisikan Variabel Lokal */
   int a = 100;
   int b = 200;
 
   printf("Before swap, value of a : %d\n", a );
   printf("Before swap, value of b : %d\n", b );
 
   /*             Memanggil Sebuah Function Swap yang Telah Dibuat              */
   /*   &a menyatakan sebuah pointer yang menunjuk ke alamat dari variabel a.   */
   /*   &b menyatakan sebuah pointer yang menunjuk ke alamat dari variabel b.   */
   swap(&a, &b);
 
   /* Print Output */
   printf("After swap, value of a : %d\n", a );
   printf("After swap, value of b : %d\n", b );
 
   return 0;
}