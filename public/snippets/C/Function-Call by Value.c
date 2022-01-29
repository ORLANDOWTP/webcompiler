#include <stdio.h>

 /* -------------------------------------------------------------------------- */
 /* Secara default, Function dalam C dinyatakan sebagai Function:Call by Value */
 /* -------------------------------------------------------------------------- */
 /* Cara define suatu function :											                */
 /* -------------------------------------------------------------------------- */
 /* 			return_type function_name( parameter list ) 				             */
 /*				{															                   */
 /* 				body of the function 								                   */
 /*				}														                      */
 /* -------------------------------------------------------------------------- */

/* Sebuah Function untuk Return Angka Max diantara 2 Angka yang diinput */
int max(int num1, int num2) {

   /* Deklarasi Variabel Lokal dalam Function */
   int result;
 
   if (num1 > num2)
      result = num1;
   else
      result = num2;
 
   /* Mengembalikan Hasil dari Perhitungan/Suatu Kondisi */
   return result; 
}
 
int main () {

   /* Mendefinisikan Variabel Lokal */
   int a = 100;
   int b = 200;
   int ret;
 
   /* Memanggil Function untuk Mendapatkan Max Number */
   ret = max(a, b);
 
   printf( "Max value is : %d\n", ret );
 
   return 0;
}
 
